<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Demandes de Documents')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Include additional CSS files here -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
    <!-- DataTable CSS  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <style>
    body {
        background-color: #fbfbfb;
    }

    @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
        }
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
    }

    .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }
    </style>
</head>

<body>
    <div id="app">

        <!-- Navigation Bar -->
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">

                    @if(Auth::check() && Auth::user()->hasRole('communication|Admin'))
                    <a href="/service-communication"
                        class="list-group-item list-group-item-action py-2 {{ Request::is('service-communication') ? 'active' : '' }}"
                        data-mdb-ripple-init aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Communication</span>
                    </a>
                    @endif
                    @if(Auth::check() && Auth::user()->hasRole('Admin'))
                    <div class="btn-group shadow-0 mb-2 dropend">
                        <button type="button" class="list-group-item list-group-item-action py-2 dropdown-toggle"
                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false"><i
                                class="fas fa-users fa-fw me-3"></i><span>Scolarité</span></a>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ Request::is('users') ? 'active' : '' }}"
                                    href="{{ route('students.list') }}">Liste d'inscriptions</a></li>
                            <li><a class="dropdown-item {{ Request::is('roles') ? 'active' : '' }}"
                                    href="{{ route('roles.index') }}">Manage Role</a></li>
                        </ul>
                    </div>
                    @endif
                    @if(Auth::check() && Auth::user()->hasRole('Admin'))
                    <div class="btn-group shadow-0 mb-2 dropend">
                        <button type="button" class="list-group-item list-group-item-action py-2 dropdown-toggle"
                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false"><i
                                class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ Request::is('users') ? 'active' : '' }}"
                                    href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="dropdown-item {{ Request::is('roles') ? 'active' : '' }}"
                                    href="{{ route('roles.index') }}">Manage Role</a></li>
                        </ul>
                    </div>
                    @endif

                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label=aria-label="{{ __('Toggle navigation') }}>
                        <i class=" fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/Logo-SupMTI-s-2024.png') }}" height="40" alt="" loading="lazy" />
                </a>


                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->

                    <!-- Icon dropdown -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
                                id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge rounded-pill badge-notification bg-danger">1</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Some news</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest

            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->

        <!-- Main Content -->
        <main style="margin-top: 5px">
            <div class="container pt-4">
                <div class="container mt-5">
                    <!-- Main Content -->
                    @yield('content')
                </div>
            </div>
        </main>



        <!-- JavaScript files -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js">
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
        <script>
        $("#example").DataTable({
            responsive: true,
        });
        </script>


        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Add any additional JavaScript files here -->
    </div>
</body>
<!-- Footer -->
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">

    </div>
</footer>

</html>