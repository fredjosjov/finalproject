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
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` VALUES ('123123','Debit'),('1231231','Debit'),('12312451','Debit'),('12313219','Debit'),('1231421','Debit'),('1231451','Debit'),('1234','Debit'),('123456','Debit'),('12631983','Debit'),('2175315723','Debit'),('27531872531','Debit'),('777888999','Debit'),('999888777','Debit');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer_cards`
--

LOCK TABLES `customer_cards` WRITE;
/*!40000 ALTER TABLE `customer_cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'chanelle.bednar@example.net','Dasia','Kling','435.545.3171','2222 Elissa Pike\nStrosinland, KS 18882-7253'),(2,'asha90@example.com','Ruby','Schuster','473-256-5527','2280 Conroy Neck Apt. 650\nRathmouth, WV 30934'),(3,'swift.nikki@example.net','Alfreda','King','1-458-821-0164','1753 Obie Course\nPort Eliza, MT 66352-9881'),(4,'helmer63@example.net','Abner','Rempel','546-499-7272','2501 Feeney Flat\nSouth Tyrique, WY 61637'),(5,'ckoepp@example.org','Angeline','Sawayn','1-371-247-8245','345 Stanton Court\nWest Ritabury, NV 25864-7657'),(6,'farrell.roel@example.org','Rebeka','Murazik','+1-694-846-6581','8986 Barrows Keys Apt. 026\nNew Ariannatown, LA 51377-4805'),(7,'jamar.rice@example.net','Bianka','Mann','+12909159315','43168 Helen Parks Suite 510\nEast Henri, AK 73727'),(8,'angie.medhurst@example.com','Unique','Hickle','1-336-407-3446','66129 Ava Stravenue\nVincenzaton, CO 01505-4272'),(9,'kristina80@example.org','Verla','Altenwerth','1-971-345-1611','24736 Borer Villages\nAmosburgh, FL 79960-6218'),(10,'towne.lloyd@example.com','Christop','Boyle','1-421-497-2523','327 Nathanial Turnpike\nEast Santinamouth, KY 53663-7044');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,5,572.43),(1,2,8,622.09),(1,3,10,557.04),(1,4,6,256.06),(1,5,3,929.16),(2,1,4,572.43),(2,2,3,622.09),(2,3,8,557.04),(2,4,1,256.06),(2,5,2,929.16),(3,1,5,572.43),(3,2,4,622.09),(3,3,5,557.04),(3,4,8,256.06),(3,5,1,929.16),(4,1,9,572.43),(4,2,8,622.09),(4,3,6,557.04),(4,4,10,256.06),(4,5,8,929.16),(5,1,9,572.43),(5,2,2,622.09),(5,3,10,557.04),(5,4,3,256.06),(5,5,8,929.16),(6,6,9,29.21),(6,7,4,127.75),(6,8,8,356.08),(6,9,8,767.96),(6,10,8,110.9),(7,6,1,29.21),(7,7,4,127.75),(7,8,9,356.08),(7,9,8,767.96),(7,10,5,110.9),(8,6,7,29.21),(8,7,1,127.75),(8,8,9,356.08),(8,9,9,767.96),(8,10,3,110.9),(9,6,5,29.21),(9,7,7,127.75),(9,8,10,356.08),(9,9,4,767.96),(9,10,7,110.9),(10,6,8,29.21),(10,7,1,127.75),(10,8,10,356.08),(10,9,1,767.96),(10,10,6,110.9),(11,11,3,949.1),(11,12,6,386.09),(11,13,3,452.46),(11,14,8,50.1),(11,15,1,126.58),(12,11,2,949.1),(12,12,3,386.09),(12,13,4,452.46),(12,14,7,50.1),(12,15,2,126.58),(13,11,1,949.1),(13,12,4,386.09),(13,13,6,452.46),(13,14,10,50.1),(13,15,6,126.58),(14,11,7,949.1),(14,12,7,386.09),(14,13,1,452.46),(14,14,1,50.1),(14,15,9,126.58),(15,11,8,949.1),(15,12,8,386.09),(15,13,5,452.46),(15,14,1,50.1),(15,15,9,126.58);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,5,1,'2021-02-02 13:04:13','2021-02-02 13:04:13',17733.1,'Paid'),(2,7,1,'2021-02-01 13:04:13','2021-02-02 13:04:13',10726.7,'Paid'),(3,7,1,'2021-01-31 13:04:13','2021-02-02 13:04:13',11113.3,'Paid'),(4,10,1,'2021-01-30 13:04:13','2021-02-02 13:04:13',23464.7,'Paid'),(5,3,1,'2021-01-29 13:04:13','2021-02-02 13:04:13',20167.9,'Paid'),(6,2,2,'2021-02-02 13:04:13','2021-02-02 13:04:13',10653.4,'Paid'),(7,3,2,'2021-02-02 13:04:13','2021-02-02 13:04:13',10443.1,'Paid'),(8,7,2,'2021-02-02 13:04:13','2021-02-02 13:04:13',10781.3,'Paid'),(9,10,2,'2021-02-02 13:04:13','2021-02-02 13:04:13',8449.24,'Paid'),(10,5,2,'2021-02-02 13:04:13','2021-02-02 13:04:13',5355.59,'Paid'),(11,2,3,'2021-02-02 13:04:13','2021-02-02 13:04:13',7048.6,'Paid'),(12,10,3,'2021-02-02 13:04:13','2021-02-02 13:04:13',5470.17,'Paid'),(13,9,3,'2021-02-02 13:04:14','2021-02-02 13:04:14',6468.7,'Paid'),(14,8,3,'2021-02-02 13:04:14','2021-02-02 13:04:14',10988.1,'Paid'),(15,9,3,'2021-02-02 13:04:14','2021-02-02 13:04:14',14133.1,'Paid');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'in',10,572.43,'Eveniet qui odit voluptatem iste a. Consequatur autem voluptas eius dolores totam eaque est hic. Aut sit sit culpa rerum ea molestiae omnis alias. Consequatur eos porro facere blanditiis ut.',NULL,1),(2,1,'aliquid',23,622.09,'Quibusdam in hic illo et vero. Illo repudiandae est odio labore explicabo. Ab quis fugit veritatis. Iste nisi amet non et adipisci sed nostrum facilis.',NULL,1),(3,1,'nostrum',25,557.04,'Libero eius error aut reprehenderit. Optio optio dolorem veritatis blanditiis cumque totam. Nulla doloribus quae voluptate adipisci voluptate excepturi.',NULL,1),(4,1,'enim',64,256.06,'Ea eos illum recusandae repudiandae ut. Commodi repellat nesciunt quis eligendi qui vel. Sint reprehenderit omnis porro iure. Qui unde officiis sit quidem quo dolor maxime.',NULL,1),(5,1,'et',3,929.16,'Molestias vel ea amet ut quam eveniet. Voluptas tempora veniam optio dolores voluptatem vel. Minima tempore odio et sapiente.',NULL,1),(6,2,'earum',15,29.21,'Consequatur corporis eius aut a possimus itaque et. Libero voluptas recusandae maxime tempora. Provident vel ut voluptatibus quaerat fuga nam voluptas.',NULL,1),(7,2,'natus',13,127.75,'Non est ratione qui inventore omnis. Iure provident velit et rerum corporis voluptas sint. Porro id voluptatem quod quos est.',NULL,1),(8,2,'doloribus',3,356.08,'Amet ipsa quia et provident harum impedit. Fugiat sunt ipsam deleniti culpa occaecati. Iure quasi et id et cupiditate.',NULL,1),(9,2,'iure',69,767.96,'Consequatur officiis temporibus iusto qui. Ad deleniti officia doloremque deleniti eum. Eveniet sed ad dolorem est minus.',NULL,1),(10,2,'error',10,110.9,'Dolore dolorum molestiae animi quibusdam. Similique molestiae dolorum unde incidunt molestias dicta sunt vel. Et porro non corporis eligendi doloremque in est.',NULL,1),(11,3,'exercitationem',23,949.1,'Dolor iusto repellendus aliquid natus. Rerum vitae impedit rerum consequuntur qui. Aut similique tempore dolor aliquam recusandae quisquam eum. Facilis porro provident et voluptas aut dolorem.',NULL,1),(12,3,'qui',64,386.09,'Voluptate laboriosam ea vero. Et laboriosam dolor quae autem perspiciatis atque doloribus. Ipsam ut maiores architecto expedita.',NULL,1),(13,3,'a',63,452.46,'Aspernatur voluptatem totam in porro. Minus voluptatibus in amet. Omnis aperiam ut quia non. Qui non iste eius cum.',NULL,1),(14,3,'id',19,50.1,'Quos facilis repellat pariatur ut. Esse in qui qui itaque est. Fuga et quia quia suscipit nemo consequatur. Dolorem minus iusto cumque repellat dicta. Et quia illum ipsam molestiae quis eveniet.',NULL,1),(15,3,'ipsa',8,126.58,'Et ipsam dolorem nobis. Soluta quo aliquid libero incidunt. Consequuntur voluptatem necessitatibus dolores esse iusto.',NULL,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'langosh.tressa@example.net','Leon','Tillman','(510) 293-2164','5515 Leila View Suite 216\nEast Florence, ND 56236-8887',0,0,0),(2,'elaina85@example.com','Lizzie','Bailey','+1.939.644.4792','84700 Rubie View Apt. 277\nShanahanport, MO 14532-8114',0,0,0),(3,'davin41@example.org','Thalia','Veum','902.947.7031','6370 Ross Expressway\nEast Dockfort, SC 34180-6501',0,0,0);
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shipping_details`
--

LOCK TABLES `shipping_details` WRITE;
/*!40000 ALTER TABLE `shipping_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,1,'nobis',1,'2021-02-02 13:04:13','2021-02-02 13:04:13'),(2,2,'atque',1,'2021-02-02 13:04:13','2021-02-02 13:04:13'),(3,3,'optio',1,'2021-02-02 13:04:13','2021-02-02 13:04:13');
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('angie.medhurst@example.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','angie.medhurst@example.com','2021-02-02 13:04:13','ZoloiCH9It','2021-02-02 13:04:13','2021-02-02 13:04:13'),('asha90@example.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','asha90@example.com','2021-02-02 13:04:13','Uw0nLjpXtM','2021-02-02 13:04:13','2021-02-02 13:04:13'),('chanelle.bednar@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','chanelle.bednar@example.net','2021-02-02 13:04:13','3jcUHom5P9','2021-02-02 13:04:13','2021-02-02 13:04:13'),('ckoepp@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','ckoepp@example.org','2021-02-02 13:04:13','NqG8jJuudz','2021-02-02 13:04:13','2021-02-02 13:04:13'),('davin41@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','davin41@example.org','2021-02-02 13:04:13','z4OBzj6ZTD','2021-02-02 13:04:13','2021-02-02 13:04:13'),('elaina85@example.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','elaina85@example.com','2021-02-02 13:04:13','QC4p42kQQM','2021-02-02 13:04:13','2021-02-02 13:04:13'),('farrell.roel@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','farrell.roel@example.org','2021-02-02 13:04:13','uXHSNKJK5Y','2021-02-02 13:04:13','2021-02-02 13:04:13'),('helmer63@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','helmer63@example.net','2021-02-02 13:04:13','yQ922XReBC','2021-02-02 13:04:13','2021-02-02 13:04:13'),('jamar.rice@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','jamar.rice@example.net','2021-02-02 13:04:13','QuQLwJ1vlP','2021-02-02 13:04:13','2021-02-02 13:04:13'),('kristina80@example.org','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','kristina80@example.org','2021-02-02 13:04:13','wuZlsfvAuD','2021-02-02 13:04:13','2021-02-02 13:04:13'),('langosh.tressa@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','langosh.tressa@example.net','2021-02-02 13:04:13','QCTEr6QLlG','2021-02-02 13:04:13','2021-02-02 13:04:13'),('swift.nikki@example.net','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','swift.nikki@example.net','2021-02-02 13:04:13','33BHUPIK9F','2021-02-02 13:04:13','2021-02-02 13:04:13'),('towne.lloyd@example.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','towne.lloyd@example.com','2021-02-02 13:04:13','KPUuxHIfXM','2021-02-02 13:04:13','2021-02-02 13:04:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2021-02-02 13:19:43
