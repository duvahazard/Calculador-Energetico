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
-- Table structure for table `ce_fotovoltaico_respuesta_t32fv19`
--

DROP TABLE IF EXISTS `ce_fotovoltaico_respuesta_t32fv19`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ce_fotovoltaico_respuesta_t32fv19` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `azFVt` float(9,6) DEFAULT NULL,
  `altFVt` float(9,6) DEFAULT NULL,
  `aeff` float(9,6) DEFAULT NULL,
  `potenciaCS` float(9,3) DEFAULT NULL,
  `potenciaCL` float(9,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ce_fotovoltaico_respuesta_t32fv19`
--

LOCK TABLES `ce_fotovoltaico_respuesta_t32fv19` WRITE;
/*!40000 ALTER TABLE `ce_fotovoltaico_respuesta_t32fv19` DISABLE KEYS */;
INSERT INTO `ce_fotovoltaico_respuesta_t32fv19` VALUES (1,'2011-01-01 23:10:00',0.937466,0.968733,0.080209,2.939,2.939),(2,'2011-01-01 23:20:00',0.907753,0.953877,0.118722,4.607,4.607),(3,'2011-01-01 23:30:00',0.878592,0.939296,0.156989,6.873,6.873),(4,'2011-01-01 23:40:00',0.850316,0.925158,0.194715,9.782,9.782),(5,'2011-01-01 23:50:00',0.823153,0.911576,0.231723,13.198,13.198),(6,'2011-01-02 00:00:00',0.797271,0.898636,0.267892,16.977,16.977),(7,'2011-01-02 00:10:00',0.772808,0.886404,0.303121,20.967,20.967),(8,'2011-01-02 00:20:00',0.749857,0.874929,0.337342,25.040,25.040),(9,'2011-01-02 00:30:00',0.728530,0.864265,0.370438,29.122,29.122),(10,'2011-01-02 00:40:00',0.708865,0.854432,0.402362,33.084,33.084),(11,'2011-01-02 00:50:00',0.690895,0.845448,0.433052,37.005,37.005),(12,'2011-01-02 01:00:00',0.674631,0.837316,0.462442,40.777,40.777),(13,'2011-01-02 01:10:00',0.660060,0.830030,0.490474,44.360,44.360),(14,'2011-01-02 01:20:00',0.647147,0.823574,0.517094,47.802,47.802),(15,'2011-01-02 01:30:00',0.635836,0.817918,0.542248,51.081,51.081),(16,'2011-01-02 01:40:00',0.626049,0.813025,0.565888,54.265,54.265),(17,'2011-01-02 01:50:00',0.617696,0.808848,0.587969,57.160,57.160),(18,'2011-01-02 02:00:00',0.610669,0.805334,0.608445,59.923,59.923),(19,'2011-01-02 02:10:00',0.604849,0.802424,0.627280,62.446,62.446),(20,'2011-01-02 02:20:00',0.600110,0.800055,0.644436,64.804,64.804),(21,'2011-01-02 02:30:00',0.596323,0.798161,0.659880,66.983,66.983),(22,'2011-01-02 02:40:00',0.593356,0.796678,0.673583,68.863,68.863),(23,'2011-01-02 02:50:00',0.591084,0.795542,0.685517,70.527,70.527),(24,'2011-01-02 03:00:00',0.589388,0.794694,0.695661,72.064,72.064),(25,'2011-01-02 03:10:00',0.588159,0.794080,0.703995,73.250,73.250),(26,'2011-01-02 03:20:00',0.587306,0.793653,0.710502,74.177,74.177),(27,'2011-01-02 03:30:00',0.586751,0.793376,0.715170,74.939,74.939),(28,'2011-01-02 03:40:00',0.586440,0.793220,0.717992,75.316,75.316),(29,'2011-01-02 03:50:00',0.586337,0.793168,0.718960,75.516,75.516),(30,'2011-01-02 04:00:00',0.586431,0.793215,0.718073,75.324,75.324),(31,'2011-01-02 04:10:00',0.586733,0.793366,0.715332,74.954,74.954),(32,'2011-01-02 04:20:00',0.587276,0.793638,0.710743,74.199,74.199),(33,'2011-01-02 04:30:00',0.588115,0.794058,0.704315,73.280,73.280),(34,'2011-01-02 04:40:00',0.589325,0.794663,0.696061,72.100,72.100),(35,'2011-01-02 04:50:00',0.591000,0.795500,0.685995,70.673,70.673),(36,'2011-01-02 05:00:00',0.593244,0.796622,0.674137,68.912,68.912),(37,'2011-01-02 05:10:00',0.596178,0.798089,0.660511,67.036,67.036),(38,'2011-01-02 05:20:00',0.599927,0.799964,0.645142,64.863,64.863),(39,'2011-01-02 05:30:00',0.604622,0.802311,0.628059,62.604,62.604),(40,'2011-01-02 05:40:00',0.610392,0.805196,0.609296,59.989,59.989),(41,'2011-01-02 05:50:00',0.617365,0.808683,0.588889,57.320,57.320),(42,'2011-01-02 06:00:00',0.625659,0.812829,0.566877,54.338,54.338),(43,'2011-01-02 06:10:00',0.635381,0.817691,0.543303,51.242,51.242),(44,'2011-01-02 06:20:00',0.646625,0.823313,0.518213,47.962,47.962),(45,'2011-01-02 06:30:00',0.659468,0.829734,0.491655,44.519,44.519),(46,'2011-01-02 06:40:00',0.673966,0.836983,0.463682,40.935,40.935),(47,'2011-01-02 06:50:00',0.690157,0.845079,0.434348,37.161,37.161),(48,'2011-01-02 07:00:00',0.708054,0.854027,0.403714,33.237,33.237),(49,'2011-01-02 07:10:00',0.727647,0.863824,0.371839,29.271,29.271),(50,'2011-01-02 07:20:00',0.748905,0.874453,0.338792,25.185,25.185),(51,'2011-01-02 07:30:00',0.771787,0.885894,0.304616,21.105,21.105),(52,'2011-01-02 07:40:00',0.796188,0.898094,0.269429,17.157,17.157),(53,'2011-01-02 07:50:00',0.822011,0.911006,0.233298,13.362,13.362),(54,'2011-01-02 08:00:00',0.849124,0.924562,0.196321,9.928,9.928),(55,'2011-01-02 08:10:00',0.877357,0.938678,0.158622,7.000,7.000),(56,'2011-01-02 08:20:00',0.906487,0.953244,0.120372,4.690,4.690),(57,'2011-01-02 08:30:00',0.936187,0.968094,0.081860,2.997,2.997),(58,'2011-01-02 08:40:00',0.965891,0.982946,0.043664,1.608,1.608),(59,'2011-01-02 08:50:00',0.994432,0.997216,0.007121,0.268,0.268),(60,'2011-01-02 09:00:00',1.019760,1.009880,-0.025281,0.000,0.000);
/*!40000 ALTER TABLE `ce_fotovoltaico_respuesta_t32fv19` ENABLE KEYS */;
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