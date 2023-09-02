<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible',
        'text_primary_color',
        'text_secondary_color',
        'bg_primary_color',
        'bg_secondary_color',
        'icon',
        'icon_color',
        'cover_path',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }


    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}





