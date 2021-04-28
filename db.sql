-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: club_de_l_immo
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bien`
--

DROP TABLE IF EXISTS `bien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) NOT NULL,
  `prix` int NOT NULL,
  `surface` int NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `classe_energetique` varchar(5) NOT NULL,
  `nb_chambre` int NOT NULL,
  `nb_piece` int NOT NULL,
  `description` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `secteur_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `C7` (`secteur_id`),
  CONSTRAINT `C7` FOREIGN KEY (`secteur_id`) REFERENCES `secteur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bien`
--

LOCK TABLES `bien` WRITE;
/*!40000 ALTER TABLE `bien` DISABLE KEYS */;
/*!40000 ALTER TABLE `bien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bien_transaction`
--

DROP TABLE IF EXISTS `bien_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bien_transaction` (
  `transaction_id` int NOT NULL,
  `bien_id` int NOT NULL,
  `client_id` int NOT NULL,
  PRIMARY KEY (`transaction_id`,`bien_id`,`client_id`),
  KEY `C15` (`client_id`),
  KEY `C16` (`bien_id`),
  CONSTRAINT `C14` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`),
  CONSTRAINT `C15` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `C16` FOREIGN KEY (`bien_id`) REFERENCES `bien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bien_transaction`
--

LOCK TABLES `bien_transaction` WRITE;
/*!40000 ALTER TABLE `bien_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `bien_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `categorie` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `critere`
--

DROP TABLE IF EXISTS `critere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `critere` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `categorie` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `critere`
--

LOCK TABLES `critere` WRITE;
/*!40000 ALTER TABLE `critere` DISABLE KEYS */;
/*!40000 ALTER TABLE `critere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `critere_bien`
--

DROP TABLE IF EXISTS `critere_bien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `critere_bien` (
  `critere_id` int NOT NULL,
  `bien_id` int NOT NULL,
  PRIMARY KEY (`critere_id`,`bien_id`),
  KEY `C12` (`bien_id`),
  CONSTRAINT `C11` FOREIGN KEY (`critere_id`) REFERENCES `critere` (`id`),
  CONSTRAINT `C12` FOREIGN KEY (`bien_id`) REFERENCES `bien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `critere_bien`
--

LOCK TABLES `critere_bien` WRITE;
/*!40000 ALTER TABLE `critere_bien` DISABLE KEYS */;
/*!40000 ALTER TABLE `critere_bien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `bien_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `property_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `C9` (`bien_id`),
  CONSTRAINT `C9` FOREIGN KEY (`bien_id`) REFERENCES `bien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (1,'https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80',NULL,'exemple_photo_1',1),(2,'https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80',NULL,'exemple_photo_2',1),(3,'https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80',NULL,'exemple_photo_3',1),(4,'https://images.unsplash.com/photo-1595256858804-ad34bc0ce444?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80',NULL,'exemple_photo_4',1),(5,'https://images.unsplash.com/photo-1554716400-0782c284cc1f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80',NULL,'exemple_photo_joel',2),(6,'https://images.unsplash.com/photo-1582559934353-2e47140e7501?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1488&q=80',NULL,'exemple_photo_joel',2),(7,'https://images.unsplash.com/photo-1582576628972-ef6e3f6615d7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80',NULL,'exemple_photo_joel',2),(8,'https://images.unsplash.com/photo-1565437383794-85cd09227c06?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80',NULL,'exemple_photo_joel',3),(9,'https://images.unsplash.com/photo-1542321204-2dba0ee7c39f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80',NULL,'exemple_photo_joel',3),(10,'https://images.unsplash.com/flagged/photo-1583442850665-83846558fe28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80',NULL,'exemple_photo_joel',3);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property` (
  `id` int NOT NULL AUTO_INCREMENT,
  `energy_performance_diagnostic` varchar(5) DEFAULT NULL,
  `greenhouse_gas` varchar(5) DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `surface` int DEFAULT NULL,
  `nb_pieces` int DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `detail` text,
  `reference` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `C5` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property`
--

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` VALUES (1,'A','B','Maison',200000,100,4,'Cigogne','Orleans','https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80','A 15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF0150508'),(2,'','A','Maison',260000,120,5,'Moulière','Olivet','https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80','15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF0579654'),(3,'A','','Appartement',370000,140,6,'Ardon','Olivet','https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80','LA GARENNE COLOMBES, dans un environnement verdoyant et calme tout en étant proche de s commodités, bel Appartement lumineux traversant 4 pièces de 67 m² , au 1er étage, comprenant : une Entrée, un Séjour exposé sud , une Cuisine ouverte et équipée,3 Chambres, une Salle de bains et un WC séparé.Une grande cave et Une place de stationnement complètent ce bien. Possibilité de louer en plus un box pour 40euros/mois . Copropriété de 50 lots. Charges: 208 euros/mois . Honoraires charge acquéreur de 3.85%. inclus dans le prix . Cet appartement familial clair et fonctionnel dispose d\'un plan optimal. Son emplacement conjugue tout les atouts de la proximité du centre-ville, à 2 min à pied du tramway T2.','REF2479587'),(4,'B','B','Appartement',220000,110,4,'Vilpot','Saran','https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80','LA GARENNE COLOMBES, dans un environnement verdoyant et calme tout en étant proche de s commodités, bel Appartement lumineux traversant 4 pièces de 67 m² , au 1er étage, comprenant : une Entrée, un Séjour exposé sud , une Cuisine ouverte et équipée,3 Chambres, une Salle de bains et un WC séparé.Une grande cave et Une place de stationnement complètent ce bien. Possibilité de louer en plus un box pour 40euros/mois . Copropriété de 50 lots. Charges: 208 euros/mois . Honoraires charge acquéreur de 3.85%. inclus dans le prix . Cet appartement familial clair et fonctionnel dispose d\'un plan optimal. Son emplacement conjugue tout les atouts de la proximité du centre-ville, à 2 min à pied du tramway T2.','REF0125798'),(5,'H','B','Vila',500000,240,7,'Orée de Sologne','Orleans Sud','https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80','15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF0159657'),(6,'','B','Maison',170000,80,4,'Ardon','Olivet','https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80','15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF0325796'),(7,'D','D','Maison',370000,140,6,'Moulière','Olivet','https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80','15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF0154875'),(8,'A','D','Maison',220000,110,4,'Les Sablonnières','Saran','https://images.unsplash.com/photo-1542321204-23959c19158b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80','15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF4879015'),(9,'A','B','Maison',370000,140,6,'Moulière','Olivet','https://images.unsplash.com/photo-1565437383733-25a07431f131?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80','15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF0657908'),(10,'C','B','Maison',220000,110,4,'Vilpot','Saran','https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2089&q=80','15 minutes à pieds de petits commerces, dans un environnement calme et privilégié, charmante maison en chaûme du 19ème siècle. Cette chaumière comprend au rdc, 1 entrée, 1 salle à mangé très lumineuse, 1 salon et sa cheminée en pierre ainsi que sa cuisine et son coin lingerie, wc. Au 1er étage, 3 chambres, 1 salle de bain et un wc. Un sous sol partiel, 1 cave et un vide sanitaire. Le tout posé sur un bel écrin de verdure d\'environ 1200m². 1 garage avec arrivée d\'eau et électricité. Votre agence terres et demeures de normandie reste à votre disposition pour la visite de ce joli bien! Nous vous rappelons que suite à l\'article l.561-5 du code monétaire et financier, la copie de la pièce d\'identité de tous les visiteurs vous sera demandée avant la visite.','REF3698751');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quartier` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur`
--

LOCK TABLES `secteur` WRITE;
/*!40000 ALTER TABLE `secteur` DISABLE KEYS */;
/*!40000 ALTER TABLE `secteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-28 17:05:34
