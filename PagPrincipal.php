<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345";
$database = "AdoptaUnaMascota";

// Crear conexión
$db = new mysqli($servername, $username, $password, $database);

// Verificar si la conexión fue exitosa
if ($db->connect_error) {
    die("Error al conectar con la base de datos: " . $db->connect_error);
}

// Consulta para obtener datos de la tabla
$query = "SELECT * FROM nombre_de_la_tabla";
$result = $db->query($query);

//INSERTAR IMAGENES


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .column {
            flex: 25%;
            padding: 5px;
        }

        .image-square {
            background-color: #eaeaea;
            height: 200px;
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
        
        .filter-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .btn-ver-mas {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #f2f2f2;
            border: none;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }


    </style>
      
</head>
<body>
    <header>
        <img src="/home/prasamsa/Pictures/imagenes/perro1.jpg" alt="Logo Mascota">
        <a href="login.php">Iniciar Sesión</a>
    </header>
    
    <nav>
        <a href="#">Protectoras</a>
        <a href="#">Encontrar tu mascota</a>
        <a href="#">Dar en Adopción</a>
        <a href="#">Perfil</a>
    </nav>
    
    <div class="container">
    <div class="sidebar">
        <h3>Filtrado</h3>
        <div>
            <label for="raza">Raza:</label>
            <select id="raza" name="raza">
              <option value="">Todas</option>
              <option value="labrador">Labrador</option>
              <option value="bulldog">Bulldog</option>
              <option value="pastor">Pastor Alemán</option>
              <option value="siames">Siamés</option>
            </select>
          </div>
          <div>
          <label for="edad">Edad:</label>
          <select id="edad" name="edad">
            <option value="">Todas</option>
            <option value="0-1">0 - 1 año</option>
            <option value="1-3">1 - 3 años</option>
            <option value="3-5">3 - 5 años</option>
            <option value="5+">Más de 5 años</option>
          </select>
        </div>
        <div>
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo">
          <option value="">Todos</option>
          <option value="macho">Macho</option>
          <option value="hembra">Hembra</option>
          </select>
          </div>
          <div>
          <label for="peso">Peso:</label>
          <select id="peso" name="peso">
          <option value="">Todos</option>
          <option value="0-10">0 - 10 kg</option>
          <option value="10-20">10 - 20 kg</option>
          <option value="20-30">20 - 30 kg</option>
          <option value="30+">Más de 30 kg</option>
          </select>
          </div>
          <div>
          <label for="tamaño">Tamaño:</label>
          <select id="tamaño" name="tamaño">
          <option value="">Todos</option>
          <option value="pequeño">Pequeño</option>
          <option value="mediano">Mediano</option>
          <option value="grande">Grande</option>
          </select>
          </div>
          <div>
          <label for="pais">País:</label>
          <select id="pais" name="pais">
          <option value="">Todos</option>
          <option value="espana">España</option>
          <option value="mexico">México</option>
          <option value="argentina">Argentina</option>
          <option value="colombia">Colombia</option>
          </select>
          </div>
          <div>
          <label for="personalidad">Personalidad:</label>
          <select id="personalidad" name="personalidad">
          <option value="">Todas</option>
          <option value="jugueton">Juguetón</option>
          <option value="amigable">Amigable</option>
          <option value="cariñoso">Cariñoso</option>
          <option value="tranquilo">Tranquilo</option>
          </select>
          </div>
          <div>
          <label for="provincia">Provincia:</label>
          <select id="provincia" name="provincia">
          <option value="">Todas</option>
          <option value="madrid">Madrid</option>
          <option value="barcelona">Barcelona</option>
          <option value="valencia">Valencia</option>
          <option value="sevilla">Sevilla</option>
          </select>
          </div>
        
    </div>
    <div class="main-content">
        <div class="row">
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
            <div class="column">
                <div class="image-square"></div>
            </div>
        </div>
        <button class="btn-ver-mas">Ver más</button>
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
