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
        <div class="menu">
            <nav>
                <ul>
                    <img src="{{ asset('build/assets/img/logo_next_job.svg') }}" alt="Next Job" class="logo logo_no_extendido">
                    <img src="{{ asset('build/assets/img/logo_next_job_ext.svg') }}" alt="Next Job" class="logo logo_extendido">
                    <li class="empleo"><a href="/empleo">Empleo</a></li>
                    <li class="empresas"><a href="/empresas">Empresas</a></li>
                    <li class="acceder"><a href="/login">Acceder</a></li>
                    <i class="fa-solid fa-bars icono_menu"></i>
                </ul>
                <div class="contenedor_vector">
                    <div class="vector_borde_gris"></div>
                    <div class="vector_borde_azul"></div>
                </div>
            </nav>
        </div>
    </body>
</html>