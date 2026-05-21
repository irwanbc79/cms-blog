<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('domain')->nullable();
            $table->string('wp_url')->nullable();
            $table->text('wp_username')->nullable();
            $table->text('wp_app_password')->nullable();
            $table->text('anthropic_api_key')->nullable();
            $table->string('anthropic_model')->default('claude-sonnet-4-20250514');
            $table->json('content_pillars')->nullable();
            $table->json('languages')->nullable();
            $table->text('ai_prompt_context')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('logo_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
