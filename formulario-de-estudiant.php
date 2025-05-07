<?php
  $servidor = "localhost";
  $userAcecss = "root";
  $passAccess = "";
  $dbname = "sistema_de_asistencia";

  $conexion = mysqli_connect($servidor, $userAcecss, $passAccess, $dbname);

  if (!$conexion) {
      die("Error de conexión:" . mysqli_connect_error());
  }
?>

  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registrate</title>
      <link rel="stylesheet" href="css/style-formulario.css">
  </head>
  <body>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="registro_de_usuarios" method="post" onsubmit="return validarFormulario()">
      <h1>Registrate</h1>

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+" title="Ingresa un nombre válido en español" required>

      <label for="apellido">Apellido:</label>
      <input type="text" id="apellido" name="apellido" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+" title="Ingresa un apellido válido en español" required>

      <label for="telefono">Teléfono:</label>
      <input type="tel" id="telefono" name="telefono" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Ingresa un número de teléfono válido (ej. 123-456-7890)" required>

      <label for="grado">Grado:</label>
      <select id="grado" name="grado" required>
        <option value="" disabled selected>Selecciona el grado</option>
        <option value="4to">4to</option>
        <option value="5to">5to</option>
        <option value="6to">6to</option>
      </select>

      <label for="seccion">Sección:</label>
      <select id="seccion" name="seccion" required>
        <option value="" disabled selected>Selecciona la sección</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>

      <label for="area">Área Técnica:</label>
      <select id="area" name="area" required>
        <option value="" disabled selected>Selecciona el área técnica</option>
        <option value="informatica">Informática</option>
        <option value="servicio de alojamiento">Servicio de Alojamiento</option>
        <option value="servicio turistico">Servicio Turístico</option>
        <option value="enfermeria">Enfermería</option>
        <option value="comercio y mercadeo">Comercio y Mercadeo</option>
        <option value="gestión">Gestión</option>
      </select>

      <label for="sexo">Sexo:</label>
      <select id="sexo" name="sexo">
        <option value="" disabled selected>Selecciona una opción</option>
        <option value="masculino">Masculino</option>
        <option value="femenino">Femenino</option>

        
      </select>

      <label for="nacionalidad">Nacionalidad:</label>
      <select id="nacionalidad" name="nacionalidad">
        <option value="" disabled selected>Selecciona tu nacionalidad</option>
        <option value="republica Dominicana">Dominicana</option>
        <option value="Haiti">Haitiana</option>
        <option value="italiano">Italiana</option>
        <option value="aleman">Alemána</option>
        <option value="ruso">Rusa</option>
        <!-- Agrega más opciones según necesites -->
      </select>
      
      <input type="submit" name="registrar" value="Registrar">
      <br>
      <input type="reset" value="Limpiar">
      <input type="button" value="Regresar" onclick="history.back()">
      <script src="validar.js"></script>
    </form>

  <?php
  // Check if the 'registrar' button was clicked
  if(isset($_POST['registrar'])){ // Corrected this line
      // Check if all required fields are filled
      if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) ||
         empty($_POST['grado']) || empty($_POST['seccion']) || empty($_POST['area']) ||
         empty($_POST['sexo']) || empty($_POST['nacionalidad'])) {
          // --- BEGIN EDIT 1 ---
          // Show alert but stay on the page
          echo "<script>
                alert('Por favor, complete todos los campos');
                </script>";
          // exit(); // Remove exit to allow form rendering
          // --- END EDIT 1 ---
      } else { // Proceed only if fields are not empty

          // Retrieve form data
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $telefono = $_POST['telefono'];
          $grado = $_POST['grado'];
          $seccion = $_POST['seccion'];
          $area = $_POST['area'];
          $sexo = $_POST['sexo'];
          $nacionalidad = $_POST['nacionalidad'];

          // Construct the SQL query to insert data into the 'estudiante' table
          $insertarDatos = "INSERT INTO estudiante (nombre, apellido, telefono, grado, seccion, area, sexo, nacionalidad)
                        VALUES ('$nombre', '$apellido', '$telefono', '$grado', '$seccion', '$area', '$sexo', '$nacionalidad')";

          // Execute the query
          $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

          // Check if the insertion was successful
          if($ejecutarInsertar){
              // --- BEGIN EDIT 2 ---
              // Show success alert and stay on the page
              echo "<script>
                    alert('Estudiante registrado exitosamente');
                    </script>";
              // --- END EDIT 2 ---
          } else {
              // --- BEGIN EDIT 3 ---
              // Show error alert and stay on the page
              echo "<script>
                    alert('Error al registrar estudiante: " . mysqli_error($conexion) . "');
                    </script>";
              // --- END EDIT 3 ---
          }
          // exit(); // Remove exit to allow form rendering below
      } // End of else block (fields were not empty)
  }
  ?>

  </body>
  </html>
