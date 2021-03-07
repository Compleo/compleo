-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for Linux (x86_64)
--
-- Host: magicaromagna.it    Database: vuzzytcz_compleo
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-log-cll-lve

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
-- Table structure for table `Attivita`
--

DROP TABLE IF EXISTS `Attivita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Attivita` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Descrizione` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Attivita`
--

LOCK TABLES `Attivita` WRITE;
/*!40000 ALTER TABLE `Attivita` DISABLE KEYS */;
INSERT INTO `Attivita` VALUES (1,'Imbianchino'),(2,'Giardiniere'),(3,'Muratore'),(4,'Babysitter'),(5,'Facchino'),(6,'Personal trainer'),(7,'Geometra'),(8,'Sarto'),(9,'Infermiere'),(10,'Segretario'),(11,'Insegnante'),(12,'Nutrizionista'),(13,'Decoratore');
/*!40000 ALTER TABLE `Attivita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Citta`
--

DROP TABLE IF EXISTS `Citta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Citta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `IDProvincia` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Elenco delle città di residenza degli utenti registrati a Compleo';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Citta`
--

LOCK TABLES `Citta` WRITE;
/*!40000 ALTER TABLE `Citta` DISABLE KEYS */;
INSERT INTO `Citta` VALUES (1,'Cesena',1),(2,'Forlì',1),(3,'Gambettola',1),(4,'Cervia',2),(5,'Rimini',3),(6,'Cesenatico',1),(7,'Riccione',3),(8,'Faenza',2),(9,'Mercato Saraceno',1),(10,'Imola',2),(11,'Ravenna',2);
/*!40000 ALTER TABLE `Citta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Offerta`
--

DROP TABLE IF EXISTS `Offerta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Offerta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUtente` int(11) DEFAULT NULL,
  `IDAttivita` int(11) DEFAULT NULL,
  `Descrizione` varchar(200) NOT NULL,
  `CostoOrario` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Offerta_fk` (`IDUtente`),
  KEY `Offerta_fk2` (`IDAttivita`),
  CONSTRAINT `Offerta_fk` FOREIGN KEY (`IDUtente`) REFERENCES `Utente` (`ID`),
  CONSTRAINT `Offerta_fk2` FOREIGN KEY (`IDAttivita`) REFERENCES `Attivita` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Offerta`
--

LOCK TABLES `Offerta` WRITE;
/*!40000 ALTER TABLE `Offerta` DISABLE KEYS */;
/*!40000 ALTER TABLE `Offerta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Provincia`
--

DROP TABLE IF EXISTS `Provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Provincia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='Elenco delle province delle città presenti nel database di Compleo';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Provincia`
--

LOCK TABLES `Provincia` WRITE;
/*!40000 ALTER TABLE `Provincia` DISABLE KEYS */;
INSERT INTO `Provincia` VALUES (1,'Forlì-Cesena'),(2,'Ravenna'),(3,'Rimini'),(4,'Ferrara'),(5,'Bologna'),(6,'Reggio Emilia'),(7,'Modena'),(8,'Parma'),(9,'Piacenza');
/*!40000 ALTER TABLE `Provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ricerca`
--

DROP TABLE IF EXISTS `Ricerca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ricerca` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUtente` int(11) DEFAULT NULL,
  `IDAttivita` int(11) DEFAULT NULL,
  `Descrizione` varchar(200) DEFAULT NULL,
  `IDCitta` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Ricerca_fk` (`IDAttivita`),
  KEY `Ricerca_fk2` (`IDUtente`),
  CONSTRAINT `Ricerca_fk` FOREIGN KEY (`IDAttivita`) REFERENCES `Attivita` (`ID`),
  CONSTRAINT `Ricerca_fk2` FOREIGN KEY (`IDUtente`) REFERENCES `Utente` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ricerca`
--

LOCK TABLES `Ricerca` WRITE;
/*!40000 ALTER TABLE `Ricerca` DISABLE KEYS */;
INSERT INTO `Ricerca` VALUES (1,2,2,'sfalcio prato mq.20, potatura 3 alberi media altezza',8),(2,9,4,'Prelievo da scuola elementare di due bambini ore 16:00 e disponibilità fino alle ore 18:00',7),(3,1,9,'Ciclo di 12 punture orario preserale',11);
/*!40000 ALTER TABLE `Ricerca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utente`
--

DROP TABLE IF EXISTS `Utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Utente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `CF` varchar(16) NOT NULL,
  `Indirizzo` varchar(100) NOT NULL,
  `IDCitta` int(11) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Utente_Citta` (`IDCitta`),
  CONSTRAINT `Utente_Citta` FOREIGN KEY (`IDCitta`) REFERENCES `Citta` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Tabella relativa ai dati raccolti per descrivere l''utente base iscritto a Compleo';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utente`
--

LOCK TABLES `Utente` WRITE;
/*!40000 ALTER TABLE `Utente` DISABLE KEYS */;
INSERT INTO `Utente` VALUES (1,'Antonella','Bianchi','BNCNNL80L49H199R','Via Bonifica, 32',11,'3201234567'),(2,'Marco','Marchi','MRCMRC80R13D458D','Via Borgo Pieve Ponte, 12',8,'3346512541'),(3,'Giovanni','Livitto','LVTGNN95C06C573X','Viale Jacopo Mazzoni, 50',1,'3334512763'),(4,'Luca','Accari','CCRLCU90B28C573S','Viale Giosuè Carducci, 30',1,'3389865281'),(5,'Maria','De Giovanni','DGVMRA00E49D704D','Viale Roma, 178',2,'3341726384'),(6,'Gianni','Rossi','RSSGNN02M25D704M','Via Giuseppe Prati, 8',2,'3703651287'),(7,'Bianca','Ambizzi','MBZBNC00P42D899A','Via Bruno Buozzi, 74',3,'3341289723'),(8,'Laura','Brandi','BRNLRA75D47F139F','Via Lorenzo Ferri, 4',9,'3207651239'),(9,'Silvia','Angelini','NGLSLV80T55H294Y','Viale Maria Ceccarini, 72',7,'3341267459'),(10,'Carlo','Battaglia','BTTCRL78D02C573Q','Via Andrea Costa, 1',1,'3357645103');
/*!40000 ALTER TABLE `Utente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-01  9:43:31
