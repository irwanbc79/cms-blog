<?php

namespace Tests\Unit;

use App\Services\UnsplashService;
use Tests\TestCase; // boot app so config() works in UnsplashService constructor

class ImageQueryRelevanceTest extends TestCase
{
    private function q(string $topic): string
    {
        return (new UnsplashService())->buildImageQuery($topic);
    }

    /** Subjek komoditas harus menang atas kata proses generik (ekspor/impor/umkm). */
    public function test_commodity_subject_beats_generic_process_words(): void
    {
        $atsiri = $this->q('cara ekspor minyak atsiri panduan lengkap umkm 2026');
        $this->assertStringContainsString('essential', $atsiri);
        $this->assertStringNotContainsString('cargo', $atsiri);
        $this->assertStringNotContainsString('ship', $atsiri);

        $briket = $this->q('ekspor arang briket panduan 7 langkah umkm');
        $this->assertStringContainsString('charcoal', $briket);
        $this->assertStringNotContainsString('ship', $briket);

        $kosmetik = $this->q('impor kosmetik panduan lengkap izin bpom 2026');
        $this->assertStringContainsString('cosmetics', $kosmetik);
        $this->assertStringNotContainsString('container', $kosmetik);
    }

    /** Dua topik komoditas berbeda tidak boleh menghasilkan query gambar yang sama. */
    public function test_different_commodities_yield_different_queries(): void
    {
        $this->assertNotSame(
            $this->q('ekspor minyak atsiri umkm'),
            $this->q('ekspor arang briket umkm'),
        );
    }

    /** Tanpa komoditas, proses generik masih dipakai (regulasi tetap relevan). */
    public function test_generic_fallback_when_no_commodity(): void
    {
        $reg = $this->q('panduan lengkap regulasi bea cukai terbaru');
        $this->assertNotSame('', trim($reg));
        $this->assertMatchesRegularExpression('/customs|legal|document|paperwork/i', $reg);
    }

    /** Query bahasa Inggris dari AI (spesifik) diteruskan, tidak diganti generik. */
    public function test_english_ai_query_passes_through(): void
    {
        $out = $this->q('patchouli essential oil distillation');
        $this->assertStringContainsString('essential', $out);
    }
}
