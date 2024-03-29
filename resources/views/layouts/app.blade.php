<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    

    {{-- {{ HTML::style('css/style.css'); }} --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css')}}">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                     
                        <a href="{{ url('/') }}" class="nav-link ">Home</a>
                        <a href="{{ url('/about') }}" class="nav-link ">About</a>
                        <a href="{{ url('/viewblog') }}" class="nav-link ">Blog</a>
                        <a href="{{ url('/project_home') }}" class="nav-link ">Project</a>
                        <a href="{{ url('/team') }}" class="nav-link ">Team</a>
                        <a href="{{ url('/contact-us') }}" class="nav-link ">Contact Us</a>
                        <a href="{{ url('/news/view') }}"  class="nav-link ">News</a>
                        <a href="{{ route('login') }}" class="nav-link ">Login</a>
                        <a href="{{ route('register') }}" class="nav-link ">Register</a>
               
                        @endif  

                        @else
                        <a href="{{ url('/') }}" class="nav-link ">Home</a>
                        <a href="{{ url('/about') }}"  class="nav-link ">About</a>
                        <a href="{{ url('/viewblog') }}"  class="nav-link ">Blog</a>
                        <a href="{{ url('/project_home') }}"  class="nav-link ">Project</a>
                        <a href="{{ url('/team') }}"  class="nav-link ">Team</a>
                        <a href="{{ url('/contact-us') }}"  class="nav-link ">Contact Us</a>
                        <a href="{{ url('/news/view') }}"  class="nav-link ">News</a>
                        <li><a class="nav-link" href="{{ url('/users') }}">Manage Users</a></li>
                        <li><a class="nav-link" href="{{ url('/roles') }}">Manage Role</a></li>

                            <li class="nav-item dropdown">
                                   
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if ($message = Session::get('Danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'description' );
        </script>
</body>
</html>
