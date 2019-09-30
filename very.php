<?php


//$usuario = "root";
//$contrasena = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
//$servidor = "localhost:3302";

$usuario = "usr_alumnos_sea";
$contrasena = "f7CF0b7S13";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$servidor = "192.168.1.10";
$basededatos = "db_ceted_miscelanea";


$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se ha podido conectar al servidor de Base de datos");





?>