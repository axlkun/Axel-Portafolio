<?php
require 'includes/funciones.php';
addTemplate('header');

require 'includes/config/database.php';
$db = conectarDB();

$queryProyectos = "SELECT * FROM proyectos ORDER BY idproyectos ASC";
$consultaProyectos = mysqli_query($db, $queryProyectos);

$errores = [];

$nombre = '';
$correo = '';
$mensaje = '';
$fecha = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    date_default_timezone_set('America/Mexico_City');
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $correo = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));
    $mensaje = mysqli_real_escape_string($db, $_POST['mensaje']);
    $fecha = date('d/m/y');
    $hora = date('h:i A');

    if (!$correo) {
        $errores[] = "Ingresa un correo valido";
        echo "
        <script>

        Swal.fire({
            position: 'top-start',
            icon: 'error',
            title: 'El correo no es válido!',
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            window.location = '/index.php';
               });
        </script>
        ";
    }

    if (empty($errores)) {
        $query = "INSERT INTO mensajes (correo,nombre,mensaje,fecha,hora) VALUES ('$correo','$nombre','$mensaje','$fecha','$hora')";

        $resultado = mysqli_query($db, $query);

        echo "<script>
        
        Swal.fire({
            position: 'top-start',
            icon: 'success',
            title: 'Mensaje enviado!',
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            window.location = '/index.php';
               });
            </script>";
    }
}

?>

<div class="inicio">
    <div class="contenedor-contenido contenido-inicio">
        <div class="texto" data-aos="fade-right">
            <h1>Hola, mi nombre es <br> <span>Axel Cruz.</span></h1>
            <h2>Y creo experiencias para la web</h2>
            <p>Soy Ingeniero en Sistemas Computacionales y me gusta desarrollar productos de software sólidos y escalables con una excepcional experiencia de usuario </p>

            <div class="redes">
                <a href="https://www.linkedin.com/in/axel-andr%C3%A9s-cruz-c%C3%B3rdova-503229250/" target="_blank">
                    <lottie-player src="build/img/linkedin.json" background="transparent" speed="1" style="width: 48px; height: 48px;" hover loop></lottie-player>
                </a>

                <a href="https://github.com/axlkun" target="_blank">
                    <lottie-player src="build/img/github.json" background="transparent" speed="1" style="width: 48px; height: 48px;" hover loop></lottie-player>
                </a>

                <a href="https://www.instagram.com/axlkun/" target="_blank">
                    <lottie-player src="build/img/instagram.json" background="transparent" speed="0.5" style="width: 48px; height: 48px;" hover></lottie-player>
                </a>

                <a href="https://twitter.com/Axlkun" target="_blank">
                    <lottie-player src="build/img/twitter.json" background="transparent" speed="1" style="width: 48px; height: 48px;" hover loop></lottie-player>
                </a>

                <a href="mailto:axelcruz.dev@gmail.com">
                    <lottie-player src="build/img/mail.json" background="transparent" speed="1" style="width: 48px; height: 48px;" hover></lottie-player>
                </a>

            </div>
            <div class="centrar">
                <a href="AxelCruz-CV.pdf" target="_blank" class="boton">Resume</a>
            </div>

        </div>

        <div class="imagen">
            <picture>
                <source srcset="build/img/inicio.webp" type="image/webp">
                <source srcset="build/img/inicio.svg" type="image/svg">
                <img loading="lazy" src="build/img/inicio.png" alt="Imagen inicio">
            </picture>
        </div>

    </div>

    <a href="#inicio">
        <lottie-player class="up" src="build/img/arrowUpCircle.json" background="transparent" speed="0.8" style="width: 48px; height: 48px;" loop autoplay></lottie-player>
    </a>

</div>

<div id="sobre-mi" class="sobre-mi">
    <div class="contenedor-contenido contenido-sobremi">

        <div class="texto-sobremi">
            <h1 data-aos="fade-right">Sobre mi</h1>

            <p>Estoy en el mundo de la programación por qué me fascina el proceso de materializar todas mis ideas mediante código y mucha creatividad.</p>
            <p>Me encargo de realizar proyectos con buenas prácticas para construir productos con un alto performance acompañado de un excelente diseño de interfaz de usuario.</p>
            <p>He desarrollado soluciones para empresas y dependencias de gobierno, que van desde sitios web informativos hasta aplicaciones mas complejas que ayudan a agilizar procesos.</p>

            <div class="imagen">
                <picture>
                    <source srcset="build/img/inicio_2.webp" type="image/webp">
                    <source srcset="build/img/inicio_2.svg" type="image/svg+xml">
                    <img loading="lazy" src="build/img/inicio_2.png" alt="Imagen inicio">
                </picture>
            </div>


        </div>

        <div class="texto-skills">
            <h2>He trabajado con estas tecnologías recientemente</h3>

                <div class="tecnologias">
                    <div class="tecnologia" data-aos="zoom-in">
                        <!-- <img src="build/img/html.png" alt="html"> -->
                        <picture>
                            <source srcset="build/img/html.webp" type="image/webp">
                            <img loading="lazy" src="build/img/html.png" alt="Imagen inicio">
                        </picture>
                        <h3>HTML</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/css.png" alt="css">
                        <h3>CSS</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/javascript.png" alt="javascript">
                        <h3>JavaScript</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/php.png" alt="php">
                        <h3>PHP</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/sql.png" alt="sql">
                        <h3>SQL</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/gulp.png" alt="gulp">
                        <h3>Gulp</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/sass.png" alt="sass">
                        <h3>Sass</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/figma.png" alt="figma">
                        <h3>Figma</h3>
                    </div>

                    <div class="tecnologia" data-aos="zoom-in">
                        <img loading="lazy" src="build/img/git.png" alt="git">
                        <h3>Git</h3>
                    </div>
                </div>
        </div>
    </div>

</div>

<div id="servicios" class="servicios">
    <h1 data-aos="fade-right">Servicios</h1>
    <div class="contenedor-contenido contenido-servicios">
        <div class="servicio" data-aos="zoom-out-right">
            <div class="titulo">
                <img loading="lazy" src="build/img/paint-kit-dynamic-premium.webp" alt="Diseño web">
                <h2>Diseño web</h2>
            </div>
            <p>El diseño de interfaz de usuario se realiza bajo los principios <span>UI/UX</span> para proporcionar a los usuarios finales productos con la más alta <span>calidad visual</span> y <span>funcional</span>.</p>
        </div>
        <div class="servicio" data-aos="zoom-in">
            <div class="titulo">
                <img loading="lazy" src="build/img/computer-dynamic-premium.webp" alt="Desarrollo web">
                <h2>Desarrollo web</h2>
            </div>
            <p>Creación de software de calidad bajo arquitecturas limpias priorizando: <span>rendimiento</span>, <span>escalabilidad</span>, <span>seguridad</span> y <span>portabilidad.</span></p>

        </div>
        <div class="servicio" data-aos="zoom-out-left">
            <div class="titulo">
                <img loading="lazy" src="build/img/rocket-dynamic-premium.webp" alt="Mantenimiento web">
                <h2>Mantenimiento</h2>
            </div>
            <p>Es una actividad que incluye la <span>correción de errores</span>, <span>mejora de capacidades</span>, <span>eliminación de funciones obsoletas</span> y <span>optimización</span>.</p>
        </div>

    </div>

    <div class="contenedor-contenido contenido-servicios">
        <div class="servicio" data-aos="zoom-out-right">
            <div class="titulo">
                <img loading="lazy" src="build/img/tool-dynamic-premium.webp" alt="Actualizacion web">
                <h2>Actualización y administración</h2>
            </div>
            <p>Consiste en actualizar la información de su sitio web periódicamente, gestionando los <span>contenidos</span>, <span>noticias</span> y <span>datos</span> para hacerlos accesibles y adecuados a su audiencia. El <span>éxito</span> de un sitio web en gran parte depende de la <span>actualización periódica</span> de los contenidos</p>
        </div>

        <div class="servicio" data-aos="zoom-out-left">
            <div class="titulo">
                <img loading="lazy" src="build/img/zoom-dynamic-premium.webp" alt="Seo">
                <h2>SEO</h2>
            </div>
            <p>Se trata del proceso de mejorar un sitio para que los buscadores puedan comprenderlo mejor, esto permite <span>aumentar la visibilidad de tu sitio web</span> en los resultados órganicos de los diferentes motores de búsqueda, convirtiéndose en una importante fuente de tráfico</p>
        </div>
    </div>
</div>

<div id="proyectos">

    <div id="slider" class="pt-5 contenido-proyectos">
        <div class="container" style="padding: 15px;">
            <h1 class="text-center" style="margin: 0;
           font-weight: 900;
           font-size: 4rem;
            color: black;" data-aos="fade-right">Proyectos</h1>
            <div class="slider" style="z-index: 0;">
                <div class="owl-carousel">

                    <!-- <a href="http://sistemas-ayuntamiento.infinityfreeapp.com/" target="_blank"> -->
                    <?php while ($proyecto = mysqli_fetch_assoc($consultaProyectos)) : ?>
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="/imagenes/<?php echo $proyecto['imagen']; ?>" alt="Inventario" style="filter: brightness(0.8);">

                            </div>

                            <h5 class="mb-0 text-center" style="color: #9297a5; font-weight: 900; font-size: 20px;"><?php echo $proyecto['titulo']; ?></h5>

                            <div style="display:flex; justify-content:center; gap:10px; align-items:center; margin-top:10px;">
                                <a href="<?php echo $proyecto['link']; ?>" target="_blank">
                                    <img src="/build/img/enlace.svg" alt="" style="max-width: 30px; max-height:30px; filter: invert(70%);">
                                </a>
                                <a href="<?php echo $proyecto['github']; ?>" target="_blank">
                                    <img src="/build/img/github_2.svg" alt="" style="max-width: 25px; max-height:25px; filter: invert(70%);">
                                </a>
                            </div>

                            <p class="text-center" style="color: #9297a5; font-size: 13px; padding: 20px 40px;"><?php echo $proyecto['descripcion']; ?></p>
                            <p class="text-center p-4" style="color: #9297a5; font-size: 13px; font-weight: 900;"><?php echo $proyecto['tecnologias']; ?></p>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="contacto" class="contacto">

    <div class="contenedor-contacto">
        <div class="titulo-contacto">
            <h1 data-aos="fade-right">¡Envíame un mensaje!</h1>
            <p data-aos="fade-left">¿Tienes alguna pregunta o propuesta, o simplemente quieres saludar? Adelante.</p>
        </div>

        <form id="formulario" class="formulario" action="/" method="POST">
            <div class="nombre-correo">
                <div class="nombre">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" name="nombre" placeholder="Ingrese su nombre" required="required">
                </div>
                <div class="correo">
                    <label for="correo">Correo electrónico</label>
                    <input id="correo" type="text" name="correo" placeholder="Ingrese su dirección de correo electrónico" required="required">
                </div>
            </div>

            <div class="text-area">
                <div class="mensaje">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" placeholder="Hola, necesitamos un sistema para agilizar un proceso en la Compañía X. ¿Qué tan pronto podríamos trabajar en ello?" required></textarea>
                </div>
            </div>

            <input type="submit" class="boton">
        </form>
    </div>

</div>

<?php
addTemplate('footer');
?>