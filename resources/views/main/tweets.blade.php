<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
@include('components.noindex')
@include('components.header')

    <title>{{ $type }}の投稿一覧</title>
    <link rel="stylesheet" href="/css/style.css"> <!-- 任意のCSSファイルパス -->
</head>
<body>
    <h1>{{ $types[$type] ?? $type }} の投稿一覧</h1>

    <div class="navi">
        <a href="{{ route('top') }}" class="point_item" style="display: inline-block; width: auto; padding: 8px 16px;">
            ← TOPに戻る
        </a>
    </div>

    <ul class="content">
        @forelse ($tweets as $tweet)
            <li>
                <strong>{{ $tweet->tweeted_at->format('Y-m-d H:i') }}</strong> -
                <strong>{{ $tweet->username }}</strong>:<br>
                {{ $tweet->text }}
            </li>
        @empty
            <li>まだ投稿がありません。</li>
        @endforelse
    </ul>
    {{ $tweets->links('components.pagination') }}
</body>
</html>
