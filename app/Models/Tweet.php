<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'username', 'text', 'tweeted_at',
    ];

    protected $casts = [
        'tweeted_at' => 'datetime',
    ];
}

