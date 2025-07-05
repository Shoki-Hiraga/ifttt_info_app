<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
@include('components.noindex')
@include('components.header')

    <title>投稿カテゴリ一覧</title>
    <link rel="stylesheet" href="/css/style.css"> <!-- 任意のCSSファイルパス -->
</head>
<body>
    <h1>投稿カテゴリ一覧</h1>

    <div class="point_container">
    @foreach ($types as $key => $label)
        <a href="{{ url($key) }}" class="point_item">
            {{ $label }} ({{ $counts[$key] ?? 0 }}件)
        </a>
    @endforeach
</div>
</body>
</html>
