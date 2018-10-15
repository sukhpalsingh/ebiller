<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- styles -->
        <link href="/css/lib.css" rel="stylesheet">

        <title>Ebiller</title>
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ $tab === 'home' ? 'active' : ''}}">
                                <a class="nav-link waves-effect" href="/">Home</a>
                            </li>
                            <li class="nav-item {{ $tab === 'bills' ? 'active' : ''}}">
                                <a class="nav-link waves-effect" href="/bills">Bills</a>
                            </li>
                            <li class="nav-item {{ $tab === 'accounts' ? 'active' : ''}}">
                                <a class="nav-link waves-effect" href="/accounts">Accounts</a>
                            </li>
                            <li class="nav-item {{ $tab === 'files' ? 'active' : ''}}">
                                <a class="nav-link waves-effect" href="/files">Files</a>
                            </li>
                        </ul>
                    </div>

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
