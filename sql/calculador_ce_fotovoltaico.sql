CREATE DATABASE  IF NOT EXISTS `calculador` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `calculador`;
-- MySQL dump 10.13  Distrib 5.1.34, for apple-darwin9.5.0 (i386)
--
-- Host: localhost    Database: calculador
-- ------------------------------------------------------
-- Server version	5.5.12

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
-- Table structure for table `ce_fotovoltaico`
--

DROP TABLE IF EXISTS `ce_fotovoltaico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ce_fotovoltaico` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `terreno` int(11) DEFAULT NULL,
  `delL` float(6,3) DEFAULT NULL,
  `delH` float(6,3) DEFAULT NULL,
  `azFV` float(6,3) DEFAULT NULL,
  `altFV` float(6,3) DEFAULT NULL,
  `IR` float(4,3) DEFAULT NULL,
  `QE` float(5,3) DEFAULT NULL,
  `x` float(6,3) DEFAULT NULL,
  `y` float(6,3) DEFAULT NULL,
  `z` float(6,3) DEFAULT NULL,
  `respuesta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ce_fotovoltaico`
--

LOCK TABLES `ce_fotovoltaico` WRITE;
/*!40000 ALTER TABLE `ce_fotovoltaico` DISABLE KEYS */;
INSERT INTO `ce_fotovoltaico` VALUES (18,32,1.580,0.790,3.142,1.047,1.600,21.600,0.000,0.000,0.000,'ce_fotovoltaico_respuesta_t32fv18'),(19,32,1.580,0.790,3.142,1.571,1.600,21.600,0.000,0.000,0.000,'ce_fotovoltaico_respuesta_t32fv19'),(20,34,1.580,0.790,3.142,0.785,1.600,21.600,0.000,0.000,0.000,''),(21,33,1.580,0.790,3.142,1.920,1.600,21.600,0.000,0.000,0.000,'');
/*!40000 ALTER TABLE `ce_fotovoltaico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-08-08 18:49:15
