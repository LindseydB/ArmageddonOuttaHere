-- MariaDB dump 10.18  Distrib 10.5.8-MariaDB, for osx10.15 (x86_64)
--
-- Host: localhost    Database: armageddon
-- ------------------------------------------------------
-- Server version	10.5.8-MariaDB

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL,
  `bookingdate` datetime DEFAULT NULL,
  `seats` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,2,'2020-12-03 13:19:00','[\"A2\",\"B3\",\"C4\"]'),(2,2,'2020-12-03 13:19:00','[\"A4\",\"A5\",\"A6\"]'),(3,2,'2020-12-03 10:06:00','[\"J1\",\"J2\",\"J3\"]'),(4,2,'2020-12-03 10:06:00','[\"A2\",\"A3\",\"B4\"]'),(5,2,'2020-12-03 13:19:00','[\"B2\"]'),(6,2,'2020-12-03 10:06:00','[\"A4\",\"A5\",\"A6\"]'),(7,2,'2020-12-03 13:19:00','[\"H6\",\"H7\",\"H8\"]'),(8,2,'2020-12-03 10:06:00','[\"A1\"]'),(9,2,'2020-12-03 10:06:00','[\"A7\"]'),(10,2,'2020-12-03 10:06:00','[\"J10\"]'),(11,2,'2020-12-03 10:06:00','[\"D1\"]'),(12,2,'2020-12-03 10:06:00','null'),(13,2,'2020-12-03 10:06:00','null'),(14,2,'2020-12-03 10:06:00','null'),(15,2,'2020-12-03 10:06:00','[\"G4\"]');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_member`
--

LOCK TABLES `tbl_member` WRITE;
/*!40000 ALTER TABLE `tbl_member` DISABLE KEYS */;
INSERT INTO `tbl_member` VALUES (1,'lindsey','$2y$10$bvjJriMhqKwQ1fDmYAzU/eDQxlRCV29fiZBAZo7qgWDdvVQNVJtz2','lindsey@switched.com.au','2020-11-30 09:36:13'),(2,'Chewie','$2y$10$NDvrwWpWye13fJLFpM4BxODXo7CC3nTYiQOwv1XFviK68/FzDfizW','hello@switched.com.au','2020-11-30 09:49:05'),(3,'tester','$2y$10$YuoeNWPDCL8jheru3yJPfOSBMpfhye1SNaOt/7PqUWrTRbU4BwJVq','test@test.com','2020-11-30 19:17:34'),(4,'LindseydB','$2y$10$YCkNGrtLTBCnE.X.m0cAN.elmmkD5wGt8goyT8.Qj1wuvIrMZsPje','Test123@test.com','2020-12-02 04:58:42'),(5,'ChewieLou','$2y$10$JnxxxfnBbyu2q89/152ZNOQjA1vjnY7YTJp7GGEOjo5SAVKfnvXpi','tes@test.comc','2020-12-02 05:00:33'),(6,'Test123','$2y$10$2i9rnm8GJCFNebngZFVApu6sf17dZQri7M5lN3Tl72NNqSLDoid0O','ty@ty.co','2020-12-02 08:14:45');
/*!40000 ALTER TABLE `tbl_member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-02 21:58:55
