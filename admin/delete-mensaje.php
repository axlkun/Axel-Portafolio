<?php

require '../includes/config/database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);
}else{
    header('Location /index.php');
}

$db = conectarDB();

$query = "DELETE FROM mensajes WHERE idmensajes = '$id'";

$consulta = mysqli_query($db,$query);

if($consulta){
    header('Location: /admin/mensajes.php?m=1');
}

?>