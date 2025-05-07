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
    <title>Página de Áreas</title>
    <link rel="stylesheet" type="text/css" href="../css/areas.css">
</head>
<body>
    <div class="container">
        <div class="user-info">
            <img src="../img/Icono_User.png" alt="Usuario Docente">
            <span>Bienvenido, <?php echo $_SESSION['usuario']; ?></span>
            <a href="../formulario-de-estudiant.php" class="cerrar-sesion">Registrar Estudiante</a>
            <a href="logout.php" class="cerrar-sesion">Cerrar Sesión</a>
        </div>
        <div class="menu">
            <h2>Áreas</h2>
            <ul>
                <li>
                    <a href="#">Informática ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos.php/4to-a-informática.php">4to. A Informática</a>
                        <a href="../cursos.php/5to-a-informática.php">5to. A Informática</a>
                        <a href="../cursos.php/6to-a-informática.php">6to. A Informática</a>
                    </div>
                </li>
                <li>
                    <a href="#">Enfermería ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos.php/4to-a-enfermeria.php">4to. A Enfermería</a>
                        <a href="../cursos.php/5to-a-enfermeria.php">5to. A Enfermería</a>
                        <a href="../cursos.php/5to-b-enfermeria.php">5to. B Enfermería</a>
                        <a href="../cursos.php/5to-c-enfermeria.php">5to. C Enfermería</a>
                        <a href="../cursos.php/6to-a-enfermeria.php">6to. A Enfermería</a>
                        <a href="../cursos.php/6to-b-enfermeria.php">6to. B Enfermería</a>
                    </div>
                </li>
                <li>
                    <a href="#">Servicios Turísticos ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos.php/5to-a-servicios-turisticos.php">5to. A Servicios Turísticos</a>
                        <a href="../cursos.php/6to-a-servicios-turisticos.php">6to. A Servicios Turísticos</a>
                    </div>
                </li>
                <li>
                    <a href="#">Servicios Alojamiento ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos.php/4to-a-servicios-alojamiento.php">4to. A Servicios Alojamiento</a>
                        <a href="../cursos.php/5to-a-servicios-alojamiento.php">5to. A Servicios Alojamiento</a>
                        <a href="../cursos.php/6to-a-servicios-alojamiento.php">6to. A Servicios Alojamiento</a>
                    </div>
                </li>
                <li>
                    <a href="#">Comercio y Mercadeo ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos.php/4to-a-comercio-y-mercadeo.php">4to. A Comercio y Mercadeo</a>
                        <a href="../cursos.php/6to-a-comercio-y-mercadeo.php">6to. A Comercio y Mercadeo</a>
                    </div>
                </li>
                <li>
                    <a href="#">Gestión ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos.php/4to-a-gestión.php">4to. A Gestión</a>
                        <a href="../cursos.php/5to-a-gestión.php">5to. A Gestión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
