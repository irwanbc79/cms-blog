<?php

namespace App\Services;

use Illuminate\Support\Str;

class UnsplashService
{
    private ?string $accessKey;

    public function __construct()
    {
        $this->accessKey = config('services.unsplash.access_key') ?: env('UNSPLASH_ACCESS_KEY');
    }

    public function fetchForKeyword(string $keyword): ?string
    {
        if ($this->accessKey) {
            $url = $this->fetchFromUnsplash($keyword);
            if ($url) return $url;
        }
        return $this->getPicsumUrl($keyword);
    }

    private function fetchFromUnsplash(string $keyword): ?string
    {
        try {
            $query   = urlencode($this->buildImageQuery($keyword));
            $apiUrl  = "https://api.unsplash.com/photos/random?query={$query}&orientation=landscape&content_filter=high&client_id={$this->accessKey}";

            $ctx = stream_context_create([
                'http' => [
                    'timeout'       => 8,
                    'method'        => 'GET',
                    'header'        => "Accept: application/json\r\nUser-Agent: M2BCMS/1.0\r\n",
                    'ignore_errors' => true,
                ],
                'ssl' => ['verify_peer' => false],
            ]);

            $json = @file_get_contents($apiUrl, false, $ctx);
            if (!$json) return null;

            $data = json_decode($json, true);
            $raw  = $data['urls']['regular'] ?? null;
            if (!$raw) return null;

            // Strip Unsplash tracking params, keep image quality params
            $base = strtok($raw, '?');
            return $base . '?w=1200&q=80&fit=crop&auto=format';
        } catch (\Throwable) {
            return null;
        }
    }

    private function getPicsumUrl(string $keyword): string
    {
        $seed = substr(md5(strtolower(trim($keyword))), 0, 10);
        return "https://picsum.photos/seed/{$seed}/1200/630";
    }

    private function buildImageQuery(string $keyword): string
    {
        $map = [
            'ekspor'               => 'export cargo ship',
            'impor'                => 'import logistics',
            'komoditas'            => 'commodity agriculture',
            'kopi'                 => 'coffee beans',
            'bea cukai'            => 'customs declaration',
            'logistik'             => 'logistics warehouse',
            'perdagangan'          => 'international trade',
            'undername'            => 'freight forwarding',
            'ppjk'                 => 'customs broker',
            'regulasi'             => 'business regulation',
            'umkm'                 => 'small business',
            'pertanian'            => 'agriculture farm',
            'organik'              => 'organic farm harvest',
            'konstruksi'           => 'construction building',
            'maritim'              => 'maritime ship ocean',
            'agribisnis'           => 'agribusiness farm',
            'teknologi'            => 'technology digital',
            'transformasi digital' => 'digital transformation',
            'erp'                  => 'enterprise software',
            'crm'                  => 'business meeting',
            'malaysia'             => 'malaysia trade',
            'eropa'                => 'europe business',
            'rempah'               => 'spices market',
            'kelapa sawit'         => 'palm oil plantation',
            'baja'                 => 'steel construction',
            'kapal'                => 'cargo ship',
            'gudang'               => 'warehouse storage',
        ];

        $lower = strtolower($keyword);
        foreach ($map as $id => $en) {
            if (str_contains($lower, $id)) return $en;
        }

        return 'business professional indonesia';
    }
}
