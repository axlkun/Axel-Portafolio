<?php
require '../includes/funciones.php';

require '../includes/config/database.php';
$db = conectarDB();

$auth = estaAutenticado();
if(!$auth){
    header('Location: /index.php');
}

$query = "SELECT * FROM mensajes ORDER BY idmensajes DESC";

$consulta = mysqli_query($db, $query);

addTemplate('header');
?>

<main class="contenedor">

    <div class="seleccion">
        <a class="navegacion__enlace navegacion__enlace--activo" href="/admin/mensajes.php">Bandeja</a>
        <a class="navegacion__enlace" href="/admin/proyectos.php">Proyectos</a>
    </div>

    <h1 class="titulo-admin">Tus mensajes</h1>

    <div class="contenedor-mensajes">

        <?php while ($bandeja = mysqli_fetch_assoc($consulta)) : ?>
            <div class="mensaje">

                <div class="encabezado">
                    <p class="nombre-admin"> <?php echo $bandeja['nombre']; ?> </p>

                    <a href="delete-mensaje.php?id=<?php echo $bandeja['idmensajes'] ?>" class="del-msj">
                        <lottie-player class="icono" src="/build/img/trashV2.json" background="transparent" speed="1" style="width: 32px; height: 32px;" hover></lottie-player>
                    </a>

                </div>


                <div class="encabezado">
                    <p class="correo-admin"><?php echo $bandeja['correo']; ?></p>

                    <div class="fecha-hora">
                        <p class="fecha-admin"><?php echo $bandeja['fecha']; ?></p>
                        <p class="fecha-admin"><?php echo $bandeja['hora']; ?></p>
                    </div>

                </div>

                <p class="mensaje-admin"><?php echo $bandeja['mensaje']; ?></p>

            </div>
        <?php endwhile; ?>
    </div>

</main>

<?php if (isset($_GET['m'])) { ?>
<div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
<?php } ?>

<script>
    $(document).on('click', '.del-msj', function(e) {

        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Estás seguro?',
            text: "El mensaje se eliminará de la base de datos!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            customClass: 'sweetalert-lg'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })

    const flashdata = $('.flash-data').data('flashdata')
         if(flashdata){
            Swal.fire({
            position: 'top-start',
            icon: 'success',
            title: 'Mensaje eliminado!',
            showConfirmButton: false,
            timer: 2000
          }).then(function() {
            window.location = '/admin/mensajes.php';
               });
         }
</script>

<?php
addTemplate('footer');
?>