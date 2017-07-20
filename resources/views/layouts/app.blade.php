<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Danero - @yield('title')</title>

        <!-- STYLES -->
        
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/home.css" rel="stylesheet">

        <script src="/js/app.js"></script>
        <script src="/js/danero.js"></script>
    </head>
    <body>
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <p class="title"><a href="{{ route('home') }}">Daner</a><a href="/login">o</a></p>
                    <p class="sub-title">@yield('sub-title')</p>
                </div>
                
                @yield('content')
            </div>
        </div>
    </body>
</html>
