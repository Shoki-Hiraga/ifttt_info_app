<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    // 共通のtype一覧（使い回し用）
    private $types = [
        'seo_news' => 'SEOニュース',
        'core_update' => 'コアアップデート',
        'seo_tsuj' => '辻正浩 SEO',
        'seo_watanabe' => '渡辺隆広 SEO',
        'seo_suzuki' => '鈴木謙一 SEO',
        'seo_kimura' => '木村賢 SEO',
        'seo_kashiwazaki' => '柏崎剛 SEO',
        'seo_otaku' => 'LANY SEO',
        'ai_shift' => 'SHIFT AI',
        'ai_aruru' => 'SHIFあるる ChatGPT',
        'ai_chaen' => 'チャエン デジライズ ',
        // 必要ならここに追加
    ];

    // TOPページ
    public function top()
    {
        $types = $this->types;
    
        // 件数取得
        $counts = [];
        foreach ($types as $key => $label) {
            $counts[$key] = Tweet::where('type', $key)->count();
        }
    
        return view('main.index', [
            'types' => $types,
            'counts' => $counts,
        ]);
    }
    
    // type別一覧ページ
    public function index($type)
    {
        $tweets = Tweet::where('type', $type)
                    ->orderBy('tweeted_at', 'desc')
                    ->get();

        return view('main.tweets', [
            'tweets' => $tweets,
            'type' => $type,
            'types' => $this->types,
        ]);
    }
}
