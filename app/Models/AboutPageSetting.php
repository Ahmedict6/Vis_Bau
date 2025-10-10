<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class AboutPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get a setting value by key
     */
    public static function getValue(string $key, $default = null)
    {
        return Cache::remember("about_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('key', $key)->where('is_active', true)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Get all settings for a specific group
     */
    public static function getGroup(string $group)
    {
        return Cache::remember("about_settings_group_{$group}", 3600, function () use ($group) {
            return self::where('group', $group)
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get()
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    /**
     * Clear cache when saving
     */
    protected static function booted()
    {
        static::saved(function ($setting) {
            Cache::forget("about_setting_{$setting->key}");
            Cache::forget("about_settings_group_{$setting->group}");
        });

        static::deleted(function ($setting) {
            Cache::forget("about_setting_{$setting->key}");
            Cache::forget("about_settings_group_{$setting->group}");
        });
    }
}
