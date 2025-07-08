<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'username',
        'text',
        'tweeted_at',
        'type',
    ];

    protected $casts = [
        'tweeted_at' => 'datetime',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type', 'key');
    }
}
