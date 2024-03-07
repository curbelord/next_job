<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css') }}">
        <title>Header</title>
    </head>

    <body>
        <div class="menu">
            <nav>
                <ul>
                    <img src="{{ asset('build/assets/img/logo_next_job_ext.svg') }}" alt="Next Job" class="logo">
                    <li class="empleo"><a href="/empleo">Empleo</a></li>
                    <li class="empresas"><a href="/empresas">Empresas</a></li>
                    <li class="acceder"><a href="/login">Acceder</a></li>
                </ul>
                <div class="vector"></div>
            </nav>
        </div>
    </body>
</html>