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
    <body class="full-height">
        <script type="text/javascript" src="/js/lib.js"></script>
        <div class="container-fluild full-height">
            @yield('content')
        </div>
    </body>
</html>
