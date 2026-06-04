<?php

namespace App\Services;

class UnsplashService
{
    private ?string $accessKey;

    public function __construct()
    {
        $this->accessKey = config('services.unsplash.access_key') ?: env('UNSPLASH_ACCESS_KEY');
    }

    /**
     * Get a RELEVANT image for a keyword (featured image).
     * Uses Unsplash SEARCH (relevant) — not random — with smart query translation.
     */
    public function fetchForKeyword(string $keyword): ?string
    {
        $query = $this->buildImageQuery($keyword);
        $url   = $this->searchImage($query, 0);
        return $url ?: $this->getPicsumUrl($keyword);
    }

    /**
     * Search Unsplash for a specific query and return a relevant image URL.
     * $index lets callers fetch different images for the same query (variety).
     */
    public function searchImage(string $query, int $index = 0): ?string
    {
        if (! $this->accessKey) {
            return null;
        }

        try {
            $q      = urlencode($query);
            $apiUrl = "https://api.unsplash.com/search/photos?query={$q}&per_page=10&orientation=landscape&content_filter=high&client_id={$this->accessKey}";

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
            if (! $json) {
                return null;
            }

            $data    = json_decode($json, true);
            $results = $data['results'] ?? [];
            if (empty($results)) {
                return null;
            }

            // Pick from the top results (most relevant). Rotate by index for variety.
            $pick = $results[$index % min(count($results), 6)] ?? $results[0];
            $raw  = $pick['urls']['regular'] ?? null;
            if (! $raw) {
                return null;
            }

            return strtok($raw, '?') . '?w=1200&q=80&fit=crop&auto=format';
        } catch (\Throwable) {
            return null;
        }
    }

    private function getPicsumUrl(string $keyword): string
    {
        $seed = substr(md5(strtolower(trim($keyword))), 0, 10);
        return "https://picsum.photos/seed/{$seed}/1200/630";
    }

    /**
     * Translate Indonesian topic keywords into precise English image search queries.
     */
    public function buildImageQuery(string $keyword): string
    {
        $map = [
            'kopi'                 => 'coffee beans plantation harvest',
            'arabika'              => 'arabica coffee beans',
            'specialty coffee'     => 'specialty coffee cupping',
            'sawit'                => 'palm oil plantation',
            'kelapa sawit'         => 'palm oil plantation',
            'karet'                => 'rubber plantation latex',
            'rempah'               => 'indonesian spices market',
            'lada'                 => 'black pepper spice',
            'kakao'                => 'cocoa beans plantation',
            'teh'                  => 'tea plantation leaves',
            'undername'            => 'cargo container shipping port',
            'ppjk'                 => 'customs office documents',
            'bea cukai'            => 'customs declaration paperwork',
            'ekspor'               => 'cargo ship container export port',
            'impor'                => 'shipping containers import logistics',
            'hs code'              => 'customs tariff documents desk',
            'harga pokok'          => 'business calculator finance documents',
            'biaya'                => 'business finance calculator money',
            'logistik'             => 'logistics warehouse forklift',
            'gudang'               => 'warehouse storage racks',
            'pelabuhan'            => 'shipping port cranes containers',
            'kapal'                => 'cargo ship ocean freight',
            'maritim'              => 'maritime cargo ship sea',
            'konstruksi'           => 'construction site building',
            'baja'                 => 'steel construction beams',
            'properti'             => 'modern building real estate',
            'pertanian'            => 'agriculture farm field indonesia',
            'organik'              => 'organic farm fresh produce',
            'agribisnis'           => 'agriculture harvest farming',
            'umkm'                 => 'small business owner indonesia',
            'perdagangan'          => 'international trade business handshake',
            'regulasi'             => 'legal documents official paperwork',
            'sertifikat'           => 'certificate document official stamp',
            'teknologi'            => 'technology digital business',
            'digital'              => 'digital transformation technology office',
            'erp'                  => 'business software dashboard screen',
            'crm'                  => 'business team meeting office',
            'eropa'                => 'european city business trade',
            'malaysia'             => 'malaysia port trade',
            'asia'                 => 'asian shipping trade port',
        ];

        $lower = strtolower($keyword);
        foreach ($map as $id => $en) {
            if (str_contains($lower, $id)) {
                return $en;
            }
        }

        return 'indonesia business export trade professional';
    }
}
