<p align="center">
    <img src="public/build/assets/img/logo_next_job_ext.svg" width="400" alt="Next Job Logo">
</p>

<p align="center">
    Plataforma de búsqueda de empleo
</p>

___

## Acerca de Next Job

Next Job es una plataforma diseñada para simplificar la búsqueda de empleo y optimizar los procesos de contratación. Además, ofrece una interfaz sencilla y fácil de usar, con herramientas que mejoran la gestión de los procesos de contratación. Su objetivo es proporcionar una experiencia eficiente y transparente tanto para los buscadores de empleo como para los seleccionadores.

## Características

Entre las características principales de Next Job se incluyen:

- 🔎 **Búsqueda Avanzada:** Los usuarios pueden buscar empleos utilizando filtros como ubicación 📍, sector 🏗️, salario 💵, tipo de contrato 📄, nivel de experiencia 📅, entre otros.

- **Creación de Perfiles:** Los buscadores de empleo pueden crear perfiles que incluyan su experiencia laboral, educación, habilidades y otros detalles relevantes para que los empleadores los encuentren más fácilmente.

- 💼 **Publicación de Ofertas de Empleo:** Las empresas pueden publicar ofertas de empleo detalladas, incluyendo descripciones del puesto, requisitos, responsabilidades y beneficios.

## Innovaciones

Novedades que implementa Next Job:

- 🔎 **Autocandidaturas:** Next Job automatiza la gestión de ofertas temporales, agilizando el proceso tanto para los seleccionadores como para los candidatos. Esto garantiza una respuesta oportuna a las solicitudes y actualizaciones relacionadas con las ofertas de empleo.

- 👁️🔒 **CV ciegos:** Para promover la igualdad de oportunidades, Next Job ofrece la opción de CV ciegos en cada oferta de empleo. Esto permite que los candidatos apliquen sin revelar información personal que pueda generar prejuicios o discriminación.


## Futuras Implementaciones

- 🚨 **Alertas de Empleo:** Los usuarios pueden configurar alertas para recibir notificaciones por correo electrónico o mensajes cuando se publiquen ofertas de empleo que coincidan con sus criterios de búsqueda.

- 📬 **Sistema de Mensajería:** Facilita la comunicación entre empleadores y candidatos, permitiéndoles intercambiar información adicional y coordinar entrevistas.

- 🕵🏻‍♀️ **Analítica y Seguimiento:** Las empresas pueden utilizar herramientas de análisis para realizar un seguimiento del rendimiento de sus publicaciones de empleo y evaluar la efectividad de sus estrategias de contratación.

- Implementación de un calendario integrado para gestionar entrevistas y eventos de reclutamiento. Esta función facilita la organización y coordinación de actividades relacionadas con el proceso de contratación.

- Next Job cuenta con una sección especializada y destinada a tutores de prácticas de FP, donde pueden acceder fácilmente a información sobre empresas adheridas a programas de formación así como a empresas de nuevo ingreso dispuestas a acoger a estudiantes en prácticas.

- Integración de un sistema de chat que permite la comunicación directa entre demandantes de empleo y seleccionadores. Esta herramienta facilita la interacción y la resolución de dudas en tiempo real durante el proceso de selección.

- Cada oferta de empleo en Next Job incluye un foro de preguntas donde los candidatos pueden plantear sus inquietudes. Con la finalidad de fomentar la transparencia y proporcionar información adicional sobre las oportunidades laborales.

- Además, los demandantes de empleo también podrán observar la compatibilidad de la oferta con su CV.

## Instalación

Clone el repositorio
~~~
git clone https://github.com/curbelord/next_job.git
~~~
Muévase al directorio ǹext_job
~~~
cd next_job
~~~
Instale las dependencias con Composer
~~~
composer install
~~~
Haga una copia de `.env.example` y renombrélo como `.env`
~~~
cp .env.example .env
~~~
Genere una nueva clave
~~~
php artisan key:generate
~~~
Configure la base de datos con los siguientes parámetros y modifique el archivo `.env`
~~~
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=next_job
DB_USERNAME=laravel
DB_PASSWORD=password
~~~
Ejecute las migraciones
~~~
php artisan migrate --seed
~~~
Ejecute los seeders

Active el servidor
~~~
php artisan serve
~~~
## Documentación

**[Diagrama Entidad-Relación](https://www.figma.com/file/1tRa2b5FSW4VuoCMJRVAvG/Diagrama-Entidad-Relaci%C3%B3n?type=whiteboard&node-id=0%3A1&t=kTCtA2pTPIE0xrOd-1)**

**[Diagrama de caso de Uso](https://docs.google.com/document/d/1k_FPWJaiBh6g11-L8nAPHnMrsvgE6CryUoKjP_H95-E/edit?usp=sharing)**

**[Diagrama de caso de Uso](https://docs.google.com/document/d/1k_FPWJaiBh6g11-L8nAPHnMrsvgE6CryUoKjP_H95-E/edit?usp=sharing)**

**[Guía de instalación de los recursos necesarios](https://docs.google.com/document/d/1bUNrxmiI227XMSrMRrBsugIw1gLHGQecDdysPuhjTB4/edit?usp=sharing)**

**[Prototipo Figma](https://www.figma.com/file/IBgdRkwBNz9d0NIPzp5gN9/Next-Job?type=design&mode=design&t=ELzEGLpZiXastLko-1)**

## Pruebas Unitarias

- Aquí iría alguna explicación

## Presentación YouTube

- Enlace a vídeo de YouTube

## Otros recursos

- Otros recursos si los hubiera

<br>

> Hecho por Diego Curbelo Rodríguez y Acaymo Xerach Viciana Farias 🩵
