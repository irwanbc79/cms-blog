<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\SitemapController;
use App\Services\SiteResolver;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Blog Routes (Multi-Site)
|--------------------------------------------------------------------------
|
| These routes serve the public blog frontend for all sites.
| Each site is detected automatically by domain name via SiteResolver.
|
| Examples:
|   m2b.co.id/blog        → Blog index for M2B
|   m2b.co.id/blog/slug   → Article detail for M2B
|   gma-world.id/blog     → Blog index for GMA World
|
*/

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/sitemap.xml', [SitemapController::class, 'index']);
    Route::get('/feed.xml', [FeedController::class, 'index']);
    // ads.txt mirror for subdirectory mode (e.g. dira.co.id/blog/ads.txt)
    Route::get('/ads.txt', function () {
        $site = app(SiteResolver::class)->resolve();
        $content = $site?->ads_txt_content
            ?: 'google.com, pub-5616961797801657, DIRECT, f08c47fec0942fa0';

        return response($content, 200, ['Content-Type' => 'text/plain']);
    });
    Route::get('/privacy-policy', [BlogController::class, 'privacyPolicy'])->name('blog.privacy');
    Route::get('/terms-of-service', [BlogController::class, 'termsOfService'])->name('blog.terms');
    Route::get('/about', [BlogController::class, 'aboutEditorial'])->name('blog.about');
    Route::get('/kalkulator-bea-masuk', [BlogController::class, 'kalkulatorBeaMasuk'])->name('blog.kalkulator');
    Route::get('/kalkulator-ekspor-umkm', [BlogController::class, 'kalkulatorEkspor'])->name('blog.kalkulator.ekspor');
    Route::get('/kalkulator-roi-erp', [BlogController::class, 'kalkulatorRoiErp'])->name('blog.kalkulator.erp');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::post('/{slug}/comments', [BlogController::class, 'storeComment'])->name('blog.comments.store');
});

// Sitemap & RSS Feed (root level for CMS)
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/feed.xml', [FeedController::class, 'index'])->name('feed');

// ads.txt for AdSense verification (auto-served per site)
Route::get('/ads.txt', function () {
    $site = app(SiteResolver::class)->resolve();
    $content = $site?->ads_txt_content
        ?: 'google.com, pub-5616961797801657, DIRECT, f08c47fec0942fa0';

    return response($content, 200, ['Content-Type' => 'text/plain']);
});

// 410 Gone for legacy dead archives (tags, categories, deprecated scripts)
Route::get('/tag/{any}', fn () => response('Resource permanently removed.', 410))->where('any', '.*');
Route::get('/tags/{any}', fn () => response('Resource permanently removed.', 410))->where('any', '.*');
Route::get('/category/{any}', fn () => response('Resource permanently removed.', 410))->where('any', '.*');
Route::get('/out_ebook_v2.html', fn () => response('Resource permanently removed.', 410));

// Root redirect to admin panel
Route::get('/', function () {
    return redirect('/portal/masuk');
});
