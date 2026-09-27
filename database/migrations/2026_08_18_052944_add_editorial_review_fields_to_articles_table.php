<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('editorial_status')->default('pending')->index();
            // Keep this additive on SQLite; a new foreign key would rebuild the
            // entire articles table on shared hosting.
            $table->unsignedBigInteger('editorial_reviewer_id')->nullable()->index();
            $table->timestamp('editorial_reviewed_at')->nullable();
            $table->text('editorial_review_notes')->nullable();
        });

        DB::table('articles')
            ->where('status', 'published')
            ->update(['editorial_status' => 'legacy']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex(['editorial_status']);
            $table->dropIndex(['editorial_reviewer_id']);
            $table->dropColumn([
                'editorial_status',
                'editorial_reviewer_id',
                'editorial_reviewed_at',
                'editorial_review_notes',
            ]);
        });
    }
};
