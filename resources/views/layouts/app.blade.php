<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--title>{{-- config('app.name', 'Laravel') --}}</title-->
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">
        @yield('style')

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- ANTES ERA ASÍ: ['resources/css/app.css', 'resources/js/app.js'] 
        SE ELIMINAN LOS ESTILOS PREDETERMINADOS DE LARAVEL -->
        @vite('resources/js/app.js')
    </head>

    <body>

        <div>
            @include('layouts.navigation')
        </div>

        {{ $slot }}

        <div>
            @include('components.footer')
        </div>

    </body>
</html>
