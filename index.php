<?php
session_start();

// Si el usuario no ha iniciado sesión, redirigir al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Votación de Imágenes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    nav {
      background: #222;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav .bienvenida {
      color: #fff;
      font-weight: bold;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 20px;
      font-weight: bold;
      transition: color 0.3s;
    }
    nav a:hover {
      color: #00bfff;
    }
    header {
      background: #333;
      color: #fff;
      padding: 20px 0;
    }
    header h1 {
      margin: 0;
    }
    header h2 {
      margin: 5px 0 0;
      font-weight: normal;
    }
    .imagen-grande {
      margin: 20px auto;
      max-width: 600px;
    }
    .imagen-grande img {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .votacion {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 30px 0;
      flex-wrap: wrap;
    }
    .opcion {
      background: #fff;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      width: 160px;
    }
    .opcion img {
      width: 100%;
      border-radius: 8px;
    }
    .contador {
      font-weight: bold;
      margin: 10px 0;
    }
    button {
      padding: 8px 12px;
      border: none;
      border-radius: 6px;
      background: #007bff;
      color: white;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

  <nav>
    <span class="bienvenida">Bienvenido, <?php echo $_SESSION['usuario']; ?> 👋</span>
    <a href="logout.php">Cerrar sesión</a>
  </nav>

  <header>
    <h1>Academia STEM</h1>
    <h2>¡Vota parcialmente por la mejor!</h2>
  </header>

  <div class="imagen-grande">
    <img src="img/logo-min.png" alt="Imagen Principal">
  </div>

  <div class="votacion">
    <div class="opcion">
      <img src="img/itcj.png" alt="Imagen 1">
      <div class="contador">Votos: <span id="conta1">0</span></div>
      <button id="miBtn1">Votar</button>
    </div>
    <div class="opcion">
      <img src="img/tec.png" alt="Imagen 2">
      <div class="contador">Votos: <span id="conta2">0</span></div>
      <button id="miBtn2">Votar</button>
    </div>
    <div class="opcion">
      <img src="img/urn.jpg" alt="Imagen 3">
      <div class="contador">Votos: <span id="conta3">0</span></div>
      <button id="miBtn3">Votar</button>
    </div>
    <div class="opcion">
      <img src="img/uacj.png" alt="Imagen 4">
      <div class="contador">Votos: <span id="conta4">0</span></div>
      <button id="miBtn4">Votar</button>
    </div>
    <div class="opcion">
      <img src="img/uach.jpg" alt="Imagen 5">
      <div class="contador">Votos: <span id="conta5">0</span></div>
      <button id="miBtn5">Votar</button>
    </div>
  </div>

  <!-- Script de votación con conexión -->
  <script src="script_votos.js"></script>

</body>
</html>
