<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 
        'text', 
        'tweeted_at',
        'type', // ★ ここ追加！
    ];

    protected $casts = [
        'tweeted_at' => 'datetime',
    ];
}
