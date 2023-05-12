<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $database = "AdoptaUnaMascota";

    // Crear la conexión
    $db = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $fechaNacimiento = $_POST["fecha-nacimiento"];
    $estadoCivil = $_POST["estado-civil"];
    $provincia = $_POST["provincia"];
    $codigoPostal = $_POST["codigo-postal"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $profesion = $_POST["profesion"];
    $localidad = $_POST["localidad"];
    $dniNif = $_POST["dni-nif"];
    $telefono = $_POST["telefono"];
    $pais = $_POST["pais"];
    $direccion = $_POST["direccion"];
    $pregunta1 = $_POST["pregunta1"];
    $pregunta2 = $_POST["pregunta2"];
    $pregunta3 = $_POST["pregunta3"];
    $pregunta4 = $_POST["pregunta4"];

    // Preparar la consulta SQL
    $sql = "INSERT INTO nombre_de_la_tabla (nombre, fecha_nacimiento, estado_civil, provincia, codigo_postal, apellidos, email, profesion, localidad, dni_nif, telefono, pais, direccion, pregunta1, pregunta2, pregunta3, pregunta4) VALUES ('$nombre', '$fechaNacimiento', '$estadoCivil', '$provincia', '$codigoPostal', '$apellidos', '$email', '$profesion', '$localidad', '$dniNif', '$telefono', '$pais', '$direccion', '$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4')";

    // Ejecutar la consulta
    if ($db->query($sql) === TRUE) {
        echo "El formulario se ha enviado correctamente.";
    } else {
        echo "Error al enviar el formulario: " . $db->error;
    }

    // Cerrar la conexión
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PreAdopcion</title>
    <style>
        /* Estilos CSS para dar formato a la página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
          background-color: #f2f2f2;
          padding: 20px;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        header img {
          height: 50px;
        }
        header a {
          text-decoration: none;
          color: #000;
          padding: 10px;
        }
        nav {
          background-color: #f2f2f2;
          padding: 10px;
        }
        nav a {
          text-decoration: none;
          color: #000;
          padding: 5px;
        }

       // #logo {
            /* Estilos para el logo */
       // }

       // #btn-iniciar-sesion {
            /* Estilos para el botón "Iniciar Sesión" */
       // }

        nav {
            /* Estilos para la barra de navegación */
        }

        #formulario {
            display: flex;
        justify-content: center;
        margin-top: 20px;
        }

        .columna {
            display: flex;
    flex-direction: column;
    padding: 10px;
    margin-right: 20px;
  }

  .columna label {
    margin-bottom: 5px;
  }
  #preguntas-container {
    text-align: center;
    margin-top: 20px;
  }

  #preguntas-container p {
    margin-bottom: 5px;
  }

  #preguntas-container input[type="text"] {
    width: 50%;
  }

        footer {
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        footer a {
            text-decoration: none;
            color: #000;
        }
       // #politicas {
            /* Estilos para el enlace de políticas */
       // }

       // #redes-sociales {
            /* Estilos para las redes sociales */
        //}
        /*BOTON ENVIA*/
        #boton-container {
    margin-top: 20px;
    text-align: center;
}

#boton-container button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#boton-container button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <header>
        <img src="logo-mascota.png" alt="Logo Mascota">
        <a href="login.php">Iniciar Sesión</a>
    </header>
    <nav>
        <a href="#">Protectoras</a>
        <a href="#">Encontrar tu mascota</a>
        <a href="#">Dar en Adopción</a>
        <a href="#">Perfil</a>
    </nav>
    <div id="formulario">
        <div class="columna">
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" placeholder="Nombre">
          
          <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
          <input type="text" id="fecha-nacimiento" name="fecha-nacimiento" placeholder="Fecha de Nacimiento">
          
          <label for="estado-civil">Estado Civil:</label>
          <input type="text" id="estado-civil" name="estado-civil" placeholder="Estado Civil">
          
          <label for="provincia">Provincia:</label>
          <input type="text" id="provincia" name="provincia" placeholder="Provincia">
          
          <label for="codigo-postal">Código Postal:</label>
          <input type="text" id="codigo-postal" name="codigo-postal" placeholder="Código Postal">
        </div>
        <div class="columna">
          <label for="apellidos">Apellidos:</label>
          <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos">
          
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Email">
          
          <label for="profesion">Profesión:</label>
          <input type="text" id="profesion" name="profesion" placeholder="Profesión">
          
          <label for="localidad">Localidad:</label>
          <input type="text" id="localidad" name="localidad" placeholder="Localidad">
        </div>
        <div class="columna">
          <label for="dni-nif">DNI/NIF:</label>
          <input type="text" id="dni-nif" name="dni-nif" placeholder="DNI/NIF">
          
          <label for="telefono">Teléfono:</label>
          <input type="text" id="telefono" name="telefono" placeholder="Teléfono">
          
          <label for="pais">País:</label>
          <input type="text" id="pais" name="pais" placeholder="País">
          
          <label for="direccion">Dirección:</label>
          <input type="text" id="direccion" name="direccion" placeholder="Dirección">
        </div>
      </div>

      <div id="preguntas-container">
        <p>¿Eres la persona que va a adoptar al animal?</p>
        <input type="text" name="pregunta1" placeholder="Respuesta 1">
        <p>¿Tienes conocimiento?</p>
        <input type="text" name="pregunta2" placeholder="Respuesta 2">
        <p>¿Vives en una vivienda de alquiler o en propiedad?</p>
        <input type="text" name="pregunta3" placeholder="Respuesta 3">
        <p>¿En que tipo de vivienda vives?</p>
        <input type="text" name="pregunta4" placeholder="Respuesta 4">
      </div>
      <div id="boton-container">
        <button type="submit">Enviar Formulario</button>
    </div>
<footer>
    <div style="text-align: left;">
        <a href="#">Políticas</a>
        <a href="#">Políticas</a>
    </div>
    <div style="text-align: right;">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
</footer>
      

</body>
</html>
