<?php

$server='localhost';
$username='root';
$password='';
$database='login';

$conexion= new mysqli($server,$username,$password,$database);
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}
else{
    $conexion->set_charset("utf8");
}

?>
