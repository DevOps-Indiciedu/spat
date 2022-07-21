<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPAT') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'responsive.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        <div class="loader">
            <div class="cube">
                <div class="sides">
                    <div class="top"></div>
                    <div class="right"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="front"></div>
                    <div class="back"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- loader END -->

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.min.js') }}"></script>
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'popper.min.js') }}"></script>
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'waypoints.min.js') }}"></script>
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'smooth-scrollbar.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset(MyApp::ASSET_SCRIPT.'custom.js') }}"></script>

</body>
</html>