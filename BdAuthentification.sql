-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 juil. 2024 à 13:07
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdauthentification`
--

-- --------------------------------------------------------

--
-- Structure de la table `esthabilite`
--

DROP TABLE IF EXISTS `esthabilite`;
CREATE TABLE IF NOT EXISTS `esthabilite` (
  `numMatriculePerso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idAppli` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idRoleAppli` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`numMatriculePerso`,`idAppli`,`idRoleAppli`),
  KEY `idAppli` (`idAppli`,`idRoleAppli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `numMatriculePerso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `melPerso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mdpPerso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomPerso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenomPerso` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateNaissancePerso` date DEFAULT NULL,
  `adresseVille` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresseRue` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adressePostale` int DEFAULT NULL,
  `telPerso` int DEFAULT NULL,
  `numService` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`numMatriculePerso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roleapplicatif`
--

DROP TABLE IF EXISTS `roleapplicatif`;
CREATE TABLE IF NOT EXISTS `roleapplicatif` (
  `idAppli` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idRoleAppli` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mdpRoleAppli` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idAppli`,`idRoleAppli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `esthabilite`
--
ALTER TABLE `esthabilite`
  ADD CONSTRAINT `EstHabilite_ibfk_1` FOREIGN KEY (`numMatriculePerso`) REFERENCES `personnel` (`numMatriculePerso`),
  ADD CONSTRAINT `EstHabilite_ibfk_2` FOREIGN KEY (`idAppli`,`idRoleAppli`) REFERENCES `roleapplicatif` (`idAppli`, `idRoleAppli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
