<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset("css/index.css") }}">
        @yield('css_block')
    </head>
    <body>
        <div class="container">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </body>
</html>
