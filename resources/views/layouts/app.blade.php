<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="{{ asset('assets/js/color-modes.js') }}" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="BEZARA Florent - https://gasycoder.com">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/02.png') }}" />
    <meta property="og:url" content="https://www.bacc.univ-mahajanga.edu.mg" />
    <meta property="og:image" content="https://bacc.univ-mahajanga.edu.mg/assets/img/02.png">
    <meta name="keywords"
        content="Région Boeny, Éducation à Madagascar, Mesupres, session 2023, Office du Bacc à Mahajanga, 
        Résultat en ligne, Baccalauréat Malagasy, 
        Madagascar, Université de Mahajanga">
    <meta name="description" content="Résultats du Baccalauréat en ligne année 2023 - Université de Mahajanga">
    <meta property="og:description"
        content="Résultats officiels de l'examen du Baccalauréat année 2023 - Université de Mahajanga" />
    <meta property="og:subject"
        content="Résultats du Baccalauréat, Baccalauréat 2023, examen Baccalauréat 2023, Baccalauréat, Université de Mahajanga, Résultats en ligne" />
    <meta name="location" content="Mahajanga, MADAGASCAR" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <meta name="theme-color" content="#4b17ae">
    {{-- Analytics here --}}
    @livewireStyles
</head>
<body>
    <div class="col-lg-6 mx-auto p-4 py-md-5">
    <x-darkMode />   
    <header class="d-flex align-items-center justify-content-between pb-3 mb-5 border-bottom">
        <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
            <img src="{{asset('assets/img/02.png')}}" class="bi me-2" width="40" height="32" alt="">
            <span class="fs-4">{{__('Université de Mahajanga')}}</span>
        </a>
        <div>
            <a href="#" class="btn btn-primary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook"
                    viewBox="0 0 16 16">
                    <path
                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
            </a>
        </div>
    </header>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <small class="d-block mb-3 ttext-muted">{{__('© Université de Mahajanga - 2023 | DTIC | DOB')}}</small>
            @guest
            @else
            <ul class="list-unstyled d-flex">
                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <a href="{{route('panel')}}" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear"
                        viewBox="0 0 16 16">
                        <path
                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z">
                        </path>
                    </svg>
                </a>
                </div>
            </ul>
            @endguest
        </div>
    </div>  
    @livewireScripts
    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>