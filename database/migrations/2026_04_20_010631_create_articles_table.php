<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('focus_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content_html');
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->json('tags')->nullable();
            $table->json('hashtags')->nullable();
            $table->json('image_alt_texts')->nullable();
            $table->json('schema_faq')->nullable();
            $table->enum('language', ['id', 'en'])->default('id');
            $table->enum('pillar', ['regulasi', 'umkm', 'news', 'logistik'])->default('regulasi');
            $table->enum('status', ['draft', 'scheduled', 'published'])->default('draft');
            $table->integer('word_count')->default(0);
            $table->string('estimated_read_time')->nullable();
            $table->string('featured_image_url')->nullable();
            $table->unsignedBigInteger('wp_post_id')->nullable();
            $table->string('wp_post_url')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('scheduled_at')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->index(['status', 'language']);
            $table->index(['pillar', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
