<?php

namespace App\Services;

class PexelsService
{
    private ?string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.pexels.key') ?: env('PEXELS_API_KEY');
    }

    /**
     * Search Pexels and return candidates as [['id' => ..., 'url' => ...], ...].
     * src.landscape = 1200x627 crop — pas untuk featured/OG image.
     * Tanpa API key, service ini diam (return []) sehingga chain provider tetap aman.
     */
    public function searchCandidates(string $query, int $perPage = 30): array
    {
        if (! $this->apiKey) {
            return [];
        }

        $perPage = max(1, min(80, $perPage));

        try {
            $q      = urlencode($query);
            $apiUrl = "https://api.pexels.com/v1/search?query={$q}&per_page={$perPage}&orientation=landscape";

            $ctx = stream_context_create([
                'http' => [
                    'timeout'       => 8,
                    'method'        => 'GET',
                    'header'        => "Accept: application/json\r\nAuthorization: {$this->apiKey}\r\nUser-Agent: M2BCMS/1.0\r\n",
                    'ignore_errors' => true,
                ],
                'ssl' => ['verify_peer' => false],
            ]);

            $json = @file_get_contents($apiUrl, false, $ctx);
            if (! $json) {
                return [];
            }

            $data   = json_decode($json, true);
            $photos = $data['photos'] ?? [];

            $candidates = [];
            foreach ($photos as $p) {
                $url = $p['src']['landscape'] ?? ($p['src']['large2x'] ?? null);
                if (! $url || empty($p['id'])) {
                    continue;
                }
                $candidates[] = [
                    'id'  => (string) $p['id'],
                    'url' => $url,
                ];
            }

            return $candidates;
        } catch (\Throwable) {
            return [];
        }
    }
}
