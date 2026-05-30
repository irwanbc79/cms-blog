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

    /**
     * Get WhatsApp number from site or default.
     */
    private function getWhatsApp(): string
    {
        return $this->site?->whatsapp_number ?: '+6281263027818';
    }

    /**
     * Get company name for prompts.
     */
    private function getCompanyName(): string
    {
        return $this->site?->name ?: 'M2B';
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
        $metaRaw    = $this->callApi($metaPrompt, 1024);
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

        return <<<PROMPT
You are an expert content writer and SEO specialist for {$company}.
{$context}
Content pillar: {$pillar}. Write in {$lang}.
Focus keyword: "{$keyword}"

Write a comprehensive, authoritative blog article for: "{$title}"

═══ CRITICAL QUALITY REQUIREMENTS (Google E-E-A-T) ═══

1. EXPERIENCE: Include real-world examples, case studies, or scenarios that show firsthand knowledge
2. EXPERTISE: Use industry-specific terminology correctly, cite regulations/standards where relevant
3. AUTHORITY: Reference credible sources (government regulations, industry reports, expert opinions)
4. TRUST: Be accurate, transparent about limitations, provide actionable advice

═══ STRUCTURE REQUIREMENTS ═══

- Length: 1800-2500 words (MINIMUM 1800 — this is critical for Google quality)
- Opening: Hook paragraph that addresses reader's pain point + preview of what they'll learn
- Structure:
  • H1: Article title (use focus keyword)
  • Introduction (2-3 paragraphs, include keyword in first paragraph)
  • 4-6 H2 sections, each with 2-3 H3 subsections
  • Each H2 section must have 200+ words of substantive content
  • Include at least ONE of: numbered steps, comparison table, checklist, or data points per section
  • Conclusion with clear actionable takeaways
  • CTA paragraph mentioning {$company} WhatsApp {$whatsapp}

═══ SEO REQUIREMENTS ═══

- Focus keyword density: 1-2% naturally throughout
- Include keyword in: H1, first paragraph, 2-3 H2 headings, last paragraph
- Use LSI (related) keywords naturally throughout
- Every H2 and H3 MUST have an id attribute for table of contents: <h2 id="slug-of-heading">
- Add relevant emoji at start of each H2 (📦 🚢 ✅ 📋 💡 🌏 🔑 📈 ⚠️ 💰 🏗️ 📊)

═══ ADSENSE-FRIENDLY CONTENT RULES ═══

- Write ORIGINAL, high-value content — NOT generic/thin content
- Include specific data, numbers, statistics (even estimated ones)
- Add practical tips readers can act on immediately
- Use <blockquote> for key insights or expert quotes
- Use <table> for comparisons, pricing, or data
- Include <ul> or <ol> lists with detailed items
- Content must be USEFUL STANDALONE — reader should gain real knowledge

═══ OUTPUT FORMAT ═══

- Clean HTML only: h1, h2, h3, p, ul, ol, li, strong, em, table, thead, tbody, tr, th, td, blockquote
- Every H2/H3 must have id attribute
- Do NOT include: DOCTYPE, html, head, body, CSS, markdown, or code blocks
PROMPT;
    }

    // ─── API Call ──────────────────────────────────────────────────────────────

    private function callApi(string $prompt, int $maxTokens): string
    {
        set_time_limit(300);

        try {
            $response = Http::withHeaders([
                'x-api-key'         => $this->apiKey,
                'anthropic-version' => '2023-06-01',
                'content-type'      => 'application/json',
            ])->timeout(120)->retry(2, 1000, function (\Exception $exception) {
                return $exception instanceof \Illuminate\Http\Client\ConnectionException
                    || ($exception instanceof RequestException && $exception->response?->status() >= 500);
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
        $clean = preg_replace('/```json?\s*/i', '', $raw);
        $clean = preg_replace('/```/', '', $clean);
        return trim($clean);
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
            throw new \RuntimeException('Failed to parse article metadata JSON from Anthropic response.');
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
