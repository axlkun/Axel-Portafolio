-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: axel-portafolio
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas` (
  `idcuentas` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  PRIMARY KEY (`idcuentas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,'axlkun@portafolio.com','$2y$10$Ap6sGD7W9ihmMass.gFRkezYtxdT/s1t9TRDhnpGCLQbE2bx3dpCa');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensajes` (
  `idmensajes` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mensaje` longtext NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL,
  PRIMARY KEY (`idmensajes`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` VALUES (2,'admin@sistemas.com','Axel','Hola buen dia, me gusta hsu trabajo y me gustaria que tarbajaramos juntos en un proyecto que tengo en mente acerca de un emprendimiento que tiene todo el potencial para posicionarse como uno de los mejores en su giro.','20/11/22','');
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyectos` (
  `idproyectos` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` longtext NOT NULL,
  `link` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tecnologias` varchar(100) NOT NULL,
  `github` varchar(200) NOT NULL,
  PRIMARY KEY (`idproyectos`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (10,'Inventario Ayuntamiento','Aplicación web para la gestión de inventario del departamento de sistemas del Ayuntamiento de Álamo Temapache. (La pagina oficial por motivos de privacidad no puede ser mostrada) <br> Demo-> usuario: admin@sistemas contraseña: sysadmin2022','http://sistemas-ayuntamiento.infinityfreeapp.com/','c28260602300a8319590b2a060d4c0a8.jpg','HTML | CSS | Sass | JavaScript | Gulp | PHP | MySQL','https://github.com/axlkun/Inventario-Ayuntamiento'),(14,'Bienes Raices','Sitio web para la publicación de propiedades en venta. Cuenta con un panel de admnistración para gestionar los anuncios y los vendedores. Credenciales para entrar -> usuario: correo@bienesraices.com contraseña: 123456','http://realstate.infinityfreeapp.com/login.php','5a531a81b6e001c63f1ffe279946859f.jpg','HTML | CSS | Sass | JavaScript | Gulp | PHP | MySQL','https://github.com/axlkun/Bienes-Raices-Full-Website'),(15,'Portafolio','Portafolio web donde recopilo información acerca de mi, tecnologías que uso y los proyectos que voy realizando. Cuenta con un panel de administración para actualizar dicha información.','/index.php','a5648b73d6da8440a541ee6bf3aaafb2.jpg','HTML | CSS | Sass | JavaScript | Gulp | PHP | MySQL','En proceso'),(17,'Rock y EDM Festival','Sitio informativo de un festival de música con galeria de imágenes enfocado completamente en el performance, reduciendo el peso del proyecto y optimizando tiempos de carga.','https://festival-edm-rock-frontend.netlify.app/','3f80043f0363a6855b62e3d70b87ccc5.jpg','HTML | CSS | Sass | JavaScript | Gulp','https://github.com/axlkun/FrontendFestival'),(18,'Blog de Café','Maquetación de un sitio web estilo Blog adaptable a todos los dispositivos, con 5 secciones: <br> Index, Entrada de blog, Proximos cursos y talleres, Sobre nosotros y Contacto.','https://siteblogdecafe.netlify.app/','0d3a7a23d0ab6189dbd2c945c09805e1.jpg','HTML | CSS','https://github.com/axlkun/BlogDeCafe'),(19,'Frontend Store','Maquetación de una tienda virtual adaptable a todos los dispositivos con tres secciones: <br> Index (Productos), Nosotros <br> y Producto','https://frontendstorefordevs.netlify.app/','35f8ac69401066bfd39acd1eb742f1d0.jpg','HTML | CSS','https://github.com/axlkun/FrontendStore');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-05 20:14:06
