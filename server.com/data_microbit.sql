-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: data_microbit
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `general_infor`
--

DROP TABLE IF EXISTS `general_infor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_infor` (
  `infor_num` int(11) NOT NULL AUTO_INCREMENT,
  `microbit_id` int(3) NOT NULL,
  `air_humidity` float NOT NULL,
  `soil_moisture` float NOT NULL,
  `temperature` float NOT NULL,
  `infor_time` datetime NOT NULL,
  PRIMARY KEY (`infor_num`,`microbit_id`),
  KEY `FK_MICROBITS` (`microbit_id`),
  CONSTRAINT `FK_MICROBITS` FOREIGN KEY (`microbit_id`) REFERENCES `microbits` (`microbit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_infor`
--

LOCK TABLES `general_infor` WRITE;
/*!40000 ALTER TABLE `general_infor` DISABLE KEYS */;
/*!40000 ALTER TABLE `general_infor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `microbits`
--

DROP TABLE IF EXISTS `microbits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `microbits` (
  `microbit_id` int(3) NOT NULL AUTO_INCREMENT,
  `microbit_name` varchar(50) NOT NULL,
  `microbit_accessToken` varchar(255) NOT NULL,
  `temperature_lower` float NOT NULL,
  `temperature_upper` float NOT NULL,
  `microbit_owner` int(3) NOT NULL,
  PRIMARY KEY (`microbit_id`),
  KEY `FK_OWNER` (`microbit_owner`),
  CONSTRAINT `FK_OWNER` FOREIGN KEY (`microbit_owner`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `microbits`
--

LOCK TABLES `microbits` WRITE;
/*!40000 ALTER TABLE `microbits` DISABLE KEYS */;
INSERT INTO `microbits` VALUES (1,'micro_1_1','0987654321acbdbd',15,30,1),(2,'micro_1_2','1234abcbbcbc132423',12,32,1);
/*!40000 ALTER TABLE `microbits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pump_infor`
--

DROP TABLE IF EXISTS `pump_infor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pump_infor` (
  `microbit_id` int(3) NOT NULL,
  `timeOn` datetime NOT NULL,
  `timeOff` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pump_infor`
--

LOCK TABLES `pump_infor` WRITE;
/*!40000 ALTER TABLE `pump_infor` DISABLE KEYS */;
/*!40000 ALTER TABLE `pump_infor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pump_status`
--

DROP TABLE IF EXISTS `pump_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pump_status` (
  `microbit_id` int(3) NOT NULL,
  `auto_watering` tinyint(1) DEFAULT NULL,
  `is_watering` tinyint(1) DEFAULT NULL,
  `pump_on` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pump_status`
--

LOCK TABLES `pump_status` WRITE;
/*!40000 ALTER TABLE `pump_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `pump_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin1','1234','admin1@gmail.com','0123456789abcdef');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-14 17:32:28
