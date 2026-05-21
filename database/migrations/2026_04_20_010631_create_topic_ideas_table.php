<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('topic_ideas', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->enum('pillar', ['regulasi', 'umkm', 'news', 'logistik'])->default('regulasi');
            $table->enum('language', ['id', 'en'])->default('id');
            $table->json('generated_titles')->nullable();
            $table->string('selected_title')->nullable();
            $table->boolean('is_used')->default(false);
            $table->timestamp('used_at')->nullable();
            $table->foreignId('article_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();

            $table->index(['pillar', 'is_used']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topic_ideas');
    }
};
