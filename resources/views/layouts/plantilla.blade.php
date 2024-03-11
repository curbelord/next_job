<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">
        <title>@yield('title')</title>
        @vite('resources/js/app.js')

        @yield('style')

    </head>

    <body>

        <div>
            @include('components.header')
        </div>

        <div class="container">
            @yield('content')
        </div>

        <div>
            @include('components.footer')
        </div>
    </body>

</html>
