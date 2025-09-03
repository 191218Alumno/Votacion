<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Encriptar contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar usuario
$sql = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $hash);

if ($stmt->execute()) {
    echo "Usuario registrado con éxito. <a href='login.html'>Inicia sesión aquí</a>";
} else {
    echo "Error al registrar usuario: " . $conn->error;
}
?>
