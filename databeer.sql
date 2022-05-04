-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: presentation
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `beer`
--

DROP TABLE IF EXISTS `beer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beer` (
  `beer` varchar(20) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beer`
--

LOCK TABLES `beer` WRITE;
/*!40000 ALTER TABLE `beer` DISABLE KEYS */;
INSERT INTO `beer` VALUES ('Ale','Brewed with top fermenting yeast at cellar temperature, ales are fuller-bodied, with nuances of fruit or spice and a pleasantly hoppy finish. Generally robust and complex with a variety of fruit and malt aromas, ales come in many varieties. They could include Bitters, Milds, Abbey Ales, Pale Ales, Nut Browns, etc.'),('Stout','Stout is a black, roast brew made by top fermentation. Not as sweet to the taste, features a rich, creamy head and is flavoured and coloured by barley. Stouts often use a portion of unmalted roasted barley to develop a dark, slightly astringent, coffee-like character.'),('Malt','Generally dark and sweeter in flavour, malts contain hints of caramel, toffee, and nuts. They can be light to full bodied.'),('Lager','Lager originates from the German word lagern which means \"to store\"  it refers to the method of storing it for several months in near-freezing temperatures. Crisp and refreshing with a smooth finish from longer aging, lagers are the world\"s most popular beer.A lager, which can range from sweet to bitter and pale to black, is usually used to describe bottom fermented brews of Dutch, German, and Czech styles. Most, however, are a pale to medium colour, have high carbonation, and a medium to high hop flavour.'),('Pilsner','is a type of pale lager and was the world\'s first blond lager.'),('Bitter','Its great');
/*!40000 ALTER TABLE `beer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breviews`
--

DROP TABLE IF EXISTS `breviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `breviews` (
  `email` varchar(50) DEFAULT NULL,
  `beer` varchar(20) DEFAULT NULL,
  `rating` varchar(5) DEFAULT NULL,
  `review` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breviews`
--

LOCK TABLES `breviews` WRITE;
/*!40000 ALTER TABLE `breviews` DISABLE KEYS */;
INSERT INTO `breviews` VALUES ('tbrady2@gmail.com','Ale','l',NULL),('jdoe@gmail.com','Ale','l','I feel like a proper medieval peasant now'),('jdoe@gmail.com','Malt','n','Put hair on my chest, its terrible'),('clay.aj.gale@gmail.com','Lager','l','I actually like this'),('clay.aj.gale@gmail.com','Stout','n','A+ for alchoholism'),('clay.aj.gale@gmail.com','Malt','l','This will be perfect for after finals when I want to slowly give myself alcohol poisoning '),('clay.aj.gale@gmail.com','Pilsner','d','Getting the image for this to upload properly is going to give me nightmares'),('tcrews@gmail.com','Ale','l','Only the best for the fairy of body soap  '),('tcrews@gmail.com','Stout','n','Something something look at your man then look at this beer. Your man is now diamonds or something'),('clay.aj.gale@gmail.com','Malt','n','Pretty malt'),('kay@gmail.com','Bitter','n','                    Bitter is great beer'),('kwood@gmail.com','Bitter','l','its pretty ok');
/*!40000 ALTER TABLE `breviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `startdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('John','Doe','jdoe@gmail.com','*D37C49F9CBEFBF8B6F4B165AC703AA271E079004',23,'male','2014-10-26'),('Gillian','Jacobs','gj@gmail.com','*B549E79CF4C7711EBBE73E81679A3F1460BC0237',23,'male','2017-12-04'),('Clay','Gale','clay.aj.gale@gmail.com','*D5CFF3234A10FC5E68C9535F72971CE83F393E97',24,'male','2017-12-04'),('Terry','Crews','tcrews@gmail.com','*B549E79CF4C7711EBBE73E81679A3F1460BC0237',34,'male','2017-12-04'),('Tom','Brady','tbrady@gmail.com','*B549E79CF4C7711EBBE73E81679A3F1460BC0237',45,'female','2017-12-05'),('bow','diddler','bdiddle@gmail.com','*B549E79CF4C7711EBBE73E81679A3F1460BC0237',69,'male','2017-12-05'),('Kay','H','kay@gmail.com','*B549E79CF4C7711EBBE73E81679A3F1460BC0237',69,'male','2017-12-05'),('Kody','Woodmass','kwood@gmail.com','*B549E79CF4C7711EBBE73E81679A3F1460BC0237',22,'male','2017-12-05');
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

-- Dump completed on 2017-12-06 14:48:41
