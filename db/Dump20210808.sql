-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: covid_ts
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `map`
--

DROP TABLE IF EXISTS `map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `map` (
  `id` int NOT NULL AUTO_INCREMENT,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `patient_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map`
--

LOCK TABLES `map` WRITE;
/*!40000 ALTER TABLE `map` DISABLE KEYS */;
INSERT INTO `map` VALUES (22,79.902300,54.090000,'3'),(23,79.902300,54.090000,'3'),(24,79.902300,54.090000,'3'),(25,79.902300,54.090000,'3'),(26,79.902300,54.090000,'3'),(27,79.902300,54.090000,'3'),(28,79.902300,54.090000,'3'),(29,79.902300,54.090000,'3'),(30,79.902300,54.090000,'3'),(31,79.902300,54.090000,'3'),(32,79.902300,54.090000,'3'),(33,79.902300,54.090000,'3'),(34,79.902300,54.090000,'3'),(35,79.902300,54.090000,'3'),(36,79.902300,54.090000,'3'),(37,79.902300,54.090000,'3'),(38,79.902300,54.090000,'3'),(39,79.902300,54.090000,'3'),(40,79.902300,54.090000,'3'),(41,79.902300,54.090000,'3'),(42,79.902300,54.090000,'3'),(43,79.902300,54.090000,'3'),(44,79.902300,54.090000,'3'),(45,79.902300,54.090000,'3'),(46,79.902300,54.090000,'3'),(47,79.902300,54.090000,'3'),(48,79.902300,54.090000,'3'),(49,79.902300,54.090000,'3'),(50,79.902300,54.090000,'3'),(51,79.902300,54.090000,'3'),(52,79.902300,54.090000,'3'),(53,79.902300,54.090000,'3'),(54,79.902300,54.090000,'3'),(55,79.902300,54.090000,'3'),(56,79.902300,54.090000,'3'),(57,79.902300,54.090000,'3'),(58,79.902300,54.090000,'3'),(59,79.902300,54.090000,'3');
/*!40000 ALTER TABLE `map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `officers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(450) DEFAULT NULL,
  `address` varchar(450) DEFAULT NULL,
  `centre` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `officers`
--

LOCK TABLES `officers` WRITE;
/*!40000 ALTER TABLE `officers` DISABLE KEYS */;
INSERT INTO `officers` VALUES (5,'wer',' re','wr','34','re','32'),(6,'user','rfrf','maharagama','0766654560','aa@gmail.c0m','123'),(7,'sddsdfdf','rfrf','maharagama','07666545687','aa@gmail.c0m','123'),(8,'sddsdfdf','rfrf','kaluthara','076665632','aa@gmail.c0m','123');
/*!40000 ALTER TABLE `officers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `id` int NOT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `address` varchar(450) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `photo` varchar(450) DEFAULT NULL,
  `center_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'marvin garvis',' 93A rediie street, chicago','98','+473456786','',NULL),(2,'selena wesl',' 34A arthure street, miami','79','+78675456','',NULL),(3,'pasan','colocmbo','45','+94765567980',NULL,1);
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quarantine_centres`
--

DROP TABLE IF EXISTS `quarantine_centres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quarantine_centres` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `centre_location` varchar(45) DEFAULT NULL,
  `center_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quarantine_centres`
--

LOCK TABLES `quarantine_centres` WRITE;
/*!40000 ALTER TABLE `quarantine_centres` DISABLE KEYS */;
INSERT INTO `quarantine_centres` VALUES (2,79.90230000,54.09000000,'maharagama','1');
/*!40000 ALTER TABLE `quarantine_centres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_status`
--

DROP TABLE IF EXISTS `sms_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sms_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sms_status` varchar(1) DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_status`
--

LOCK TABLES `sms_status` WRITE;
/*!40000 ALTER TABLE `sms_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_location_history`
--

DROP TABLE IF EXISTS `user_location_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_location_history` (
  `id` int NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `detail` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_location_history`
--

LOCK TABLES `user_location_history` WRITE;
/*!40000 ALTER TABLE `user_location_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_location_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'covid_ts'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-08 12:49:31
