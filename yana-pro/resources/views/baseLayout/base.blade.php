<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-pink-50">
        <header class="grid grid-cols-12 gap-4 bg-emerald-950 text-fuchsia-50 px-5 h-16 items-stretch">
            <!-- ロゴ -->
            <div class="col-span-2 h-full flex items-center justify-center">
                <img src="{{ asset('img/yana_logo.JPG') }}" class="h-16 object-contain">
            </div>

            <!-- 検索ボックス -->
            <div class="col-span-6 h-full flex items-center">
                <label for="location" class="mr-2 w-1/6 text-right">検索</label>
                <input type="location" name="location" id="location" 
                    class="h-10 w-5/6 border border-indigo-600 text-stone-950 pl-1 rounded">
            </div>

            <!-- メニュー -->
            <div class="col-span-4 h-full flex items-center justify-end">
                <div class="grid grid-flow-col grid-4 gap-5 items-center text-sm h-full">
                    @if (empty(Auth::user()))
                        <a href="{{ route('showRegister') }}" class="h-full flex items-center">新規会員登録</a>
                        <a href="" class="h-full flex items-center">サイトマップ</a>
                        <a href="{{ route('profile') }}" class="h-full flex items-center">
                            <img src="{{ asset('img/no_profile.png') }}" class="cursor-pointer h-8 w-8">
                        </a>
                        <div class="h-full flex items-center cursor-pointer" id="pull-down">▼</div>
                    @else
                        <form action="{{ route('logout') }}" name="form1" method="post" 
                            class="h-full flex items-center">
                            @csrf
                            <a href="javascript:form1.submit()">ログアウト</a>
                        </form>
                        <a href="" class="h-full flex items-center">サイトマップ</a>
                        <a href="{{ route('profile') }}" class="h-full flex items-center">
                            <img src="{{ asset('storage/profImage/' . Auth::user()->profImage) }}" 
                                class="cursor-pointer h-16 w-16">
                        </a>
                        <div class="h-full flex items-center cursor-pointer" id="pull-down">▼</div>
                    @endif
                </div>
            </div>
        </header>
        <div class="w-48 absolute top-20 right-3 bg-cyan-100 border border-neutral-950 rounded-xl p-2 text-sm hidden" id="menu">
            <div class="grid grid-flow-col grid-3 gap-3 items-center border-b border-pink-900">
                @if (empty(Auth::user()))
                    <div class="col-span-1 p-1">
                        <img src="{{ asset('img/no_profile.png') }}">
                    </div>
                    <div class="col-span-2">
                        <div>
                            <a href="{{ route('showRegister') }}" class="block">会員登録</a>
                        </div>
                        <div>
                            <a href="{{ route('showLogin') }}" class="block">ログイン</a>
                        </div>
                    </div>
                @else
                    <div class="col-span-1 p-1">
                        <img src="{{ asset('storage/profImage/' . Auth::user()->profImage) }}">
                    </div>
                    <device class="col-span-2">
                        <a href="">プロフィール</a>
                        <form action="{{ route('logout') }}" name="form2" method="post" class="col-span-1 inline-block">
                            @csrf
                            <a href="javascript:form2.submit()">ログアウト</a>
                        </form>
                    </device>
                @endif
            </div>
            <div class="">
                <a href="">ヘルプ</a>
            </div>
            <div class="">
                <a href="">コミュニティガイドライン</a>
            </div>
            <div class="">
                <a href="">利用規約</a>
            </div>
            <div class="">
                <a href="">プライバシーポリシー</a>
            </div>
            <div class="">
                <a href="">特定商法取引に基づく商法</a>
            </div>
            <div class="">
                <a href="">お問い合わせ</a>
            </div>
        </div>
        <div class="w-full">@yield('main')</div>
        <script type="text/javascript" src="{{ asset('js/action.js') }}"></script>
    </body>
</html>