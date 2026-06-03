<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AdminArticleController;

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

// Admin API (full CRUD, authenticated by ADMIN_API_SECRET)
Route::prefix('admin')->middleware(\App\Http\Middleware\AdminApiAuth::class)->group(function () {
    Route::get('/sites', [AdminArticleController::class, 'sites']);
    Route::get('/articles', [AdminArticleController::class, 'index']);
    Route::post('/articles', [AdminArticleController::class, 'store']);
    Route::get('/articles/{id}', [AdminArticleController::class, 'show']);
    Route::put('/articles/{id}', [AdminArticleController::class, 'update']);
    Route::delete('/articles/{id}', [AdminArticleController::class, 'destroy']);
});
