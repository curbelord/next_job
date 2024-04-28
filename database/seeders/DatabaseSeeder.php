<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Demandante;
use App\Models\Empresa;
use App\Models\Seleccionador;
use App\Models\CV;
use App\Models\Estudios;
use App\Models\Experiencia;
use App\Models\Oferta;
use App\Models\Inscripcion;
use App\Models\Estado;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // USUARIOS

        User::create([
            'id' => 1,
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1990-05-15',
            'direccion' => 'Calle Mayor 123',
            'email' => 'juan@gmail.com',
            'telefono' => '+123456789',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 2,
            'nombre' => 'Maria',
            'apellidos' => 'Gonzalez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1995-08-25',
            'direccion' => 'Avenida Central 456',
            'email' => 'maria@gmail.com',
            'telefono' => '+987654321',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 3,
            'nombre' => 'Carlos',
            'apellidos' => 'Rodriguez',
            'genero' => 'Otro',
            'fecha_nacimiento' => '1988-12-10',
            'direccion' => 'Plaza Mayor 789',
            'email' => 'carlos@gmail.com',
            'telefono' => '+111222333',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 4,
            'nombre' => 'Ana',
            'apellidos' => 'Lopez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1992-03-20',
            'direccion' => 'Callejon Oscuro 159',
            'email' => 'ana@gmail.com',
            'telefono' => '+444555666',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 5,
            'nombre' => 'Pedro',
            'apellidos' => 'Martinez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1993-07-30',
            'direccion' => 'Avenida del Sol 3',
            'email' => 'pedro@gmail.com',
            'telefono' => '+777888999',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 6,
            'nombre' => 'Laura',
            'apellidos' => 'Sanchez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1994-09-05',
            'direccion' => 'Calle de la Luna 2',
            'email' => 'laura@gmail.com',
            'telefono' => '+000111222',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 7,
            'nombre' => 'Sara',
            'apellidos' => 'Garcia',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1996-11-15',
            'direccion' => 'Paseo de las Flores 17',
            'email' => 'sara@gmail.com',
            'telefono' => '+333444555',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 8,
            'nombre' => 'Javier',
            'apellidos' => 'Fernandez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1997-01-25',
            'direccion' => 'Camino del Bosque 1',
            'email' => 'javier@gmail.com',
            'telefono' => '+666777888',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 9,
            'nombre' => 'Carmen',
            'apellidos' => 'Jimenez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1998-04-05',
            'direccion' => 'Boulevard de la Montaña 19',
            'email' => 'carmen@gmail.com',
            'telefono' => '+999000111',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 10,
            'nombre' => 'Antonio',
            'apellidos' => 'Ruiz',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1999-06-15',
            'direccion' => 'Plaza de la Libertad 85',
            'email' => 'antonio@gmail.com',
            'telefono' => '+222333444',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 11,
            'nombre' => 'Pepe',
            'apellidos' => 'Gonzalez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1999-06-15',
            'direccion' => 'Rua da Praia 50',
            'email' => 'pepe@gmail.com',
            'telefono' => '+666600600',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 12,
            'nombre' => 'María',
            'apellidos' => 'Strauss',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1996-02-13',
            'direccion' => 'Calle Alcalá 2',
            'email' => 'mariastrauss@gmail.com',
            'telefono' => '+666601601',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 13,
            'nombre' => 'José Ignacio',
            'apellidos' => 'Ramírez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1990-08-24',
            'direccion' => 'Calle Rosaleda 19',
            'email' => 'joseignaciora@gmail.com',
            'telefono' => '+666602602',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 14,
            'nombre' => 'Magdalena',
            'apellidos' => 'De los Santos',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1983-03-02',
            'direccion' => 'Calle Rodeos 4',
            'email' => 'magdasantos@gmail.com',
            'telefono' => '+666603603',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 15,
            'nombre' => 'Rodrigo',
            'apellidos' => 'Fuentes',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1997-11-28',
            'direccion' => 'Calle Manzanares 84',
            'email' => 'rodrigofuentes@gmail.com',
            'telefono' => '+666604604',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 16,
            'nombre' => 'Jimena',
            'apellidos' => 'Barrios',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1992-07-16',
            'direccion' => 'Calle Esquina del Pensador 25',
            'email' => 'jimenabarrios@gmail.com',
            'telefono' => '+666605605',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 17,
            'nombre' => 'Roberto',
            'apellidos' => 'Martínez',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1985-05-12',
            'direccion' => 'Avenida Principal 123',
            'email' => 'robertomartinez@example.com',
            'telefono' => '+123412341',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'id' => 18,
            'nombre' => 'Laura',
            'apellidos' => 'García',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1990-12-28',
            'direccion' => 'Via Roma 8',
            'email' => 'lauragarcia@example.com',
            'telefono' => '+987654541',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 19,
            'nombre' => 'Carlos',
            'apellidos' => 'González',
            'genero' => 'Hombre',
            'fecha_nacimiento' => '1993-08-15',
            'direccion' => 'Calle de la Estrella 12',
            'email' => 'carlosgonzalez@gmail.com',
            'telefono' => '+123456788',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'id' => 20,
            'nombre' => 'María',
            'apellidos' => 'Martínez',
            'genero' => 'Mujer',
            'fecha_nacimiento' => '1995-06-25',
            'direccion' => 'Avenida de los Olivos 34',
            'email' => 'mariamartinez@gmail.com',
            'telefono' => '+987654542',
            'password' => bcrypt('password'),
        ]);

        // DEMANDANTES

        Demandante::create([
            'id' => 1,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 3,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 5,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 7,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 9,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 11,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 12,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 13,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 14,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 15,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 16,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 17,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 18,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 19,
            'checkin' => false,
        ]);

        Demandante::create([
            'id' => 20,
            'checkin' => false,
        ]);

        // EMPRESAS

        Empresa::create([
            'id' => 1,
            'nombre' => 'Next Job',
            'descripcion' => 'Plataforma online de búsqueda de empleo',
            'ubicacion' => 'Arrecife',
            'logo' => 'next_job.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 2,
            'nombre' => 'Innovatech',
            'descripcion' => 'Innovatech es una empresa líder en la industria del entretenimiento digital, especializada en el desarrollo innovador de videojuegos que cautivan a audiencias de todas las edades en todo el mundo. Con un equipo de talentosos diseñadores, programadores y artistas, Innovatech crea experiencias de juego inmersivas que desafían los límites de la imaginación. Desde emocionantes aventuras de acción hasta cautivadores juegos de estrategia, cada título de Innovatech lleva consigo una narrativa única y un diseño visual impresionante que garantiza horas de diversión y entretenimiento para jugadores de todas las plataformas. En Innovatech, estamos comprometidos con la excelencia creativa y la innovación tecnológica, impulsando constantemente los límites de lo que es posible en el mundo del entretenimiento digital. Únete a nosotros en nuestra misión de hacer del mundo de los videojuegos un lugar más emocionante y vibrante para todos.',
            'ubicacion' => 'Teguise',
            'logo' => 'innovatech.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 3,
            'nombre' => 'Cactus',
            'descripcion' => 'Cactus es tu destino para encontrar una amplia variedad de cactus y suculentas de alta calidad. En nuestro vivero, cultivamos y cuidamos con esmero una selección única de cactus, adaptados a diversos entornos y gustos. Ya sea que estés buscando una planta pequeña para decorar tu escritorio o una pieza llamativa para tu jardín, en Cactus encontrarás la opción perfecta. Nuestro equipo está comprometido con brindarte el mejor servicio y asesoramiento para que puedas disfrutar de la belleza y la singularidad de estas fascinantes plantas. ¡Ven a visitarnos y descubre la belleza del mundo de los cactus!"',
            'ubicacion' => 'Yaiza',
            'logo' => 'cactus.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 4,
            'nombre' => 'TecnoSoluciones',
            'descripcion' => 'TecnoSoluciones es tu socio ideal para llevar tu presencia en línea al siguiente nivel. Nos especializamos en el diseño y desarrollo de páginas web de última generación que no solo impresionan visualmente, sino que también ofrecen una experiencia de usuario excepcional. Nuestro equipo de expertos en diseño web y desarrollo web trabaja en estrecha colaboración contigo para entender tus necesidades y objetivos comerciales, creando soluciones personalizadas que reflejen la esencia de tu marca y atraigan a tu audiencia objetivo. Ya sea que necesites una página web corporativa, una tienda en línea o un sitio web interactivo, en TecnoSoluciones tenemos la experiencia y la creatividad para hacer realidad tu visión en línea. ¡Confía en nosotros para llevar tu presencia en Internet al siguiente nivel!',
            'ubicacion' => 'Tías',
            'logo' => 'tecnosoluciones.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 5,
            'nombre' => 'FoodieLand Gourmet',
            'descripcion' => '¡Bienvenido a FoodieLand Gourmet, tu destino gastronómico para sabores innovadores y emocionantes en el mundo de la comida rápida! En FoodieLand, nos enorgullece ofrecer una experiencia culinaria única que combina la conveniencia de la comida rápida con ingredientes frescos y de alta calidad, cuidadosamente seleccionados para deleitar tu paladar. Desde nuestras hamburguesas gourmet hasta nuestras ensaladas frescas y opciones vegetarianas, cada plato en FoodieLand está preparado con pasión y creatividad por nuestro equipo de chefs expertos. Ya sea que estés buscando una comida rápida para llevar o prefieras disfrutar de una experiencia de comida casual en nuestro acogedor comedor, en FoodieLand Gourmet te garantizamos una explosión de sabor en cada bocado. ¡Ven y descubre por qué somos el destino favorito de los amantes de la comida rápida con un toque gourmet!',
            'ubicacion' => 'Tinajo',
            'logo' => 'foodieland_gourmet.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 6,
            'nombre' => 'EcoVerde S.A.',
            'descripcion' => 'En EcoVerde S.A., nos comprometemos a proporcionarte los alimentos más frescos y saludables para nutrir tu cuerpo y cuidar del planeta. Nos especializamos en ofrecer una amplia gama de productos orgánicos y naturales, cuidadosamente seleccionados para garantizar la máxima calidad y sostenibilidad en cada bocado. Desde frutas y verduras frescas hasta productos integrales y superalimentos, en EcoVerde encontrarás todo lo que necesitas para llevar un estilo de vida saludable y consciente. Además de nuestra variedad de productos, nos enorgullece promover prácticas comerciales responsables y respetuosas con el medio ambiente en cada paso de nuestra cadena de suministro. Con EcoVerde, no solo estás comprando alimentos saludables para ti y tu familia, también estás contribuyendo al bienestar del planeta. Únete a nosotros en nuestro compromiso con la salud y la sostenibilidad, ¡y descubre el poder de los alimentos eco-amigables en EcoVerde S.A.!',
            'ubicacion' => 'Arrecife',
            'logo' => 'ecoverde_sa.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 7,
            'nombre' => 'La Parrilla',
            'descripcion' => 'La Parrilla: el lugar donde la carne alcanza su máximo sabor. Disfruta de cortes exquisitos y jugosos, asados a la perfección en nuestra parrilla. Ven y saborea la excelencia en cada bocado.',
            'ubicacion' => 'Arrecife',
            'logo' => 'la_parrilla.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 8,
            'nombre' => 'Pizza rápida',
            'descripcion' => 'En Pizza Rápida, el sabor y la rapidez van de la mano. Nuestras pizzas artesanales se preparan con los ingredientes más frescos y se hornean a la perfección en solo minutos, listas para satisfacer tus antojos en cualquier momento del día. Con una variedad de sabores y opciones personalizables, estamos aquí para brindarte una experiencia deliciosa y conveniente. ¡Ven y disfruta de la mejor pizza en tiempo récord en Pizza Rápida!',
            'ubicacion' => 'Costa Teguise',
            'logo' => 'pizza_rapida.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 9,
            'nombre' => 'Mariscos del Sur',
            'descripcion' => 'En Mariscos del Sur, nos enorgullece ofrecerte una experiencia culinaria costera inigualable. Sumérgete en un festín de sabores marinos frescos y auténticos, cuidadosamente preparados para deleitar tu paladar. Desde exquisitas paellas hasta platos de mariscos a la parrilla, cada bocado en nuestro restaurante te transportará a las aguas del sur con su frescura y sabor incomparables. Nuestro compromiso con la calidad y la excelencia se refleja en cada detalle, desde la selección de ingredientes hasta la presentación de nuestros platos. Descubre la magia del mar en Mariscos del Sur y déjate llevar por una experiencia gastronómica única y deliciosa.',
            'ubicacion' => 'Arrecife',
            'logo' => 'mariscos_del_sur.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 10,
            'nombre' => 'BioHealth Labs',
            'descripcion' => 'BioHealth Labs es líder en análisis clínicos biológicos, comprometido con la precisión, la innovación y el cuidado de la salud. Nuestro laboratorio ofrece una amplia gama de pruebas y servicios de diagnóstico, utilizando tecnología de vanguardia y rigurosos estándares de calidad para garantizar resultados confiables y precisos. Desde pruebas de detección temprana hasta análisis especializados, nuestro equipo de científicos y profesionales médicos está dedicado a proporcionar información crucial para el diagnóstico, tratamiento y prevención de enfermedades. En BioHealth Labs, nuestra misión es mejorar la calidad de vida de nuestros pacientes mediante un enfoque centrado en la ciencia, la tecnología y el bienestar humano.',
            'ubicacion' => 'Arrecife',
            'logo' => 'biohealth_labs.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 11,
            'nombre' => 'Arquitectos Avada',
            'descripcion' => 'Arquitectos Avada es tu socio creativo en el diseño y la construcción de espacios innovadores y funcionales. Con un enfoque centrado en el cliente y un equipo de arquitectos talentosos, estamos dedicados a convertir tus sueños arquitectónicos en realidad. Desde el diseño conceptual hasta la ejecución final, ofrecemos una gama completa de servicios de arquitectura adaptados a tus necesidades y visiones únicas. Ya sea que estés planeando una nueva construcción, una renovación o una remodelación, en Arquitectos Avada te ofrecemos soluciones personalizadas y de calidad que reflejen tu estilo y maximicen el potencial de tus espacios. Confía en nosotros para llevar tus proyectos arquitectónicos al siguiente nivel con creatividad, experiencia y compromiso.',
            'ubicacion' => 'Arrecife',
            'logo' => 'avada_arquitectos.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 12,
            'nombre' => 'LuxeLiving Properties',
            'descripcion' => 'LuxeLiving Properties es tu puerta de entrada al estilo de vida de lujo y la excelencia inmobiliaria. Nos especializamos en la venta y alquiler de propiedades exclusivas, ofreciendo una cartera selecta de residencias de alto standing en ubicaciones privilegiadas. Con un enfoque centrado en el cliente y un equipo de agentes inmobiliarios expertos, estamos dedicados a brindarte un servicio personalizado y una experiencia sin igual en la búsqueda de tu hogar ideal o inversión inmobiliaria. Ya sea que estés buscando una impresionante casa de lujo, un elegante apartamento en la ciudad o una residencia vacacional de ensueño, en LuxeLiving Properties te ofrecemos acceso a las propiedades más exclusivas y deseadas del mercado. Confía en nosotros para hacer realidad tus sueños de vivir con estilo y elegancia.',
            'ubicacion' => 'Yaiza',
            'logo' => 'luxeliving_prop.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 13,
            'nombre' => 'Carpintería astillas',
            'descripcion' => 'Carpintería Astillas es tu destino para la artesanía en madera de calidad y diseño único. Con una pasión arraigada por el trabajo de la madera y décadas de experiencia en el oficio, en Carpintería Astillas nos especializamos en crear muebles y objetos hechos a mano que combinan funcionalidad, belleza y durabilidad. Desde muebles a medida hasta piezas decorativas, cada artículo que sale de nuestro taller lleva consigo el cuidado artesanal y la atención al detalle que nos distingue. En Carpintería Astillas, creemos en la madera como un material vivo que merece ser tratado con respeto y maestría, por lo que nos esforzamos por utilizar prácticas sostenibles y materias primas de origen responsable en todos nuestros proyectos. Descubre la calidez y el encanto de la madera trabajada a mano en Carpintería Astillas, donde cada pieza cuenta una historia única y perdurable.',
            'ubicacion' => 'Arrecife',
            'logo' => 'carpinteria_astillas.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 14,
            'nombre' => 'MediaMotion Studios',
            'descripcion' => 'MediaMotion Studios es tu socio creativo en el mundo audiovisual. Nos especializamos en la producción de contenido visual dinámico y cautivador que impulsa la narrativa y la experiencia del espectador. Desde producciones cinematográficas hasta proyectos comerciales y de marketing, nuestro equipo de talentosos cineastas, editores y diseñadores trabaja en estrecha colaboración contigo para dar vida a tu visión con creatividad y profesionalismo. En MediaMotion Studios, combinamos tecnología de vanguardia con un enfoque artístico para crear contenido que destaque en un mercado saturado. Ya sea que estés buscando contar una historia, promocionar tu marca o capturar momentos inolvidables, en MediaMotion Studios te ofrecemos las herramientas y la experiencia para hacerlo realidad. ¡Confía en nosotros para llevar tus proyectos audiovisuales al siguiente nivel con pasión y precisión!',
            'ubicacion' => 'Arrecife',
            'logo' => 'mediamotion_studios.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 15,
            'nombre' => 'AeroTech Dynamics',
            'descripcion' => 'AeroTech Dynamics es un líder en innovación y excelencia en el campo de la ingeniería aeroespacial. Nos dedicamos al diseño, desarrollo y fabricación de tecnologías avanzadas para la industria aeroespacial y de defensa. Con un equipo de ingenieros altamente capacitados y apasionados por el vuelo, estamos comprometidos en impulsar los límites de la tecnología aeroespacial para crear soluciones eficientes y seguras. Desde sistemas de propulsión hasta componentes estructurales y sistemas de control, en AeroTech Dynamics combinamos experiencia técnica con creatividad para ofrecer productos y servicios que cumplen con los más altos estándares de calidad y rendimiento. Nuestro compromiso con la innovación y la excelencia nos impulsa a continuar liderando el camino hacia el futuro de la aviación y el espacio. En AeroTech Dynamics, volamos alto para alcanzar nuevos horizontes en la exploración del cielo y el espacio.',
            'ubicacion' => 'Arrecife',
            'logo' => 'aerotech_dynamics.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 16,
            'nombre' => 'Pinturas Lanzarote',
            'descripcion' => 'Pinturas Lanzarote es tu aliado en el mundo del color y la creatividad. Nos especializamos en ofrecer una amplia gama de productos y servicios relacionados con la pintura, tanto para proyectos residenciales como comerciales. Desde pinturas de alta calidad hasta herramientas y accesorios especializados, en Pinturas Lanzarote te proporcionamos todo lo necesario para embellecer y proteger tus espacios. Nuestro equipo de expertos en color y diseño está aquí para asesorarte en cada paso del proceso, desde la selección de colores hasta la aplicación de técnicas decorativas. Ya sea que estés renovando tu hogar, embelleciendo tu negocio o realizando proyectos de arte y decoración, en Pinturas Lanzarote te ofrecemos soluciones creativas y duraderas que superan tus expectativas. ¡Descubre el poder del color con nosotros y dale vida a tus ideas!',
            'ubicacion' => 'Arrecife',
            'logo' => 'pinturas_lanzarote.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 17,
            'nombre' => 'Reformas Cuadrado',
            'descripcion' => 'En Reformas Cuadrado nos dedicamos a convertir tus espacios en verdaderos hogares. Con años de experiencia en el sector de la construcción y las reformas, ofrecemos servicios integrales para renovar y mejorar todo tipo de viviendas y locales comerciales. Desde pequeñas reformas hasta proyectos de rehabilitación completa, nuestro equipo de profesionales altamente cualificados trabaja con dedicación y precisión para llevar a cabo cada proyecto con éxito. En Reformas Cuadrado, valoramos la calidad, la eficiencia y la satisfacción del cliente, y nos esforzamos por cumplir con los más altos estándares de excelencia en cada trabajo que realizamos. Confía en nosotros para hacer realidad tus ideas y transformar tus espacios en lugares funcionales, estéticos y confortables que se adaptan a tus necesidades y estilo de vida.',
            'ubicacion' => 'Arrecife',
            'logo' => 'reformas_cuadrado.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 18,
            'nombre' => 'Seguridad Directa Lanzarote',
            'descripcion' => 'Seguridad Directa Lanzarote es tu socio confiable en protección y tranquilidad. Nos especializamos en brindar soluciones integrales de seguridad para hogares, negocios y comunidades en la isla de Lanzarote. Nuestros servicios incluyen sistemas de alarmas, videovigilancia, control de acceso y seguridad perimetral, diseñados para proteger tus bienes y seres queridos las 24 horas del día, los 7 días de la semana. Con un equipo de profesionales altamente capacitados y tecnología de vanguardia, en Seguridad Directa Lanzarote ofrecemos instalaciones personalizadas, monitoreo proactivo y respuesta rápida ante cualquier emergencia. Tu seguridad es nuestra prioridad, y estamos comprometidos en proporcionarte la tranquilidad que te mereces. Confía en Seguridad Directa Lanzarote para proteger lo que más valoras.',
            'ubicacion' => 'Costa Teguise',
            'logo' => 'seguridad_directa.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 19,
            'nombre' => 'Oasis EcoVentures',
            'descripcion' => 'Oasis EcoVentures es tu guía en la exploración sostenible de los tesoros naturales de Lanzarote. Nos especializamos en ofrecer experiencias eco-turísticas únicas, donde puedes descubrir la belleza virgen de la isla mientras respetas y preservas su fragilidad. Desde emocionantes excursiones de senderismo hasta relajantes paseos en kayak por las costas cristalinas, en Oasis EcoVentures te llevamos en un viaje inolvidable a través de los paisajes más impresionantes de Lanzarote, promoviendo la conservación y el respeto por el medio ambiente en cada paso del camino.',
            'ubicacion' => 'Arrecife',
            'logo' => 'oasis_ecoventures.png',
            'password' => bcrypt('password'),
        ]);

        Empresa::create([
            'id' => 20,
            'nombre' => 'Volcano Glass Creations',
            'descripcion' => 'Volcano Glass Creations es tu destino para el arte y la artesanía inspirados en el paisaje volcánico único de Lanzarote. Nuestro estudio de vidrio artesanal está ubicado en el corazón de la isla, donde el calor y la creatividad se fusionan para crear piezas únicas y deslumbrantes. Desde esculturas elegantes hasta joyería delicada, cada artículo en Volcano Glass Creations está hecho a mano por talentosos artistas locales, utilizando técnicas tradicionales y materiales reciclados. Descubre la magia del vidrio fundido en nuestras creaciones, donde la belleza de Lanzarote cobra vida en cada pieza.',
            'ubicacion' => 'Arrecife',
            'logo' => 'volcano_glass.png',
            'password' => bcrypt('password'),
        ]);

        // SELECCIONADORES

        Seleccionador::create([
            'id' => 2,
            'id_empresa' => 1,
        ]);

        Seleccionador::create([
            'id' => 4,
            'id_empresa' => 2,
        ]);

        Seleccionador::create([
            'id' => 6,
            'id_empresa' => 3,
        ]);

        Seleccionador::create([
            'id' => 8,
            'id_empresa' => 4,
        ]);

        Seleccionador::create([
            'id' => 10,
            'id_empresa' => 5,
        ]);

        // CV

        CV::create([
            'id' => 1,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 1,
        ]);

        CV::create([
            'id' => 2,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 3,
        ]);

        CV::create([
            'id' => 3,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 5,
        ]);

        CV::create([
            'id' => 4,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 7,
        ]);

        CV::create([
            'id' => 5,
            'jornada_laboral' => 'Tiempo parcial',
            'puesto_trabajo' => 'Desarrollador web',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 9,
        ]);

        CV::create([
            'id' => 6,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Obrero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 11,
        ]);

        CV::create([
            'id' => 7,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Camarero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 12,
        ]);

        CV::create([
            'id' => 8,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Cocinero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 13,
        ]);

        CV::create([
            'id' => 9,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Fontanero',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 14,
        ]);

        CV::create([
            'id' => 10,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Electricista',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 15,
        ]);

        CV::create([
            'id' => 11,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Pintor',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 16,
        ]);

        CV::create([
            'id' => 12,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Asesor inmobiliario',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 17,
        ]);

        CV::create([
            'id' => 13,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Segurata',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 18,
        ]);

        CV::create([
            'id' => 14,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Limpieza',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 18,
        ]);

        CV::create([
            'id' => 15,
            'jornada_laboral' => 'Tiempo completo',
            'puesto_trabajo' => 'Mantenimiento',
            'tipo_trabajo' => 'Tiempo completo',
            'id_demandante' => 20,
        ]);

        // Estudios

        Estudios::create([
            'id_cv' => 1,
            'id_estudio' => 1,
            'nombre' => 'Grado en Ingeniería Informática',
            'centro_estudios' => 'Universidad de Barcelona (UB)',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 2,
            'id_estudio' => 1,
            'nombre' => 'Grado en Ingeniería robótica',
            'centro_estudios' => 'Universidad Complutense de Madrid (UCM)',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 3,
            'id_estudio' => 1,
            'nombre' => 'Técnico en Marketing y Publicidad',
            'centro_estudios' => 'CIFP La Merced',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 4,
            'id_estudio' => 1,
            'nombre' => 'Técnico Superior Desarrollo de Aplicaciones Web',
            'centro_estudios' => 'CIFP Roger de Llúria',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 5,
            'id_estudio' => 1,
            'nombre' => 'Técnico en Cuidados Auxiliares de Enfermería',
            'centro_estudios' => 'CIFP Virgen de Gracia',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2019-06-30',
        ]);

        Estudios::create([
            'id_cv' => 6,
            'id_estudio' => 2,
            'nombre' => 'Formación Profesional Obras y Servicios',
            'centro_estudios' => 'CIFP Avilés',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 7,
            'id_estudio' => 3,
            'nombre' => 'Formación Profesional Hostelería y Turismo',
            'centro_estudios' => 'CIFP Escuela de Hostelería de Leioa',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 8,
            'id_estudio' => 4,
            'nombre' => 'Formación Profesional Hostelería y Turismo',
            'centro_estudios' => 'CIFP La Merced',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 9,
            'id_estudio' => 5,
            'nombre' => 'Formación Profesional Fontanería',
            'centro_estudios' => 'IES Politécnico Jesús Marín',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 10,
            'id_estudio' => 6,
            'nombre' => 'Formación Profesional Electricidad',
            'centro_estudios' => 'CIFP La Laguna',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 11,
            'id_estudio' => 7,
            'nombre' => 'Grado en Bellas Artes',
            'centro_estudios' => 'Universidad de Málaga (UMA)',
            'fecha_inicio' => '2013-09-01',
            'fecha_fin' => '2015-06-30',
        ]);

        Estudios::create([
            'id_cv' => 12,
            'id_estudio' => 8,
            'nombre' => 'Grado en Asesoría Inmobiliaria',
            'centro_estudios' => 'Universidad Rey Juan Carlos (URJC)',
            'fecha_inicio' => '2016-02-10',
            'fecha_fin' => '2018-06-23',
        ]);

        Estudios::create([
            'id_cv' => 13,
            'id_estudio' => 9,
            'nombre' => 'Formación Profesional Seguridad',
            'centro_estudios' => 'IES La Laboral ',
            'fecha_inicio' => '2013-10-01',
            'fecha_fin' => '2015-07-31',
        ]);

        Estudios::create([
            'id_cv' => 14,
            'id_estudio' => 10,
            'nombre' => 'Técnico en Mecatrónica Industrial',
            'centro_estudios' => 'CIFP Santa Catalina',
            'fecha_inicio' => '2015-09-01',
            'fecha_fin' => '2017-06-30',
        ]);

        Estudios::create([
            'id_cv' => 15,
            'id_estudio' => 11,
            'nombre' => 'Formación Profesional Mantenimiento',
            'centro_estudios' => 'CIFP César Manrique',
            'fecha_inicio' => '2014-09-01',
            'fecha_fin' => '2016-06-30',
        ]);

        // Experiencia

        Experiencia::create([
            'id_cv' => 1,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'InnovaSoluciones',
            'descripcion' => 'Como Desarrollador Web en InnovaSoluciones, tuve el privilegio de formar parte de un equipo dinámico y altamente creativo dedicado a la creación de soluciones web innovadoras. Mi papel principal consistía en colaborar en el diseño, desarrollo y mantenimiento de sitios web y aplicaciones, utilizando tecnologías de vanguardia para ofrecer experiencias digitales de primera calidad a nuestros clientes',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 2,
            'id_experiencia' => 1,
            'nombre' => 'Desarrollador web',
            'centro_laboral' => 'Exos',
            'descripcion' => 'Como Desarrollador Web en Exos, tuve la oportunidad de formar parte de un equipo altamente innovador y dinámico dedicado a la creación de soluciones web de vanguardia. En Exos, mi responsabilidad principal fue colaborar en el desarrollo de sitios web y aplicaciones web, utilizando tecnologías de última generación para ofrecer experiencias digitales únicas y de alta calidad.',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 3,
            'id_experiencia' => 1,
            'nombre' => 'Publicista',
            'centro_laboral' => 'Publik',
            'descripcion' => 'Como Publicista en Publik, tuve el privilegio de formar parte de un equipo creativo y apasionado dedicado a la creación de estrategias publicitarias innovadoras. En Publik, mi responsabilidad principal fue concebir y ejecutar campañas publicitarias efectivas que capturaran la atención del público objetivo y generaran resultados tangibles para nuestros clientes.',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 4,
            'id_experiencia' => 1,
            'nombre' => 'Programador informático',
            'centro_laboral' => 'ArasTech',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 5,
            'id_experiencia' => 1,
            'nombre' => 'Auxiliar de enfermería',
            'centro_laboral' => 'Hospital Dr. José Molina Orosa',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 6,
            'id_experiencia' => 2,
            'nombre' => 'Obrero',
            'centro_laboral' => 'Obras Sur',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2016-01-01',
            'fecha_fin' => '2018-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 7,
            'id_experiencia' => 3,
            'nombre' => 'Camarero',
            'centro_laboral' => 'Restaurante El Milano',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2017-01-01',
            'fecha_fin' => '2019-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 8,
            'id_experiencia' => 4,
            'nombre' => 'Cocinero',
            'centro_laboral' => 'Restaurante El Milano',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2018-01-01',
            'fecha_fin' => '2020-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 9,
            'id_experiencia' => 5,
            'nombre' => 'Fontanero',
            'centro_laboral' => 'Armando Fontaneros',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 10,
            'id_experiencia' => 6,
            'nombre' => 'Electricista',
            'centro_laboral' => 'Eléctricas S.A.',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 11,
            'id_experiencia' => 7,
            'nombre' => 'Diseñador web',
            'centro_laboral' => 'Estudio Creativo ROCA',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 12,
            'id_experiencia' => 8,
            'nombre' => 'Asesor inmobiliario',
            'centro_laboral' => 'Inmobiliaria Venus',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2022-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 13,
            'id_experiencia' => 9,
            'nombre' => 'Jefe de Seguridad',
            'centro_laboral' => 'Seguridad Directa Lanzarote',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2019-01-01',
            'fecha_fin' => '2021-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 14,
            'id_experiencia' => 10,
            'nombre' => 'Técnico jefe de controles lógicos',
            'centro_laboral' => 'Next Robótica',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2017-01-01',
            'fecha_fin' => '2019-12-31',
        ]);

        Experiencia::create([
            'id_cv' => 15,
            'id_experiencia' => 11,
            'nombre' => 'Técnico de mantenimiento',
            'centro_laboral' => 'FácilServices',
            'descripcion' => 'Lorem ipsum dolor sit amet adipiscing elit',
            'fecha_inicio' => '2016-01-01',
            'fecha_fin' => '2018-12-31',
        ]);

        // Oferta

        Oferta::create([
            'referencia' => 1,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'En Next Job estamos buscando un/a Desarrollador/a Web altamente motivado/a para unirse a nuestro equipo. Esta es una oportunidad emocionante para trabajar en un entorno dinámico y colaborativo, donde tendrás la oportunidad de contribuir al desarrollo de proyectos web innovadores y de alto impacto.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 2,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 1,
            'salario' => 2500.00,
            'jornada' => 'Completa',
            'sector' => 'Marketing y Publicidad',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Especialista en redes sociales',
            'descripcion' => 'Se busca especialista en redes sociales con experiencia en estrategias de marketing digital.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 3,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Madrid',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 3,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Diseñador/a gráfico',
            'descripcion' => 'Se busca diseñador gráfico con experiencia en el uso de herramientas como Illustrator, Photoshop e InDesign.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 0,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Borrador',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 6,
        ]);

        Oferta::create([
            'referencia' => 4,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Analista',
            'descripcion' => 'Se busca analista con experiencia',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Borrador',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 8,
        ]);

        Oferta::create([
            'referencia' => 5,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador/a web',
            'descripcion' => 'Se busca desarrollador/a web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 10,
        ]);

        Oferta::create([
            'referencia' => 6,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 7,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Borrador',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 8,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 9,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 10,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 11,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 12,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 13,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 14,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 15,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 16,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 17,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Desarrollador web',
            'descripcion' => 'Se busca desarrollador web con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 18,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Informática y Comunicaciones',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Programador',
            'descripcion' => 'Se busca programador con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 19,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Construcción',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Albañil',
            'descripcion' => 'Se busca albañil con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Mañana',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 20,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Servicios Turísticos y Hosteleros',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Camarero',
            'descripcion' => 'Se busca camarero con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 6,
        ]);

        Oferta::create([
            'referencia' => 21,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Energía',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Electricista',
            'descripcion' => 'Se busca electricista con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 8,
        ]);

        Oferta::create([
            'referencia' => 22,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Energía',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Fontanero',
            'descripcion' => 'Se busca fontanero con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 10,
        ]);

        Oferta::create([
            'referencia' => 23,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 1,
            'salario' => 1000.00,
            'jornada' => 'Completa',
            'sector' => 'Mantenimiento',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Pintor',
            'descripcion' => 'Se busca pintor con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 2,
        ]);

        Oferta::create([
            'referencia' => 24,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 3,
            'salario' => 3000.00,
            'jornada' => 'Completa',
            'sector' => 'Construcción',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Asesor inmobiliario',
            'descripcion' => 'Se busca asesor inmobiliario con experiencia.',
            'estudios_minimos' => 'Grado universitario',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'NO',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 4,
        ]);

        Oferta::create([
            'referencia' => 25,
            'fecha_cierre' => '2024-04-30',
            'numero_vacantes' => 2,
            'salario' => 2000.00,
            'jornada' => 'Completa',
            'sector' => 'Logística, Transporte y Comercio',
            'tipo_trabajo' => 'Presencial',
            'puesto_trabajo' => 'Segurata',
            'descripcion' => 'Se busca segurata con experiencia.',
            'estudios_minimos' => 'Ciclo Formativo de Grado Superior',
            'experiencia_minima' => 2,
            'ubicacion' => 'Ciudad',
            'provincia' => 'Las Palmas',
            'turno' => 'Tarde',
            'estado' => 'Publicada',
            'curriculums_ciegos' => 'SI',
            'palabras_clave' => NULL,
            'eliminada' => false,
            'id_seleccionador' => 6,
        ]);

        // Inscripcion

        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 1,
            'anotacion' => 'Interesado en la oferta',
        ]);

        Inscripcion::create([
            'id_demandante' => 3,
            'id_oferta' => 2,
            'anotacion' => 'Cancelado por el demandante',
        ]);

        Inscripcion::create([
            'id_demandante' => 5,
            'id_oferta' => 3,
            'anotacion' => 'Candidato seleccionado',
        ]);

        Inscripcion::create([
            'id_demandante' => 7,
            'id_oferta' => 4,
            'anotacion' => 'Falló en la entrevista de trabajo',
        ]);

        Inscripcion::create([
            'id_demandante' => 9,
            'id_oferta' => 1,
            'anotacion' => 'Fuera de plazo de inscripción',
        ]);

        Inscripcion::create([
            'id_demandante' => 1,
            'id_oferta' => 6,
            'anotacion' => 'Pendiente de revisión',
        ]);

        Inscripcion::create([
            'id_demandante' => 3,
            'id_oferta' => 1,
            'anotacion' => 'Rechazado por el seleccionador',
        ]);

        Inscripcion::create([
            'id_demandante' => 11,
            'id_oferta' => 1,
            'anotacion' => 'Interesante',
        ]);

        Inscripcion::create([
            'id_demandante' => 12,
            'id_oferta' => 1,
            'anotacion' => 'Pendiente de revisión',
        ]);

        Inscripcion::create([
            'id_demandante' => 13,
            'id_oferta' => 1,
            'anotacion' => 'Perfil no apto, pero se mantiene en reserva',
        ]);

        Inscripcion::create([
            'id_demandante' => 14,
            'id_oferta' => 1,
            'anotacion' => 'Pendiente de entrevista',
        ]);

        Inscripcion::create([
            'id_demandante' => 15,
            'id_oferta' => 1,
            'anotacion' => 'Rechazado por el seleccionador',
        ]);

        Inscripcion::create([
            'id_demandante' => 16,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 17,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 18,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 19,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 20,
            'id_oferta' => 1,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 19,
            'id_oferta' => 2,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 20,
            'id_oferta' => 2,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 19,
            'id_oferta' => 20,
            'anotacion' => '',
        ]);

        Inscripcion::create([
            'id_demandante' => 20,
            'id_oferta' => 23,
            'anotacion' => '',
        ]);

        // Estado

        Estado::create([
            'id' => 1,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 1,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 2,
            'nombre' => 'Preseleccionado',
            'descripcion' => 'Candidato preseleccionado',
            'id_demandante' => 1,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 3,
            'nombre' => 'Descartado',
            'descripcion' => 'Cancelado por el demandante',
            'id_demandante' => 3,
            'visto' => false,
            'id_oferta' => 2,
        ]);

        Estado::create([
            'id' => 4,
            'nombre' => 'Seleccionado para entrevista',
            'descripcion' => 'Candidato seleccionado',
            'id_demandante' => 5,
            'visto' => false,
            'id_oferta' => 3,
        ]);

        Estado::create([
            'id' => 5,
            'nombre' => 'Entrevista negativa',
            'descripcion' => 'Falló en la entrevista de trabajo',
            'id_demandante' => 7,
            'visto' => false,
            'id_oferta' => 4,
        ]);

        Estado::create([
            'id' => 6,
            'nombre' => 'Descartado',
            'descripcion' => 'Falló en la entrevista de trabajo',
            'id_demandante' => 7,
            'visto' => false,
            'id_oferta' => 4,
        ]);

        Estado::create([
            'id' => 7,
            'nombre' => 'Descartado',
            'descripcion' => 'Fuera de plazo de inscripción',
            'id_demandante' => 9,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 8,
            'nombre' => 'CV leído',
            'descripcion' => 'Pendiente de revisión',
            'id_demandante' => 1,
            'visto' => false,
            'id_oferta' => 6,
        ]);

        Estado::create([
            'id' => 9,
            'nombre' => 'Descartado',
            'descripcion' => 'Rechazado por el seleccionador',
            'id_demandante' => 3,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 10,
            'nombre' => 'Preseleccionado',
            'descripcion' => 'Interesante',
            'id_demandante' => 11,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 11,
            'nombre' => 'CV leído',
            'descripcion' => 'Pendiente de revisión',
            'id_demandante' => 12,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 12,
            'nombre' => 'CV leído',
            'descripcion' => 'Perfil no apto, pero se mantiene en reserva',
            'id_demandante' => 13,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 13,
            'nombre' => 'Seleccionado para entrevista',
            'descripcion' => 'Pendiente de entrevista',
            'id_demandante' => 14,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 14,
            'nombre' => 'Descartado',
            'descripcion' => 'Rechazado por el seleccionador',
            'id_demandante' => 15,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 15,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 16,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 16,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 17,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 17,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 18,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 18,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 19,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 19,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 20,
            'visto' => false,
            'id_oferta' => 1,
        ]);

        Estado::create([
            'id' => 20,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 19,
            'visto' => false,
            'id_oferta' => 2,
        ]);

        Estado::create([
            'id' => 21,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 20,
            'visto' => false,
            'id_oferta' => 2,
        ]);

        Estado::create([
            'id' => 22,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 19,
            'visto' => false,
            'id_oferta' => 20,
        ]);

        Estado::create([
            'id' => 23,
            'nombre' => 'Inscrito',
            'descripcion' => 'Inscrito en la oferta',
            'id_demandante' => 20,
            'visto' => false,
            'id_oferta' => 23,
        ]);

        // ROLES

        Role::create(['name' => 'demandante']);
        Role::create(['name' => 'seleccionador']);

    }
}
