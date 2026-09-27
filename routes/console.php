<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// AdSense editorial gate: automation is opt-in while the portfolio is under review.
// Commands remain available for deliberate, human-reviewed runs.
if (config('adsense.automation.auto_publish')) {
    Schedule::command('articles:publish-scheduled')->everyMinute();
}

if (config('adsense.automation.auto_topup')) {
    Schedule::command('pipeline:topup')->dailyAt('01:00');
}

// Read-only operational report. It never publishes or edits content.
Schedule::command('adsense:audit --live --store')
    ->dailyAt('06:30')
    ->withoutOverlapping();
