<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentSection extends Model
{
    protected $fillable = [
        'section_key',
        'language',
        'section_type',
        'title',
        'subtitle',
        'badge',
        'description',
        'data',
        'is_active',
        'order',
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get content by section key
     */
    public static function getByKey(string $key)
    {
        return self::where('section_key', $key)->where('is_active', true)->first();
    }

    /**
     * Get content by section type and language
     */
    public static function getBySectionAndLanguage(string $sectionType, string $language)
    {
        return self::where('section_type', $sectionType)
            ->where('language', $language)
            ->where('is_active', true)
            ->orderBy('order')
            ->first();
    }

    /**
     * Get all sections for a language
     */
    public static function getByLanguage(string $language)
    {
        return self::where('language', $language)
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
