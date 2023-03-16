-- MySQL dump 10.13  Distrib 5.5.42, for osx10.6 (i386)
--
-- Host: localhost    Database: sss-csti
-- ------------------------------------------------------
-- Server version	5.5.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `info_computadora`
--

DROP TABLE IF EXISTS `info_computadora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_computadora` (
  `folio` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cargador` varchar(2) NOT NULL,
  PRIMARY KEY (`folio`),
  UNIQUE KEY `folio_UNIQUE` (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_computadora`
--

LOCK TABLES `info_computadora` WRITE;
/*!40000 ALTER TABLE `info_computadora` DISABLE KEYS */;
/*!40000 ALTER TABLE `info_computadora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_persona`
--

DROP TABLE IF EXISTS `info_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_persona` (
  `folio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ap_paterno` varchar(50) NOT NULL,
  `ap_materno` varchar(50) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cargador` varchar(2) NOT NULL,
  `software` varchar(200) NOT NULL,
  `problema` varchar(200) NOT NULL,
  `recibido_por` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'EN PROCESO',
  `finalizado_por` varchar(100) NOT NULL,
  `fecha_recepcion` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  PRIMARY KEY (`folio`),
  UNIQUE KEY `folio_UNIQUE` (`folio`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_persona`
--

LOCK TABLES `info_persona` WRITE;
/*!40000 ALTER TABLE `info_persona` DISABLE KEYS */;
INSERT INTO `info_persona` VALUES (1,'IVAN','CHAVEZ','MORALES','MACBOOK AIR','1234','NO','OFFICE','','PROFE','FINALIZADO','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'IVAN','CHAVEZ','MORALES','MAC','i','SI','HOLA','OJO','OR','EN PROCESO','','2016-10-18 06:25:57','0000-00-00 00:00:00'),(3,'IVAN','CHAVEZ','MORALES','OTRA MAC','123','NO','','OK','IVAN','FINALIZADO','PROFE','2016-10-18 09:47:37','0000-00-00 00:00:00'),(4,'IVAN','CHAVEZ','MORALES','ACER','123','NO','OTRO','','IVAN','FINALIZADO','PROFE','2016-10-18 04:44:04','2016-10-31 11:35:18'),(5,'IVAN','CHAVEZ','MORALES','I','i','SI','I','I','I','EN PROCESO','','2016-10-18 04:44:42','0000-00-00 00:00:00'),(6,'I','I','I','I','i','SI','I','I','I','EN PROCESO','','2016-10-18 04:47:55','0000-00-00 00:00:00'),(7,'A','A','A','A','a','SI','A','','A','EN PROCESO','','2016-10-18 04:51:40','0000-00-00 00:00:00'),(8,'K','K','K','K','k','SI','K','K','K','EN PROCESO','','2016-10-18 04:51:49','0000-00-00 00:00:00'),(9,'K','K','K','K','k','SI','K','K','K','EN PROCESO','','2016-10-18 04:53:30','0000-00-00 00:00:00'),(10,'PAKO','PAKO','PAKO','PAKO','pako','NO','PAKO','PAKO','PAKO','FINALIZADO','','2016-10-18 04:53:49','0000-00-00 00:00:00'),(11,'','','','','123','NO','','','','EN PROCESO','','2016-10-31 09:46:34','0000-00-00 00:00:00'),(12,'FULANITO','DE TAL','ALGO','MAC','1234','NO','PHOTOSHOP','','ADAN','FINALIZADO','PROFE','2016-10-31 01:49:40','2016-10-31 01:50:25');
/*!40000 ALTER TABLE `info_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recepcion`
--

DROP TABLE IF EXISTS `recepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recepcion` (
  `folio` int(11) NOT NULL,
  `recibido_por` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `finalizado_por` varchar(100) NOT NULL,
  `fecha_recepcion` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  PRIMARY KEY (`folio`),
  UNIQUE KEY `folio_UNIQUE` (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepcion`
--

LOCK TABLES `recepcion` WRITE;
/*!40000 ALTER TABLE `recepcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `recepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `folio` int(11) NOT NULL,
  `inst_software` varchar(200) NOT NULL,
  `problema` varchar(200) NOT NULL,
  PRIMARY KEY (`folio`),
  UNIQUE KEY `folio_UNIQUE` (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


drop table if exists usuario;
create table if not exists usuario(
	idUsuario int not null auto_increment primary key,
    usuario varchar(50) not null unique,
    contraseña varchar(50) not null,
    tipo varchar(50) not null,
    nombre varchar(100) not null,
    apellido varchar(100) not null
);

insert into usuario(usuario,contraseña,tipo,nombre,apellido) values('Csti','','Administrador','','');

-- Dump completed on 2016-10-31 17:22:04
