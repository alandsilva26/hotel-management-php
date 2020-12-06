-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: hotel
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `reservations`
--


DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `no_adults` int(11) DEFAULT NULL,
  `no_children` int(11) DEFAULT NULL,
  `reservation_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`reservation_id`),
  KEY `user_id` (`user_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  `room_name` varchar(30) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `room_featured` int(1) NOT NULL,
  `room_price` double(10,3) NOT NULL,
  `room_booked` int(1) DEFAULT 0,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `room_image` varchar(50) NOT NULL,
  `room_floor` int(11) NOT NULL,
  `room_view` varchar(20) NOT NULL,
  `room_beds` int(11) NOT NULL,
  `bed_type` varchar(30) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_amenities` varchar(200) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,101,'Daimond Suite','Daimond',1,538.220,0,NULL,NULL,'3.jpg',2,'Beach',2,'Double deluxe',4,'breakfast, lunch, dinner, wifi'),(2,101,'Daimond Suite','Silver',1,538.220,0,NULL,NULL,'4.jpg',5,'Beach',2,'Double deluxe',4,'breakfast, lunch, dinner, wifi'),(3,202,'Ocean View Suite','gold',0,788.000,0,NULL,NULL,'4.jpg',2,'Ocean',3,'Queen Bed',2,'Ocean View, Wifi, Double bathroom'),(4,303,'Premiun','Premium',1,674.000,0,NULL,NULL,'6.jpg',3,'Ocean',2,'Queen Bed',3,'Ocean View, Wifi, Double bathroom, hairdryer'),(5,202,'Ocean View Suite','gold',0,788.000,0,NULL,NULL,'5.jpg',2,'Ocean',3,'Queen Bed',7,'Ocean View, Wifi, Double bathroom'),(6,202,'Ocean View Suite','Silver',1,788.000,0,NULL,NULL,'1.jpg',2,'Ocean',3,'Queen Bed',7,'Ocean View, Wifi, Double bathroom'),(7,202,'Ocean View Suite','Gold',1,788.000,0,NULL,NULL,'7.jpg',2,'Ocean',3,'Queen Bed',7,'Ocean View, Wifi, Double bathroom'),(8,202,'Ocean View Suite','Premium',1,788.000,0,NULL,NULL,'1.jpg',2,'Ocean',3,'Queen Bed',7,'Ocean View, Wifi, Double bathroom');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_verified` int(1) NOT NULL DEFAULT 0,
  `verification_hash` varchar(500) NOT NULL,
  `user_dob` date NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_admin` int(1) NOT NULL DEFAULT 0,
  `user_password` varchar(500) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_image` varchar(20) NOT NULL DEFAULT 'default_user.jpg',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin@gmail.com','Admin ','Account',1,'5a4b25aaed25c2ee1b74de72dc03c14e','2000-07-19','0213123118024',1,'8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','2020-11-22 17:52:46','default_user.jpg'),(6,'alandsilva@gmail.com','Alan','Dsilva',1,'c3e878e27f52e2a57ace4d9a76fd9acf','2020-11-23','0213123118024',1,'db42328112177c2d6f2f6ca7f33c8e81084b8ff3e14202254137e22673bce2c8','2020-11-25 04:03:00','default_user.jpg');
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

-- Dump completed on 2020-11-25 10:09:29
--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment`(
  `payment_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `currency` varchar(5) DEFAULT 'INR',
  `method` varchar(10) DEFAULT 'card',
  `amount` int(11), 
  CONSTRAINT `payment_idfk_1` FOREIGN KEY(`reservation_id`) REFERENCES `reservations`(`reservation_id`) ON DELETE CASCADE,
  CONSTRAINT `payment_idfk_2` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
)

