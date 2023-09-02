<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'document',
        'uf',
        'event_id',
    ];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
