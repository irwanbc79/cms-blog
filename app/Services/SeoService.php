<?php

namespace App\Services;

use App\Models\Article;

class SeoService
{
    /**
     * Calculate SEO score for an article (0-100%).
     *
     * Scoring criteria:
     * - Title presence & optimal length (30-60 chars): up to 15 pts
     * - Meta description presence & length (≤160 chars): up to 20 pts
     * - Focus keyword presence: 15 pts
     * - SEO title (og_title): 10 pts
     * - Content quality & length: up to 25 pts
     * - Tags (≥3 and ≥5): up to 10 pts
     * - FAQ schema (≥3 items): 5 pts
     */
    public function calculate(Article $article): int
    {
        $score = 0;

        // Title presence & optimal length (30-60 chars)
        if (! empty($article->title)) {
            $score += 10;
            $titleLen = mb_strlen($article->title);
            if ($titleLen >= 30 && $titleLen <= 60) {
                $score += 5;
            }
        }

        // Meta description
        if (! empty($article->meta_description)) {
            $score += 15;
            if (mb_strlen($article->meta_description) <= 160) {
                $score += 5;
            }
        }

        // Focus keyword
        if (! empty($article->focus_keyword)) {
            $score += 15;
        }

        // SEO title (og_title)
        if (! empty($article->og_title)) {
            $score += 10;
        }

        // Content quality & length
        if (! empty($article->content_html)) {
            $score += 10;
            $wordCount = $article->word_count ?? 0;
            if ($wordCount >= 1000) {
                $score += 10;
            }
            if ($wordCount >= 1500) {
                $score += 5;
            }
        }

        // Tags
        $tags = $article->tags ?? [];
        $tagCount = count($tags);
        if ($tagCount >= 3) {
            $score += 5;
        }
        if ($tagCount >= 5) {
            $score += 5;
        }

        // FAQ schema
        $faq = $article->schema_faq ?? [];
        if (count($faq) >= 3) {
            $score += 5;
        }

        return min(100, $score);
    }

    /**
     * Get a human-readable SEO score grade.
     */
    public function grade(int $score): string
    {
        return match (true) {
            $score >= 80 => 'Good',
            $score >= 50 => 'Fair',
            default     => 'Poor',
        };
    }

    /**
     * Get a Tailwind/Filament color for a given score.
     */
    public function color(int $score): string
    {
        return match (true) {
            $score >= 80 => 'success',
            $score >= 50 => 'warning',
            default     => 'danger',
        };
    }
}