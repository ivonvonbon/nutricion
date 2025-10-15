<?php

$host = 'localhost'; 
$nom = 'root';     
$pass = '';       
$db = 'consultorio_nutri'; 


$conn = mysqli_connect($host, $nom, $pass, $db);


if (!$conn) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8");

?>