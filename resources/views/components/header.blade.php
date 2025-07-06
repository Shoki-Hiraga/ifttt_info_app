<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="shortcut icon" type="image/x-icon"  href="{{ asset('/SEO.ico') }}">
@auth
    <p style="color: green;">ログイン中です（{{ Auth::user()->name }}）</p>
@else
    <p style="color: red;">ログインしていません</p>
@endauth
