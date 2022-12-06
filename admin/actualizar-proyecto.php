<?php
require '../includes/funciones.php';

$auth = estaAutenticado();
if(!$auth){
    header('Location: /index.php');
}

addTemplate('header');

require '../includes/config/database.php';
$db = conectarDB();

$id = $_GET['id'];

$id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /index.php');
    }

$query = "SELECT * FROM proyectos WHERE idproyectos = '$id'";
$consulta = mysqli_query($db,$query);
$proyecto = mysqli_fetch_assoc($consulta);

$errores = [];
$titulo = $proyecto['titulo'];
$link = $proyecto['link'];
$github = $proyecto['github'];
$imagen = $proyecto['imagen'];
$tecnologias = $proyecto['tecnologias'];
$descripcion = $proyecto['descripcion'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $link = mysqli_real_escape_string($db, $_POST['link']);
    $github = mysqli_real_escape_string($db, $_POST['github']);
    $tecnologias = mysqli_real_escape_string($db, $_POST['tecnologias']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);

    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if (!$link) {
        $errores[] = "Debes añadir el enlace del proyecto";
    }

    if (!$github) {
        $errores[] = "Debes añadir el enlace del proyecto";
    }

    if (!$tecnologias) {
        $errores[] = "Debes añadir las tecnologías";
    }

    if (!$descripcion) {
        $errores[] = "Debes añadir una descripcion";
    }

    $medida = 1000 * 1000;
    if($imagen['size'] > $medida){
        $errores[] = "La imagen es muy pesada";

        echo "
        <script>

        Swal.fire({
            position: 'top-start',
            icon: 'error',
            title: 'La imagen es muy pesada!',
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            window.location = '/admin/crear-proyecto.php';
               });
        </script>
        ";
    }

    if(empty($errores)){
        $carpetaImagenes = '../imagenes/';

        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        if($imagen['name']){
            unlink($carpetaImagenes . $proyecto['imagen']);

            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

            move_uploaded_file($imagen['tmp_name'],$carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen = $proyecto['imagen'];
        }
        
        $query = "UPDATE proyectos SET titulo = '$titulo', descripcion = '$descripcion', link = '$link', imagen = '$nombreImagen', tecnologias = '$tecnologias', github = '$github' WHERE idproyectos = '$id'";

        $resultado = mysqli_query($db,$query);

        if($resultado){
            echo "<script>
        
        Swal.fire({
            position: 'top-start',
            icon: 'success',
            title: 'Proyecto actualizado!',
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            window.location = '/admin/proyectos.php';
               });
            </script>";
        }
    }
}


?>

<section class="section-form">

    <div class="titulo-regresar">
        <a href="/admin/proyectos.php">
            <img class="regresar" src="/build/img/regresar.svg" alt="Regresar">
        </a>

        <h1>Actualizar proyecto</h1>

        <div style="width: 5rem;">

        </div>
    </div>
    
    <form class="formulario-proyecto " method="POST" enctype="multipart/form-data">
        <label for="titulo">Titulo</label>
        <input name="titulo" id="titulo" type="text" placeholder="Ingresa el titulo del proyecto" value="<?php echo $titulo; ?>" required="required">

        <label for="link">Dirección</label>
        <input name="link" id="link" type="text" placeholder="Ingresa dirección del proyecto" value="<?php echo $link; ?>" required="required">

        <label for="github">Dirección del repositorio</label>
        <input name="github" id="github" type="text" placeholder="Ingresa dirección del repositorio del proyecto" value="<?php echo $github; ?>" required="required">

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

        <img src="/imagenes/<?php echo $imagen ?>" alt="">

        <label for="tecnologias">Tecnologías</label>
        <textarea name="tecnologias" id="imagen" class="txtarea-tecnologias" name="" placeholder="Ingresa las tecnologías separadas por un '|'"" required><?php echo $tecnologias; ?></textarea>

        <label for=" descripcion">Descripcion</label>
        <textarea name="descripcion" id="imagen" placeholder="Describe el proyecto" required><?php echo $descripcion; ?></textarea>

        <input class="boton" type="submit" value="Actualizar">
    </form>

</section>

<?php
addTemplate('footer');
?>