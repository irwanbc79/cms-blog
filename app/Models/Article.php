<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\ValidationException;

class Article extends Model
{
    public const EDITORIAL_PENDING = 'pending';
    public const EDITORIAL_NEEDS_REVISION = 'needs_revision';
    public const EDITORIAL_APPROVED = 'approved';
    public const EDITORIAL_LEGACY = 'legacy';

    protected $fillable = [
        'site_id', 'title', 'slug', 'focus_keyword', 'meta_description', 'excerpt',
        'content_html', 'og_title', 'og_description', 'canonical_url', 'schema_type',
        'tags', 'hashtags', 'image_alt_texts', 'schema_faq', 'language', 'pillar', 'status',
        'word_count', 'estimated_read_time', 'featured_image_url',
        'wp_post_id', 'wp_post_url', 'published_at', 'scheduled_at', 'user_id',
        'refresh_flagged_at',
        'editorial_status', 'editorial_reviewer_id', 'editorial_reviewed_at',
        'editorial_review_notes',
    ];

    protected $casts = [
        'tags'               => 'array',
        'hashtags'           => 'array',
        'image_alt_texts'    => 'array',
        'schema_faq'         => 'array',
        'published_at'       => 'datetime',
        'scheduled_at'       => 'datetime',
        'refresh_flagged_at' => 'datetime',
        'editorial_reviewed_at' => 'datetime',
        'word_count'         => 'integer',
        'wp_post_id'         => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            if (
                $article->exists
                && $article->status !== 'published'
                && $article->getOriginal('editorial_status') === self::EDITORIAL_APPROVED
                && $article->isDirty([
                    'title', 'content_html', 'focus_keyword', 'meta_description',
                    'featured_image_url', 'canonical_url',
                ])
                && ! $article->isDirty('editorial_status')
            ) {
                $article->editorial_status = self::EDITORIAL_PENDING;
                $article->editorial_reviewer_id = null;
                $article->editorial_reviewed_at = null;
            }

            if (
                $article->isDirty('status')
                && $article->status === 'published'
                && $article->getOriginal('status') !== 'published'
                && ! $article->isEditoriallyApproved()
            ) {
                throw ValidationException::withMessages([
                    'editorial_status' => 'Artikel harus lolos persetujuan editorial sebelum diterbitkan.',
                ]);
            }

            if ($article->status === 'published' && is_null($article->published_at)) {
                $article->published_at = now();
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function editorialReviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'editorial_reviewer_id');
    }

    public function isEditoriallyApproved(): bool
    {
        return $this->editorial_status === self::EDITORIAL_APPROVED;
    }

    public function approveEditorially(?int $reviewerId, ?string $notes = null): void
    {
        $this->forceFill([
            'editorial_status' => self::EDITORIAL_APPROVED,
            'editorial_reviewer_id' => $reviewerId,
            'editorial_reviewed_at' => now(),
            'editorial_review_notes' => $notes,
        ])->save();
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function topicIdeas(): HasMany
    {
        return $this->hasMany(TopicIdea::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedComments(): HasMany
    {
        return $this->hasMany(Comment::class)->where('is_approved', true)->latest();
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeIndexable(Builder $query): Builder
    {
        return $query->where(function (Builder $query): void {
            $query->whereNull('canonical_url')
                ->orWhere('canonical_url', '');
        });
    }

    public function scopeForSite(Builder $query, int $siteId): Builder
    {
        return $query->where('site_id', $siteId);
    }

    public function scopeScheduled(Builder $query): Builder
    {
        return $query->where('status', 'scheduled');
    }

    public function scopeEditoriallyApproved(Builder $query): Builder
    {
        return $query->where('editorial_status', self::EDITORIAL_APPROVED);
    }
}
