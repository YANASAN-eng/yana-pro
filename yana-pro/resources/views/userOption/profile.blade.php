<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>プロフィール画面</title>
    </head>
    <body>
        {{ $name }}でログインしています。
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>ログアウト</button>
        </form>
    </body>
</html>