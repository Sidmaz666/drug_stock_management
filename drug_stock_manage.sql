-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: asha_pharmacy
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES
(1,'Rushali','email@gmail.com','imadmin','b4b8daf4b8ea9d39568719e1e320076f');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bills` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` int(20) NOT NULL,
  `month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  `sell_amt` int(20) DEFAULT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES
(8,253342,'February',2022,262476,'2022-05-15 12:40:26'),
(9,484518,'March',2022,262171,'2022-05-15 12:40:30');
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `drug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imported_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `date` date NOT NULL,
  `sold` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(4,'Vicks Ginger Cough Drops, 20 Count','TSK','lozenges',200,20,'2022-03-15',200),
(5,'Strepsils Warm Ginger & Lemon Lozenges, 25 Count','TSK','lozenges',250,75,'2022-03-15',250),
(6,'Cofsils Ginger Lemon, 10 Lozenges','TSK','lozenges',120,30,'2022-03-15',120),
(7,'Strepsils Orange Flavoured Lozenges, 25 Count','TSK','lozenges',20,75,'2022-03-15',12),
(9,'Dettol Antiseptic Liquid, 60 ml','GHY','cleaning',310,30,'2022-03-15',300),
(10,'Dettol Antiseptic Liquid, 125 ml','GHY','cleaning',132,60,'2022-03-15',132),
(11,'Dettol Antiseptic Liquid, 550 ml','GHY','cleaning',55,194,'2022-03-15',50),
(12,'Dettol Antiseptic Liquid, 1 Litre','GHY','cleaning',50,331,'2022-03-15',50),
(13,'Harpic Power Plus Original Disinfectant Toilet Cleaner, 500 ml','TSK','cleaning',330,89,'2022-03-15',310),
(14,'Apollo Life Hand Sanitizer Liquid Spray, 500 ml','TSK','hand_wash',200,125,'2022-04-15',200),
(15,'Dettol Original Instant Hand Sanitizer, 50 ml','GHY','hand_wash',300,22,'2022-04-15',289),
(16,'Apollo Life Hand Sanitizer Liquid Spray, 100 ml','TSK','hand_wash',230,25,'2022-04-15',221),
(17,'Dettol Original Liquid Handwash, 100 ml Squeezy Bottle','GHY','hand_wash',500,30,'2022-04-15',500),
(18,'Apollo Life Hand Sanitizer, 5 Litre','TSK','hand_wash',10,1000,'2022-04-15',5),
(19,'Savlon Moisture Shield Germ Protection Handwash, 750 ml Refill Pack','TSK','hand_wash',120,99,'2022-04-15',111),
(20,'Zincovit Tablet 15s','TSK','multivitamins',100,96,'2022-04-15',52),
(21,'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets','TSK','multivitamins',210,21,'2022-04-15',200),
(22,'Maxirich Multivitamin & Minerals Softgel, 10 Capsules','GHY','multivitamins',230,110,'2022-04-15',222),
(23,'Fast&Up Charge Natural Vitamin C & Zinc Orange Flavour, 20 Effervescent Tablets','GHY','multivitamins',12,195,'2022-04-15',10),
(24,'Apollo Life Vitamin C & Zinc Sulphate Chewable Orange Flavour Tablets, 30 Count','TSK','multivitamins',23,100,'2022-02-15',21),
(25,'Healthvit C-Vitan-Z Vitamin C & Zinc Chewable, 60 Tablets','GHY','multivitamins',34,150,'2022-02-15',34),
(26,'Inlife Vitamin D3 2000 IU, 60 Capsules','TSK','multivitamins',56,379,'2022-02-15',56),
(27,'GNC Mega Men One Daily Multivitamin, 60 Tablets','GHY','multivitamins',34,1199,'2022-03-15',32),
(28,'GNC Womens One Daily Multivitamin, 60 Tablets','GHY','multivitamins',23,724,'2022-02-15',23),
(29,'Swadeshi Ayush Kadha, 50 gm','TSK','immunity_boosters',290,52,'2022-02-15',290),
(30,'Patanjali Amla Juice, 1 Litre','TSK','immunity_boosters',126,130,'2022-02-15',126),
(31,'Patanjali Aloe Vera Juice with Fiber, 1 Litre','TSK','immunity_boosters',249,200,'2022-02-15',249),
(32,'Swadeshi Amla Murabha, 1 Kg','GHY','immunity_boosters',455,168,'2022-02-15',455),
(33,'Patanjali Giloy Ghanvati, 60 Tablets','GHY','immunity_boosters',341,100,'2022-03-15',301),
(34,'Apollo Life Honey, 250 gm','TSK','immunity_boosters',311,99,'2022-03-15',20),
(35,'Swadeshi Shudh Amla Ras Juice, 1000 ml','GHY','immunity_boosters',377,144,'2022-04-15',77),
(36,'Dabur Chyawanprash Awaleha, 500 gm','TSK','immunity_boosters',222,210,'2022-03-15',200),
(37,'Patanjali Giloy Juice, 500 ml','GHY','immunity_boosters',111,90,'2022-03-15',99),
(38,'Zandu Sugar-Free Pancharishta, 450 ml','GHY','chyawanprash',400,139,'2022-04-15',321),
(39,'Dabur Chyawanprash Awaleha, 500 gm','GHY','chyawanprash',12,210,'2022-04-15',10),
(40,'Dabur Chyawanprash Awaleha, 1 Kg','GHY','chyawanprash',343,349,'2022-04-15',32),
(41,'Patanjali Special Chyawanprash with Saffron, 1 kg','GHY','chyawanprash',132,280,'2022-04-15',17),
(42,'Dabur Chyawanprakash Sugar Free, 500 gm','GHY','chyawanprash',133,225,'2022-04-15',56),
(43,'Dhootapapeshwar Swamala, 1 Kg','TSK','chyawanprash',23,1168,'2022-04-15',12),
(44,'COVIFIND Covid-19 Antigen Self Test Kit, 1 Count','GHY','covid_test_kit',20,212,'2022-04-15',11),
(45,'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit, 1 Count','GHY','covid_test_kit',120,212,'2022-04-15',10),
(46,'Panbio Covid-19 Antigen Self-Test, 1 Kit','GHY','covid_test_kit',12,325,'2022-04-15',8),
(47,'Apollo Pharmacy Optima Vaporizer Steam Inhaler, 1 Count','TSK','steam_vaporizer',130,400,'2022-03-15',30),
(48,'Healthcare 3 In 1 Steam Vaporizer, 1 Count','TSK','steam_vaporizer',120,360,'2022-04-15',110),
(49,'Apollo Pharmacy Mini Steam Vaporizer, 1 Count','GHY','steam_vaporizer',120,350,'2022-04-15',12),
(50,'Dr. Morepen Breathe Free Vaporizer VP06, 1 Count','GHY','steam_vaporizer',33,405,'2022-04-15',21),
(51,'Steam Inhaler All-In-One (Diamond)','TSK','steam_vaporizer',23,450,'2022-04-15',2),
(52,'Vaporizer All In One','GHY','steam_vaporizer',300,405,'2022-03-15',31),
(53,'Apollo Pharmacy ZM-700-01 Pulse Oximeter, 1 Count','GHY','pulse_oximeters',120,750,'2022-05-15',3),
(54,'Polymed Pulse Oximeter CMS50C, 1 Count','GHY','pulse_oximeters',120,999,'2022-05-15',6),
(55,'Accusure Pulse Oximeter, 1 Count','GHY','pulse_oximeters',345,750,'2022-05-15',11),
(56,'Ultra fingertip Pulse Oximeter, 1 Count','GHY','pulse_oximeters',23,750,'2022-05-15',7),
(57,'Fast Cure Fingertip Pulse Oximeter','TSK','pulse_oximeters',111,750,'2022-05-15',41),
(58,'Accusure Pulse Oximeter, 1 Count','GHY','pulse_oximeters',12,750,'2022-05-15',6),
(59,'EVM EnOxy+ Fingertip Pulse Oximeter, 1 Count','GHY','pulse_oximeters',2,750,'2022-05-15',0),
(60,'Afk Fingertip Pulse Oximeter YK011','GHY','pulse_oximeters',5,750,'2022-05-15',1),
(61,'Apollo Pharmacy Digital Thermometer, 1 Count','TSK','thermometer',30,110,'2022-05-15',19),
(62,'Apollo Pharmacy Digital Flexible Thermometer, 1 Count','TSK','thermometer',10,100,'2022-05-15',9),
(63,'Apollo Pharmacy Oval Thermometer Large, 1 Count','GHY','thermometer',30,100,'2022-04-15',3),
(64,'Apollo Life Thermosure Non Contact Infrared Thermometer TS-03, 1 Count','GHY','thermometer',12,1000,'2022-02-15',12),
(65,'Digital Thermometer (Dr.Morpen )','GHY','thermometer',22,275,'2022-03-15',16),
(66,'Medtech Digital Thermometer TMP 02 , 1 Count','GHY','thermometer',30,348,'2022-05-15',10),
(67,'Doctors Choice Sterile Disposable Surgical Latex Gloves Size-7.0, 1 Pair','GHY','gloves',200,49,'2022-05-15',200),
(69,'Latex Examination Gloves, 25 Count','GHY','gloves',200,136,'2022-02-15',200),
(70,'Gloveon Nitrile Powder-Free Hand Gloves , 100 Count','GHY','gloves',13,1500,'2022-02-15',13),
(71,'MATIG NITRLE POWDER FREE GLOVES-M 100S (MUN HEALTH)','GHY','gloves',5,1125,'2022-05-15',2),
(72,'House Hold Gloves, 1 Pair','GHY','gloves',200,79,'2022-04-15',31),
(73,'Apollo Life Disposable 3 Ply Face Mask, 50 Count','TSK','face_mask',120,400,'2022-03-15',15),
(74,'Wildcraft Outdoor Face Mask W95 Large, Black, 3 Count','GHY','face_mask',12,512,'2022-03-15',4),
(75,'Apollo Life Unisex N95 Face Mask, 3 Count','TSK','face_mask',30,149,'2022-04-15',8),
(76,'Apollo Life N95 5 Layers Face Mask, 3 Count','TEZ','face_mask',220,60,'2022-05-15',28),
(77,'VENUS V-Shwas V-4400 N95 White Fold NIOSH Approved Flat Face Mask, 1 Count','GHY','face_mask',200,82,'2022-05-15',64),
(78,'Apollo Life Reusable 4ply Black Face Mask, 3 Count','TSK','face_mask',35,225,'2022-05-15',0),
(79,'Romsons N95 Respirator Kare 6 Layer Child Mask, 3 Count','TSK','face_mask',25,150,'2022-05-15',9),
(80,'COVIFIND Covid-19 Antigen Self Test Kit, 1 Count','GHY','covid_essentials',20,212,'2022-05-15',7),
(81,'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit, 1 Count','GHY','covid_essentials',120,212,'2022-05-15',17),
(82,'Cofsils Ginger Lemon, 10 Lozenges','TSK','covid_essentials',200,30,'2022-05-09',11),
(84,'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets','TSK','covid_essentials',120,30,'2022-05-15',31),
(85,'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets','TSK','covid_essentials',200,21,'2022-04-15',43),
(86,'Betadine 2% Mint Gargle 100 ml','TSK','covid_essentials',12,207,'2022-05-15',4),
(87,'Apollo Pharmacy Digital Flexible Thermometer, 1 Count','TSK','covid_essentials',20,350,'2022-05-15',10),
(88,'Betadine Germicide Gargle, 50 ml','GHY','covid_essentials',200,133,'2022-05-15',16),
(89,'Fast&Up Plant Based Joint Care 3In1 Cap 20S','GHY','pain_relief',20,600,'2022-03-15',9),
(90,'Divya Peedantak Vati Tab 80S (Patanjali)','TSK','pain_relief',200,110,'2022-05-15',31),
(91,'Siddhayu Painquit Natural 5 in 1 Joint Care Formula, 30 Tablets','GHY','pain_relief',50,210,'2022-04-01',17),
(92,'Apollo Pharmacy First Aid Kit, 1 Count','GHY','wound_care',10,500,'2022-02-15',2),
(93,'Apollo Pharmacy Adhesive Bandage Wash Proof Strip, 1 Count','TSK','wound_care',200,2,'2022-03-15',200),
(94,'Doctors Choice Elastic Crepe Bandage, 10 cm','TSK','wound_care',30,160,'2022-05-15',14),
(95,'Apollo Pharmacy Wash Proof Adhesive Bandages, 8 Count','TSK','wound_care',300,20,'2022-04-15',233),
(96,'Dr. Morepen Burnol Cream, 10 gm','GHY','wound_care',300,53,'2022-04-15',32),
(97,'Johnson & Johnson Antiseptic Flexi Band-Aid, 25 Count','GHY','wound_care',120,50,'2022-04-02',110),
(98,'Betadine Antiseptic Cream, 20 gm','GHY','wound_care',12,116,'2022-05-15',12),
(99,'Band Aid Washproof 10S','TSK','wound_care',300,25,'2022-04-15',212),
(100,'Johnson & Johnson Flexible Fabric Band-Aid, 1 Count','GHY','wound_care',500,2,'2022-05-15',512);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-15 18:12:12
