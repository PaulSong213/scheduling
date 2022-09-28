<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js">
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Manuyo Dos</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.jpg">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <style>
        .profile-container {
            width: 30px;
            height: 30px;
            overflow: hidden;
            border-radius: 100px;
            position: relative;
        }

        .profile-image {
            position: absolute;
            min-width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        .w-max {
            width: max-content;
        }

        .message {
            border-radius: 0.4rem;
            border: 1px rgba(0, 0, 0, 0.1) solid;
            margin: 1rem 0;
            padding: 0.5rem;
            font-weight: 700;
        }

        .message-error {
            background-color: rgba(224, 99, 99, 0.6);
        }
    </style>
    <!-- CSS only -->

    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div id="app" class="min-vh-100 d-flex flex-column">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex gap-2" href="{{ url('/') }}">
                    <img style="height: 2rem" src="/images/logo.jpg">
                    <span class="d-block my-auto">Manuyo Dos</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::guard('web')->check())
                            {{-- User authenticated --}}
                            <li class="nav-item dropdown d-flex" id="navbarDropdown">
                                <div class="shadow-sm border profile-container my-auto">
                                    <img class="profile-image" src="/storage/{{ Auth::user()->profile_filename }} " />
                                </div>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle my-auto" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
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
                        @elseif(Auth::guard('official')->check())
                           
                            {{-- Official authenticated --}}
                            <li class="nav-item dropdown d-flex" id="navbarDropdown">
                                <div class="shadow-sm border profile-container my-auto">
                                    <img class="profile-image"  src="{{ str_replace("public","storage", Auth::guard('official')->user()->profile_filename ) }}" /> />
                                </div>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle my-auto" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::guard('official')->user()->first_name . ' ' . Auth::guard('official')->user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logoutOfficial') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form-official').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form-official" action="{{ route('logoutOfficial') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('residentRegister') }}">{{ __('Register') }}</a>
                            </li>
                        @endif




                    </ul>
                </div>
            </div>
        </nav>

        <main style="height: 100%" class="flex-grow-1 d-flex">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    @yield('script')
    @livewireScripts

</body>

</html>
