-- MariaDB dump 10.19  Distrib 10.5.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: AdoptaUnaMascota
-- ------------------------------------------------------
-- Server version	10.5.18-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mascotas` (
  `idMascota` int(11) NOT NULL AUTO_INCREMENT,
  `idProtectora` int(11) NOT NULL,
  `idPreAdopcion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `especie` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL,
  `raza` varchar(45) NOT NULL,
  `tamaño` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fechaNacimiento` int(11) NOT NULL,
  `fechaAdopcion` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nivelActividad` varchar(45) NOT NULL,
  `posibilidadAdopcion` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `localidad` varchar(45) NOT NULL,
  `entrega` varchar(45) NOT NULL,
  `tasa` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `enfermedad` varchar(45) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `personalidad` varchar(45) NOT NULL,
  `token` varchar(500) NOT NULL,
  PRIMARY KEY (`idMascota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascotas`
--

LOCK TABLES `mascotas` WRITE;
/*!40000 ALTER TABLE `mascotas` DISABLE KEYS */;
/*!40000 ALTER TABLE `mascotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `protectoras`
--

DROP TABLE IF EXISTS `protectoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protectoras` (
  `idProtectora` int(11) NOT NULL AUTO_INCREMENT,
  `idMascota` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contacto` int(11) NOT NULL,
  `animales` int(11) NOT NULL,
  `adopcion` int(11) NOT NULL,
  `urgente` int(11) NOT NULL,
  `acogida` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`idProtectora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protectoras`
--

LOCK TABLES `protectoras` WRITE;
/*!40000 ALTER TABLE `protectoras` DISABLE KEYS */;
/*!40000 ALTER TABLE `protectoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitarAdopcion`
--

DROP TABLE IF EXISTS `solicitarAdopcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitarAdopcion` (
  `idUsuario` int(11) NOT NULL,
  `idsolicitarAdopcion` int(11) NOT NULL AUTO_INCREMENT,
  `idMascota` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitarAdopcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitarAdopcion`
--

LOCK TABLES `solicitarAdopcion` WRITE;
/*!40000 ALTER TABLE `solicitarAdopcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitarAdopcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `confirmarEmail` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `confirmarContraseña` varchar(255) DEFAULT NULL,
  `estadoCivil` varchar(45) DEFAULT NULL,
  `profesion` varchar(45) DEFAULT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `codPostal` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-26  9:19:36
