<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KampKlaar</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    KampKlaar
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 p-4 bg-light border rounded shadow-sm">
                        @auth

                            <a href="{{ route('home') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                                <i class="bi bi-house-door"></i>
                                <span>My Youth Movement</span>
                            </a>


                            <a href="{{ route('items.index') }}" class="btn btn-outline-primary d-flex align-items-center gap-2">
                                <i class="bi bi-box"></i>
                                <span>View Items</span>
                            </a>
                            <a href="{{ route('reservations.index') }}" class="btn btn-outline-success d-flex align-items-center gap-2">
                                <i class="bi bi-calendar-check"></i>
                                <span>View Reservations</span>
                            </a>
                            <a href="{{ route('damage_reports.index') }}" class="btn btn-outline-danger d-flex align-items-center gap-2">
                                <i class="bi bi-exclamation-triangle"></i>
                                <span>View Damage Reports</span>
                            </a>
                            <a href="{{ route('profile') }}" class="btn btn-outline-info d-flex align-items-center gap-2">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        @endauth
                        <a href="{{ route('privacy-policy') }}" class="btn btn-outline-warning d-flex align-items-center gap-2">
                            <i class="bi bi-gear"></i>
                            <span>Privacy Policy</span>
                        </a>
                    </div>




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
                                    {{ Auth::user()->username }}
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
</body>
</html>
