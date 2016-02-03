CREATE DATABASE  IF NOT EXISTS `online store` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `online store`;
-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: online store
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) DEFAULT NULL,
  `username` text,
  `password` text,
  `registration_date` text,
  `last_log_date` text,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Wissa','password','0000-00-00','0000-00-00','');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'HP'),(2,'DELL'),(3,'LG'),(4,'Samsung'),(5,'Sony'),(6,'Toshiba'),(7,'Apple');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`p_id`,`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Laptops'),(2,'Cameras'),(3,'Mobiles '),(4,'Computers'),(9,'iPads');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(255) NOT NULL,
  `cust_username` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_birthdate` date NOT NULL,
  `cust_country` varchar(255) NOT NULL,
  `cust_city` varchar(255) NOT NULL,
  `cust_contact` varchar(255) NOT NULL,
  `cust_image` text NOT NULL,
  `cust_password` char(41) NOT NULL COMMENT ' ',
  `cust_job` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_interests` varchar(255) NOT NULL,
  `cust_creditLimit` varchar(255) NOT NULL,
  `admin_user` int(11) NOT NULL,
  `cust_reg_date` date NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Wissa Azmy','wissa','wissa@gmail.com','0000-00-00','Egypt','Cairo','01285579610','no image','password','developer','Cairo','programming','1000000',1,'0000-00-00'),(2,'','wissa','','0000-00-00','','','','','','','','','',0,'0000-00-00');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_keywords` varchar(255) NOT NULL,
  `p_date_added` date NOT NULL,
  `p_qty` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `brand_id_fk` (`brand_id`),
  KEY `cat_id_fk` (`cat_id`),
  CONSTRAINT `brand_id_fk` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `cat_id_fk` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,1,'a',100,'this is good product ','download.jpg','laptop','0000-00-00',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-03 19:24:04
