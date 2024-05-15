<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Танцевальная студия MOVE</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comforter+Brush&family=Marck+Script&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
<div id="app">
    <header>
        <div class="container header__wrap ">
            <div class="logo__wrap">
                <a href="{{ url('/') }}"><img class="logo" src="{{asset('images/logo.png')}}"></a></div>
            <div class="navbar__wrap">
                <ul class="menu" id="menu">
                    <li>
                        <a href="/schedule">Расписание</a>
                    </li>
                    <li>
                        <a href="{{route('dance_typeList')}}">Направления</a>
                    </li>
                    <li>
                        <a href="{{route('teachersList')}}">Преподаватели</a>
                    </li>
                    <li>
                        <a href="/tariffs">Тарифы</a>
                    </li>
                    <li>
                        <a href="/about">О нас</a>
                    </li>
                    <li>
                        <a href="/contact">Контакты</a>
                    </li>
                </ul>
            </div>
            <?php if ( Auth ::check() )
            {
                ?>
            <a href="{{ route('accountType') }}"> <img class="account_icon" src="{{asset('images/account_icon.png')}}"></a>
            <?php } else { ?>
            <a href="{{ url('/login') }}"> <img class="account_icon" src="{{asset('images/account_icon.png')}}"></a>
            <?php } ?>
            <div class="menu_burger">
                <?php if ( Auth ::check() )
                {
                    ?>
                <a href="{{ route('accountType') }}"> <img  src="{{asset('images/account_icon.png')}}"></a>
                <?php } else { ?>
                <a href="{{ url('/login') }}"> <img class="account_icon_" src="{{asset('images/account_icon.png')}}"></a>
                <?php } ?>
                <div class="menu_burger__field" id="menu_burger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </div>
        <div class="popup" id="popup"></div>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer>
        <div class="container footer__wrap">
            <ul class="menu" id="menu">
                <li>
                    <a href="/schedule">Расписание</a>
                </li>
                <li>
                    <a href="#">Направления</a>
                </li>
                <li>
                    <a href="{{route('teachersList')}}">Преподаватели</a>
                </li>
                <li>
                    <a href="#">Тарифы</a>
                </li>
                <li>
                    <a href="#">О нас</a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
            </ul>
            <div class="info__wrap">
                <div>
                    <a href="{{ url('/') }}"> <img class="socials" src="{{asset('images/inst.png')}}"></a>
                    <a href="{{ url('/') }}"> <img class="socials" src="{{asset('images/telegram.png')}}"></a>
                    <a href="{{ url('/') }}"> <img class="socials" src="{{asset('images/tiktok.png')}}"></a>
                </div>
                <div>
                    <p>
                        <b>Адресс</b>
                        <br>
                        <br>
                        г. Минск<br>
                        ул. Козлова д.16
                    </p>
                </div>
                <div><p><b>Телефон</b>
                        <br>
                        <br>
                        МТС <a href="tel:+375 33 6993616">+375 33 6993616</a>
                        <br>
                        А1 <a href="tel:+375 29 6993616">+375 29 6993616</a>
                    </p>
                </div>
                <div>
                    <p><b>Email</b>
                        <br>
                        <br>
                        <a href="mailto:movedance@gmail.com">move@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://unpkg.com/imask"></script>
    </footer>
</div>
</body>
</html>
