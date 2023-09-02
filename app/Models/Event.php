<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Event extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'description',
        'primary_color',
        'secondary_color',
        'cover_path',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($event) {
            $event->slug = Str::slug($event->name);
        });
        static::updating(function ($event) {
            $event->slug = Str::slug($event->name);
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function email()
    {
        return $this->hasOne(Email::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withPivot('sort');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
