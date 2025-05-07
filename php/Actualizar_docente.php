<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registros";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
    $usuario = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
</head>
<body>
    <form action="Actualizar_docente.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario["id"] ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $usuario["nombre"] ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $usuario["email"] ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
