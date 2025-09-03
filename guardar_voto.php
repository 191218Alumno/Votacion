<?php
session_start();
include("conexion.php");

header("Content-Type: application/json");

// Verificar si el usuario está logueado
if (!isset($_SESSION["usuario_id"])) {
    echo json_encode(["success" => false, "message" => "Debes iniciar sesión"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$institucion = $data["institucion"];
$usuario_id = $_SESSION["usuario_id"];

// Validar si ya votó
$sqlCheck = "SELECT * FROM votos WHERE usuario_id = ?";
$stmt = $conn->prepare($sqlCheck);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Ya has votado"]);
    exit;
}

// Guardar voto
$sql = "INSERT INTO votos (usuario_id, institucion) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $usuario_id, $institucion);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error en la base de datos"]);
}
?>
