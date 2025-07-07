<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    @include('components.noindex')
    @include('components.header')

    <title>投稿カテゴリ一覧</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>投稿カテゴリ一覧</h1>

    <!-- ✅ 管理リンク（ログイン中のみ表示） -->
    @auth
        <div class="admin_link_container">
            <nav class="admin_nav">
                <ul>
                    <li><a href="{{ route('types.index') }}">📋 タイプ一覧</a></li>
                    <li><a href="{{ route('types.create') }}">➕ 新規登録</a></li>
                    <li><a href="{{ route('dashboard') }}">📊 ダッシュボード</a></li>
                    <li><a href="{{ route('profile.edit') }}">👤 プロフィール編集</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="logout_link">🚪 ログアウト</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    @endauth

    <!-- カテゴリ一覧 -->
    <div class="point_container">
        @foreach ($types as $key => $label)
            <a href="{{ url($key) }}" class="point_item">
                {{ $label }} ({{ $counts[$key] ?? 0 }}件)
            </a>
        @endforeach
    </div>
    @include('components.footer')
</body>
</html>