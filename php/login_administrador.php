<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_de_asistencia";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensaje = '';

if(isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if($usuario === 'admin' && $password === 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: areas_admin.php');
    } else {
        $mensaje = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="../css/login1.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Inicio de Sesión Administrador</h1>
            <?php if($mensaje != ''): ?>
                <div class="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="input-group">
                    <input type="text" name="usuario" class="input-field" placeholder="Usuario" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="input-field" placeholder="Contraseña" required>
                </div>
                <button type="submit" name="login" class="login-btn">Iniciar Sesión</button>
            </form>
            <div class="nav-buttons">
                <a href="../inicio.html" class="nav-btn">Inicio</a>
                <a href="../roles.html" class="nav-btn">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>