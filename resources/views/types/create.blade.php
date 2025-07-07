<!DOCTYPE html>
<html lang="ja">
<head>
    @include('types.components.header')

    <meta charset="UTF-8">
    <title>タイプ登録</title>
    <link rel="stylesheet" href="{{ asset('css/type.css') }}">
</head>
<body>
    <h1>タイプ登録フォーム</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul class="error-messages">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-wrapper">
        <form action="{{ route('types.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="key">キー（例: seo_news などiftで登録した情報）:</label>
                <input type="text" name="key" id="key" value="{{ old('key') }}" required>
            </div>

            <div class="form-group">
                <label for="label">ラベル（例: SEOニュースなど、ページに表示したい内容）:</label>
                <input type="text" name="label" id="label" value="{{ old('label') }}" required>
            </div>

            <div class="form-actions">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</body>
</html>
