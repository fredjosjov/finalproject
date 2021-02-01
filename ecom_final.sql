CREATE DATABASE  IF NOT EXISTS `ecom_final` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecom_final`;
-- MySQL dump 10.13  Distrib 5.7.30, for osx10.12 (x86_64)
--
-- Host: localhost    Database: ecom_final
-- ------------------------------------------------------
-- Server version	5.7.30

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
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cards` (
  `card_number` varchar(16) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`card_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` VALUES ('123123','Debit'),('1231231','Debit'),('12312451','Debit'),('12313219','Debit'),('1231421','Debit'),('1231451','Debit'),('1234','Debit'),('123456','Debit'),('12631983','Debit'),('2175315723','Debit'),('27531872531','Debit'),('777888999','Debit'),('999888777','Debit');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_customer1_idx` (`customer_id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_store1_idx` (`store_id`),
  CONSTRAINT `fk_cart_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cart_store1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (29,6,1,1,'1','299.34');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_cards`
--

DROP TABLE IF EXISTS `customer_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_cards` (
  `cards_number` varchar(16) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cards_number`,`customers_id`),
  KEY `fk_cards_has_customers_customers1_idx` (`customers_id`),
  KEY `fk_cards_has_customers_cards1_idx` (`cards_number`),
  CONSTRAINT `fk_cards_has_customers_cards1` FOREIGN KEY (`cards_number`) REFERENCES `cards` (`card_number`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cards_has_customers_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_cards`
--

LOCK TABLES `customer_cards` WRITE;
/*!40000 ALTER TABLE `customer_cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(144) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customers_users1_idx` (`user_id`),
  CONSTRAINT `fk_customers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'sofia44@example.org','Forrest','Aufderhar','+1-784-696-6046','26056 Yasmin Circle Apt. 238\nLake Roxanneland, WA 28627'),(2,'doyle.gladyce@example.net','Frida','Hettinger','(379) 959-2756','4677 Roy Hollow Suite 576\nNew Jessport, SC 69259-5001'),(3,'kurt03@example.org','Alivia','Lueilwitz','(545) 700-1829','9965 Bernier Brook\nGleasonburgh, IL 87588'),(4,'wspencer@example.org','Jordan','O\'Reilly','+1-989-215-4257','751 Randy Key Suite 870\nNorth Sandra, FL 33810-7557'),(5,'tevin.oconner@example.org','Connor','Armstrong','(521) 828-6198','801 Klocko Cove Apt. 620\nCassinburgh, UT 08092-4295'),(6,'adrien49@example.net','Sammie','Wiegand','1-387-277-8413','23562 Luis Mountain\nHahnburgh, IL 17784-4032'),(7,'stamm.avis@example.net','Alphonso','Emard','+1.405.244.1809','95376 Greenholt Prairie\nNorth Burdette, DE 85945'),(8,'zoe.mcdermott@example.org','Evans','Miller','+1.261.380.7267','9003 Nyah Expressway Suite 072\nWest Mauricioview, KY 48803-1862'),(9,'jennyfer34@example.org','Stan','Upton','568-648-3484','62554 Cleta Orchard\nEast Mossietown, CT 16584-2888'),(10,'bertrand39@example.org','Millie','Dickinson','1-387-881-7055','41212 Herman Mount\nWiegandstad, IL 64551-0985');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,'2021-01-31 16:06:10','2021-01-31 16:06:10','Shipped',299.34,1),(2,'2021-01-31 16:07:39','2021-01-31 16:07:39','Shipped',299.34,1),(3,'2021-01-31 16:08:52','2021-01-31 16:08:52','Shipped',299.34,1),(4,'2021-01-31 16:32:22','2021-01-31 16:32:22','Shipped',299.34,1),(5,'2021-01-31 16:47:56','2021-01-31 16:47:56','Shipped',413.35,2),(6,'2021-01-31 17:17:31','2021-01-31 17:17:31','Shipped',413.35,4),(7,'2021-01-31 17:53:56','2021-01-31 17:53:56','Shipped',413.35,2),(8,'2021-02-01 04:23:41','2021-02-01 04:23:41','Shipped',299.34,1),(9,'2021-02-01 04:25:18','2021-02-01 04:25:18','Shipped',299.34,1),(10,'2021-02-01 15:37:27','2021-02-01 15:37:27','Shipped',170.83,1),(11,'2021-02-01 15:41:41','2021-02-01 15:41:41','Shipped',170.83,1),(12,'2021-02-01 15:47:02','2021-02-01 15:47:02','Shipped',170.83,1),(13,'2021-02-01 15:52:52','2021-02-01 15:52:52','Shipped',299.34,1),(14,'2021-02-01 15:57:30','2021-02-01 15:57:30','Shipped',299.34,1),(15,'2021-02-01 17:23:04','2021-02-01 17:23:04','Shipped',299.34,2),(16,'2021-02-01 20:54:50','2021-02-01 20:54:50','Shipped',330.03,3),(17,'2021-02-01 20:55:47','2021-02-01 20:55:47','Shipped',1617.45,5);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `fk_orders_has_product_product1_idx` (`product_id`),
  KEY `fk_orders_has_product_orders1_idx` (`order_id`),
  CONSTRAINT `fk_orders_has_product_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_orders_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,1,299.34),(1,2,5,114.01),(1,3,2,323.49),(1,4,6,977.21),(1,5,5,644.85),(2,1,9,299.34),(2,2,10,114.01),(2,3,5,323.49),(2,4,6,977.21),(2,5,9,644.85),(3,1,5,299.34),(3,2,5,114.01),(3,3,5,323.49),(3,4,1,977.21),(3,5,2,644.85),(4,1,5,299.34),(4,2,7,114.01),(4,3,4,323.49),(4,4,8,977.21),(4,5,6,644.85),(5,1,4,299.34),(5,2,4,114.01),(5,3,8,323.49),(5,4,1,977.21),(5,5,4,644.85),(6,6,8,241.72),(6,7,2,192.75),(6,8,2,718.11),(6,9,5,274.43),(6,10,10,27.81),(7,6,6,241.72),(7,7,3,192.75),(7,8,7,718.11),(7,9,3,274.43),(7,10,9,27.81),(8,6,10,241.72),(8,7,9,192.75),(8,8,7,718.11),(8,9,2,274.43),(8,10,4,27.81),(9,6,4,241.72),(9,7,5,192.75),(9,8,5,718.11),(9,9,5,274.43),(9,10,8,27.81),(10,6,10,241.72),(10,7,9,192.75),(10,8,5,718.11),(10,9,4,274.43),(10,10,2,27.81),(11,11,4,170.85),(11,12,5,950.93),(11,13,2,260.52),(11,14,10,41.31),(11,15,7,593.54),(12,11,6,170.85),(12,12,1,950.93),(12,13,10,260.52),(12,14,1,41.31),(12,15,10,593.54),(13,11,5,170.85),(13,12,3,950.93),(13,13,10,260.52),(13,14,4,41.31),(13,15,10,593.54),(14,11,6,170.85),(14,12,3,950.93),(14,13,1,260.52),(14,14,5,41.31),(14,15,4,593.54),(15,11,5,170.85),(15,12,2,950.93),(15,13,4,260.52),(15,14,4,41.31),(15,15,1,593.54),(18,1,1,299.34),(19,1,1,299.34),(20,1,1,299.34),(21,1,1,299.34),(22,1,1,299.34),(23,1,1,299.34),(24,1,1,299.34),(25,1,1,299.34),(26,1,1,299.34),(26,2,1,114.01),(27,1,2,299.34),(28,1,2,299.34),(29,1,2,299.34),(30,1,2,299.34),(31,1,2,299.34),(31,2,2,114.01),(32,1,1,299.34),(32,2,1,114.01),(33,1,1,299.34),(34,1,1,299.34),(35,1,1,299.34),(36,1,1,299.34),(37,1,1,299.34),(38,11,1,170.83),(39,11,1,170.83),(40,11,1,170.83),(41,1,1,299.34),(42,1,1,299.34),(43,1,2,299.34),(44,2,3,330.03),(45,3,5,1617.45);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `totalAmount` float DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_customer1_idx` (`customer_id`),
  KEY `fk_orders_stores1_idx` (`store_id`),
  CONSTRAINT `fk_orders_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_orders_stores1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,10,1,'2021-01-21 11:18:37','2021-01-30 22:22:17',10603.9,'Processed'),(2,10,1,'2021-01-22 11:18:37','2021-01-30 22:22:26',17118.5,'Shipped'),(3,2,1,'2021-01-23 11:18:37','2021-01-26 11:18:37',5951.11,'Paid'),(4,4,1,'2021-01-24 11:18:37','2021-01-26 11:18:37',15275.5,'Paid'),(5,9,1,'2021-01-25 11:18:37','2021-01-31 12:56:29',7797.93,'Completed'),(6,8,2,'2021-01-26 11:18:37','2021-01-26 11:18:37',5405.73,'Paid'),(7,6,2,'2021-01-26 11:18:37','2021-01-26 11:18:37',8128.92,'Paid'),(8,3,2,'2021-01-26 11:18:38','2021-01-26 11:18:38',9838.82,'Paid'),(9,4,2,'2021-01-26 11:18:38','2021-01-26 11:18:38',7115.81,'Paid'),(10,5,2,'2021-01-26 11:18:38','2021-01-26 11:18:38',8895.84,'Paid'),(11,4,3,'2021-01-26 11:18:38','2021-01-26 11:18:38',10527,'Paid'),(12,6,3,'2021-01-26 11:18:38','2021-01-26 11:18:38',10557.9,'Paid'),(13,2,3,'2021-01-26 11:18:38','2021-01-26 11:18:38',12412.9,'Paid'),(14,1,3,'2021-01-26 11:18:38','2021-01-26 11:18:38',6719.12,'Paid'),(15,4,3,'2021-01-26 11:18:38','2021-01-26 11:18:38',4556.97,'Paid'),(17,10,3,'2021-01-31 15:58:25','2021-01-31 15:58:25',299.34,'Paid'),(18,10,3,'2021-01-31 16:00:04','2021-01-31 16:00:04',299.34,'Paid'),(19,10,3,'2021-01-31 16:03:40','2021-01-31 16:03:40',299.34,'Paid'),(20,10,3,'2021-01-31 16:05:15','2021-01-31 16:05:15',299.34,'Paid'),(21,10,3,'2021-01-31 16:06:10','2021-01-31 16:06:10',299.34,'Paid'),(22,10,3,'2021-01-31 16:07:12','2021-01-31 16:07:12',299.34,'Paid'),(23,10,3,'2021-01-31 16:07:39','2021-01-31 16:07:39',299.34,'Paid'),(24,10,3,'2021-01-31 16:08:52','2021-01-31 16:36:28',299.34,'Shipped'),(25,10,3,'2021-01-31 16:32:22','2021-01-31 16:34:09',299.34,'Paid'),(26,10,3,'2021-01-31 16:47:56','2021-01-31 16:47:56',413.35,'Paid'),(27,10,3,'2021-01-31 17:14:47','2021-01-31 17:14:47',413.35,'Paid'),(28,10,3,'2021-01-31 17:16:30','2021-01-31 17:16:30',413.35,'Paid'),(29,10,3,'2021-01-31 17:16:41','2021-01-31 17:16:41',413.35,'Paid'),(30,10,3,'2021-01-31 17:17:03','2021-01-31 17:17:03',413.35,'Paid'),(31,10,3,'2021-01-31 17:17:31','2021-01-31 17:17:31',413.35,'Paid'),(32,10,3,'2021-01-31 17:53:56','2021-01-31 17:53:56',413.35,'Paid'),(33,10,3,'2021-02-01 04:15:30','2021-02-01 04:15:30',299.34,'Paid'),(34,10,3,'2021-02-01 04:17:06','2021-02-01 04:17:06',299.34,'Paid'),(35,10,3,'2021-02-01 04:21:27','2021-02-01 04:21:27',299.34,'Paid'),(36,10,3,'2021-02-01 04:23:41','2021-02-01 04:23:41',299.34,'Paid'),(37,10,3,'2021-02-01 04:25:18','2021-02-01 04:25:18',299.34,'Paid'),(38,6,3,'2021-02-01 15:37:27','2021-02-01 15:37:27',170.83,'Paid'),(39,6,3,'2021-02-01 15:41:41','2021-02-01 15:41:41',170.83,'Paid'),(40,6,3,'2021-02-01 15:47:02','2021-02-01 15:47:02',170.83,'Paid'),(41,6,1,'2021-02-01 15:52:52','2021-02-01 20:08:10',299.34,'Shipped'),(42,10,4,'2021-02-01 15:57:30','2021-02-01 15:57:30',299.34,'Paid'),(43,10,1,'2021-02-01 17:23:04','2021-02-01 17:29:32',299.34,'Processed'),(44,10,1,'2021-02-01 20:54:50','2021-02-01 20:54:50',330.03,'Paid'),(45,10,1,'2021-02-01 20:55:47','2021-02-01 20:55:47',1617.45,'Paid');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `charge_amount` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_card1_idx` (`card_number`),
  KEY `fk_payment_invoice1_idx` (`invoice_id`),
  KEY `fk_payment_orders1_idx` (`orders_id`),
  CONSTRAINT `fk_payment_card1` FOREIGN KEY (`card_number`) REFERENCES `cards` (`card_number`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payment_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payment_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,24,3,'1234',299.34,'2021-01-31 00:00:00','2021-01-31 16:08:52','2021-01-31 16:08:52'),(2,25,4,'27531872531',299.34,'2021-01-31 00:00:00','2021-01-31 16:32:22','2021-01-31 16:32:22'),(3,26,5,'1234',413.35,'2021-01-31 00:00:00','2021-01-31 16:47:56','2021-01-31 16:47:56'),(4,31,6,'1231231',413.35,'2021-01-31 00:00:00','2021-01-31 17:17:31','2021-01-31 17:17:31'),(5,32,7,'12312451',413.35,'2021-01-31 00:00:00','2021-01-31 17:53:56','2021-01-31 17:53:56'),(6,37,9,'1231451',299.34,'2021-02-01 00:00:00','2021-02-01 04:25:18','2021-02-01 04:25:18'),(7,38,10,'2175315723',170.83,'2021-02-01 00:00:00','2021-02-01 15:37:27','2021-02-01 15:37:27'),(8,39,11,'123123',170.83,'2021-02-01 00:00:00','2021-02-01 15:41:41','2021-02-01 15:41:41'),(9,40,12,'1231421',170.83,'2021-02-01 00:00:00','2021-02-01 15:47:02','2021-02-01 15:47:02'),(10,41,13,'1231231',299.34,'2021-02-01 00:00:00','2021-02-01 15:52:52','2021-02-01 15:52:52'),(11,42,14,'12631983',299.34,'2021-02-01 00:00:00','2021-02-01 15:57:30','2021-02-01 15:57:30'),(12,43,15,'123456',299.34,'2021-02-01 00:00:00','2021-02-01 17:23:04','2021-02-01 17:23:04'),(13,44,16,'777888999',330.03,'2021-02-01 00:00:00','2021-02-01 20:54:50','2021-02-01 20:54:50'),(14,45,17,'999888777',1617.45,'2021-02-01 00:00:00','2021-02-01 20:55:47','2021-02-01 20:55:47');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_details_products1_idx` (`products_id`),
  CONSTRAINT `fk_product_details_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(99) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_stores1_idx` (`store_id`),
  CONSTRAINT `fk_products_stores1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'nisi',25,299.34,'Nam consequuntur unde officia rem. Vitae beatae rerum quo laborum quia maiores nisi temporibus. Dolor libero minus quia qui.','/uploads/images/nisi_1612123370.jpg',1),(2,1,'expedita',41,110.01,'Quae eos aliquid mollitia reiciendis. Cumque qui velit rerum nulla. Soluta esse eaque doloremque veniam voluptatibus.',NULL,1),(3,1,'dignissimos',85,323.49,'Esse sit vel non eaque et. Sint nihil totam fuga eligendi aut quis fuga. Labore illo perspiciatis iusto ut unde. Fugiat assumenda et hic quae ex itaque.',NULL,1),(4,1,'sequio',75,977.25,'Ut eveniet et omnis porro asperiores. Excepturi saepe saepe numquam culpa. Rerum et itaque qui vitae nulla id. Consequatur aut itaque consequatur odit et vero.',NULL,1),(5,1,'nihil',39,644.85,'Esse et doloremque quia eos similique libero nihil voluptas. Asperiores eos et maiores. Est molestiae dolore repellendus.',NULL,1),(6,2,'est',30,241.72,'Quaerat labore vel autem hic neque vero. At asperiores hic eius eum. Aut perferendis eaque voluptate animi. Enim illo dolorum laborum est.',NULL,1),(7,2,'sunt',41,192.75,'Dolor voluptas quidem tempora illo nobis dolore. Laboriosam qui voluptate est reprehenderit deserunt sunt. Dolorem et et dolore nihil mollitia odit deleniti.',NULL,1),(8,2,'recusandae',35,718.11,'Nihil harum ipsam asperiores nihil tempora perferendis assumenda. Aperiam quas officiis adipisci omnis. Ipsa ullam doloremque hic odit soluta velit perspiciatis iste.',NULL,1),(9,2,'ut',93,274.43,'Aliquam eligendi velit repudiandae iusto ipsum aut dignissimos. Veniam quaerat omnis doloremque tempora necessitatibus aperiam quasi.',NULL,1),(10,2,'eveniet',76,27.81,'Rem pariatur est ad dolor nobis. Velit autem sit nisi itaque. Numquam omnis eum hic ut quibusdam. Autem porro omnis illum ullam. Velit fugiat sunt est cumque quam omnis voluptatem et.',NULL,1),(11,3,'laudantium',1,170.83,'Numquam voluptas a qui. Non animi repellat laborum omnis autem amet. Facilis qui eum quisquam quia dicta tenetur.',NULL,1),(12,3,'provident',10,950.99,'Possimus dignissimos nobis aut voluptate dignissimos eveniet ratione voluptas. Aspernatur aut consequatur ratione omnis. Voluptatem ab est aut cumque in et aliquam.',NULL,1),(13,3,'dolores',100,260.58,'Quaerat iste magni nulla voluptatem. Dolorem exercitationem quos voluptas ut quibusdam. Sit pariatur magni placeat nobis odio quas et.',NULL,1),(14,3,'perspiciatis',61,41.23,'Minus dolor repellendus officiis eum in commodi. Culpa autem velit aperiam at ipsum. Mollitia quam id illum eum dignissimos. Qui nihil illum rerum voluptate perspiciatis.',NULL,1),(15,3,'laudantium',9,593.74,'Voluptates illum sit nobis quo facere ut nihil. Nam ducimus iste veniam in. Inventore provident ullam dolore natus et dolores soluta. Quia exercitationem veritatis quo.',NULL,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_review_product1_idx` (`product_id`),
  KEY `fk_review_customer1_idx` (`customer_id`),
  CONSTRAINT `fk_review_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_review_product1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,10,'mantap',5,'2021-01-31 00:00:00'),(2,1,10,'Great product.',4,'2021-02-01 00:00:00');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(144) DEFAULT NULL,
  `income` float DEFAULT NULL,
  `profit` float DEFAULT NULL,
  `expense` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sellers_users1_idx` (`user_id`),
  CONSTRAINT `fk_sellers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'rogahn.jaiden@example.org','Shanny','Pollich','359-757-8349','773 Friesen Hills Suite 058\nHettingerstad, DE 72088-6056',0,0,0),(2,'crooks.yasmine@example.org','Lonzo','Reichert','+1-818-237-1226','899 Huels Haven Suite 139\nNew Garrettport, PA 14377-4678',0,0,0),(3,'tglover@example.org','Elvera','McLaughlin','671-376-9645','2459 Green Gardens Suite 631\nWest Chaz, SC 50726',0,0,0),(4,'bertrand39@example.org','Millie','Dickinson','1-387-881-7055','41212 Herman Mount Wiegandstad, IL 64551-0985',0,0,0);
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_details`
--

DROP TABLE IF EXISTS `shipping_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_details` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`shipping_id`,`order_id`,`product_id`),
  KEY `fk_shipping_has_orders_orders1_idx` (`order_id`),
  KEY `fk_shipping_has_orders_shipping1_idx` (`shipping_id`),
  KEY `fk_shipping_details_products1_idx` (`product_id`),
  CONSTRAINT `fk_shipping_details_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_shipping_has_orders_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_shipping_has_orders_shipping1` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_details`
--

LOCK TABLES `shipping_details` WRITE;
/*!40000 ALTER TABLE `shipping_details` DISABLE KEYS */;
INSERT INTO `shipping_details` VALUES (3,20,1,'2021-01-31 16:05:15','2021-01-31 16:05:15','Address','Delivered'),(4,21,1,'2021-01-31 16:06:10','2021-01-31 16:06:10','Addressso','Shipped'),(5,22,1,'2021-01-31 16:07:12','2021-01-31 16:07:12','Addressssooooooooo','Delivered'),(6,23,1,'2021-01-31 16:07:39','2021-01-31 16:07:39','Address','Shipped'),(7,24,1,'2021-01-31 16:08:52','2021-01-31 16:08:52','Addresso','Shipped'),(8,25,1,'2021-01-31 16:32:22','2021-01-31 16:32:22','aslkdadksal','Delivered'),(9,26,1,'2021-01-31 16:47:56','2021-01-31 16:47:56','asdadasd','Shipped'),(9,26,2,'2021-01-31 16:47:56','2021-01-31 16:47:56','asdadasd','Shipped'),(10,31,1,'2021-01-31 17:17:31','2021-01-31 17:17:31','asdsadas','Shipped'),(10,31,2,'2021-01-31 17:17:31','2021-01-31 17:17:31','asdsadas','Shipped'),(11,32,1,'2021-01-31 17:53:56','2021-01-31 17:53:56','Test','Shipped'),(11,32,2,'2021-01-31 17:53:56','2021-01-31 17:53:56','Test','Shipped'),(12,5,1,'2021-02-01 03:52:16','2021-02-01 03:52:16','Heidelberg, Germany','Shipped'),(16,36,1,'2021-02-01 04:23:41','2021-02-01 04:23:41','Frankfurt Am Main','Shipped'),(17,37,1,'2021-02-01 04:25:18','2021-02-01 04:25:18','Baden-baden, Badden Wuerttemberg, Germany.','Shipped'),(18,38,11,'2021-02-01 15:37:27','2021-02-01 15:37:27','Jakarta, Indonesia','Shipped'),(19,39,11,'2021-02-01 15:41:41','2021-02-01 15:41:41','Jakarta, Indonesia','Shipped'),(20,40,11,'2021-02-01 15:47:02','2021-02-01 15:47:02','Jakarta, Indonesia','Shipped'),(21,41,1,'2021-02-01 15:52:52','2021-02-01 15:52:52','Jakarta, Indonesia','Shipped'),(22,42,1,'2021-02-01 15:57:30','2021-02-01 15:57:30','Jakarta, Indonesia','Shipped'),(23,43,1,'2021-02-01 17:23:04','2021-02-01 17:23:04','Jakarta, Indonesia','Shipped'),(24,44,2,'2021-02-01 20:54:50','2021-02-01 20:54:50','Jakarta, Indonesia','Shipped'),(25,45,3,'2021-02-01 20:55:47','2021-02-01 20:55:47','Jakarta, Indonesia','Shipped');
/*!40000 ALTER TABLE `shipping_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shippings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(45) DEFAULT NULL,
  `vendor` varchar(45) DEFAULT NULL,
  `expectedDuration` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
INSERT INTO `shippings` VALUES (1,'Regular','JNE','2021-02-02 04:00:04',NULL,NULL),(2,'Regular','JNE','2021-02-02 04:03:40',NULL,NULL),(3,'Regular','TIKI','2021-02-02 04:05:15',NULL,NULL),(4,'Regular','TIKI','2021-02-02 04:06:10',NULL,NULL),(5,'Regular','TIKI','2021-02-02 04:07:12',NULL,NULL),(6,'Regular','JNE','2021-02-02 04:07:39',NULL,NULL),(7,'Regular','JNE','2021-02-02 04:08:52',NULL,NULL),(8,'Regular','JNE','2021-02-02 04:32:22',NULL,NULL),(9,'Regular','JNE','2021-02-02 04:47:56',NULL,NULL),(10,'Regular','JNE','2021-02-02 05:17:31',NULL,NULL),(11,'Regular','JNE','2021-02-02 05:53:56',NULL,NULL),(12,'Regular','JNE','2021-02-01 03:50:47','2021-02-01 03:50:47','2021-02-01 03:50:47'),(13,'Regular','Pos Indonesia','2021-02-03 04:15:30',NULL,NULL),(14,'Regular','Pos Indonesia','2021-02-03 04:17:06',NULL,NULL),(15,'Regular','Pos Indonesia','2021-02-03 04:21:27',NULL,NULL),(16,'Regular','Pos Indonesia','2021-02-03 04:23:41',NULL,NULL),(17,'Regular','JNE','2021-02-03 04:25:18',NULL,NULL),(18,'Regular','TIKI','2021-02-03 03:37:27',NULL,NULL),(19,'Regular','Pos Indonesia','2021-02-03 03:41:41',NULL,NULL),(20,'Regular','JNE','2021-02-03 03:47:02',NULL,NULL),(21,'Regular','JNE','2021-02-03 03:52:52',NULL,NULL),(22,'Regular','Pos Indonesia','2021-02-03 03:57:30',NULL,NULL),(23,'Regular','TIKI','2021-02-03 05:23:04',NULL,NULL),(24,'Regular','JNE','2021-02-03 08:54:50',NULL,NULL),(25,'Regular','Pos Indonesia','2021-02-03 08:55:47',NULL,NULL);
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stores_sellers1_idx` (`seller_id`),
  CONSTRAINT `fk_stores_sellers1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,1,'eos',1,'2021-01-26 11:18:37','2021-01-26 11:18:37'),(2,2,'fuga',0,'2021-01-26 11:18:37','2021-01-26 11:18:37'),(3,3,'beatae',1,'2021-01-26 11:18:38','2021-01-26 11:18:38'),(4,4,'shopp',1,'2021-02-01 06:34:44','2021-02-01 06:34:44');
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` varchar(32) NOT NULL,
  `password` varchar(144) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `email_verified_at` varchar(45) DEFAULT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('adrien49@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','adrien49@example.net','2021-01-26 11:18:37','uGJF0oGdox','2021-01-26 11:18:37','2021-01-26 11:18:37'),('bertrand39@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','bertrand39@example.org','2021-01-26 11:18:37','2cNy5B9wQB','2021-01-26 11:18:37','2021-01-26 11:18:37'),('crooks.yasmine@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','crooks.yasmine@example.org','2021-01-26 11:18:37','HjdqnWbQFs','2021-01-26 11:18:37','2021-01-26 11:18:37'),('doyle.gladyce@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','doyle.gladyce@example.net','2021-01-26 11:18:37','CsM8RVo1FD','2021-01-26 11:18:37','2021-01-26 11:18:37'),('jennyfer34@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','jennyfer34@example.org','2021-01-26 11:18:37','LBqAMfmKxu','2021-01-26 11:18:37','2021-01-26 11:18:37'),('kurt03@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','kurt03@example.org','2021-01-26 11:18:37','iWmjfvEU6y','2021-01-26 11:18:37','2021-01-26 11:18:37'),('rogahn.jaiden@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','rogahn.jaiden@example.org','2021-01-26 11:18:37','UblPymt3Zz','2021-01-26 11:18:37','2021-01-26 11:18:37'),('sofia44@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','sofia44@example.org','2021-01-26 11:18:37','xIGQjH9TIP','2021-01-26 11:18:37','2021-01-26 11:18:37'),('stamm.avis@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','stamm.avis@example.net','2021-01-26 11:18:37','j3gdsNkHHv','2021-01-26 11:18:37','2021-01-26 11:18:37'),('tevin.oconner@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','tevin.oconner@example.org','2021-01-26 11:18:37','IYgYJCOWb5','2021-01-26 11:18:37','2021-01-26 11:18:37'),('tglover@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','tglover@example.org','2021-01-26 11:18:38','DaXEMgquMi','2021-01-26 11:18:38','2021-01-26 11:18:38'),('wspencer@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','wspencer@example.org','2021-01-26 11:18:37','AOOj9ZVNhA','2021-01-26 11:18:37','2021-01-26 11:18:37'),('zoe.mcdermott@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','zoe.mcdermott@example.org','2021-01-26 11:18:37','2XJkWyBJJ1','2021-01-26 11:18:37','2021-01-26 11:18:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishlist_product1_idx` (`product_id`),
  KEY `fk_wishlist_customer1_idx` (`customer_id`),
  KEY `fk_wishlist_store1_idx` (`store_id`),
  CONSTRAINT `fk_wishlist_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_wishlist_product1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_wishlist_store1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-01 20:59:24
