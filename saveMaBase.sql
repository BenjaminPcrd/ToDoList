-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: maBase
-- ------------------------------------------------------
-- Server version	5.7.24-2

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
-- Table structure for table `Tache`
--

DROP TABLE IF EXISTS `Tache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tache` (
  `tacheId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `listeId` smallint(6) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `checked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`tacheId`),
  KEY `listeId` (`listeId`),
  CONSTRAINT `Tache_ibfk_1` FOREIGN KEY (`listeId`) REFERENCES `ToDoList` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tache`
--

LOCK TABLES `Tache` WRITE;
/*!40000 ALTER TABLE `Tache` DISABLE KEYS */;
INSERT INTO `Tache` VALUES (2,2,'Voiture','Penser à rentrer la Lamborghini dans le garage',0),(5,3,'Babyfoot','Penser à tryhard le baby, pour être plus fort que Benjamin',0),(6,5,'Instagram','Poster une nouvelle photo',0),(7,5,'Téléphone','Passer un coups de fils à Dagobert pour lui parler de Natasha',0),(8,3,'Cours','Penser à ne pas aller en amphi de droit',0),(9,2,'s\'hydrater','Penser à aller boire une bonne bière',0),(11,4,'tache 1','dsfsfds',1),(12,6,'tache 1','description de la tache 1',0),(14,12,'azzvarza','rzvrzaraz',0),(16,6,'salut','Je pense pouvoir le faire',0);
/*!40000 ALTER TABLE `Tache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ToDoList`
--

DROP TABLE IF EXISTS `ToDoList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ToDoList` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `auteur` varchar(20) DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ToDoList`
--

LOCK TABLES `ToDoList` WRITE;
/*!40000 ALTER TABLE `ToDoList` DISABLE KEYS */;
INSERT INTO `ToDoList` VALUES (2,'liste2','Benjamin',0),(3,'liste3','Kévin',0),(4,'liste4','Philippe',1),(5,'liste5','Joris',1),(6,'liste de test','Moi',0),(12,'moi liste','Moi',1);
/*!40000 ALTER TABLE `ToDoList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `userId` smallint(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Benjamin','$2y$10$NyftqP3Xn.5zLF8ydYsEquV6H5JMH8Cu8XqjIdvgLY7fi4kW.vdKi','benjamin.picard@etu.uca.fr'),(2,'Léane','$2y$10$d699HGoCJtjnj/p8RtZEC.NcllWGIe0ij22UBh8V2F3N0lDZWhnoy','leane.seguin@etu.uca.fr'),(3,'Philippe','$2y$10$IV9OTKPfbF3JES1vWBvCcOB2q/G4QNYRsUuKvfEcO8Zwa1hyzOa3q','truc@gmail.com'),(4,'Kévin','$2y$10$7XgV9ezOI1a2gBcxEBQpPONo5..s.XHipk04LjR0NZRHDaHbFXIJi','machin@etu.uca.fr'),(5,'Joris','$2y$10$prJfEy/UIRMqCXFn5SZIdeByjZpvLe0YZnPWOdp8z5rgdbsUeaI5a','joris@truc.fr'),(6,'Moi','$2y$10$TdMT82OlyWm1Ep9NaGHnF.yvi7EAvl9RI.NmMr/Q36ZeIWcynhcCK','moi@moi.fr'),(7,'lol','$2y$10$TFuBTHVZssmwtB40vuax4eH9w0MSn5ZJTje9t46rt4qRc2T6N1jtm','e@e.com');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-10 10:15:39
