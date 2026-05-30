<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\Site;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class AnthropicService
{
    private string $apiKey;
    private string $model;
    private string $baseUrl = 'https://api.anthropic.com/v1';
    private ?Site $site;

    /**
     * Accept an optional Site model for per-site credentials, model, and prompt context.
     * Falls back to global Settings if no Site is provided.
     */
    public function __construct(?Site $site = null, ?string $model = null)
    {
        $this->site = $site;

        if ($site && $site->anthropic_api_key) {
            $key   = $site->anthropic_api_key;
            $model = $model ?: $site->anthropic_model;
        } else {
            $key = Setting::get('anthropic_api_key');
            $model = $model ?: Setting::get('anthropic_model', 'claude-sonnet-4-6');
        }

        if (! $key) {
            throw new \RuntimeException('Anthropic API key not configured. Add it in Site settings or global Settings.');
        }

        $this->apiKey = trim($key);
        $this->model  = trim($model ?: 'claude-sonnet-4-6');
    }

    /**
     * Get the site context string for AI prompts.
     */
    private function getContextString(): string
    {
        if ($this->site && $this->site->ai_prompt_context) {
            return $this->site->ai_prompt_context;
        }

        // Default context for M2B
        return "M2B is a licensed freight forwarding & PPJK company in Indonesia.\nPorts: Belawan, Kualanamu, Tanjung Priok, Tanjung Perak, Makassar, Balikpapan.\nTarget audience: B2B exporters/importers and UMKM exporters.";
    }

    private function getWhatsApp(): string
    {
        return $this->site?->whatsapp_number ?: '+6281263027818';
    }

    private function getCompanyName(): string
    {
        return $this->site?->name ?: 'M2B';
    }

    private function getCtaBlock(): string
    {
        $company  = $this->getCompanyName();
        $wa       = preg_replace('/[^0-9]/', '', $this->getWhatsApp());
        $waUrl    = "https://wa.me/{$wa}";

        return <<<CTA
<div style="background:linear-gradient(135deg,#f0f9ff,#e0f2fe);border-left:4px solid #0ea5e9;padding:1.25rem 1.5rem;margin:2rem 0;border-radius:.75rem;">
<p style="margin:0 0 .5rem;font-weight:700;font-size:1.05rem;">💬 Butuh Konsultasi atau Layanan Profesional?</p>
<p style="margin:0 0 .75rem;color:#374151;">Tim ahli <strong>{$company}</strong> siap membantu Anda. Konsultasi gratis, respon cepat.</p>
<a href="{$waUrl}" target="_blank" rel="noopener" style="display:inline-block;background:#25d366;color:#fff;padding:.6rem 1.25rem;border-radius:.5rem;font-weight:600;text-decoration:none;">📲 Chat WhatsApp Sekarang →</a>
</div>
CTA;
    }

    // ─── Public Methods ────────────────────────────────────────────────────────

    /**
     * Generate 10 title options with CTR score and hook type.
     */
    public function generateTitleOptions(string $topic, string $pillar, string $language): array
    {
        $lang    = $language === 'en' ? 'English' : 'Bahasa Indonesia';
        $prompt  = $this->buildTitlePrompt($topic, $pillar, $lang);
        $content = $this->callApi($prompt, 1024);

        return $this->parseTitleJson($content);
    }

    /**
     * Generate full article. Two API calls: metadata then content.
     */
    public function generateArticle(string $title, string $pillar, string $language): array
    {
        $lang = $language === 'en' ? 'English' : 'Bahasa Indonesia';

        // Call 1: structured metadata (JSON)
        $metaPrompt = $this->buildMetaPrompt($title, $pillar, $lang);
        $metaRaw    = $this->callApi($metaPrompt, 2048);
        $meta       = $this->parseMetaJson($metaRaw);

        // Call 2: full HTML content
        $contentPrompt = $this->buildContentPrompt($title, $pillar, $lang, $meta['focus_keyword'] ?? '');
        $contentHtml   = $this->callApi($contentPrompt, 8000);
        $wordCount     = str_word_count(strip_tags($contentHtml));

        return array_merge($meta, [
            'content_html' => $contentHtml,
            'word_count'   => $wordCount,
        ]);
    }

    /**
     * Auto-inject internal links into article content based on existing articles.
     */
    public function generateInternalLinks(string $contentHtml, array $existingArticles): string
    {
        if (empty($existingArticles)) {
            return $contentHtml;
        }

        $articleList = collect($existingArticles)->map(fn (array $a) =>
            "- \"{$a['title']}\" → /blog/{$a['slug']}"
        )->implode("\n");

        $prompt = <<<PROMPT
Given this HTML article content and a list of existing articles, insert 3-5 relevant internal links naturally within the content.

EXISTING ARTICLES:
{$articleList}

RULES:
- Only link to articles that are GENUINELY related to the surrounding text
- Use descriptive anchor text (not "click here")
- Spread links throughout the article, not clustered
- Use <a href="/blog/slug">anchor text</a> format
- Do NOT modify the content meaning, only add links where natural
- Return the FULL modified HTML content, nothing else

CONTENT:
{$contentHtml}
PROMPT;

        try {
            return $this->callApi($prompt, 8000);
        } catch (\Throwable) {
            // If internal linking fails, return original content
            return $contentHtml;
        }
    }

    // ─── Prompt Builders ───────────────────────────────────────────────────────

    private function buildTitlePrompt(string $topic, string $pillar, string $lang): string
    {
        $context   = $this->getContextString();
        $company   = $this->getCompanyName();

        return <<<PROMPT
You are an SEO content strategist and keyword researcher for {$company}.
{$context}
Content pillar: {$pillar}. Write in {$lang}.

Generate exactly 10 blog article titles for: "{$topic}"

═══ TITLE OPTIMIZATION RULES ═══

1. Each title must target a DIFFERENT search intent (informational, navigational, commercial, transactional)
2. Use HIGH-CTR power words: "Panduan Lengkap", "Cara", "Tips", "Rahasia", "Terbaru 2026", "Wajib Tahu"
3. Include numbers where possible (7 Tips, 10 Cara, 5 Strategi)
4. Front-load the primary keyword in the title
5. Mix title formats: how-to, listicle, question, guide, comparison, case-study
6. Target long-tail keywords that have COMMERCIAL INTENT (people ready to take action)
7. Titles should be 50-65 characters for optimal SERP display

Return ONLY valid JSON array, no markdown, no explanation:
[
  {
    "title": "...",
    "ctr_score": "high|med|low",
    "hook_type": "how-to|listicle|question|news|guide|comparison|case-study",
    "search_intent": "informational|commercial|transactional",
    "estimated_keyword": "target keyword phrase"
  }
]
PROMPT;
    }

    private function buildMetaPrompt(string $title, string $pillar, string $lang): string
    {
        $context = $this->getContextString();
        $company = $this->getCompanyName();

        return <<<PROMPT
You are an SEO expert for {$company} blog. Write in {$lang}.
{$context}
Article title: "{$title}"
Content pillar: {$pillar}

Generate SEO metadata optimized for Google Search and high CTR.

Return ONLY valid JSON with these exact keys, no markdown, no explanation:
{
  "seo_title": "Title optimized for CTR, max 60 chars, include primary keyword",
  "slug": "url-friendly-slug-with-keyword",
  "meta_description": "Compelling description with CTA, max 155 chars, include keyword, use power words",
  "focus_keyword": "primary 2-4 word keyword phrase with search volume potential",
  "secondary_keywords": ["related keyword 1", "related keyword 2", "related keyword 3"],
  "tags": ["tag1", "tag2", "tag3", "tag4", "tag5", "tag6", "tag7"],
  "hashtags": ["#hashtag1", "#hashtag2", "#hashtag3", "#hashtag4", "#hashtag5"],
  "image_alt_texts": ["descriptive alt 1 with keyword", "descriptive alt 2", "descriptive alt 3"],
  "excerpt": "2-3 sentence compelling excerpt that makes readers want to click, max 200 chars",
  "schema_faq": [
    {"question": "Specific question people would Google about this topic?", "answer": "Detailed 2-3 sentence answer with real information"},
    {"question": "Q2?", "answer": "A2"},
    {"question": "Q3?", "answer": "A3"},
    {"question": "Q4?", "answer": "A4"},
    {"question": "Q5?", "answer": "A5"}
  ]
}
PROMPT;
    }

    private function buildContentPrompt(string $title, string $pillar, string $lang, string $keyword): string
    {
        $context  = $this->getContextString();
        $company  = $this->getCompanyName();
        $whatsapp = $this->getWhatsApp();
        $waNum    = preg_replace('/[^0-9]/', '', $whatsapp);
        $ctaBlock = $this->getCtaBlock();
        $year     = date('Y');

        return <<<PROMPT
You are an expert content writer and SEO specialist for {$company}.
{$context}
Content pillar: {$pillar}. Write in {$lang}.
Focus keyword: "{$keyword}"

Write a comprehensive, authoritative blog article for: "{$title}"

═══ GOOGLE E-E-A-T REQUIREMENTS ═══

1. EXPERIENCE: Real-world examples, case studies, practical scenarios from the industry
2. EXPERTISE: Correct industry terminology, cite regulations, standards, and official sources
3. AUTHORITY: Reference BPS, Kemendag, Bea Cukai, or relevant government/industry bodies for data
4. TRUST: Include specific numbers, dates, and verifiable facts; mention {$year} updates

═══ STRUCTURE (1800-2500 words minimum) ═══

• H1: Article title with focus keyword
• Introduction (2-3 paragraphs): hook → pain point → preview of value
• 4-6 H2 sections with 2-3 H3 subsections each (200+ words per H2)
• "📰 Update Terbaru {$year}" section: mention recent regulations, policy changes, or market data from {$year}
• Comparison table OR numbered steps OR checklist in at least 2 sections
• Conclusion: 3-5 actionable takeaways
• End with this EXACT HTML CTA block:
{$ctaBlock}

═══ EMOJI RULES (MANDATORY) ═══

- Every H2: start with 1 relevant emoji (📦 🚢 ✅ 📋 💡 🌏 🔑 📈 ⚠️ 💰 🏗️ 📊 🎯 🔍 📌 🏆 ⚡ 🛡️ 🌿 🤝)
- Every H3: start with 1 smaller emoji
- Key insight paragraphs: add 1 emoji at start
- Inside lists: add emoji to bullet items where natural
- MAX 1 emoji per element — do not stack emojis

═══ IMAGES (MANDATORY — include 2-3) ═══

Place images INSIDE the article content at natural positions using this EXACT format:
<figure style="margin:2rem 0;">
  <img src="https://picsum.photos/seed/UNIQUE_SEED/800/450" alt="DESCRIPTIVE ALT TEXT WITH KEYWORD" style="width:100%;border-radius:.75rem;object-fit:cover;" loading="lazy">
  <figcaption style="text-align:center;color:#6b7280;font-size:.875rem;margin-top:.5rem;font-style:italic;">CAPTION TEXT</figcaption>
</figure>
Replace UNIQUE_SEED with a unique word related to the image topic (e.g. "ekspor-kopi-2", "pelabuhan-indonesia").

═══ SEO & HIGH-VALUE ADSENSE KEYWORDS ═══

- Focus keyword density: 1.5% naturally
- Include keyword in H1, first paragraph, 2-3 H2s, last paragraph
- Naturally use HIGH-CPM keywords: biaya, harga, tarif, asuransi, izin, sertifikat, jasa profesional, layanan terbaik, perbandingan, rekomendasi, terpercaya, legal, regulasi, keuntungan bisnis
- Every H2 and H3 MUST have id attribute: <h2 id="keyword-slug">
- Use <blockquote> for expert quotes and key statistics
- Use <table> for price comparisons, data, or step comparisons

═══ OUTPUT FORMAT ═══

Return ONLY clean HTML. Tags allowed: h1 h2 h3 p ul ol li strong em table thead tbody tr th td blockquote figure img figcaption div a.
Every H2/H3 must have id. No DOCTYPE, html, head, body, CSS, markdown, or code fences.
PROMPT;
    }

    // ─── API Call ──────────────────────────────────────────────────────────────

    private function callApi(string $prompt, int $maxTokens): string
    {
        set_time_limit(600);

        try {
            $response = Http::withHeaders([
                'x-api-key'         => $this->apiKey,
                'anthropic-version' => '2023-06-01',
                'content-type'      => 'application/json',
            ])->timeout(300)->retry(2, 2000, function (\Exception $exception) {
                // Only retry on 5xx server errors, NOT on connection timeout
                return $exception instanceof RequestException
                    && $exception->response?->status() >= 500;
            })->post("{$this->baseUrl}/messages", [
                'model'      => $this->model,
                'max_tokens' => $maxTokens,
                'messages'   => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            if ($response->failed()) {
                throw new \RuntimeException(
                    "Anthropic API error {$response->status()}: " . $response->body()
                );
            }

            return $response->json('content.0.text', '');
        } catch (RequestException $e) {
            throw new \RuntimeException('Anthropic API request failed: ' . $e->getMessage());
        }
    }

    private function cleanJsonResponse(string $raw): string
    {
        // Strip thinking tags (Claude 4.x extended thinking)
        $raw = preg_replace('/<thinking>.*?<\/thinking>/s', '', $raw);

        // Strip markdown code fences
        $clean = preg_replace('/```json?\s*/i', '', $raw);
        $clean = preg_replace('/```/', '', $clean);
        $clean = trim($clean);

        // If not valid JSON yet, extract first JSON object or array from text
        if (json_decode($clean) === null) {
            if (preg_match('/(\{[\s\S]*\}|\[[\s\S]*\])/s', $clean, $m)) {
                $clean = $m[1];
            }
        }

        return $clean;
    }

    // ─── Parsers ───────────────────────────────────────────────────────────────

    private function parseTitleJson(string $raw): array
    {
        $clean = $this->cleanJsonResponse($raw);
        $data = json_decode($clean, true);

        if (! is_array($data) || empty($data)) {
            throw new \RuntimeException('Failed to parse title options JSON from Anthropic response.');
        }

        return $data;
    }

    private function parseMetaJson(string $raw): array
    {
        $clean = $this->cleanJsonResponse($raw);
        $data = json_decode($clean, true);

        if (! is_array($data)) {
            throw new \RuntimeException('Failed to parse metadata JSON. Raw[0:200]: ' . substr($clean, 0, 200));
        }

        return [
            'seo_title'          => $data['seo_title'] ?? '',
            'slug'               => $data['slug'] ?? '',
            'meta_description'   => $data['meta_description'] ?? '',
            'focus_keyword'      => $data['focus_keyword'] ?? '',
            'excerpt'            => $data['excerpt'] ?? '',
            'secondary_keywords' => $data['secondary_keywords'] ?? [],
            'tags'               => $data['tags'] ?? [],
            'hashtags'           => $data['hashtags'] ?? [],
            'image_alt_texts'    => $data['image_alt_texts'] ?? [],
            'schema_faq'         => $data['schema_faq'] ?? [],
        ];
    }
}
