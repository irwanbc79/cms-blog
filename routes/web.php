<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\FeedController;

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
        $site = app(\App\Services\SiteResolver::class)->resolve();
        $content = $site?->ads_txt_content
            ?: 'google.com, pub-5616961797801657, DIRECT, f08c47fec0942fa0';
        return response($content, 200, ['Content-Type' => 'text/plain']);
    });
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::post('/{slug}/comments', [BlogController::class, 'storeComment'])->name('blog.comments.store');
});

// Sitemap & RSS Feed (root level for CMS)
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/feed.xml', [FeedController::class, 'index'])->name('feed');

// ads.txt for AdSense verification (auto-served per site)
Route::get('/ads.txt', function () {
    $site = app(\App\Services\SiteResolver::class)->resolve();
    $content = $site?->ads_txt_content
        ?: 'google.com, pub-5616961797801657, DIRECT, f08c47fec0942fa0';
    return response($content, 200, ['Content-Type' => 'text/plain']);
});

// Root redirect to admin panel
Route::get('/', function () {
    return redirect('/portal/masuk');
});
