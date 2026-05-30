<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Change pillar from hardcoded enum to varchar so each site can define custom pillars
        Schema::table('articles', function (Blueprint $table) {
            $table->string('pillar')->default('regulasi')->change();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->enum('pillar', ['regulasi', 'umkm', 'news', 'logistik'])->default('regulasi')->change();
        });
    }
};
