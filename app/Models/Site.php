<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    protected $fillable = [
        'name', 'slug', 'domain', 'wp_url', 'wp_username', 'wp_app_password',
        'anthropic_api_key', 'anthropic_model', 'content_pillars', 'languages',
        'ai_prompt_context', 'whatsapp_number', 'logo_url', 'is_active',
    ];

    protected $casts = [
        'content_pillars' => 'array',
        'languages'       => 'array',
        'is_active'       => 'boolean',
        'wp_username'     => 'encrypted',
        'wp_app_password' => 'encrypted',
        'anthropic_api_key' => 'encrypted',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function topicIdeas(): HasMany
    {
        return $this->hasMany(TopicIdea::class);
    }

    /**
     * Get default pillars with their labels.
     */
    public function getPillarOptions(): array
    {
        $pillars = $this->content_pillars;

        if (! empty($pillars) && is_array($pillars)) {
            return $pillars;
        }

        // Default pillars
        return [
            'regulasi' => 'Regulasi',
            'umkm'     => 'UMKM Ekspor',
            'news'     => 'News',
            'logistik' => 'Logistik',
        ];
    }

    /**
     * Get supported languages.
     */
    public function getLanguageOptions(): array
    {
        $langs = $this->languages;

        if (! empty($langs) && is_array($langs)) {
            $map = ['id' => 'Indonesia', 'en' => 'English'];
            $result = [];
            foreach ($langs as $code) {
                $result[$code] = $map[$code] ?? $code;
            }
            return $result;
        }

        return ['id' => 'Indonesia', 'en' => 'English'];
    }
}
