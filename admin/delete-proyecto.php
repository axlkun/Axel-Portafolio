<?php

require '../includes/config/database.php';

if(isset($_GET['id'])){
    $id =  $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
}else{
    header('Location: /index.php');
}

$db = conectarDB();

$query = "SELECT imagen FROM proyectos WHERE idproyectos = '$id'";

$consulta = mysqli_query($db, $query);

$proyecto = mysqli_fetch_assoc($consulta);

unlink('../imagenes/' . $proyecto['imagen']);

$query = "DELETE FROM proyectos WHERE idproyectos = '$id'";

$consulta = mysqli_query($db,$query);

if($consulta){
    header('Location: /admin/proyectos.php?m=1');
}

?>