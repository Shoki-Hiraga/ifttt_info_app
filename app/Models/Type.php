<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // 主キーが 'key' かつ increment ではないことを指定
    protected $primaryKey = 'key';
    public $incrementing = false;

    // 主キーが文字列であることを指定
    protected $keyType = 'string';

    // ホワイトリスト（更新可能なカラム）
    protected $fillable = [
        'key',
        'label',
    ];
}
