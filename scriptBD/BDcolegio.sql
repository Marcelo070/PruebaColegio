-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: colegio
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `ALU_id` int NOT NULL AUTO_INCREMENT,
  `ALU_nombres` varchar(50) NOT NULL,
  `ALU_apellidos` varchar(50) NOT NULL,
  `ALU_fechNaci` date NOT NULL,
  `ALU_sexo` varchar(10) NOT NULL,
  PRIMARY KEY (`ALU_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,'Marcelo','Condori Medina','2000-12-18','Hombre'),(2,'Renzo Edu','Medina Ormachea','1995-09-28','Hombre'),(7,'Mariana','Medina Salome','2000-05-02','Mujer');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `CUR_id` int NOT NULL AUTO_INCREMENT,
  `CUR_nombre` varchar(20) NOT NULL,
  `CUR_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CUR_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Matematicas','Curso de matematicas . . .'),(2,'Geografia','Curso de geografia . . .'),(3,'Lenguaje','Curso de lenguaje . . .');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `NOT_id` int NOT NULL AUTO_INCREMENT,
  `ALU_id` int NOT NULL,
  `CUR_id` int NOT NULL,
  `NOT_pc1` float DEFAULT NULL,
  `NOT_pc2` float DEFAULT NULL,
  `NOT_pc3` float DEFAULT NULL,
  `NOT_parcial` float DEFAULT NULL,
  `NOT_final` float DEFAULT NULL,
  `NOT_promedio` float DEFAULT NULL,
  PRIMARY KEY (`NOT_id`),
  KEY `FK_ALU_id_idx` (`ALU_id`),
  KEY `FK_CUR_id_idx` (`CUR_id`),
  CONSTRAINT `FK_ALU_id` FOREIGN KEY (`ALU_id`) REFERENCES `alumnos` (`ALU_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CUR_id` FOREIGN KEY (`CUR_id`) REFERENCES `cursos` (`CUR_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (1,1,1,10,15,18,17,10,NULL),(2,1,2,12,10,15,10,13,NULL),(3,2,1,15,10,2,12,12,NULL),(4,1,3,10,10,10,10,10,NULL),(6,2,2,5,8,10,20,1,NULL),(7,2,3,2,15,10,14,10,NULL),(8,7,1,NULL,NULL,NULL,NULL,NULL,NULL),(12,7,2,NULL,NULL,NULL,NULL,NULL,NULL),(13,7,3,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'colegio'
--

--
-- Dumping routines for database 'colegio'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-22 10:52:32
