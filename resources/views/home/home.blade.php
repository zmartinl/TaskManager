<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        @include('components.css')
    </head>
    <body>
        @include('components/nav')
        @yield('content')
        
    </body>
</html>