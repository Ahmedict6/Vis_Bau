<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SectionSetting extends Model
{
    protected $fillable = [
        'section_key',
        'section_name',
        'section_description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Check if a section is active
     */
    public static function isSectionActive(string $sectionKey): bool
    {
        return Cache::remember("section_active_{$sectionKey}", 3600, function () use ($sectionKey) {
            $section = self::where('section_key', $sectionKey)->first();
            return $section ? $section->is_active : true; // Default to active if not found
        });
    }

    /**
     * Clear section cache when updating
     */
    protected static function booted(): void
    {
        static::saved(function ($sectionSetting) {
            Cache::forget("section_active_{$sectionSetting->section_key}");
            Cache::forget('homepage_data'); // Clear homepage cache
        });

        static::deleted(function ($sectionSetting) {
            Cache::forget("section_active_{$sectionSetting->section_key}");
            Cache::forget('homepage_data');
        });
    }
}
