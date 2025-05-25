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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
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

        <div class="row m-1">
            {{-- sidebar --}}
            <nav class="col-2 p-1 sticky-top" style="height: fit-content;">
                <h1 class="h4 py-3 text-center">
                    <a href="{{ url('/')}}" class="text-decoration-none text-secondary"><i class="fa-solid fa-user-tie"></i> Admin</a>
                </h1>
                <div class="list-group text-center text-lg-start mx-2 mb-4">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>Master Data</small>
                    </span>
                    <a href="{{ url('/admin/users') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/users*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-user-group"></i>
                    <span class="d-none d-lg-inline ms-2">Users</span>
                    </a>
                    <a href="{{ url('/admin/states') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/states*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <span class="d-none d-lg-inline ms-2">States</span>
                    </a>
                    <a href="{{ url('/admin/towns') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/towns*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-location-dot"></i>
                    <span class="d-none d-lg-inline ms-2">Towns</span>
                    </a>
                    <a href="{{ url('/admin/days') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/days*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="d-none d-lg-inline ms-2">Days</span>
                    </a>
                    <a href="{{ url('/admin/day-periods') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/day-periods*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-clock"></i>
                    <span class="d-none d-lg-inline ms-2">Day Periods</span>
                    </a>
                    <a href="{{ url('/admin/grades') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/grades*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-list-ol"></i>
                    <span class="d-none d-lg-inline ms-2">Grades</span>
                    </a>
                    <a href="{{ url('/admin/subjects') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/subjects*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-book"></i>
                    <span class="d-none d-lg-inline ms-2">Subjects</span>
                    </a>
                </div>
                <div class="list-group text-center text-lg-start mx-2 mb-4">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>Teacher</small>
                    </span>
                    <a href="{{ url('/admin/teachers/') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/teachers*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <span class="d-none d-lg-inline ms-2">Teachers</span>
                    </a>
                    <a href="{{ url('/admin/teacher-details') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/teacher-details*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="d-none d-lg-inline ms-2">Details</span>
                    </a>
                    <a href="{{ url('/admin/certificates') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/certificates*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-award"></i>
                    <span class="d-none d-lg-inline ms-2">Certificates</span>
                    </a>
                    <a href="{{ url('/admin/available-towns') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/available-towns*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-location-dot"></i>
                    <span class="d-none d-lg-inline ms-2">Available Towns</span>
                    </a>
                    <a href="{{ url('/admin/days-and-periods') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('days-and-periods*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span class="d-none d-lg-inline ms-2">Days & Periods</span>
                    </a>
                    <a href="{{ url('/admin/grades-and-subjects') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/grades-and-subjects*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-book"></i>
                    <span class="d-none d-lg-inline ms-2">Grades & Subjects</span>
                    </a>
                    <a href="{{ url('/admin/classes') }}" class="list-group-item list-group-item action text-secondary fs-5 {{ Request::is('admin/classes*') ? 'bg-secondary text-light' : 'text-secondary' }}">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="d-none d-lg-inline ms-2">Classes</span>
                    </a>
                </div>
                
            </nav>

            {{-- main content --}}
            <main class="col-10 bg-light py-4">
                @yield('content')
            </main>

        </div>
    </div>
    @stack('scripts')
</body>
</html>
