<?php
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login_administrador.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <link rel="stylesheet" href="../css/styles_roles.css">
</head>
<body>
    <div class="user-info">
        <h2>Bienvenido, Administrador</h2>
    </div>
    <div class="roles-container">
        <h1>Panel de Control - Administrador</h1>
        <button class="role-btn" onclick="window.location.href='logout.php'">Cerrar Sesión</button>
    </div>
</body>
</html>