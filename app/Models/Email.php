<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'subject',
        'body',
        'event_id',
    ];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
