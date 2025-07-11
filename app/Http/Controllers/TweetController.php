<?php

namespace App\Http\Controllers;
use App\Services\TweetService;
use App\Models\Tweet;
use App\Models\Type;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    private $tweetService;

    public function __construct(TweetService $tweetService)
    {
        $this->tweetService = $tweetService;
    }

    public function top()
    {
        $types = $this->tweetService->getTypes();
        $counts = $this->tweetService->getTweetCountsByType();

        return view('main.index', [
            'types' => $types,
            'counts' => $counts,
        ]);
    }

    public function index($type)
    {
        $types = $this->tweetService->getTypes();

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
