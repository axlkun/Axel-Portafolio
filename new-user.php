<?php

//importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//crear un email y password
$email = "axlkun@portafolio.com";
$password = "awesomeaxlkunport";

$passwordHash = password_hash($password,PASSWORD_BCRYPT);

//query para crear el usuario
$query = "INSERT INTO cuentas (usuario,contraseña) VALUES ('$email','$passwordHash')";

//agregarlo a la base de datos
//mysqli_query($db,$query);