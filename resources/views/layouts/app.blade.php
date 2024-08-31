<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@1.0.0-beta2/css/iconly.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- @vite(['resources/sass/app.scss']) --}}

    <style>
        html, body {
            height: 100%;
            font-family: 'Ubuntu', sans-serif;
        }

        .gfg {
            height: 50px;
            width: 50px;
        }

        .navbar {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            z-index: 1020; /* Lebih rendah dari sidebar */
            width: calc(100% - 250px); /* Lebar menyesuaikan */
        }

        #bdSidebar {
            z-index: 1030; /* Lebih tinggi dari z-index default header */
            position: fixed; /* Buat sidebar tetap */
            top: 0;
            bottom: 0;
            width: 250px; /* Lebar sidebar */
        }

        .mynav {
            color: #fff;
        }

        .mynav li a {
            color: #fff;
            text-decoration: none;
            width: 100%;
            display: block;
            border-radius: 5px;
            padding: 8px 5px;
        }

        /* .mynav li a.active {
            background: rgba(255, 255, 255, 0.2);
        } */

        .mynav li a.active {
            background-color: rgba(255, 255, 255, 0.2); /* Latar belakang untuk link aktif */
            font-weight: bold; /* Membuat teks link lebih tebal */
            color: #ffffff; /* Warna teks link aktif */
            border-left: 4px solid #ffffff; /* Garis kiri untuk menandai link aktif */
            padding-left: 12px; /* Menambahkan padding di sebelah kiri */
        }

        /* .mynav li a:hover {
            background: rgba(255, 255, 255, 0.2);
        } */

        .mynav li a:hover {
            background: rgba(255, 255, 255, 0.1); /* Latar belakang saat link di-hover */
            color: #ffffff; /* Warna teks saat hover */
            text-decoration: none; /* Menghilangkan garis bawah saat hover */
        }

        .mynav li a i {
            width: 25px;
            text-align: center;
        }

        .notification-badge {
            background-color: rgba(255, 255, 255, 0.7);
            float: right;
            color: #222;
            font-size: 14px;
            padding: 0px 8px;
            border-radius: 2px;
        }

        .content-area {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            padding: 20px;
            width: calc(100% - 250px); /* Sesuaikan lebar konten */
            overflow: auto; /* Mengatasi konten yang tertimpa */
        }

        .d-flex i.fa-book {
            font-size: 24px;
            margin-right: 10px; /* Ukuran font lebih besar */
        }

        .navbar, .content-area {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            width: calc(100% - 250px); /* Atur ulang lebar konten */
            position: relative;
            z-index: 1020; /* Lebih rendah dari sidebar */
        }

        main {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            width: calc(100% - 250px); /* Atur ulang lebar konten */
            position: relative;
            z-index: 1020; /* Lebih rendah dari sidebar */
            padding: 20px; /* Menambahkan padding untuk ruang konten */
        }

    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                    <!-- Sisi Kiri Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Sisi Kanan Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Tautan Autentikasi -->
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

        <div class="container-fluid p-0 d-flex h-100 shadow-sm">
            <div id="bdSidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-success text-white offcanvas-md offcanvas-start shadow-sm">
                <a href="#" class="navbar-brand"></a>
                <div class="sidebar-heading text-center py-1">
                    <img src="{{ asset('assets/logo/lesson_15399113.png') }}" alt="Heading Image" style="max-width: 50%; height: auto;">
                </div>
                <hr class="mt-2">
                <ul class="mynav nav nav-pills flex-column mb-auto">
                    <li class="nav-item mb-1">
                        <a href="/profile" class="{{ Request::is('profile') ? 'active' : '' }}">
                            <i class="fa-regular fa-user"></i> Profil
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ url('saved-articles') }}" class="{{ Request::is('saved-articles') ? 'active' : '' }}">
                            <i class="fa-regular fa-bookmark"></i> Artikel Tersimpan
                            <span class="notification-badge">5</span>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="/articles" class="{{ Request::is('articles') ? 'active' : '' }}">
                            <i class="fa-regular fa-newspaper"></i> Artikel
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ url('institutions') }}" class="{{ Request::is('institutions') ? 'active' : '' }}">
                            <i class="fa-solid fa-archway"></i> Institusi
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ url('organizations') }}" class="{{ Request::is('organizations') ? 'active' : '' }}">
                            <i class="fa-solid fa-graduation-cap"></i> Organisasi
                        </a>
                    </li>
                    
                    <li class="sidebar-item nav-item mb-1">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#settings" aria-expanded="false" aria-controls="settings">
                            <i class="fas fa-cog pe-2"></i>
                            <span class="topic">Pengaturan </span>
                        </a>
                        <ul id="settings" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="fas fa-sign-in-alt pe-2"></i>
                                    <span class="topic"> Login</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="fas fa-user-plus pe-2"></i>
                                    <span class="topic">Registrasi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="fas fa-sign-out-alt pe-2"></i>
                                    <span class="topic">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="d-flex">
                    <i class="fa-solid fa-book me-2 mt2"></i>
                    <span>
                        <h6 class="mt-1 mb-0">
                            Portal Pembelajaran Geeks for Geeks
                        </h6>
                    </span>
                </div>
            </div>
            <div class="bg-light flex-fill">
                <div class="p-2 d-md-none d-flex text-white bg-success">
                    <a href="#" class="text-white" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    <span class="ms-3">GFG Portal</span>
                </div>
                <main class="p-4">
                    <nav style="--bs-breadcrumb-divider:'>';font-size:14px">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="fa-solid fa-house"></i>
                            </li>
                            <li class="breadcrumb-item">Konten Pembelajaran</li>
                            <li class="breadcrumb-item">Halaman Berikutnya</li>
                        </ol>
                    </nav>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p>Konten halaman di sini</p>
                        </div>
                    </div>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>