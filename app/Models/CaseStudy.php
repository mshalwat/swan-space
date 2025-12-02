<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $fillable = [
        'title_en',
        'title_de',
        'description_en',
        'description_de',
        'client',
        'category',
        'image',
        'url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_en;
    }

    public static function getActive()
    {
        return static::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
