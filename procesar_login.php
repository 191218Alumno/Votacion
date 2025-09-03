<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Buscar usuario
$sql = "SELECT id, password FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verificar contraseña
    if (password_verify($password, $row['password'])) {
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario'] = $usuario;

        header("Location: index.html"); // redirige a la página de votación
        exit;
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
?>
