<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UnsplashService
{
    private ?string $accessKey;

    public function __construct()
    {
        $this->accessKey = config('services.unsplash.access_key') ?: env('UNSPLASH_ACCESS_KEY');
    }

    /**
     * Fetch a relevant image URL for a given keyword.
     * Tier 1: Unsplash API (if key configured)
     * Tier 2: Picsum deterministic fallback (always works, no key needed)
     */
    public function fetchForKeyword(string $keyword): ?string
    {
        if ($this->accessKey) {
            return $this->fetchFromUnsplash($keyword);
        }

        return $this->getPicsumUrl($keyword);
    }

    private function fetchFromUnsplash(string $keyword): ?string
    {
        try {
            $query = $this->buildImageQuery($keyword);

            $response = Http::timeout(8)
                ->withHeaders(['Authorization' => "Client-ID {$this->accessKey}"])
                ->get('https://api.unsplash.com/photos/random', [
                    'query'       => $query,
                    'orientation' => 'landscape',
                    'content_filter' => 'high',
                ]);

            if ($response->successful()) {
                $url = $response->json('urls.regular');
                if ($url) {
                    // Remove tracking params, keep just the image
                    return strtok($url, '?') . '?w=1200&q=80&fit=crop';
                }
            }
        } catch (\Throwable) {
            // Fall through to Picsum
        }

        return $this->getPicsumUrl($keyword);
    }

    private function getPicsumUrl(string $keyword): string
    {
        // Deterministic seed so same keyword always gets same image
        $seed = substr(md5(strtolower(trim($keyword))), 0, 10);
        return "https://picsum.photos/seed/{$seed}/1200/630";
    }

    /**
     * Translate Indonesian keywords to English for better image search results.
     */
    private function buildImageQuery(string $keyword): string
    {
        $translations = [
            'ekspor'          => 'export cargo ship',
            'impor'           => 'import logistics',
            'komoditas'       => 'commodity agriculture',
            'kopi'            => 'coffee beans',
            'bea cukai'       => 'customs declaration',
            'logistik'        => 'logistics warehouse',
            'perdagangan'     => 'international trade',
            'undername'       => 'freight forwarding',
            'ppjk'            => 'customs broker',
            'regulasi'        => 'business regulation',
            'umkm'            => 'small business',
            'pertanian'       => 'agriculture farm',
            'konstruksi'      => 'construction building',
            'maritim'         => 'maritime ship ocean',
            'agribisnis'      => 'agribusiness farm',
            'teknologi'       => 'technology digital',
            'transformasi digital' => 'digital transformation',
            'erp'             => 'enterprise software',
            'crm'             => 'business meeting',
        ];

        $lowerKeyword = strtolower($keyword);
        foreach ($translations as $id => $en) {
            if (str_contains($lowerKeyword, $id)) {
                return $en;
            }
        }

        // Generic business fallback
        return 'business professional indonesia';
    }
}
