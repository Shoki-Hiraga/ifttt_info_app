<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Type; // ← 追加
use Illuminate\Http\Request;

class TweetController extends Controller
{
    // DBから取得するように共通処理化
    private function getTypes(): array
    {
        return Type::all()->pluck('label', 'key')->toArray();
    }

    // TOPページ
    public function top()
    {
        $types = $this->getTypes();

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
        $types = $this->getTypes();

        if (!array_key_exists($type, $types)) {
            abort(404, '指定されたカテゴリは存在しません');
        }

        $tweets = Tweet::where('type', $type)
                    ->orderBy('tweeted_at', 'desc')
                    ->paginate(30);

        return view('main.tweets', [
            'tweets' => $tweets,
            'type' => $type,
            'types' => $types,
        ]);
    }
}
