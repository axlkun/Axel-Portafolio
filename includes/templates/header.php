<?php

if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/build/img/boy-dynamic-premium.png" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/build/css/owl.carousel.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/build/css/styles.css">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Axel Cruz</title>
</head>

<body>

    <header id="inicio" class="header">

        <div class="contenedor">
            <div class="barra">

                <div class="logo-barra">
                    <a href="/index.php" class="logo">A-C</a>

                    <div class="mobile-menu">
                        <lottie-player src="/build/img/menuV2.json" background="transparent" speed="2" style="width: 48px; height: 48px;" hover></lottie-player>
                    </div>
                </div>

                <nav class="navegacion">

                    <a href="/index.php#inicio">Inicio</a>
                    <a href="/index.php#sobre-mi">Sobre mi</a>
                    <a href="/index.php#servicios">Servicios</a>
                    <a href="/index.php#proyectos">Proyectos</a>
                    <a href="/index.php#contacto">Contacto</a>

                    <?php if ($auth) : ?>
                        <a class="lo-btn" href="/logout.php">Cerrar sesión</a>
                    <?php endif; ?>
 
                </nav>

            </div>
        </div>

    </header>

    <script>
    $(document).on('click', '.lo-btn', function(e) {

        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Cerrar sesión?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar',
            cancelButtonText: 'Cancelar',
            customClass: 'sweetalert-lg'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })
    </script>