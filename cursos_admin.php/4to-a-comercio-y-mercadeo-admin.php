<?php
// --- BEGIN EDIT 1 ---
// Add necessary setup code that was removed from the top

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'sistema_de_asistencia');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Define filter variables (needed for the query below)
// These might need to be dynamic depending on how this page is accessed
$grado = '4to';
$seccion = 'A';
$area = 'Comercio y Mercadeo';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Asistencia</title>
    <link rel="stylesheet" type="text/css" href="../cursos.css/grados_admin.css">
</head>
<body>
    <hr>
    <h2>Consultar Asistencias Guardadas</h2>

    <form method="GET" action="" class="fecha-container">
        fecha: <input type="date" name="fecha" value="<?php echo isset($_GET['fecha']) ? htmlspecialchars($_GET['fecha']) : ''; ?>" required>
        <button type="submit" name="buscar_asistencia">BUSCAR</button>
    </form>

<?php
// CONSULTAR asistencias guardadas
if (isset($_GET['buscar_asistencia'])) {
    $fecha = $_GET['fecha'];

    $sql_asistencia = "SELECT a.*, e.nombre, e.apellido, e.sexo, e.nacionalidad, a.participacion
                       FROM asistencia a
                       JOIN estudiante e ON a.id_estudiante = e.id
                       WHERE a.grado = '$grado'
                         AND a.seccion = '$seccion'
                         AND a.area = '$area'
                         AND a.fecha = '$fecha'";

    $res_asistencia = $conn->query($sql_asistencia);

    if ($res_asistencia && $res_asistencia->num_rows > 0) {
        $fecha_display = date_create($fecha);
        $fecha_formateada_header = $fecha_display ? date_format($fecha_display, 'd-m-Y') : htmlspecialchars($fecha);
        
        // Inicializar contadores
        $presentes = 0;
        $ausentes = 0;
        $excusados = 0;
        $total_registrados = $res_asistencia->num_rows;
        
        echo "<h3>Asistencia para " . htmlspecialchars("$grado $seccion $area") . " en " . $fecha_formateada_header . "</h3>";
        
        // Primera tabla (asistencia detallada)
        echo "<table class='tabla-asistencia'>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Sexo</th><th>Nacionalidad</th><th>Estado</th><th>Participación</th><th>Fecha</th></tr>";

        while($row = $res_asistencia->fetch_assoc()) {
            // Contar estados
            switch($row['estado']) {
                case 'P': $presentes++; break;
                case 'A': $ausentes++; break;
                case 'E': $excusados++; break;
            }
            
            $fecha_row_display = date_create($row['fecha']);
            $fecha_formateada_row = $fecha_row_display ? date_format($fecha_row_display, 'd-m-Y') : htmlspecialchars($row['fecha']);

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['apellido']) . "</td>";
            echo "<td>" . htmlspecialchars($row['sexo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nacionalidad']) . "</td>";
            echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
            echo "<td>" . (isset($row['participacion']) ? htmlspecialchars($row['participacion']) : '0') . "</td>";
            echo "<td>" . $fecha_formateada_row . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Segunda tabla (resumen estadístico) - Ahora debajo
        echo "<div style='margin-top: 20px; text-align: center;'>";
        echo "<h4>Resumen de Asistencia</h4>";
        echo "<table class='tabla-resumen' style='margin: 0 auto; width: auto;'>";
        echo "<tr>
                <th>Presentes</th>
                <th>Ausentes</th>
                <th>Excusados</th>
                <th>Total Registrados</th>
              </tr>";
        echo "<tr>
                <td>$presentes</td>
                <td>$ausentes</td>
                <td>$excusados</td>
                <td>$total_registrados</td>
              </tr>";
        echo "</table>";
        echo "</div>";

        echo '<div class="botones">
            <a href="../php/areas_admin.php">Volver</a>
            <button onclick="imprimirTabla()">Imprimir</button>
        </div>';
    } else {
        echo "<p>No se encontraron registros de asistencia para esta fecha.</p>";
    }
    $conn->close();
} else {
    $conn->close();
}
?>

</body>
</html>

<script>
    function imprimirTabla() {
        const style = document.createElement('style');
        style.innerHTML = `
            @page { 
                margin: 20px; 
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                color-adjust: exact;
            }
        `;
        document.head.appendChild(style);
        window.print();
        document.head.removeChild(style);
    }
</script>
