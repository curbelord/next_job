<?php
    $title = 'Estudios';
    $tipo = 'estudio';
    $centro = 'Centro de estudios';
?>
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
            <title>Header</title>
        </head>

        <body>

            <div class="contenedor_estudios_experiencia">

                <div class="contenedor_titulo">
                    <h1>{{ $title }}</h1>
                </div>

                <div class="contenedor_input">
                    <input type="text" name="{{ $title }}" id="{{ $title }}" placeholder="Nombre {{ $tipo }}">
                    <input type="text" name="{{ $centro }}" id="{{ $centro }}" placeholder="{{ $centro }}">
                    <input type="date" name="anho_inicio_{{ $title }}" id="anho_inicio_{{ $title }}" placeholder="anho_inicio_{{ $title }}">
                    <input type="date" name="anho_fin_{{ $title }}" id="anho_fin_{{ $title }}" placeholder="anho_fin_{{ $title }}">
                </div>

            </div>

        </body>
    </html>