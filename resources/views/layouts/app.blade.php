<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIMAGANG') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:#3f2ef4;"> {{-- Ganti warna sesuai tema kamu --}}
    <div id="app">
        <!-- NAVBAR -->
        <nav class="navbar" style="background: transparent; box-shadow: none;">
            <div class="container d-flex flex-column align-items-center">

                <!-- Logo SIMAGANG -->
                <a class="navbar-brand fw-bold text-uppercase text-white fs-1 mb-3" href="{{ url('/') }}">
                    SIMAGANG
                </a>

                <!-- Menu Login & Register di bawah SIMAGANG -->
                <ul class="navbar-nav d-flex flex-row gap-4 mb-2">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white fw-semibold" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white fw-semibold" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fw-semibold"
                               href="#" role="button" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}"
                                      method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <!-- Tulisan kecil di bawah Login & Register -->
                @guest
                    <small class="text-white-50">
                        Silahkan register untuk pertama kali
                    </small>
                @endguest
            </div>
        </nav>

        <!-- Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
