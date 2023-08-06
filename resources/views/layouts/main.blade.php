<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/02.png') }}" />
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/core/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/core/bootstrap-icon/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/core/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/core/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/core/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/core/css/style.css') }}">
    <!-- Livewire -->
    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    {{-- Removed the login and register routes --}}
                    @else   
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- {{ Auth::user()->name }} --}}
                            <i class="bi bi-person-circle"></i>
                        </a>
                
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
                            </a>
                
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
     @auth   
        <button class="sidebar-collapse-mini d-xl-none d-block"><i class="bi bi-list"></i></button>
        <!-- main sidebar -->
        <div class="fixed-sidebar sidebar-mini">
            <div class="logo">
                <button class="sidebar-collapse"><i class="bi bi-list"></i></button>
                <a href="/">UMG</a>
            </div>
            <x-menuSidebar />
        </div>
    @endauth
    <!-- main sidebar -->
    <div class="main-content">
        <div class="row g-10">
        <div class="col-xl-12 col-lg-12">
                @yield('content')
        </div>
        </div>
        </div>
    </div>

    @livewireScripts
    <!-- Scripts -->

    <script>
        function confirmRestore() {
            return confirm("Voulez-vous vraiment restaurer tous les candidats ?");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/core/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/core/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/core/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/core/js/main.js') }}"></script>

    <script src="{{ asset('assets/core/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/core/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/core/js/datatables-init.js') }}"></script>
    @include('sweetalert::alert')
    @stack('scripts')
</body>
</html>
