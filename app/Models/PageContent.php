<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'section',
        'key',
        'value_en',
        'value_de',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getValueAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"value_{$locale}"} ?? $this->value_en;
    }

    public static function getContent($section, $key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $content = static::where('section', $section)
            ->where('key', $key)
            ->where('is_active', true)
            ->first();
        
        return $content ? $content->{"value_{$locale}"} : null;
    }

    public static function getSectionContent($section, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return static::where('section', $section)
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->mapWithKeys(function ($item) use ($locale) {
                return [$item->key => $item->{"value_{$locale}"}];
            });
    }
}
