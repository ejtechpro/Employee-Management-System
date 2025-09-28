-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: emp_db
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `dep_id` int NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) ON UPDATE CURRENT_TIMESTAMP(5),
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (3,'IT','2024-07-21 16:48:14.86911'),(6,'Finance','2024-01-26 19:32:14.65554'),(7,'Quality Assurance ','2024-01-26 19:32:49.76818'),(8,'Customer Support ','2024-01-26 19:33:20.40790'),(9,'sales','2024-02-05 10:15:52.87899'),(10,'product management ','2024-01-26 19:45:24.02603'),(11,'Human resource','2024-07-21 16:47:46.21380');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_working_info`
--

DROP TABLE IF EXISTS `emp_working_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emp_working_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dep_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_daily_rate` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_pay_method` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_position` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_hired_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_fk` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_working_info`
--

LOCK TABLES `emp_working_info` WRITE;
/*!40000 ALTER TABLE `emp_working_info` DISABLE KEYS */;
INSERT INTO `emp_working_info` VALUES (5,'emp206301','Quality Assurance ','product manager ','1500','monthly','  stuff',' active','2024-01-26 22:55:00'),(10,'emp605425','IT','hr','400','monthly','  member',' active','2024-07-21 20:08:00'),(11,'emp406305','Customer Support ','organizer','500','weekly','  member',' active','2025-09-28 16:59:00');
/*!40000 ALTER TABLE `emp_working_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_fname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_lname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_contact` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_address` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_maritalstatus` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_birthplace` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_age` int NOT NULL,
  `emp_role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emp_password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emp_id` (`emp_id`),
  UNIQUE KEY `emp_email` (`emp_email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (7,'emp206301','ej','tech','admin@gmail.com','2000-01-26','07346789756','34 Eldoret ','married','Kiambu ','male',24,'admin','1234','669d3c87809737.74618479.jpg'),(22,'emp406305','employee1','employee1','employee1@gmail.com','2025-09-29','0723457637','43 nairobi','married','nairobi','male',39,'employee','1234',NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_request`
--

DROP TABLE IF EXISTS `leave_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leave_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `leave_type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `leave_status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_request`
--

LOCK TABLES `leave_request` WRITE;
/*!40000 ALTER TABLE `leave_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `leave_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_type`
--

DROP TABLE IF EXISTS `leave_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leave_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_type`
--

LOCK TABLES `leave_type` WRITE;
/*!40000 ALTER TABLE `leave_type` DISABLE KEYS */;
INSERT INTO `leave_type` VALUES (3,'sick leave','2024-01-26 14:42:30'),(4,'personal leave','2024-01-26 14:47:12'),(5,'vacation leave','2024-01-26 22:39:17'),(6,'maternity/paternity leave','2024-01-26 22:40:37'),(7,'public holiday ','2024-01-26 22:41:02'),(8,'bereavement leave','2024-01-26 22:41:43'),(9,'jury duty leave','2024-01-26 22:42:43'),(10,'compensatory time','2024-01-26 22:43:46'),(13,'Unpaid Leave','2024-02-05 13:22:01');
/*!40000 ALTER TABLE `leave_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-28 17:10:37
