<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <!-- フッター：全ページリンク一覧 -->
    <footer class="footer_links">
        <h2>📄 全ページリンク一覧</h2>

<div class="point_container">
    @foreach ($types as $key => $label)
        <a href="{{ url($key) }}" class="point_item">
            {{ $label }} ({{ $counts[$key] ?? 0 }}件)
        </a>
    @endforeach
</div>
        <li><a href="{{ url('/') }}">🏠 TOP</a></li>
            <li><a href="{{ route('login') }}">🔑 ログイン</a></li>
            <li><a href="{{ route('password.request') }}">🔁 パスワードリセット</a></li>
            <li><a href="{{ url('verify-email') }}">📧 メール確認</a></li>
            <li><a href="{{ url('forgot-password') }}">💭 パスワードを忘れた場合</a></li>

    @auth
        <ul>
            <li><a href="{{ route('types.index') }}">📋 登録済みタイプ一覧</a></li>
            <li><a href="{{ route('types.create') }}">➕ タイプ新規登録</a></li>
            <li><a href="{{ route('dashboard') }}">📊 ログインダッシュボード</a></li>
            <li><a href="{{ route('profile.edit') }}">👤 プロフィール編集</a></li>
            <li><a href="{{ route('register') }}">📝 新規登録</a></li>
        </ul>
    @endauth
    </footer>
