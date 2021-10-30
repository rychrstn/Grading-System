-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: hci_online_grading_3
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(12) NOT NULL,
  `Password` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Prof_ID` int NOT NULL,
  `Subject_ID` int NOT NULL,
  `Student_ID` int DEFAULT NULL,
  `Grades` int NOT NULL,
  `Term` varchar(20) NOT NULL,
  `Remarks` varchar(20) DEFAULT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateTimeUpdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,1,1,5,80,'Prelim',NULL,'2021-10-30 12:34:14','2021-10-30 12:34:14'),(2,1,1,5,90,'Midterm',NULL,'2021-10-30 12:34:14','2021-10-30 12:34:14'),(3,1,1,5,85,'Final',NULL,'2021-10-30 12:34:14','2021-10-30 12:34:14'),(4,2,2,5,85,'Prelim',NULL,'2021-10-30 12:34:14','2021-10-30 12:34:14'),(5,2,2,5,83,'Midterm',NULL,'2021-10-30 12:34:14','2021-10-30 12:34:14'),(6,2,2,5,95,'Final',NULL,'2021-10-30 12:34:14','2021-10-30 12:34:14');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Middlename` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateTImeUpdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'roger','$2y$10$/oH66wpyAFRctbo1vX1lE.P1SWuSWuuP0zy.bNHr9MqdVow/QYR.G','rogelio','unknown','plaza ','3rd yr - BSCS','2021-10-23 11:22:38','2021-10-23 11:22:39'),(2,'bernard','$2y$10$b3nw0eo2eKnWrruydybXDew9F3fjt5VDoq3bjz4CgTWmC67ta7Gru','bernard ','unknown','gresola','3rd yr - BSCS','2021-10-24 01:14:17','2021-10-24 01:14:17');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `StudentID` varchar(20) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Middlename` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `YearAndCourse` varchar(20) NOT NULL,
  `ContactNumber` int NOT NULL,
  `StudentStatus` varchar(20) NOT NULL,
  `Valid` tinyint(1) NOT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateTimeUpdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'aaass','$2y$10$PKzeB8sPzGYR8m77Zbilluoc/m.5YsSV3HmgVraXguXC2oyKUOS1y','213123','aass','ss','dd','2-c',123123123,'Regular',0,'2021-10-22 17:38:39','2021-10-22 17:38:58'),(2,'test','$2y$10$/NUC.YU.uSgtWbGbqBYP1uWNCJDcWBfNxf/VqZ8hpabUqn1H4u/DS','12345','test','test','te3st','test',1223,'Regular',0,'2021-10-30 11:40:04','2021-10-30 11:40:04'),(3,'test','$2y$10$CzSAVYgR1zFY9/JpTEpNP.GDIyycKXikHVIFFak7LGDd1Q21yw6e6','12345','test','test','te3st','test',1223,'Regular',0,'2021-10-30 11:40:56','2021-10-30 11:40:56'),(4,'test','$2y$10$RgBeAoV/j2Ov0Soegy9.Ne3l969vUH8pUznSh/Ld59gHepwwgkXlO','12345','1231321','123','1323211','1231',1321,'Irreguar',0,'2021-10-30 11:41:54','2021-10-30 11:41:54'),(5,'dranreb','$2y$10$7tnoeIh1/uRj3.mcJEein.6kzMapYSyVvlBDk1MjWeXtuqOSXCPl2','1231321321','321321','32132132','1321321','12321',12331,'Regular',0,'2021-10-30 12:21:18','2021-10-30 12:21:18');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `SubjectCode` varchar(20) NOT NULL,
  `SubjectName` varchar(20) NOT NULL,
  `Unit` tinyint(1) NOT NULL,
  `DateTimeCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `DateTimeUpdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'AR101','Human Computer Inter',3,'2021-10-23 11:22:58','2021-10-23 11:22:58'),(2,'Al102','Automata Theory and ',3,'2021-10-23 11:23:14','2021-10-23 11:23:14'),(3,'HCI101','Human Computer Inter',3,'2021-10-24 01:14:30','2021-10-24 01:14:30'),(4,'CS1','Introduction',3,'2021-10-30 12:31:02','2021-10-30 12:31:02');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hci_online_grading_3'
--

--
-- Dumping routines for database 'hci_online_grading_3'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-30 12:43:58
