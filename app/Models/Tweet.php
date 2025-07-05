<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    // 他の設定があればそのままにしてOK

    /**
     * Type モデルとのリレーション
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type', 'key');
    }
    protected $casts = [
        'tweeted_at' => 'datetime',
    ];

}
