<?php

$server = "localhost";
$user = "root";
$pwd = "";
$database = "integradora";

$conn = mysqli_connect($server, $user, $pwd, $database);

if (!$conn) {
    die("Conexion fallida");
}

?>