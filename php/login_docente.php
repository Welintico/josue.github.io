<?php
session_start();
$servidor = "localhost";
$userAcecss = "root";
$passAccess = "";
$dbname = "sistema_de_asistencia";

$conexion = mysqli_connect($servidor, $userAcecss, $passAccess, $dbname);

if (!$conexion) {
    die("Error de conexión:" . mysqli_connect_error());
}

$mensaje = '';

if(isset($_POST['login'])) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['password']);

    $query = "SELECT * FROM registrar WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $resultado = mysqli_query($conexion, $query);

    if(mysqli_num_rows($resultado) == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: areas.php');  // Changed from dashboard_docente.php to areas.php
        exit();  // Added exit() for security
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
    <title>Login Docente</title>
    <link rel="stylesheet" href="../css/login1.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Inicio de Sesión Docente</h1>
            <?php if($mensaje != ''): ?>
                <div class="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="text" name="usuario" class="input-field" placeholder="Usuario" required>
                <input type="password" name="password" class="input-field" placeholder="Contraseña" required>
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