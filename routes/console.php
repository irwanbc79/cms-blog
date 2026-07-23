<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Auto-publish scheduled articles every minute
Schedule::command('articles:publish-scheduled')->everyMinute();

// Jaga stok artikel scheduled per site: auto-generate dari TopicIdea saat stok menipis
// (command sudah ada sejak lama tapi belum pernah didaftarkan ke scheduler — auto-topup
// sebenarnya tidak pernah jalan sendiri, hanya lewat run manual/shell script bulk)
Schedule::command('pipeline:topup')->dailyAt('01:00');
