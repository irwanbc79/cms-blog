<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'is_encrypted'];

    protected $casts = [
        'is_encrypted' => 'boolean',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        return static::getCached($key, $default);
    }

    public static function set(string $key, mixed $value, string $group = 'general', bool $encrypted = false): void
    {
        $stored = $encrypted ? static::encrypt($value) : $value;

        static::updateOrCreate(
            ['key' => $key],
            ['value' => $stored, 'group' => $group, 'is_encrypted' => $encrypted]
        );

        Cache::forget('settings_all');
    }

    public static function getAll(): array
    {
        return Cache::rememberForever('settings_all', function () {
            $settings = static::all();
            $result = [];
            foreach ($settings as $setting) {
                $value = $setting->is_encrypted
                    ? static::decrypt($setting->value)
                    : $setting->value;
                $result[$setting->key] = is_string($value) ? trim($value) : $value;
            }
            return $result;
        });
    }

    protected static function getCached(string $key, mixed $default = null): mixed
    {
        $all = static::getAll();
        return $all[$key] ?? $default;
    }

    public static function encrypt(string $value): string
    {
        return Crypt::encryptString($value);
    }

    public static function decrypt(string $value): string
    {
        return Crypt::decryptString($value);
    }
}
