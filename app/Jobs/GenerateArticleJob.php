<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\Site;
use App\Services\AnthropicService;
use App\Services\ImageService;
use App\Services\NewsService;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class GenerateArticleJob implements ShouldQueue
{
    use Queueable;

    public int $timeout = 900;
    public int $tries   = 1;

    public function __construct(
        public readonly int    $siteId,
        public readonly string $topic,
        public readonly string $pillar,
        public readonly string $language,
        public readonly string $scheduleDate,
        public readonly int    $userId,
        public readonly string $status = 'scheduled',
    ) {}

    public function handle(): void
    {
        $site    = Site::findOrFail($this->siteId);
        $service = new AnthropicService($site);
        $images  = new ImageService();

        // Resolve pillar
        $pillar = $this->pillar;
        if ($pillar === '' || $pillar === 'auto') {
            $options = array_keys($site->getPillarOptions());
            $pillar  = $options ? $options[array_rand($options)] : 'news';
        }

        // Resolve topic (autopilot generates if empty)
        $topic = trim($this->topic);
        if ($topic === '') {
            $suggested = $service->suggestTopics($pillar, $this->language, 1);
            $topic     = $suggested[0] ?? ($site->name . ' ' . str_replace('-', ' ', $pillar));
        }

        // Step 1: best title
        $titles = $service->generateTitleOptions($topic, $pillar, $this->language);
        $bestTitle = collect($titles)
            ->sortByDesc(fn (array $t) => match ($t['ctr_score'] ?? 'low') {
                'high' => 3, 'med' => 2, default => 1,
            })->first();
        $selectedTitle = $bestTitle['title'] ?? $topic;

        // Fetch existing articles for internal linking and context exclusion
        $existing = Article::where('site_id', $this->siteId)
            ->where('status', 'published')->latest('published_at')->take(20)
            ->get(['title', 'slug'])
            ->map(fn ($a) => ['title' => $a->title, 'slug' => $a->slug])->toArray();

        // Step 2: full article
        $articleData = $service->generateArticle($selectedTitle, $pillar, $this->language, $existing);
        $keyword     = $articleData['focus_keyword'] ?? $topic;
        $html        = $articleData['content_html'] ?? '';

        // ── POST-PROCESS PIPELINE ──────────────────────────────────────────────
        // 1) Internal links FIRST (on core article) so the AI call never truncates CTA/news.
        if (count($existing) >= 2 && $html !== '') {
            $html = $service->generateInternalLinks($html, $existing);
        }

        // 2) Deterministic additions (cannot be truncated by AI)
        $html = $this->replaceImageMarkers($html, $images);               // relevant images
        
        $cta1 = $service->renderCta(); // Default Service CTA
        $cta2 = $cta1;
        if ($this->siteId === 3) {
            // Untuk M2B (ID 3): CTA 1 (awal) = Ebook M2B, CTA 2 (tengah) = Layanan Konsultasi M2B
            $cta1 = $service->renderEbookCta();
            $cta2 = $service->renderCta();
        } elseif ($this->siteId === 4 && config('services.solusi.enabled')) {
            // Untuk morabangun (ID 4): CTA 2 (tengah) diarahkan ke /solusi/{vertikal} yang
            // relevan (deteksi kata kunci industri) atau ke hub /solusi kalau tak spesifik.
            // GATED oleh flag SOLUSI_CTA_ENABLED — baru dinyalakan setelah rute /solusi/*
            // live di production (menunggu deploy Antigravity), agar CTA tidak 404.
            $cta2 = $service->renderSolusiCta($keyword, $selectedTitle);
            // Kalau judul kena vertikal spesifik, CTA awal (cta1) ikut diarahkan ke situ juga
            // (pembaca yang bounce sebelum sampai tengah artikel tetap kena penawaran relevan).
            // Kalau cuma jatuh ke hub generik, cta1 tetap CTA perusahaan biasa — hindari 2x CTA hub berturutan.
            if ($service->matchSolusiSlug($keyword, $selectedTitle)) {
                $cta1 = $cta2;
            }
        }
        $html = $this->injectCta($html, $cta1, $cta2);            // CTA awal + tengah
        $html = $this->appendNews($html, $keyword, $this->language, $articleData['news'] ?? []); // berita terkini

        // Step 3: save
        $slug        = $this->ensureUniqueSlug($articleData['slug'] ?: Str::slug($selectedTitle));
        $isPublished = $this->status === 'published';

        Article::create([
            'site_id'             => $this->siteId,
            'title'               => $selectedTitle,
            'slug'                => $slug,
            'focus_keyword'       => $keyword,
            'meta_description'    => $articleData['meta_description'] ?? '',
            'excerpt'             => $articleData['excerpt'] ?? Str::limit(strip_tags($html), 200),
            'og_title'            => $articleData['seo_title'] ?? $selectedTitle,
            'content_html'        => $html,
            'featured_image_url'  => $images->fetchForKeyword(
                trim($articleData['featured_image_query'] ?? '') ?: $keyword,
                $this->siteId,
                $selectedTitle
            ),
            'tags'                => $articleData['tags'] ?? [],
            'hashtags'            => $articleData['hashtags'] ?? [],
            'image_alt_texts'     => $articleData['image_alt_texts'] ?? [],
            'schema_faq'          => $articleData['schema_faq'] ?? [],
            'language'            => $this->language,
            'pillar'              => $pillar,
            'status'              => $this->status,
            'scheduled_at'        => $this->status === 'scheduled' ? Carbon::parse($this->scheduleDate) : null,
            'published_at'        => $isPublished ? now() : null,
            'word_count'          => $articleData['word_count'] ?? str_word_count(strip_tags($html)),
            'estimated_read_time' => max(1, intval(str_word_count(strip_tags($html)) / 238)),
            'user_id'             => $this->userId,
        ]);
    }

    /** Replace [[IMG: query || caption]] markers with relevant stock-photo figures. */
    private function replaceImageMarkers(string $html, ImageService $images): string
    {
        return preg_replace_callback(
            '/\[\[IMG:\s*(.+?)\s*\|\|\s*(.+?)\s*\]\]/s',
            function ($m) use ($images) {
                $query   = trim($m[1]);
                $caption = trim($m[2]);
                // ImageService dedups against photos this site already used, so the
                // most-relevant UNUSED result is picked — relevance + variety at once.
                $img     = $images->fetchForQuery($query, $this->siteId);
                if (! $img) {
                    return ''; // no image -> remove marker (no empty box)
                }
                return '<figure style="margin:2rem 0;">'
                    . '<img src="' . htmlspecialchars($img) . '" alt="' . htmlspecialchars($caption) . '" '
                    . 'style="width:100%;border-radius:.75rem;object-fit:cover;aspect-ratio:16/9;" loading="lazy">'
                    . '<figcaption style="text-align:center;color:#6b7280;font-size:.875rem;margin-top:.5rem;font-style:italic;">'
                    . htmlspecialchars($caption) . '</figcaption></figure>';
            },
            $html
        ) ?? $html;
    }

    /** Insert CTA early (after the 1st H2 section) and in the middle of the article. */
    private function injectCta(string $html, string $cta1, ?string $cta2 = null): string
    {
        $cta2 = $cta2 ?? $cta1;
        $parts = preg_split('/(<\/h2>)/i', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        // delimiter indices (positions of </h2>) are the odd indices
        $h2 = [];
        for ($i = 1; $i < count($parts); $i += 2) {
            $h2[] = $i;
        }
        $n = count($h2);
        if ($n >= 3) {
            $midIdx   = $h2[intdiv($n, 2)];   // middle H2
            $earlyIdx = $h2[0];               // first H2
            // Insert at higher index first so earlier index stays valid
            $parts[$midIdx]   .= $cta2;
            $parts[$earlyIdx] .= $cta1;
            return implode('', $parts);
        }
        // Short article: one CTA at the end
        return $html . $cta1;
    }

    /** Append a "Berita Terkini Terkait" section with real Google News links. */
    private function appendNews(string $html, string $keyword, string $lang, array $news = []): string
    {
        if (empty($news)) {
            $news = (new NewsService())->fetchRelatedNews($keyword, $lang, 3);
        }
        if (empty($news)) {
            return $html;
        }

        $cards = '';
        foreach ($news as $n) {
            $imgHtml = '';
            if (!empty($n['image_url'])) {
                $imgHtml = '<img src="' . htmlspecialchars($n['image_url']) . '" style="width:100px;height:75px;object-fit:cover;border-radius:.375rem;flex-shrink:0;" alt="' . htmlspecialchars($n['title']) . '">';
            }
            $cards .= '<a href="' . htmlspecialchars($n['link']) . '" target="_blank" rel="noopener nofollow" '
                . 'style="display:flex;gap:1rem;align-items:center;padding:.9rem 1rem;background:#fff;border:1px solid #e5e7eb;border-radius:.6rem;text-decoration:none;transition:border-color .15s;margin-bottom:.6rem;">'
                . $imgHtml
                . '<div>'
                . '<span style="display:block;font-weight:600;color:#111827;font-size:.95rem;line-height:1.4;margin-bottom:.3rem;">📰 ' . htmlspecialchars($n['title']) . '</span>'
                . '<span style="font-size:.78rem;color:#6b7280;">' . htmlspecialchars($n['source'])
                . ($n['date'] ? ' · ' . htmlspecialchars($n['date']) : '') . '</span>'
                . '</div></a>';
        }

        $section = '<div style="margin:2.5rem 0;padding:1.5rem;background:linear-gradient(135deg,#f8fafc,#eef2ff);border-radius:.9rem;border:1px solid #e5e7eb;">'
            . '<h2 id="berita-terkini" style="font-size:1.35rem;font-weight:700;color:var(--color-teal-deep,#0f172a);margin:0 0 1rem;">🌐 Berita Terkini Terkait</h2>'
            . '<p style="font-size:.88rem;color:#6b7280;margin:0 0 1rem;">Update terbaru dari media nasional &amp; internasional seputar topik ini:</p>'
            . $cards
            . '</div>';

        return $html . $section;
    }

    private function ensureUniqueSlug(string $slug): string
    {
        $original = $slug;
        $counter  = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = "{$original}-{$counter}";
            $counter++;
        }
        return $slug;
    }
}
