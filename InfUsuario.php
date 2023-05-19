<?php
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
session_start();

if (!isset($_SESSION["usuarioId"])) {
    // Redirigir al formulario de inicio de sesión si no hay una sesión iniciada
    header("Location: InfUsuario.php");
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
        header("Location: InfUsuario.php");
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
            text-align: center; 
        }

        .profile-image {
            width: 200px;
            height: 200px;
            background-color: gray;
            margin-top: -150px;
        }

        .profile-image .name {
            text-align: center;
            color: #000;
            font-size: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-info {
            width: 50%; 
            padding: 10px;
            margin-left: 20px;
        }

        .profile-info input {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
        }

        .profile-info button {
            padding: 10px;
        }

        .profile-info .name {
            font-weight: bold;
            font-size: 16px;
        }

        footer {
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
        }

        footer a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <img src="https://thumbs.dreamstime.com/b/hilera-de-diferentes-razas-animales-compa%C3%B1%C3%ADa-y-perros-diferente-tama%C3%B1o-engendra-gatos-en-una-fila-juntos-mirando-la-c%C3%A1mara-226868618.jpg" alt="Logo Mascota">
        <a href="login.php">Iniciar Sesión</a>
    </header>
    
    <nav>
        <a href="#">Protectoras</a>
        <a href="#">Encontrar tu mascota</a>
        <a href="#">Dar en Adopción</a>
        <a href="#">Perfil</a>
    </nav>
    
    <div class="container">
        <div class="profile-image">
            <div class="name"><?php echo $datosUsuario["nombre"]; ?></div>
        </div>
        <div class="profile-info">
            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $datosUsuario["nombre"]; ?>">
                <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $datosUsuario["apellidos"]; ?>">
                <input type="email" name="email" placeholder="Email" value="<?php echo $datosUsuario["email"]; ?>">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="text" name="pais" placeholder="País">
                <input type="text" name="provincia" placeholder="Provincia">
                <input type="password" name="nueva_password" placeholder="Nueva Contraseña">
                <input type="password" name="confirmar_password" placeholder="Confirmar Contraseña">
                <button type="submit">Guardar cambios</button>
                <button type="submit" name="eliminar">Eliminar Cuenta</button>
            </form>
        </div>
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
