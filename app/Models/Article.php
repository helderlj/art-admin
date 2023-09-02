<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'authors',
        'available_at',
        'category_id',
        'file_path',
        'cover_path',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class)->withPivot('sort');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}








