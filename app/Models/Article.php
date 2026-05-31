<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
        'site_id', 'title', 'slug', 'focus_keyword', 'meta_description', 'excerpt',
        'content_html', 'og_title', 'og_description', 'canonical_url', 'schema_type',
        'tags', 'hashtags', 'image_alt_texts', 'schema_faq', 'language', 'pillar', 'status',
        'word_count', 'estimated_read_time', 'featured_image_url',
        'wp_post_id', 'wp_post_url', 'published_at', 'scheduled_at', 'user_id',
        'refresh_flagged_at',
    ];

    protected $casts = [
        'tags'               => 'array',
        'hashtags'           => 'array',
        'image_alt_texts'    => 'array',
        'schema_faq'         => 'array',
        'published_at'       => 'datetime',
        'scheduled_at'       => 'datetime',
        'refresh_flagged_at' => 'datetime',
        'word_count'         => 'integer',
        'wp_post_id'         => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            if ($article->status === 'published' && is_null($article->published_at)) {
                $article->published_at = now();
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function topicIdeas(): HasMany
    {
        return $this->hasMany(TopicIdea::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeForSite(Builder $query, int $siteId): Builder
    {
        return $query->where('site_id', $siteId);
    }

    public function scopeScheduled(Builder $query): Builder
    {
        return $query->where('status', 'scheduled');
    }
}
