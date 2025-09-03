<?php
$servername = "localhost"; // o tu servidor de BD
$username   = "root";      // tu usuario de MySQL
$password   = "";          // tu contraseña
$dbname     = "test"; // el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
