<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- styles -->
        <link href="/css/lib.css" rel="stylesheet">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EBiller') }}</title>
    </head>
    <body>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="/js/lib.js"></script>

        <!--Main Navigation-->
        <header>

            <!-- Navbar -->
            <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
                <div class="container">

                    <a class="navbar-brand waves-effect" href="/">
                        <strong class="blue-text">Ebiller</strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    @if (isset($tab))
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link waves-effect {{ $tab === 'home' ? ' ' : ' text-muted'}}" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect {{ $tab === 'bills' ? 'active' : ' text-muted'}}" href="/bills">Bills</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link waves-effect {{ $tab === 'accounts' ? 'active' : ' text-muted'}}" href="/accounts">Accounts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect {{ $tab === 'files' ? 'active' : ' text-muted'}}" href="/files">Files</a>
                            </li>
                        </ul>
                    </div>
                    @endif

                    <!-- Authentication Links -->
                    @guest
                        
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu">
                                    <a href="{{ route('logout') }}"
                                        class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </li>
                    @endguest

                </div>
            </nav>

        </header>

        <main class="mt-5 pt-5">
            <div class="container-fluild">
                @yield('content')
            </div>
        </main>
    </body>
</html>
