<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;

/*
|--------------------------------------------------------------------------
| API Routes — Content Hub Distribution
|--------------------------------------------------------------------------
|
| Consumed by dira.co.id, gma-world.id, and any non-WordPress domain.
| Authentication: Bearer token per site (stored in sites.api_token).
|
| Examples:
|   GET /api/v1/articles             → paginated article list for the site
|   GET /api/v1/articles/some-slug   → full article detail
|
*/

Route::prefix('v1')->middleware(\App\Http\Middleware\ApiTokenAuth::class)->group(function () {
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/{slug}', [ArticleController::class, 'show']);
});
