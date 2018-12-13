-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: mysql.cs.nott.ac.uk    Database: psxnp4_uni_data
-- ------------------------------------------------------
-- Server version	5.5.60-MariaDB

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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `coursedesc` varchar(150) DEFAULT NULL,
  `schoolID` int(11) NOT NULL,
  `coursecode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`courseID`),
  KEY `schoolID` (`schoolID`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `schools` (`schoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'Battle Mage',1,'OMBM'),(2,'Sorcerer',1,'OMSr'),(3,'Warder',2,'DMWa'),(4,'Enhancer',2,'DMEn'),(5,'Healer',3,'BMHe'),(6,'Shape Shifter',3,'BMSS'),(7,'Witch',4,'AMWi'),(8,'Alchemist',4,'AMAl'),(9,'Illusionist',5,'MMIM'),(10,'Mentalist',5,'MMMM');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrolment`
--

DROP TABLE IF EXISTS `enrolment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrolment` (
  `username` varchar(256) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `cw_mark` int(11) DEFAULT NULL,
  `exam_mark` int(11) DEFAULT NULL,
  `total_mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`,`moduleID`),
  KEY `moduleID` (`moduleID`),
  CONSTRAINT `enrolment_ibfk_1` FOREIGN KEY (`moduleID`) REFERENCES `modules` (`moduleID`),
  CONSTRAINT `enrolment_ibfk_2` FOREIGN KEY (`username`) REFERENCES `students` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrolment`
--

LOCK TABLES `enrolment` WRITE;
/*!40000 ALTER TABLE `enrolment` DISABLE KEYS */;
INSERT INTO `enrolment` VALUES ('Bobson',1,NULL,NULL,NULL),('Bobson',5,NULL,NULL,NULL),('breaker',1,NULL,NULL,NULL),('breaker',5,NULL,NULL,NULL),('breaker',8,NULL,NULL,NULL),('Granger2',5,37,58,95),('Granger2',6,38,56,94),('Granger2',7,38,57,95),('hazzad',3,34,24,58),('hazzad',5,23,46,69),('hazzad',6,27,45,72),('pcgrant',1,33,43,76),('pcgrant',5,26,44,70),('pcgrant',6,29,10,39),('rwind',2,15,21,36),('rwind',4,29,49,78),('rwind',7,22,41,63),('rwind',8,16,33,49),('weal1',1,10,60,70),('weal1',2,15,60,75),('weal1',4,0,65,65),('weal1',8,50,30,80),('wetgirl',3,7,25,32),('wetgirl',7,10,26,36),('wetgirl',8,21,17,38);
/*!40000 ALTER TABLE `enrolment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `housing`
--

DROP TABLE IF EXISTS `housing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `housing` (
  `houseID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `HouseTutorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`houseID`),
  KEY `HouseTutorID` (`HouseTutorID`),
  CONSTRAINT `housing_ibfk_1` FOREIGN KEY (`HouseTutorID`) REFERENCES `lecturers` (`lecturerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `housing`
--

LOCK TABLES `housing` WRITE;
/*!40000 ALTER TABLE `housing` DISABLE KEYS */;
INSERT INTO `housing` VALUES (0,'Ulfheim','1313 Dead End Drive',1),(1,'Belkhris','1640 Riverside Drive',0),(2,'Kudaava','1630 Revello Drive',2),(3,'Krystalia','Floor 3 Cosmere House ',3),(4,'Smedry','4 Privet Drive',4);
/*!40000 ALTER TABLE `housing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecturers` (
  `lecturerID` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `schoolID` int(11) NOT NULL,
  PRIMARY KEY (`lecturerID`),
  KEY `schoolID` (`schoolID`),
  CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `schools` (`schoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturers`
--

LOCK TABLES `lecturers` WRITE;
/*!40000 ALTER TABLE `lecturers` DISABLE KEYS */;
INSERT INTO `lecturers` VALUES (0,'Magister','Shannon',2),(1,'Ebenizer','Macoy',3),(2,'Minerver','Mcgonagall',1),(3,'Durzo','Blint',4),(4,'Gavin','Guile',5);
/*!40000 ALTER TABLE `lecturers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_in`
--

DROP TABLE IF EXISTS `log_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_in` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `log_in_ibfk_1` FOREIGN KEY (`username`) REFERENCES `students` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_in`
--

LOCK TABLES `log_in` WRITE;
/*!40000 ALTER TABLE `log_in` DISABLE KEYS */;
INSERT INTO `log_in` VALUES ('Bobson','60bd1266166e6f3787a3b3d240cc72f609e4b7de543b6af8a10390c71f2bc5aa'),('breaker','dbcd5e7bb7a0f538810de44c3efbd813037ee3fa358747bb71fa58e157af45f7'),('granger2','866b3a5cb1cb3d1e83d0ec67609ab8cc88f8d41765b3dc30cc67e3793a7e66a6'),('hazzad','c141faa80e43a11909f5736d1e767f12e1468aa06dadd446081746934e875fc3'),('pcgrant','ecc0e7dc084f141b29479058967d0bc07dee25d9690a98ee4e6fdad5168274d7'),('rwind','44fe46b5ab365dc1fa59668c2b5d239f71642f5a0ff8d65d90af45e74359f625'),('weal1','ed949e08641a8c07a6f3126c08d299be64f0b71ec49b943845a7aa456ff6d2bc'),('wetgirl','729867c8c39ad44126f8ce4e84457e5bbc611d0a6073d9302d3260b13c5b91c9');
/*!40000 ALTER TABLE `log_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `moduleID` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `hours` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `lecturerID` int(11) NOT NULL,
  `schoolID` int(11) DEFAULT NULL,
  PRIMARY KEY (`moduleID`),
  KEY `lecturerID` (`lecturerID`),
  CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`lecturerID`) REFERENCES `lecturers` (`lecturerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Magnus',6,20,0,1),(2,'Numinus',6,20,0,2),(3,'Healing',15,20,3,3),(4,'History of Magic',2,10,0,5),(5,'Evocation',8,20,1,1),(6,'Thaumaturgy',8,20,1,2),(7,'Transfiguration',10,20,2,4),(8,'The Art of Golem Making',6,10,2,3);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `schoolID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `schoolcode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (1,'Offensive Magic','OFFMAG'),(2,'Defensive Magic','DEFMAG'),(3,'Body Magic','BODMAG'),(4,'Alchemy','ALCM'),(5,'Mental Magic','MENTMAG');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `username` varchar(255) NOT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `gender` char(6) NOT NULL,
  `email` varchar(256) NOT NULL,
  `houseID` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `courseID` (`courseID`),
  KEY `houseID` (`houseID`),
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`houseID`) REFERENCES `housing` (`houseID`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES ('Bobson','Bobsonny','Bob',158,6,'Other','bb@bb.boooooooob',0),('breaker','Guiel','Kip',19,1,'Male','bigchromat@chromeria.com',0),('Granger2','Granger','Hermione',17,7,'Female','downwithvoldi@minmag.co.uk',3),('hazzad','Dresden','Harry',45,1,'Male','harry.dresden@hotmail.com',4),('pcgrant','Grant','Peter',28,2,'Male','pcgrant@lodge.met.uk',1),('rwind','Wind','Rince',35,9,'Male','Rince.Wind@usuni.ac.uk',1),('weal1','Weal','Nicodemus',65,4,'Male','carcografic@brightwater.com',2),('wetgirl','Sovari','Viridiana',23,1,'Female','vi.requests@sakage.com',4);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-13 10:23:35
