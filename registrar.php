  <?php
$server = "localhost";
$username = "root"; 
$password = "12345"; 
$database = "AdoptaUnaMascota"; 

// conexión con la base de datos
$db = mysqli_connect($server, $username, $password, $database);

// Verificar si la conexión es exitosa
if (!$db) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

// Si se envió el formulario, insertar los datos en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $pais = $_POST["pais"];
    $provincia = $_POST["provincia"];
    $contraseña = $_POST["contraseña"];
    $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, apellidos, email, pais, provincia, contraseña) VALUES ('$nombre', '$apellidos', '$email', '$pais', '$provincia', '$hashed_password')";

    if (mysqli_query($db, $sql)) {
        echo "El registro se ha completado satisfactoriamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

// Cerrar la conexión con la base de datos
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
     <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 400px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form action="registrar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="confirmar_email">Confirmar Email:</label>
        <input type="email" id="confirmar_email" name="confirmar_email" required>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" required>

        <label for="provincia">Provincia:</label>
        <input type="text" id="provincia" name="provincia" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>

        <label for="confirmar_contraseña">Confirmar Contraseña:</label>
        <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" required>

        <input type="submit" name="submit" value="Crear Cuenta">
    </form>
</body>
</html>


