<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistema_de_asistencia";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    // --- BEGIN EDIT 1 ---
    die("Error de conexión: " . $conn->connect_error); // Mensaje ya en español
    // --- END EDIT 1 ---
}

// Procesar el envío del formulario
if (isset($_POST['guardar_asistencia'])) {
    // --- BEGIN EDIT 2 ---
    // Recuperar valores de filtro de campos ocultos
    $grado_post = isset($_POST['grado']) ? $conn->real_escape_string($_POST['grado']) : '';
    $seccion_post = isset($_POST['seccion']) ? $conn->real_escape_string($_POST['seccion']) : '';
    $area_post = isset($_POST['area']) ? $conn->real_escape_string($_POST['area']) : '';
    // --- END EDIT 2 ---

    foreach ($_POST['asistencia'] as $id_estudiante => $estado) {
        $estado = $conn->real_escape_string($estado);
        $id_estudiante = intval($id_estudiante);
        $fecha = date('Y-m-d');
        
        // Obtener el valor de participación
        $participacion = isset($_POST['participacion'][$id_estudiante]) ? 
            intval($_POST['participacion'][$id_estudiante]) : 0;

        // Consulta INSERT actualizada para incluir participacion
        $sql_insert = "INSERT INTO asistencia (id_estudiante, grado, seccion, area, estado, participacion, fecha)
                      VALUES ($id_estudiante, '$grado_post', '$seccion_post', '$area_post', '$estado', $participacion, '$fecha')
                      ON DUPLICATE KEY UPDATE 
                      estado = VALUES(estado),
                      participacion = VALUES(participacion)";

        if (!$conn->query($sql_insert)) {
            echo "Error al guardar asistencia para estudiante ID $id_estudiante: " . $conn->error . "<br>";
        }
    }

    echo "<script>alert('Asistencia guardada correctamente'); window.location.href = window.location.href;</script>";
    exit();
}

// --- BEGIN EDIT 6 ---
// Definir filtros (usados para mostrar el formulario)
$grado = '6to';
$seccion = 'A';
$area = 'Servicios Alojamiento';

// Consulta para traer los estudiantes filtrados
// --- END EDIT 6 ---
$sql = "SELECT * FROM estudiante
        WHERE grado = '$grado' AND seccion = '$seccion' AND area = '$area'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomar Asistencia</title>
    <link rel="stylesheet" href="../cursos.css/grados.css">
</head>
<body>

<div class="container">

<h2 class="page-title">Tomar Asistencia - 4to A Informática</h2>

<form method="POST" action="">
    <table class="attendance-table">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Estado (P/A/E)</th>
            <th>Participación</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id']);
                $nombre = htmlspecialchars($row['nombre']);
                $apellido = htmlspecialchars($row['apellido']);

                echo "<tr>";
                echo "<td>" . $nombre . "</td>";
                echo "<td>" . $apellido . "</td>";
                echo "<td>
                        <select name='asistencia[" . $id . "]' required>
                            <option value=''></option>
                            <option value='P'>Presente</option>
                            <option value='A'>Ausente</option>
                            <option value='E'>Excusado</option>
                        </select>
                    </td>";
                echo "<td><input type='number' name='participacion[" . $id . "]' min='0' max='100' required></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay estudiantes encontrados.</td></tr>";
        }
        ?>
    </table>

    <!-- Añadir campos ocultos para pasar valores de filtro -->
    <input type="hidden" name="grado" value="<?php echo htmlspecialchars($grado); ?>">
    <input type="hidden" name="seccion" value="<?php echo htmlspecialchars($seccion); ?>">
    <input type="hidden" name="area" value="<?php echo htmlspecialchars($area); ?>">

    <!-- --- BEGIN EDIT --- -->
    <!-- Container to center the inline-block buttons -->
    <div style="text-align: center; margin-top: 20px;">
        <!-- "Volver" button linking to php/areas.php -->
        <a href="../php/areas.php" class="submit-btn" style="display: inline-block; margin: 0 10px; text-decoration: none;">Volver</a>
        <!-- Existing "Guardar Asistencia" button -->
        <button type="submit" name="guardar_asistencia" class="submit-btn" style="display: inline-block; margin: 0 10px;">Guardar Asistencia</button>
    </div>
    <!-- --- END EDIT --- -->

</form>

<!-- Cerrar div contenedor -->
</div>
<!-- --- END EDIT 16 --- -->

</body>
</html>

<?php $conn->close(); ?>
