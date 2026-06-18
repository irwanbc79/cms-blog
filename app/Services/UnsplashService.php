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
        $index = mt_rand(0, 9);
        $url   = $this->searchImage($query, $index);
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

        $query = $this->sanitizeQuery($query);

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
            'ai'                   => 'artificial intelligence robot technology brain',
            'artificial intelligence' => 'artificial intelligence digital technology',
            'generatif'            => 'generative ai digital concept',
            'kecerdasan buatan'    => 'artificial intelligence neural network',
            'cloud'                => 'cloud computing server datacenter',
            'software'             => 'software developer writing code',
            'indonesia'            => 'indonesia beautiful landscape',
        ];

        $lower = strtolower($keyword);
        foreach ($map as $id => $en) {
            if (str_contains($lower, $id)) {
                return $en;
            }
        }

        return 'indonesia business export trade professional';
    }

    /**
     * Sanitize and translate the image search query to keep it contextually relevant and avoid location bias.
     */
    private function sanitizeQuery(string $query): string
    {
        // 1. Remove specific Indonesian location/geographic names to prevent search bias towards tourist spots/mosques
        $locations = [
            'palembang', 'jakarta', 'medan', 'surabaya', 'semarang', 'bandung', 
            'yogyakarta', 'jogja', 'bali', 'makassar', 'lampung', 'padang', 
            'pekanbaru', 'banjarmasin', 'pontianak', 'balikpapan', 'samarinda', 
            'manado', 'ambon', 'jayapura', 'aceh', 'batam', 'tangerang', 
            'bekasi', 'depok', 'bogor', 'cirebon', 'solo', 'surakarta', 'malang',
            'indonesia', 'indonesian', 'indonesia\'s'
        ];

        foreach ($locations as $loc) {
            // Remove with preceding prepositions like "in", "at", "from", "of", "to", "near", "di", "dari", "ke", "pada"
            $query = preg_replace('/\b(in|at|from|of|to|near|dan|di|dari|ke|pada)\s+' . preg_quote($loc, '/') . '\b/i', '', $query);
            // Remove the location name itself
            $query = preg_replace('/\b' . preg_quote($loc, '/') . '\b/i', '', $query);
        }

        // 2. Translate common Indonesian terms to English (fallback in case the AI writes them in Indonesian)
        $translations = [
            'rempah-rempah' => 'spices',
            'rempah' => 'spices',
            'gudang' => 'warehouse',
            'kopi' => 'coffee',
            'arabika' => 'arabica',
            'robusta' => 'robusta',
            'ekspor' => 'export',
            'impor' => 'import',
            'pelabuhan' => 'port',
            'kapal' => 'cargo ship',
            'bea cukai' => 'customs',
            'kantor' => 'office',
            'dokumen' => 'documents',
            'pabean' => 'customs',
            'peti kemas' => 'shipping container',
            'kontainer' => 'shipping container',
            'logistik' => 'logistics',
            'pengiriman' => 'shipping',
            'angkutan' => 'transport',
            'darat' => 'land',
            'laut' => 'sea',
            'udara' => 'air',
            'perdagangan' => 'trade',
            'kelapa sawit' => 'palm oil',
            'sawit' => 'palm oil',
            'karet' => 'rubber',
            'kakao' => 'cocoa',
            'teh' => 'tea',
            'pertanian' => 'agriculture',
            'sawah' => 'rice field',
            'kebun' => 'plantation',
            'pabrik' => 'factory',
            'industri' => 'industrial',
        ];

        foreach ($translations as $id => $en) {
            $query = preg_replace('/\b' . preg_quote($id, '/') . '\b/i', $en, $query);
        }

        // 3. Remove non-alphanumeric characters except spaces
        $query = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $query);

        // 4. Remove dangling prepositions/conjunctions
        $query = preg_replace('/\b(in|at|from|of|to|near|and|dan|atau|with|dengan|di|dari|ke|pada)\b/i', ' ', $query);

        // 5. Clean up whitespaces
        $query = preg_replace('/\s+/', ' ', $query);
        $query = trim($query);

        return $query ?: 'logistics export trade';
    }
}
