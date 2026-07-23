<?php

namespace Tests\Unit;

use App\Models\Site;
use App\Services\AnthropicService;
use Tests\TestCase;

class SolusiCtaMatcherTest extends TestCase
{
    private function service(): AnthropicService
    {
        // Site in-memory (tidak disimpan ke DB) dengan API key dummy — cukup untuk
        // lolos constructor tanpa menyentuh tabel settings (belum ter-seed di test DB).
        $site = new Site(['anthropic_api_key' => 'sk-test-dummy', 'anthropic_model' => 'claude-sonnet-4-6']);
        return new AnthropicService($site);
    }

    private function cta(string $keyword, string $title): string
    {
        return $this->service()->renderSolusiCta($keyword, $title);
    }

    /** Judul yang menyebut industri spesifik harus link ke /solusi/{slug} yang tepat. */
    public function test_matches_specific_vertical_from_title(): void
    {
        $this->assertStringContainsString('/solusi/klinik', $this->cta('rekam medis', 'Sistem Klinik Wajib SATUSEHAT 2026'));
        $this->assertStringContainsString('/solusi/sekolah', $this->cta('spp', 'Cara Kelola Tagihan SPP Pesantren'));
        $this->assertStringContainsString('/solusi/distributor', $this->cta('grosir', 'Tips Distributor Bahan Bangunan'));
        $this->assertStringContainsString('/solusi/ceisa', $this->cta('pib', 'Panduan Input PIB ke CEISA'));
        $this->assertStringContainsString('/solusi/jastip', $this->cta('jastip', 'Cara Jastiper Kelola Ratusan Order Tanpa Ribet'));
    }

    /** matchSolusiSlug() dipakai GenerateArticleJob untuk putuskan apakah cta1 (awal) juga diarahkan ke vertikal. */
    public function test_match_solusi_slug_returns_slug_or_null(): void
    {
        $service = $this->service();
        $this->assertSame('klinik', $service->matchSolusiSlug('rekam medis', 'Sistem Klinik Wajib SATUSEHAT 2026'));
        $this->assertNull($service->matchSolusiSlug('erp cloud', 'Kenapa Bisnis Anda Butuh ERP Cloud di 2026'));
    }

    /** Topik generik (tanpa sebut industri) harus jatuh ke hub /solusi, bukan link mati. */
    public function test_falls_back_to_hub_when_no_vertical_matches(): void
    {
        $out = $this->cta('erp cloud', 'Kenapa Bisnis Anda Butuh ERP Cloud di 2026');
        $this->assertStringContainsString('https://morabangun.com/solusi"', $out);
        $this->assertStringNotContainsString('/solusi/', str_replace('/solusi"', '', $out));
    }

    /** CTA default (site lain) tidak boleh berubah oleh perubahan ini. */
    public function test_default_cta_untouched(): void
    {
        $out = $this->service()->renderCta();
        $this->assertStringContainsString('wa.me', $out);
        $this->assertStringNotContainsString('/solusi', $out);
    }
}
