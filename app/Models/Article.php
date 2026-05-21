<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'focus_keyword', 'meta_description', 'excerpt',
        'content_html', 'og_title', 'og_description', 'tags', 'hashtags',
        'image_alt_texts', 'schema_faq', 'language', 'pillar', 'status',
        'word_count', 'estimated_read_time', 'featured_image_url',
        'wp_post_id', 'wp_post_url', 'published_at', 'scheduled_at', 'user_id',
    ];

    protected $casts = [
        'tags'             => 'array',
        'hashtags'         => 'array',
        'image_alt_texts'  => 'array',
        'schema_faq'       => 'array',
        'published_at'     => 'datetime',
        'scheduled_at'     => 'datetime',
        'word_count'       => 'integer',
        'wp_post_id'       => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function topicIdeas(): HasMany
    {
        return $this->hasMany(TopicIdea::class);
    }
}
