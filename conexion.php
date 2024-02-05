<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$db = "examen";

$conexion = mysqli_connect($servidor, $usuario, $password, $db) or die(mysqli_error($conexion));
?>
