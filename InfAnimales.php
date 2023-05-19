<?php
session_start();

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "AdoptaUnaMascota";

// Crear la conexión
$db = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

// Verificar la autenticación del usuario y obtener el ID del usuario actual
if (!isset($_SESSION["usuarioId"])) {
    // Redirigir al formulario de inicio de sesión si no hay una sesión iniciada
    header("Location: login.php");
    exit();
}

$usuarioId = $_SESSION["usuarioId"];

// Consultar la información del usuario
$sql = "SELECT * FROM usuarios WHERE id = $usuarioId";
$resultado = $db->query($sql);

if ($resultado->num_rows > 0) {
    $datosUsuario = $resultado->fetch_assoc();
} else {
    echo "No se encontraron datos de usuario";
}

// Actualizar la información del usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = $usuarioId";

    if ($db->query($sql) === TRUE) {
        echo "Los datos del usuario se actualizaron correctamente";
    } else {
        echo "Error al actualizar los datos del usuario: " . $db->error;
    }
}

// Eliminar la cuenta del usuario
if (isset($_POST["eliminar"])) {
    // Eliminar los datos del usuario de la base de datos
    $sql = "DELETE FROM usuarios WHERE id = $usuarioId";

    if ($db->query($sql) === TRUE) {
        // Redirigir al formulario de inicio de sesión después de eliminar la cuenta
        header("Location: login.php");
        exit();
    } else {
        echo "Error al eliminar la cuenta del usuario: " . $db->error;
    }
}

// Cerrar la conexión a la base de datos
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Usuario</title>

    <style>
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

        header a:hover {
            background-color: #ddd;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            margin-left: 40px;
        }

        .image-container {
            width: 200px;
            height: 200px;
            border: 1px solid black;

            margin-right: 20px;
            margin-top: -120px;
        }

        h2 {
            margin-top: 200px;
        }

        .text-container {
            flex-basis: calc(80% - 240px);
        }

        .info-container {
            display: flex;
            margin-bottom: 10px;
        }

        .info-box {
            width: 150px;
            height: 190px;
            border: 1px solid black;
            margin-right: 50px;
        }

        textarea {
            width: 95%;
            height: 100px;
            margin-top: 10px;
        }

        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
            margin-right: 140px;
        }

        .image-gallery img {
            width: 200px;
            height: 200px;
            margin-left: 50px;
            margin-right: 10px;
            border: 1px solid black;
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
    </style>
</head>
<body>
    <!-- CABECERA -->
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

    <!-- CUERPO -->
    <div class="container">
        <div class="image-container">
            <h2>Contacto</h2>
        </div>

        <div class="text-container">
            <div class="info-container">
                <div class="info-box"></div>
                <div class="info-box"></div>
                <div class="info-box"></div>
                <div class="info-box"></div>
            </div>

            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $datosUsuario['nombre']; ?>"><br>
                <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $datosUsuario['apellidos']; ?>"><br>
                <input type="email" name="email" placeholder="Email" value="<?php echo $datosUsuario['email']; ?>"><br>
                <button type="submit">Guardar cambios</button>
                <button type="button" onclick="eliminarCuenta()">Eliminar cuenta</button>
            </form>
        </div>
    </div>

    <!-- PIE DE PÁGINA -->
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

    <script>
        function eliminarCuenta() {
            if (confirm("¿Estás seguro de que deseas eliminar tu cuenta?")) {
                document.querySelector('form').insertAdjacentHTML('beforeend', '<input type="hidden" name="eliminar" value="true">');
                document.querySelector('form').submit();
            }
        }
    </script>
</body>
</html>

