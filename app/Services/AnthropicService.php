<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class AnthropicService
{
    private string $apiKey;
    private string $model;
    private string $baseUrl = 'https://api.anthropic.com/v1';

    public function __construct(?string $model = null)
    {
        $key = Setting::get('anthropic_api_key');
        if (! $key) {
            throw new \RuntimeException('Anthropic API key not configured in Settings.');
        }
        $this->apiKey = trim($key);
        $this->model = $model ?: Setting::get('anthropic_model', 'claude-sonnet-4-20250514');
    }

    // ─── Public Methods ────────────────────────────────────────────────────────

    /**
     * Generate 10 title options with CTR score and hook type.
     * Returns: [['title', 'ctr_score' (low|med|high), 'hook_type'], ...]
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
     * Returns: [seo_title, slug, meta_description, focus_keyword, content_html,
     *           word_count, hashtags, tags, schema_faq, image_alt_texts]
     */
    public function generateArticle(string $title, string $pillar, string $language): array
    {
        $lang = $language === 'en' ? 'English' : 'Bahasa Indonesia';

        // Call 1: structured metadata (JSON)
        $metaPrompt = $this->buildMetaPrompt($title, $pillar, $lang);
        $metaRaw    = $this->callApi($metaPrompt, 1024);
        $meta       = $this->parseMetaJson($metaRaw);

        // Call 2: full HTML content (plain text, no JSON)
        $contentPrompt = $this->buildContentPrompt($title, $pillar, $lang, $meta['focus_keyword'] ?? '');
        $contentHtml   = $this->callApi($contentPrompt, 8000);
        $wordCount     = str_word_count(strip_tags($contentHtml));

        return array_merge($meta, [
            'content_html' => $contentHtml,
            'word_count'   => $wordCount,
        ]);
    }

    // ─── Prompt Builders ───────────────────────────────────────────────────────

    private function buildTitlePrompt(string $topic, string $pillar, string $lang): string
    {
        return <<<PROMPT
You are an SEO content strategist for M2B, a freight forwarding & PPJK company in Indonesia.
Content pillar: {$pillar}. Write in {$lang}.

Generate exactly 10 compelling blog article titles for this topic: "{$topic}"

Rules:
- Each title must be unique with a different hook angle
- Optimize for CTR (click-through rate)
- Titles must resonate with Indonesian B2B exporters/importers

Return ONLY valid JSON array, no markdown, no explanation:
[
  {"title": "...", "ctr_score": "high|med|low", "hook_type": "how-to|listicle|question|news|guide"},
  ...
]
PROMPT;
    }

    private function buildMetaPrompt(string $title, string $pillar, string $lang): string
    {
        return <<<PROMPT
You are an SEO expert for M2B freight forwarding blog. Write in {$lang}.
Article title: "{$title}"
Content pillar: {$pillar}

Return ONLY valid JSON with these exact keys, no markdown, no explanation:
{
  "seo_title": "SEO optimized title max 60 chars",
  "slug": "url-friendly-slug",
  "meta_description": "meta description max 155 chars",
  "focus_keyword": "main keyword phrase",
  "tags": ["tag1", "tag2", "tag3", "tag4", "tag5"],
  "hashtags": ["#hashtag1", "#hashtag2", "#hashtag3"],
  "image_alt_texts": ["alt text 1", "alt text 2", "alt text 3"],
  "schema_faq": [
    {"question": "Q1?", "answer": "A1"},
    {"question": "Q2?", "answer": "A2"},
    {"question": "Q3?", "answer": "A3"}
  ]
}
PROMPT;
    }

    private function buildContentPrompt(string $title, string $pillar, string $lang, string $keyword): string
    {
        $whatsapp = '+6281263027818';
        return <<<PROMPT
You are a professional content writer for M2B, a licensed freight forwarding & PPJK company in Indonesia.
Ports: Belawan, Kualanamu, Tanjung Priok, Tanjung Perak, Makassar, Balikpapan.
Target audience: B2B exporters/importers and UMKM exporters.
Content pillar: {$pillar}. Write in {$lang}.
Focus keyword: "{$keyword}"

Write a complete, SEO-optimized blog article for the title: "{$title}"

Requirements:
- Length: 1200-1500 words
- Structure: H1 title, introduction, 3-5 H2 sections with H3 subsections, conclusion with CTA
- Include the focus keyword naturally in H1, first paragraph, and 2-3 H2 headings
- Add relevant emoji at the start of each H2 heading (e.g. 📦 🚢 ✅ 📋 💡 🌏 🔑 📈)
- Add 1 relevant emoji per paragraph opening where it fits naturally
- CTA at the end: mention M2B WhatsApp {$whatsapp}
- Output: clean HTML only (h1, h2, h3, p, ul, ol, li, strong, em tags)
- Do NOT include: DOCTYPE, html, head, body tags, CSS, or markdown
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
            ])->timeout(120)->post("{$this->baseUrl}/messages", [
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

    // ─── Parsers ───────────────────────────────────────────────────────────────

    private function parseTitleJson(string $raw): array
    {
        // Strip possible markdown code blocks
        $clean = preg_replace('/```json?\s*/i', '', $raw);
        $clean = preg_replace('/```/', '', $clean);
        $clean = trim($clean);

        $data = json_decode($clean, true);

        if (! is_array($data) || empty($data)) {
            throw new \RuntimeException('Failed to parse title options JSON from Anthropic response.');
        }

        return $data;
    }

    private function parseMetaJson(string $raw): array
    {
        $clean = preg_replace('/```json?\s*/i', '', $raw);
        $clean = preg_replace('/```/', '', $clean);
        $clean = trim($clean);

        $data = json_decode($clean, true);

        if (! is_array($data)) {
            throw new \RuntimeException('Failed to parse article metadata JSON from Anthropic response.');
        }

        return [
            'seo_title'        => $data['seo_title'] ?? '',
            'slug'             => $data['slug'] ?? '',
            'meta_description' => $data['meta_description'] ?? '',
            'focus_keyword'    => $data['focus_keyword'] ?? '',
            'tags'             => $data['tags'] ?? [],
            'hashtags'         => $data['hashtags'] ?? [],
            'image_alt_texts'  => $data['image_alt_texts'] ?? [],
            'schema_faq'       => $data['schema_faq'] ?? [],
        ];
    }
}
