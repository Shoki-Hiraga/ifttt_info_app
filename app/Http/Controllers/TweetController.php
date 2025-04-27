<?php

// app/Http/Controllers/TweetController.php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    // TOPページ
    public function top()
    {
        // 適当に使うtype一覧（あとでDBから動的にもできる）
        $types = [
            'core_update' => 'コアアップデート',
            'seo_news' => 'SEOニュース',
            // 必要ならここに追加
        ];

        return view('main.index', compact('types'));
    }

    // type別一覧ページ
    public function index($type)
    {
        $tweets = Tweet::where('type', $type)
                    ->orderBy('tweeted_at', 'desc')
                    ->get();

        return view('main.tweets', compact('tweets', 'type'));
    }
}
