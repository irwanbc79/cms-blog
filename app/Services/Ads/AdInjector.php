<?php

namespace App\Services\Ads;

class AdInjector
{
    /**
     * Inject an ad unit into HTML content after a specific paragraph.
     */
    public function injectAfterParagraph(string $html, string $adHtml, int $paragraphNumber): string
    {
        if (empty($html) || empty($adHtml) || $paragraphNumber < 1) {
            return $html;
        }

        $parts = preg_split('/(<\/p>)/i', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        if ($parts === false) {
            return $html;
        }

        $result = '';
        $pCount = 0;
        $injected = false;

        for ($i = 0; $i < count($parts); $i++) {
            $part = $parts[$i];
            $result .= $part;

            if (strcasecmp(trim($part), '</p>') === 0) {
                $pCount++;
                if ($pCount === $paragraphNumber && !$injected) {
                    $result .= "\n" . $adHtml . "\n";
                    $injected = true;
                }
            }
        }

        return $result;
    }

    /**
     * Inject in-article ads smartly into article content based on length.
     */
    public function injectArticleAds(string $contentHtml, AdService $ads): string
    {
        if (!$ads->enabled() || empty($contentHtml)) {
            return $contentHtml;
        }

        $paragraphCount = substr_count(strtolower($contentHtml), '</p>');
        if ($paragraphCount < 2) {
            return $contentHtml;
        }

        $wordCount = str_word_count(strip_tags($contentHtml));

        // In-Article Slot 1: Inject after paragraph 2 (or 3 if article has >= 5 paragraphs)
        if ($ads->hasSlot('in_article_1')) {
            $targetP1 = ($paragraphCount >= 5) ? 3 : 2;
            $adHtml1 = view('blog.partials.ads.in-article', [
                'publisherId' => $ads->publisherId(),
                'slot'        => $ads->slot('in_article_1'),
                'lazy'        => true,
                'class'       => 'my-8',
            ])->render();

            $contentHtml = $this->injectAfterParagraph($contentHtml, $adHtml1, $targetP1);
        }

        // In-Article Slot 2: Only for long articles (> 800 words and >= 7 paragraphs)
        $slot2 = $ads->slot('in_article_2') ?? $ads->slot('in_article_1');
        if ($slot2 && $wordCount >= 800 && $paragraphCount >= 7) {
            $targetP2 = 6;
            $adHtml2 = view('blog.partials.ads.in-article', [
                'publisherId' => $ads->publisherId(),
                'slot'        => $slot2,
                'lazy'        => true,
                'class'       => 'my-8',
            ])->render();

            $contentHtml = $this->injectAfterParagraph($contentHtml, $adHtml2, $targetP2);
        }

        return $contentHtml;
    }
}
