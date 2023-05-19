<?php
    // Verificar si se ha proporcionado un ID de mascota válido en la URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $mascotaId = $_GET['id'];

        // Aquí debes establecer la conexión a tu base de datos
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $dbname = "AdoptaUnaMascota";

        // Crear una conexión
        $db = new mysqli($servername, $username, $password, $dbname);

        // Verificar si la conexión es exitosa
        if ($db->connect_error) {
            die("La conexión a la base de datos falló: " . $db->connect_error);
        }

        // Consultar la información de la mascota utilizando el ID
        $sql = "SELECT * FROM mascotas WHERE id = $mascotaId";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // Existen registros, mostrar la información de la mascota
            while ($row = $result->fetch_assoc()) {
                // Acceder a los campos de la tabla y mostrar la información
                $nombre = $row['nombre'];
                $edad = $row['edad'];
                $raza = $row['raza'];
                $descripcion = $row['descripcion'];

                // Mostrar la información en el HTML
                echo "<h2>$nombre</h2>";
                echo "<p>Edad: $edad</p>";
                echo "<p>Raza: $raza</p>";
                echo "<p>Descripción: $descripcion</p>";
            }
        } else {
            echo "No se encontró información de la mascota.";
        }
        // Cerrar la conexión a la base de datos
        $db->close();
    } else {
        echo "ID de mascota no válido.";
    }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Usuario</title>
   
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
	<img src="https://thumbs.dreamstime.com/b/hilera-de-diferentes-razas-animales-compa%C3%B1%C3%ADa-y-perros-diferente-tama%C3%B1o-engendra-gatos-en-una-fila-juntos-mirando-la-c%C3%A1mara-226868618.jpg" alt="fondo">
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
        .container {
            margin: 20px auto;
            width: 90%;
            display: flex;
        }
        .sidebar {
            flex: 1;
            background-color: #eaeaea;
            padding: 10px;
        }
        .main-content {
            flex: 3;
        }
        .row-four-columns {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            justify-content: space-between;
        }
        .column {
            flex: 1;
            padding: 5px;
        }
        .image-square {
            background-color: #eaeaea;
            height: 200px;
            cursor: pointer;
        }
        #ver-mas {
            display: none;
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
        /*nuevo*/
        .hidden {
            display: none;
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

    <div class="main-content">
        <div class="row-four-columns">
            <div class="column">
                <a href="InfMascotas.php?id=1">
                    <div class="image-square"></div>
                    <h4>Nombre de la mascota 1</h4>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=2">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=3">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=4">
                    <div class="image-square"></div>
                </a>
            </div>
        </div>
        <div class="row-four-columns">
            <div class="column">
                <a href="InfMascotas.php?id=5">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=6">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=7">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=8">
                    <div class="image-square"></div>
                </a>
            </div>
        </div>
        <div class="row-four-columns">
            <div class="column">
                <a href="InfMascotas.php?id=9">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=10">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=11">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=12">
                    <div class="image-square"></div>
                </a>
            </div>
        </div>
        <div class="row-four-columns">
            <div class="column">
                <a href="InfMascotas.php?id=13">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=14">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=15">
                    <div class="image-square"></div>
                </a>
            </div>
            <div class="column">
                <a href="InfMascotas.php?id=16">
                    <div class="image-square"></div>
                </a>
            </div>
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

