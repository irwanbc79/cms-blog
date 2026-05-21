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
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

// Sitemap & RSS Feed
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/feed.xml', [FeedController::class, 'index'])->name('feed');

// Old routes
Route::get('/', function () {
    return redirect('/portal/masuk');
});
Route::get('/hi', fn() => 'hello world');
