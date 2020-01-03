<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Consultations') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('home')}}">Consultations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-lg-2">
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column text-center" style="font-size: 1.2rem">
                    <li class="nav-item {{substr_compare(request()->route()->getName(), 'consultations', 0, 13, true) === 0 ? 'bg-dark' : ''}}">
                        <a class="nav-link {{substr_compare(request()->route()->getName(), 'consultations', 0, 13, true) === 0 ? 'text-white' : ''}}"
                           href="{{route('consultations.index')}}">
                            <i class="fa fa-calendar"></i> Consultations
                        </a>
                    </li>
                    <li class="nav-item {{substr_compare(request()->route()->getName(), 'enrollments', 0, 11, true) === 0 ? 'bg-dark' : ''}}">
                        <a class="nav-link {{substr_compare(request()->route()->getName(), 'enrollments', 0, 11, true) === 0 ? 'text-white' : ''}}"
                           href="{{route('enrollments.index')}}">
                            <i class="fa fa-align-center"></i> Enrollments
                        </a>
                    </li>
                    <li class="nav-item {{substr_compare(request()->route()->getName(), 'students', 0, 8, true) === 0 ? 'bg-dark' : ''}}">
                        <a class="nav-link {{substr_compare(request()->route()->getName(), 'students', 0, 8, true) === 0 ? 'text-white' : ''}}"
                           href="{{route('students.index')}}">
                            <i class="fa fa-graduation-cap"></i> Students
                        </a>
                    </li>
                    <li class="nav-item {{substr_compare(request()->route()->getName(), 'professors', 0, 10, true) === 0 ? 'bg-dark' : ''}}">
                        <a class="nav-link {{substr_compare(request()->route()->getName(), 'professors', 0, 10, true) === 0 ? 'text-white' : ''}}"
                           href="{{route('professors.index')}}">
                            <i class="fa fa-user"></i> Professors
                        </a>
                    </li>
                    <li class="nav-item {{substr_compare(request()->route()->getName(), 'subjects', 0, 8, true) === 0 ? 'bg-dark' : ''}}">
                        <a class="nav-link {{substr_compare(request()->route()->getName(), 'subjects', 0, 8, true) === 0 ? 'text-white' : ''}}"
                           href="{{route('subjects.index')}}">
                            <i class="fa fa-book"></i> Subjects
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

@yield('custom_scripts')
</body>
</html>
