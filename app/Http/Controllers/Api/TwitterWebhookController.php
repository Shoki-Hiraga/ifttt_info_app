<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class TwitterWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 🔐 IFTTTのシークレットキーを検証
        if ($request->header('X-IFTTT-Secret') !== config('services.ifttt.secret')) {
            abort(403, 'Unauthorized');
        }

        // バリデーション（必要なら）
        $request->validate([
            'username' => 'required|string',
            'text' => 'required|string',
            'created_at' => 'nullable|string',
            'type' => 'required|string', 
        ]);

        // DB保存
        $tweet = Tweet::create([
            'username' => $request->username,
            'text' => $request->text,
            'tweeted_at' => $request->created_at ? now()->parse($request->created_at) : now(),
            'type' => $request->type, // ← 追加 ✅
        ]);

        return response()->json(['message' => 'Saved successfully', 'id' => $tweet->id]);
    }
}
