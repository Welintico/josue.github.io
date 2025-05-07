<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login_administrador.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Áreas - Administrador</title>
    <link rel="stylesheet" href="../css/areas.css">
</head>
<body>
    <div class="container">
        <div class="user-info">
            <div class="user-welcome">
                <img src="../img/Icono_User.png" alt="Usuario Admin">
                <span>Bienvenido, Administrador</span>
            </div>
            <div class="user-actions">
            <button onclick="redirectToRegistro()" class="registrar-docente">Registrar Docente</button>
                <a href="logout.php" class="cerrar-sesion">Cerrar Sesión</a>
               
            </div>
        </div>
        <div class="menu">
            <h2>Áreas</h2>
            <ul>
                <li>
                    <a href="#">Informática ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos_admin.php/4to-a-informática-admin.php">4to. A Informática</a>
                        <a href="../cursos_admin.php/5to-a-informática-admin.php">5to. A Informática</a>
                        <a href="../cursos_admin.php/6to-a-informática-admin.php">6to. A Informática</a>
                    </div>
                </li>
                <li>
                    <a href="#">Enfermería ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos_admin.php/4to-a-enfermeria-admin.php">4to. A Enfermería</a>
                        <a href="../cursos_admin.php/5to-a-enfermeria-admin.php">5to. A Enfermería</a>
                        <a href="../cursos_admin.php/5to-b-enfermeria-admin.php">5to. B Enfermería</a>
                        <a href="../cursos_admin.php/5to-c-enfermeria-admin.php">5to. C Enfermería</a>
                        <a href="../cursos_admin.php/6to-a-enfermeria-admin.php">6to. A Enfermería</a>
                        <a href="../cursos_admin.php/6to-b-enfermeria-admin.php">6to. B Enfermería</a>
                    </div>
                </li>
                <li>
                    <a href="#">Servicios Turísticos ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos_admin.php/5to-a-servicios-turisticos-admin.php">5to. A Servicios Turísticos</a>
                        <a href="../cursos_admin.php/6to-a-servicios-turisticos-admin.php">6to. A Servicios Turísticos</a>
                    </div>
                </li>
                <li>
                    <a href="#">Servicios Alojamiento ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos_admin.php/4to-a-servicios-alojamiento-admin.php">4to. A Servicios Alojamiento</a>
                        <a href="../cursos_admin.php/5to-a-servicios-alojamiento-admin.php">5to. A Servicios Alojamiento</a>
                        <a href="../cursos_admin.php/6to-a-servicios-alojamiento-admin.php">6to. A Servicios Alojamiento</a>
                    </div>
                </li>
                <li>
                    <a href="#">Comercio y Mercadeo ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos_admin.php/4to-a-comercio-y-mercadeo-admin.php">4to. A Comercio y Mercadeo</a>
                        <a href="../cursos_admin.php/6to-a-comercio-y-mercadeo-admin.php">6to. A Comercio y Mercadeo</a>
                    </div>
                </li>
                <li>
                    <a href="#">Gestión ⬇</a>
                    <div class="dropdown-content">
                        <a href="../cursos_admin.php/4to-a-gestión-admin.php">4to. A Gestión</a>
                        <a href="../cursos_admin.php/5to-a-gestión-admin.php">5to. A Gestión</a>
                    </div>
                </li>
            </ul>
           
        </div>
    </div>

    <script>
        function redirectToRegistro() {
            window.location.href = 'formulario_de_registro.php';
        }
    </script>
</body>
</html>
