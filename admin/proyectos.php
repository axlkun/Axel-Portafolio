<?php
require '../includes/funciones.php';

$auth = estaAutenticado();
if(!$auth){
    header('Location: /index.php');
}

require '../includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM proyectos";

$consultaProyectos = mysqli_query($db, $query);

addTemplate('header');
?>

<main class="contenedor">
    <div class="seleccion">
        <a class="navegacion__enlace" href="/admin/mensajes.php">Bandeja</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="/admin/proyectos.php">Proyectos</a>
    </div>

    <div class="titulo-boton">
        <h1 class="titulo-admin">Mis proyectos</h1>

        <!-- <a href="" class="boton">Nuevo</a> -->
        <a href="/admin/crear-proyecto.php">
            <img class="nuevo" src="/build/img/add.svg" alt="Nuevo">
        </a>
    </div>


    <table class="propiedades">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Tecnologías</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los resultados -->

            <?php while ($proyecto = mysqli_fetch_assoc($consultaProyectos)) : ?>
                <tr>
                    <td data-titulo="Titulo"><?php echo $proyecto['titulo']; ?></td>
                    <td data-titulo="Imagen"> <img src="/imagenes/<?php echo $proyecto['imagen']; ?>" class="imagen-tabla" alt="imagen propiedad"> </td>
                    <td data-titulo="Descripcion" class="wrap"><?php echo $proyecto['descripcion']; ?></td>
                    <td data-titulo="Tecnologías" class="wrap"><?php echo $proyecto['tecnologias']; ?></td>
                    <td>
                        <div class="tabla-botones">
                            <a href="/admin/delete-proyecto.php?id=<?php echo $proyecto['idproyectos']; ?>" class="boton del-btn">Eliminar</a>

                            <a href="/admin/actualizar-proyecto.php?id=<?php echo $proyecto['idproyectos']; ?>" class="boton">Actualizar</a>
                        </div>

                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php if (isset($_GET['m'])) { ?>
<div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
<?php } ?>

<script>
    $(document).on('click', '.del-btn', function(e) {

        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Estás seguro?',
            text: "El proyecto se eliminará de la base de datos!",
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
            title: 'Proyecto eliminado!',
            showConfirmButton: false,
            timer: 2000
          }).then(function() {
            window.location = '/admin/proyectos.php';
               });
         }
</script>

<?php
addTemplate('footer');
?>