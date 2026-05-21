<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopicIdea extends Model
{
    protected $fillable = [
        'site_id', 'topic', 'pillar', 'language', 'generated_titles',
        'selected_title', 'is_used', 'used_at', 'article_id',
    ];

    protected $casts = [
        'generated_titles' => 'array',
        'is_used'          => 'boolean',
        'used_at'          => 'datetime',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
