<?php

namespace App\Services;

use App\Models\UsedImage;

/**
 * Orkestrator gambar artikel: Unsplash → Pexels → retry generik → picsum,
 * dengan dedup per-site via tabel used_images supaya foto tidak monoton
 * (foto yang sudah pernah dipakai site itu dilewati, ambil kandidat relevan berikutnya).
 */
class ImageService
{
    private UnsplashService $unsplash;
    private PexelsService $pexels;

    public function __construct(?UnsplashService $unsplash = null, ?PexelsService $pexels = null)
    {
        $this->unsplash = $unsplash ?? new UnsplashService();
        $this->pexels   = $pexels ?? new PexelsService();
    }

    /**
     * Featured image — selalu mengembalikan URL (fallback terakhir picsum).
     */
    public function fetchForKeyword(string $keyword, ?int $siteId = null, ?string $alternativeSeed = null): string
    {
        $query = $this->unsplash->buildImageQuery($keyword);
        $url   = $this->pickUnused($query, $siteId);

        if (! $url) {
            // Query spesifik tanpa hasil (mis. "essential oil distillation") — perluas ke
            // SUBJEK inti (1-2 kata), JANGAN jatuh ke frasa maritim tetap yang bikin topik
            // non-logistik dapat foto kapal. Terakhir baru picsum ber-seed (unik per topik).
            $broad = $this->unsplash->broadenQuery($query);
            if ($broad !== '' && $broad !== $query) {
                $url = $this->pickUnused($broad, $siteId);
            }
        }

        return $url ?: $this->unsplash->getPicsumUrl($alternativeSeed ?: $keyword);
    }

    /**
     * In-article image dari marker [[IMG: ...]] — boleh null (marker dibuang, tanpa kotak kosong).
     */
    public function fetchForQuery(string $rawQuery, ?int $siteId = null): ?string
    {
        return $this->pickUnused($this->unsplash->buildImageQuery($rawQuery), $siteId);
    }

    /**
     * Ambil kandidat paling relevan yang BELUM pernah dipakai site ini.
     * Kalau semua kandidat sudah terpakai, terima pengulangan (pilih acak)
     * daripada turun ke picsum yang tidak relevan.
     */
    private function pickUnused(string $query, ?int $siteId): ?string
    {
        $exhausted = null;

        $providers = [
            'unsplash' => fn () => $this->unsplash->searchCandidates($query),
            'pexels'   => fn () => $this->pexels->searchCandidates($query),
        ];

        foreach ($providers as $provider => $search) {
            $candidates = $search();
            if (empty($candidates)) {
                continue;
            }

            $used = UsedImage::where('site_id', $siteId)
                ->where('provider', $provider)
                ->whereIn('photo_id', array_column($candidates, 'id'))
                ->pluck('photo_id')
                ->all();

            $fresh = array_values(array_filter(
                $candidates,
                fn (array $c) => ! in_array($c['id'], $used, true)
            ));

            if (empty($fresh)) {
                $exhausted ??= $candidates[array_rand($candidates)];
                continue;
            }

            $pick = $fresh[0];
            $this->recordUsage($provider, $pick['id'], $siteId);

            return $pick['url'];
        }

        return $exhausted['url'] ?? null;
    }

    private function recordUsage(string $provider, string $photoId, ?int $siteId): void
    {
        try {
            UsedImage::firstOrCreate([
                'site_id'  => $siteId,
                'provider' => $provider,
                'photo_id' => $photoId,
            ]);
        } catch (\Throwable) {
            // Dedup adalah optimasi — jangan pernah gagalkan pembuatan artikel karenanya.
        }
    }
}
