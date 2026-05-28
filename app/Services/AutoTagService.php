<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Str;

class AutoTagService
{
    /**
     * Auto-generate tags for an article based on its title and content.
     * Uses keyword extraction and pillar-based defaults.
     */
    public function generateTags(Article $article): array
    {
        $tags = [];

        // 1. Extract keywords from title
        $titleWords = $this->extractKeywords($article->title);
        $tags = array_merge($tags, $titleWords);

        // 2. Extract keywords from excerpt/content
        $content = $article->excerpt ?: strip_tags($article->content_html ?? '');
        $contentWords = $this->extractKeywords($content);
        $tags = array_merge($tags, $contentWords);

        // 3. Add pillar-based tags
        $pillarTags = $this->getPillarTags($article->pillar);
        $tags = array_merge($tags, $pillarTags);

        // 4. Add focus keyword as tag
        if ($article->focus_keyword) {
            $tags[] = $article->focus_keyword;
        }

        // 5. Deduplicate, normalize, and limit
        $tags = array_unique(array_map(function ($tag) {
            return trim(Str::title($tag));
        }, $tags));

        // Remove empty tags and very short ones
        $tags = array_filter($tags, fn ($tag) => strlen($tag) >= 3);

        // Limit to 10 tags max
        return array_slice(array_values($tags), 0, 10);
    }

    /**
     * Extract meaningful keywords from text.
     */
    private function extractKeywords(string $text): array
    {
        // Remove common Indonesian/English stop words
        $stopWords = [
            'dan', 'di', 'ke', 'dari', 'yang', 'ini', 'itu', 'dengan', 'untuk',
            'pada', 'adalah', 'akan', 'telah', 'sudah', 'bisa', 'dapat', 'tidak',
            'ada', 'juga', 'atau', 'serta', 'oleh', 'sebagai', 'dalam', 'secara',
            'the', 'and', 'for', 'are', 'but', 'not', 'you', 'all', 'can', 'had',
            'her', 'was', 'one', 'our', 'out', 'has', 'have', 'been', 'some', 'same',
            'into', 'than', 'that', 'them', 'then', 'they', 'this', 'with', 'more',
            'about', 'after', 'also', 'such', 'only', 'other', 'their', 'there',
            'these', 'very', 'which', 'when', 'where', 'akan', 'dapat', 'telah',
            'antara', 'seperti', 'setelah', 'sebelum', 'sementara', 'tetapi',
            'melalui', 'merupakan', 'menjadi', 'berdasarkan', 'mengenai',
        ];

        // Clean text
        $text = strip_tags($text);
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9\s\-]/', ' ', $text);

        // Split into words
        $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

        // Filter stop words and short words
        $words = array_filter($words, function ($word) use ($stopWords) {
            return !in_array($word, $stopWords) && strlen($word) >= 4;
        });

        // Count frequency
        $wordCounts = array_count_values($words);

        // Sort by frequency (descending)
        arsort($wordCounts);

        // Take top keywords (min frequency 2 or top 8)
        $keywords = [];
        foreach ($wordCounts as $word => $count) {
            if ($count >= 2 || count($keywords) < 8) {
                $keywords[] = $word;
            }
            if (count($keywords) >= 8) {
                break;
            }
        }

        return $keywords;
    }

    /**
     * Get pillar-specific default tags.
     */
    private function getPillarTags(?string $pillar): array
    {
        return match ($pillar) {
            'regulasi' => ['Regulasi', 'Kebijakan', 'Peraturan'],
            'umkm'     => ['UMKM', 'Ekspor', 'Bisnis'],
            'news'     => ['Berita', 'Terkini', 'Informasi'],
            'logistik' => ['Logistik', 'Pengiriman', 'Supply Chain'],
            default    => [],
        };
    }

    /**
     * Detect duplicate/similar articles across a site.
     * Returns array of similar article titles.
     */
    public function detectDuplicates(Article $article, float $threshold = 0.7): array
    {
        $existingArticles = Article::forSite($article->site_id)
            ->where('id', '!=', $article->id)
            ->published()
            ->select('id', 'title')
            ->get();

        $duplicates = [];

        foreach ($existingArticles as $existing) {
            $similarity = $this->similarity($article->title, $existing->title);
            if ($similarity >= $threshold) {
                $duplicates[] = [
                    'id'          => $existing->id,
                    'title'       => $existing->title,
                    'similarity'  => round($similarity * 100) . '%',
                ];
            }
        }

        return $duplicates;
    }

    /**
     * Calculate text similarity using Jaro-Winkler-like approach.
     */
    private function similarity(string $text1, string $text2): float
    {
        $text1 = strtolower(trim($text1));
        $text2 = strtolower(trim($text2));

        if ($text1 === $text2) {
            return 1.0;
        }

        // Simple word overlap similarity
        $words1 = explode(' ', $text1);
        $words2 = explode(' ', $text2);

        if (empty($words1) || empty($words2)) {
            return 0.0;
        }

        $intersection = array_intersect($words1, $words2);
        $union = array_unique(array_merge($words1, $words2));

        return count($intersection) / count($union);
    }
}
