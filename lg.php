<?php
require 'includes/funciones.php';
addTemplate('header');

require 'includes/config/database.php';
$db = conectarDB();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = mysqli_real_escape_string($db, filter_var($_POST['usuario'], FILTER_VALIDATE_EMAIL));

    $contraseña = mysqli_real_escape_string($db, $_POST['contraseña']);

    if (!$usuario) {
        $errores[] = "El usuario no es válido";
    }
    if (!$contraseña) {
        $errores[] = "La contraseña no es válida";
    }

    if (empty($errores)) {
        $query = "SELECT * FROM cuentas WHERE usuario = '$usuario'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            $cuenta = mysqli_fetch_assoc($resultado);
            $auth = password_verify($contraseña, $cuenta['contraseña']);

            if ($auth) {
                session_start();
                $_SESSION['login'] = true;
                header('Location: /admin/mensajes.php');
            } else {
                $errores[] = 'La contraseña es incorrecta';
            }
        } else {
            $errores[] = 'El usuario no existe';
        }
    }
}

?>

<main>

    <?php foreach ($errores as $error) : ?>
        <div id="eror" class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="login">


        <div class="imagen" data-aos="fade-up">
            <h1 class="tituloMobile">Hola, Axel</h1>
            <img loading="lazy" src="build/img/login.png" alt="Imagen login">
        </div>

        <div class="form" data-aos="fade-down">

            <h1 class="tituloDesktop">Hola de nuevo, Axel</h1>
            <form class="formulario" method="POST" novalidate>
                <label for="">Usuario</label>
                <input type="email" id="usuario" name="usuario" placeholder="Ingresa tu usuario">

                <label for="">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña">

                <input type="submit" class="boton" value="Ingresar">
            </form>
        </div>

    </div>

</main>

<?php
addTemplate('footer');
?>