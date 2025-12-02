<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'quote_en',
        'quote_de',
        'author',
        'role_en',
        'role_de',
        'school_en',
        'school_de',
        'avatar',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getQuoteAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"quote_{$locale}"} ?? $this->quote_en;
    }

    public function getRoleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"role_{$locale}"} ?? $this->role_en;
    }

    public function getSchoolAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"school_{$locale}"} ?? $this->school_en;
    }

    public static function getActive()
    {
        return static::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
