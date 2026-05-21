<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'is_encrypted'];

    protected $casts = [
        'is_encrypted' => 'boolean',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        if (! $setting) {
            return $default;
        }

        $value = $setting->is_encrypted
            ? static::decrypt($setting->value)
            : $setting->value;

        return is_string($value) ? trim($value) : $value;
    }

    public static function set(string $key, mixed $value, string $group = 'general', bool $encrypted = false): void
    {
        $stored = $encrypted ? static::encrypt($value) : $value;

        static::updateOrCreate(
            ['key' => $key],
            ['value' => $stored, 'group' => $group, 'is_encrypted' => $encrypted]
        );
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
