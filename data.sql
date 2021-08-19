-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: homework_6
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `owner_id` int(11) NOT NULL,
  `uploaded_time` int(11) NOT NULL,
  `download_count` int(11) NOT NULL DEFAULT 0,
  `fileName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `files_FK` (`owner_id`),
  CONSTRAINT `files_FK` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (9,'new_file_test','zip','/home/mohammad/Documents/Maktab/Homework_6/storage/1629330040-zipfile.zip',0,74607,1,1,1629330040,1,'zipfile'),(10,'my_picture','png','/home/mohammad/Documents/Maktab/Homework_6/storage/1629333908-bala.png',0,2128480,1,1,1629333908,3,'bala'),(11,'felan_bisar','png','/home/mohammad/Documents/Maktab/Homework_6/storage/1629354247-abcde.png',0,47327,1,3,1629354247,2,'abcde'),(12,'confiremer','png','/home/mohammad/Documents/Maktab/Homework_6/storage/1629359789-salam.png',0,489222,1,2,1629359789,0,'salam');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('type','png','*.png'),('type','jpg','*.jpg'),('type','jpeg','*.jpeg'),('type','zip','*.zip'),('maxSize','12345678','12.34 MB'),('maxUploadSize','987654321','987.65 MB'),('type','rar','*.rar'),('type','mp4','*.mp4'),('type','mp3','*.mp3'),('type','pdf','*.pdf'),('type','gif','gif');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image_path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/home/mohammad/Documents/Maktab/Homework_6/public/storage/profiles/avatar.png',
  `image_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/storage/profiles/avatar.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ehsan','kashfi','abc@def.com','202cb962ac59075b964b07152d234b70','admin',1,'/home/mohammad/Documents/Maktab/Homework_6/public/storage/1629071781','/storage/1629071781'),(2,'mostafa','sadeghifar','abc1@def.com','202cb962ac59075b964b07152d234b70','confirmer',1,'/home/mohammad/Documents/Maktab/Homework_6/public/storage/avatar.png','/storage/avatar.png'),(3,'omid','kheirabadi','abc2@def.com','202cb962ac59075b964b07152d234b70','confirmer',1,'/home/mohammad/Documents/Maktab/Homework_6/public/storage/1629354536','/storage/1629354536'),(4,'Mohammad','Shabani','abc3@def.com','202cb962ac59075b964b07152d234b70','normal',1,'/home/mohammad/Documents/Maktab/Homework_6/public/storage/avatar.png','/storage/avatar.png');
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

-- Dump completed on 2021-08-19 13:54:57
