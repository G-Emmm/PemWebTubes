<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
    <!-- Styles -->
    <style>
    /*
 * Globals
 */


    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
        color: #333;
        text-shadow: none;
        /* Prevent inheritance from `body` */
    }


    /*
 * Base structure
 */

    body {
        background-image: url("https://www.hariansederhana.com/wp-content/uploads/2019/03/IMG_0906-01.jpeg");
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .cover-container {
        max-width: 42em;
    }


    /*
 * Header
 */

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
    }

    .nav-masthead .nav-link+.nav-link {
        margin-left: 1rem;
    }

    .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
    }
    </style>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <main class="px-3 ">
            <h1 class="mb-n5">Sistem <br />Kinerja Pegawai</h1>
            <div class="wrap" style="background-color: rgba(0, 0, 0, 0.6); padding: 150px;">
                <p class="lead">Selamat Datang Di <br />Sistem Kinerja Pegawai</p>
                @auth
                <p class="lead">
                    <a href="{{ url('/home') }}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Home</a>
                </p>
                @else
                <p class="lead">
                    <a href="{{ route('login') }}"
                        class="btn btn-lg btn-secondary fw-bold border-white bg-white">Login</a>
                    &nbsp Atau &nbsp
                    <a href="{{ route('register') }}"
                        class="btn btn-lg btn-secondary fw-bold border-white bg-white">Sign
                        up</a>
                </p>
                @endauth
        </main>
    </div>
    </div>



</body>

</html>