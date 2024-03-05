<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common1.css') }}">
    <script src="{{ mix('js/image_preview.js') }}" defer></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">furima</a>
            <nav>
                <ul class="header__nav">
                    <li class="header__nav-item">
                        <form class="header__search" action="/search" method="get">
                            @csrf
                            <input class="header__search-txt" type="text" name="name_keyword" placeholder="なにをお探しですか？">
                            <button class="header__search-button" type="submit">
                                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill:lightgray">
                                    <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                                </svg>
                            </button>
                        </form>
                    </li>
                    @if(Auth::check())
                    <li class="header__nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="header__logout-button">ログアウト</button>
                        </form>
                    </li>
                    <li class="header__nav-item">
                        @switch(Auth::user()->authority)
                        @case(1)
                        <a class="header__nav-link" href="/manage">管理</a>
                        @break
                        @case(2)
                        <a class="header__nav-link" href="/manage">管理</a>
                        <a class="header__nav-link" href="/mypage">マイページ</a>
                        @break
                        @case(3)
                        <a class="header__nav-link" href="/mypage">マイページ</a>
                        @break
                        @endswitch
                    </li>
                    <li class="header__nav-item">
                        @if((Auth::user()->introduction)==1)
                        <a class="header__nav-link-sell" href="/sell">出品</a>
                        @endif
                    </li>
                    @else
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="/login">ログイン</a>
                    </li>
                    <li class="header__nav-item">
                        <a class="header__nav-link" href="/register">会員登録</a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

</body>

</html>