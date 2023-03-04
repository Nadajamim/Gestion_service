-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 mars 2023 à 20:46
-- Version du serveur : 8.0.22
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_service`
--

-- --------------------------------------------------------

--
-- Structure de la table `chefsection`
--

DROP TABLE IF EXISTS `chefsection`;
CREATE TABLE IF NOT EXISTS `chefsection` (
  `idchefsection` int NOT NULL AUTO_INCREMENT,
  `nomchefsection` varchar(40) NOT NULL,
  `prenomchefsection` varchar(40) NOT NULL,
  PRIMARY KEY (`idchefsection`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chefsection`
--

INSERT INTO `chefsection` (`idchefsection`, `nomchefsection`, `prenomchefsection`) VALUES
(1, 'Erroudi', 'boujmeae'),
(2, 'SANI', 'ALI');

-- --------------------------------------------------------

--
-- Structure de la table `chefservice`
--

DROP TABLE IF EXISTS `chefservice`;
CREATE TABLE IF NOT EXISTS `chefservice` (
  `idchefservice` int NOT NULL AUTO_INCREMENT,
  `nomchefservice` varchar(40) NOT NULL,
  `prenomchefservice` varchar(40) NOT NULL,
  PRIMARY KEY (`idchefservice`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chefservice`
--

INSERT INTO `chefservice` (`idchefservice`, `nomchefservice`, `prenomchefservice`) VALUES
(1, 'Erroudi', 'BADER'),
(2, 'DRAI', 'NADA'),
(3, 'GHALLABI', 'KAWTAR');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `login`, `password`, `email`, `sexe`, `role`) VALUES
(1, 'Erroudi', 'Noussa-Gab', 'noussaybagab@gmail.com', 'M', 'chef1'),
(2, 'Root', 'Roottttl', 'root@gmail', 'F', 'user'),
(3, 'Noussa', 'Noussagab', 'noussaybagab@gmail.com', 'F', 'chef2'),
(4, 'NoussaY', 'Noussagab', 'noussaybagab@gmail.com', 'F', 'chef3');

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `idemployer` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `idService` int NOT NULL,
  PRIMARY KEY (`idemployer`),
  KEY `idService` (`idService`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employer`
--

INSERT INTO `employer` (`idemployer`, `nom`, `prenom`, `sexe`, `role`, `idService`) VALUES
(1, 'ARROUDI', 'ABDALLAH', 'M', 'chef', 1),
(2, 'GHALLABI', 'NOUSSAIBA', 'F', 'etudiant', 3),
(3, 'ouatouch', 'abdjalil', 'M', 'ADMIN', 2);

-- --------------------------------------------------------

--
-- Structure de la table `listservice`
--

DROP TABLE IF EXISTS `listservice`;
CREATE TABLE IF NOT EXISTS `listservice` (
  `matricule` int NOT NULL AUTO_INCREMENT,
  `idemployer` int NOT NULL,
  `date` varchar(80) NOT NULL,
  `day1M` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `day1E` varchar(40) NOT NULL,
  `day2M` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `day2E` varchar(40) NOT NULL,
  `day3M` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `day3E` varchar(40) NOT NULL,
  `day4M` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `day4E` varchar(30) NOT NULL,
  `day5M` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `day5E` varchar(30) NOT NULL,
  `day6M` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `day6E` varchar(30) NOT NULL,
  `day7M` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `day7E` varchar(30) NOT NULL,
  `idchefsection` int DEFAULT NULL,
  `idchefservice` int DEFAULT NULL,
  PRIMARY KEY (`matricule`),
  KEY `idchefservice` (`idchefservice`),
  KEY `idchefsection` (`idchefsection`),
  KEY `idemployer` (`idemployer`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `listservice`
--

INSERT INTO `listservice` (`matricule`, `idemployer`, `date`, `day1M`, `day1E`, `day2M`, `day2E`, `day3M`, `day3E`, `day4M`, `day4E`, `day5M`, `day5E`, `day6M`, `day6E`, `day7M`, `day7E`, `idchefsection`, `idchefservice`) VALUES
(1, 1, '2023-03-03', 'C.R', 'REMP', '13H-20H', '00H-07H', '13H-20H', '07H-13H', '00H-07H', '00H-07H', '20H00-00H', '13H-20H', '13H-20H', '20H00-00H', 'C.R', '13H-20H', 1, 1),
(2, 2, '2023-03-03', 'C.R', 'REMP', '13H-20H', '00H-07H', '13H-20H', '07H-13H', '00H-07H', '00H-07H', '20H00-00H', '13H-20H', '13H-20H', '20H00-00H', 'C.R', '13H-20H', 1, 1),
(3, 3, '2023-03-03', 'C.R', 'REMP', '13H-20H', '00H-07H', '13H-20H', '07H-13H', '00H-07H', '00H-07H', '20H00-00H', '13H-20H', '13H-20H', '20H00-00H', 'C.R', '13H-20H', 1, 1),
(4, 3, '2023-03-03', 'AI', 'C.EXCEP', 'R', 'C.EXCEP', '00H-07H', '00H-07H', '20H00-00H', 'C.R', 'REMP', 'REMP', '00H-07H', 'F', '20H00-00H', '13H-20H', 1, 1),
(5, 3, '2023-03-03', 'AA', 'AI', 'F', 'F', '13H-20H', 'F', 'C.R', 'REMP', 'C.EXCEP', 'REMP', 'F', 'C.EXCEP', 'C.EXCEP', '00H-07H', 1, 1),
(6, 3, '2023-03-03', 'AI', 'REMP', 'AI', 'R', '07H-13H', '00H-07H', 'C.EXCEP', 'REMP', 'C.EXCEP', 'REMP', '13H-20H', '20H00-00H', 'C.EXCEP', '00H-07H', 1, 1),
(7, 3, '2023-03-03', 'ADM', '00H-07H', 'C.EXCEP', '13H-20H', 'REMP', '13H-20H', '20H00-00H', 'F', '13H-20H', '00H-07H', '20H00-00H', '00H-07H', 'F', '00H-07H', 1, 1),
(8, 3, '2023-03-03', 'C.R', 'AA', 'REMP', 'F', '07H-13H', '00H-07H', '20H00-00H', 'AA', 'REMP', 'C.EXCEP', '13H-20H', '20H00-00H', '00H-07H', 'F', 1, 1),
(9, 1, '2023-03-03', 'C.R', '20H00-00H', '20H00-00H', '00H-07H', '00H-07H', '20H00-00H', '00H-07H', '13H-20H', '13H-20H', '07H-13H', '20H00-00H', '13H-20H', '20H00-00H', '00H-07H', 1, 1),
(10, 2, '2023-03-03', 'C.R', '20H00-00H', '20H00-00H', '00H-07H', '00H-07H', '20H00-00H', '00H-07H', '13H-20H', '13H-20H', '07H-13H', '20H00-00H', '13H-20H', '20H00-00H', '00H-07H', 1, 1),
(11, 1, '2023-03-03', 'C.R', '00H-07H', '13H-20H', '13H-20H', '00H-07H', '00H-07H', '20H00-00H', 'C.EXCEP', '20H00-00H', '20H00-00H', '13H-20H', '00H-07H', '00H-07H', '13H-20H', 1, 1),
(12, 2, '2023-03-03', 'C.R', '00H-07H', '13H-20H', '13H-20H', '00H-07H', '00H-07H', '20H00-00H', 'C.EXCEP', '20H00-00H', '20H00-00H', '13H-20H', '00H-07H', '00H-07H', '13H-20H', 1, 1),
(13, 2, '2023-03-04', 'AI', 'C.R', 'F', '00H-07H', '07H-13H', '13H-20H', '00H-07H', 'C.R', 'C.R', '13H-20H', '00H-07H', '20H00-00H', '00H-07H', '13H-20H', 1, 1),
(14, 2, '2023-03-04', 'AI', 'C.R', 'F', '00H-07H', '07H-13H', '13H-20H', '00H-07H', 'C.R', 'C.R', '13H-20H', '00H-07H', '20H00-00H', '00H-07H', '13H-20H', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `idsection` int NOT NULL,
  `nomsection` varchar(40) NOT NULL,
  `idchefsection` int NOT NULL,
  `idService` int DEFAULT NULL,
  PRIMARY KEY (`idsection`),
  KEY `idchefsection` (`idchefsection`),
  KEY `idService` (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`idsection`, `nomsection`, `idchefsection`, `idService`) VALUES
(1, 'section1', 1, 1),
(2, 'section2', 2, 2),
(3, 'section3', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `idService` int NOT NULL AUTO_INCREMENT,
  `nomService` varchar(40) NOT NULL,
  `idchefservice` int NOT NULL,
  PRIMARY KEY (`idService`),
  KEY `idchefservice` (`idchefservice`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `nomService`, `idchefservice`) VALUES
(1, 'S1', 1),
(2, 'S2', 2),
(3, 'S3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
CREATE TABLE IF NOT EXISTS `vacation` (
  `idvacation` int NOT NULL AUTO_INCREMENT,
  `typevacation` varchar(70) NOT NULL,
  PRIMARY KEY (`idvacation`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vacation`
--

INSERT INTO `vacation` (`idvacation`, `typevacation`) VALUES
(1, 'ADM'),
(2, 'R'),
(3, 'AA'),
(4, 'AI'),
(5, 'REMP'),
(6, 'C.R'),
(7, 'C.EXCEP'),
(8, 'F'),
(9, '00H-07H'),
(10, '13H-20H'),
(11, '20H00-00H'),
(12, '07H-13H');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`);

--
-- Contraintes pour la table `listservice`
--
ALTER TABLE `listservice`
  ADD CONSTRAINT `listservice_ibfk_2` FOREIGN KEY (`idchefservice`) REFERENCES `chefservice` (`idchefservice`),
  ADD CONSTRAINT `listservice_ibfk_3` FOREIGN KEY (`idchefsection`) REFERENCES `chefsection` (`idchefsection`),
  ADD CONSTRAINT `listservice_ibfk_4` FOREIGN KEY (`idemployer`) REFERENCES `employer` (`idemployer`);

--
-- Contraintes pour la table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`idchefsection`) REFERENCES `chefsection` (`idchefsection`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`idchefservice`) REFERENCES `chefservice` (`idchefservice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
