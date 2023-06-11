<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "AdoptaUnaMascota";

$db = new mysqli($servername, $username, $password, $dbname);
// Verificar si la conexión fue exitosa
if ($db->connect_error) {
  die("Conexión fallida: " . $db->connect_error);
}
//crear la conexion 
//$hash = Password::hash('micontraseña');
//comprobar la contraseña introducida 
//if(Password::verify('micontraseña',$hash)){
//echo 'contraseña correcta!\n';
//}else{
// echo 'contraseña incorrecta!\n';
//}
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Encriptar la contraseña
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Consulta a la base de datos para verificar las credenciales
  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $result = $db->query($sql);

  // Verificar si se encontró un resultado
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Verificar si las credenciales son válidas
    if (password_verify($password, $row['password'])) {
      // Si las credenciales son válidas, redirigir al usuario a la página de inicio
      header('Location: login.php');
      exit;
    } else {
      // Si las credenciales no son válidas, redirigir al usuario a la página de inicio de sesión con un mensaje de error
      header('Location: login.php?error=1');
      exit;
    }
  } else {
    // Si el usuario no existe, redirigir al usuario a la página de inicio de sesión con un mensaje de error
    header('Location: login.php?error=1');
    exit;
  }
}
// Cerrar la conexión a la base de datos
$db->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Iniciar Sesion</title>
  <style>
    body {
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>Iniciar Sesion</h1>

  <form action="" method="post">
    <label for="email">Email:</label><br>
    <input type="text" name="email" placeholder="Email" required><br><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" name="password" placeholder="Contraseña" required><br><br>

    <input type="submit" value="Iniciar Sesion"><br><br>

    <p>¿No tienes una cuenta?</p>
    <a href="registro.php">Registrarse</a>

    <?php
    // Mostrar un mensaje de error si las credenciales son inválidas
    if (isset($_GET['error']) && $_GET['error'] == 1) {
      echo "<p style='color:red'>Credenciales inválidas. Por favor, inténtelo de nuevo.</p>";
    }
    ?>
  </form>
</body>
</html>
