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
            background-color: blue;
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
        h2{
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
    <!-----------------CABECERA---------------------------->
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
 <!------------------------CUERPO----------------------------------->

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
       
        <textarea></textarea>
    </div>
</div>

<div class="image-gallery">
    <img class="imagen1" src="image1.jpg" alt="Image 1">
    <img class="imagen2" src="image2.jpg" alt="Image 2">
    <img class="imagen3" src="image3.jpg" alt="Image 3">
    <img class="imagen4" src="image1.jpg" alt="Image 1">
 
</div>
<div class="image-gallery">
    <img class="imagen1" src="image1.jpg" alt="Image 1">
    <img class="imagen2" src="image2.jpg" alt="Image 2">
    <img class="imagen3" src="image3.jpg" alt="Image 3">
    <img class="imagen4" src="image1.jpg" alt="Image 4">
</div>
<!-----------------------------PIE PAGINA------------------------------------>
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
