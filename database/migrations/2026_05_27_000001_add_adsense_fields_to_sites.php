<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->string('adsense_publisher_id')->nullable()->after('logo_url');
            $table->json('adsense_ad_slots')->nullable()->after('adsense_publisher_id');
            $table->string('google_analytics_id')->nullable()->after('adsense_ad_slots');
            $table->string('google_site_verification')->nullable()->after('google_analytics_id');
            $table->text('ads_txt_content')->nullable()->after('google_site_verification');
        });
    }

    public function down(): void
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropColumn([
                'adsense_publisher_id',
                'adsense_ad_slots',
                'google_analytics_id',
                'google_site_verification',
                'ads_txt_content',
            ]);
        });
    }
};
