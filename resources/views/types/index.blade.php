<!DOCTYPE html>
<html lang="ja">
<head>
    @include('types.components.header')

    <meta charset="UTF-8">
    <title>タイプ一覧</title>
    <link rel="stylesheet" href="{{ asset('css/type.css') }}">
</head>
<body>
    <h1>登録済みタイプ一覧</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <div class="table-wrapper">
        <table class="type-table">
            <thead>
                <tr>
                    <th>キー</th>
                    <th>ラベル</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <td>{{ $type->key }}</td>
                        <td>{{ $type->label }}</td>
                        <td>
                            <form action="{{ route('types.destroy', $type->key) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">削除</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">登録されたタイプがありません</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="link-bottom">
        <a href="{{ route('types.create') }}" class="floating-button">＋ 新規登録</a>
    </div>
</body>
</html>
