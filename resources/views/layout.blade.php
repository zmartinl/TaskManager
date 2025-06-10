<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        @include('components.css')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
    </head>
    <body>
        @include('components/nav')

        <div class="container">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/validation.js') }}"></script>
    </body>
</html>