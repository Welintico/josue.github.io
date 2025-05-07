<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header('Location: login_docente.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Docente</title>
    <link rel="stylesheet" href="../css/styles_roles.css">
</head>
<body>
    <div class="user-info">
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
    </div>
    <div class="roles-container">
        <h1>Panel de Control - Docente</h1>
        <button class="role-btn" onclick="window.location.href='logout.php'">Cerrar Sesión</button>
    </div>
</body>
</html>