<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mimi Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/home">
                    Mimi Shop
                </a>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            <span class="navbar-text">
                                Welcome
                                {{Auth::user()->name}} !
                                {{Carbon\Carbon::now()}}
                            </span>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if(Auth::check())
                            @if (Auth::user()->isUser())
                                <li class="nav-item">
                                    <a class="nav-link" href="/create-feedback">Feedback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/manage-cart">Cart</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/manage-transaction">Transaction</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/profile">Profile</a>
                                </li>
                            @endif
                            @if (Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="/manage-feedback">Feedback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/manage-user">Manage User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/manage-figure">Manage Figure</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/manage-category">Manage Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/all-transaction">Transaction</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/profile">Profile</a>
                                </li>
                            @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="/logout">Logout</a>
                                </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
