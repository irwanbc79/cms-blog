<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->string('api_token', 64)->nullable()->unique()->after('ads_txt_content');
            $table->string('webhook_url')->nullable()->after('api_token');
        });
    }

    public function down(): void
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropUnique(['api_token']);
            $table->dropColumn(['api_token', 'webhook_url']);
        });
    }
};
