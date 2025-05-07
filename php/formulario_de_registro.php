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
      <link rel="stylesheet" href="../css/style-formulario.css">
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

      <label for="email">Correo Electrónico:</label>
      <input type="email" id="email" name="email" title="Ingresa un correo electrónico válido" required>

      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario" pattern="[A-Za-z0-9]+" title="Ingresa un usuario válido (solo letras y números)" required>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" pattern=".{8,}" title="La contraseña debe tener al menos 8 caracteres" required>

      <label for="confirm-password">Confirmar Contraseña:</label>
      <input type="password" id="confirm-password" name="confirm-password" pattern=".{8,}" title="La contraseña debe tener al menos 8 caracteres" required>

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
      <script src="validar.js"></script>
    </form>

  <?php
  if(isset($_POST['registrar'])){
      // Verificar que todos los campos estén llenos
      if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || 
         empty($_POST['email']) || empty($_POST['usuario']) || empty($_POST['password']) || 
         empty($_POST['sexo']) || empty($_POST['nacionalidad'])) {
          echo "<script>
                alert('Por favor, complete todos los campos');
                window.history.back();
                </script>";
          exit();
      }

      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['email'];
      $usuario = $_POST['usuario'];
      $contraseña = $_POST['password'];
      $sexo = $_POST['sexo']; 
      $nacionalidad = $_POST['nacionalidad'];

      // Validación de contraseña
      if($_POST['password'] !== $_POST['confirm-password']) {
          echo "<script>
                alert('Las contraseñas no coinciden');
                window.history.back();
                </script>";
          exit();
      }

      $insertarDatos = "INSERT INTO registrar (nombre, apellido, telefono, correo, usuario, contraseña, sexo, nacionalidad) 
                    VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$usuario', '$contraseña', '$sexo', '$nacionalidad')";

      $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);
      
      if($ejecutarInsertar){
          echo "<script>
                alert('Usuario registrado exitosamente');
                window.location = '../inicio.html';
                </script>";
      } else {
          echo "<script>
                alert('Error al registrar: " . mysqli_error($conexion) . "');
                window.history.back();
                </script>";
      }
      exit();
  }
  ?>

  </body>
  </html>
