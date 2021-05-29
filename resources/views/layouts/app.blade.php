<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Sistem Kinerja Pegawai </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .navbar {
        width: 230px;
        height: 100vh;
        position: fixed;
        background-color: #151521;
    }
    .konten {
        float: right;
    }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel d-flex flex-column align-item-start"
            id="sidebar">
            <div class="container flex-column">
                <a class="navbar-brand sidebar-heading text-light" href="{{ url('/') }}">
                    Sistem Kinerja Pegawai
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav mr-auto flex-column">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                    <li><a class="nav-link text-light" href="{{ url('/home') }}">Home</a></li>
                    @can('user-list')
                    <li><a class="nav-link text-light" href="{{ route('users.index') }}">Manajemen User</a></li>
                    @endcan

                    @can('role-list')
                    <li><a class="nav-link text-light" href="{{ route('roles.index') }}">Manajemen Role</a></li>
                    @endcan

                    @can('pegawai-list')
                    <li><a class="nav-link text-light" href="{{ route('pegawai.index') }}">Manajemen Pegawai</a></li>
                    @endcan
                    
                    @can('ref_unit-list')
                    <li><a class="nav-link text-light" href="{{ route('ref_unit.index') }}">Manajemen Unit</a></li>
                    @endcan

                    @can('ref_jabatan-list')
                    <li><a class="nav-link text-light" href="{{ route('ref_jabatan.index') }}">Manajemen Jabatan</a></li>
                    @endcan

                    @can('uraian_pekerjaan-list')
                    <li><a class="nav-link text-light" href="{{ route('uraian_pekerjaan.index') }}">Manajemen Pekerjaan</a></li>
                    @endcan
                    <div class="ps-4">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>



                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                    </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>

    <main class="py-4">
        <div class="container konten">
            @yield('content')
        </div>
    </main>
    </div>
</body>

</html>