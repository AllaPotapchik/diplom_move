<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Танцевальная студия MOVE') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/resources/css/app.css" rel="stylesheet">
    <!-- Scripts -->

    <!-- Scripts -->

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
                        <a href="#">Расписание</a>
                    </li>
                    <li>
                        <a href="#">Направления</a>
                    </li>
                    <li>
                        <a href="#">Преподаватели</a>
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
            </div>
            <a href="{{ url('/') }}"> <img class="account_icon" src="{{asset('images/account_icon.png')}}"></a>

            <div class="menu_burger">
                <a href="{{ url('/') }}"> <img class="account_icon_burger" src="{{asset('images/account_icon.png')}}"></a>
                <div class="menu_burger__field" id="menu_burger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <div class="popup" id="popup"></div>
    </header>

        {{--  <div class="container header__wrap">
             <div class="logo__wrap">
                 <a href="{{ url('/') }}"><img class="logo" src="{{asset('images/logo.png')}}"></a></div>
             <nav>
                 <ul class="menu">
                     <li>
                         <a href="#">Расписание</a>
                     </li>
                     <li>
                         <a href="#">Направления</a>
                     </li>
                     <li>
                         <a href="#">Преподаватели</a>
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
                 <div class="burger">
                     <div class="line"></div>
                     <div class="line"></div>
                     <div class="line"></div>
                 </div>
             </nav>
                 <a href="{{ url('/') }}"> <img class="account_icon" src="{{asset('images/account_icon.png')}}"></a>
         </div> --}}
     {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
          <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                  {{ config('app.name', 'Laravel') }}
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav me-auto">

                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ms-auto">
                      <!-- Authentication Links -->
                      @guest
                          @if (Route::has('login'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                          @endif

                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
              </div>
          </div>
      </nav>--}}

    <main class="py-4">
        @yield('content')
    </main>
</div>
<footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/imask"></script>
</footer>
</body>
</html>
