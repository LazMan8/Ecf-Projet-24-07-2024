-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 25 juil. 2024 à 10:00
-- Version du serveur : 10.11.8-MariaDB-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BdAuthentiﬁcation`
--

-- --------------------------------------------------------

--
-- Structure de la table `EstHabilite`
--

CREATE TABLE `EstHabilite` (
  `numMatriculePerso` varchar(255) NOT NULL,
  `idAppli` varchar(255) NOT NULL,
  `idRoleAppli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Personnel`
--

CREATE TABLE `Personnel` (
  `numMatriculePerso` varchar(255) NOT NULL,
  `melPerso` varchar(255) DEFAULT NULL,
  `mdpPerso` varchar(255) DEFAULT NULL,
  `nomPerso` varchar(255) DEFAULT NULL,
  `prenomPerso` varchar(255) DEFAULT NULL,
  `dateNaissancePerso` date DEFAULT NULL,
  `adresseVille` varchar(255) DEFAULT NULL,
  `adresseRue` varchar(255) DEFAULT NULL,
  `AdressePostal` int(255) DEFAULT NULL,
  `telPerso` int(255) DEFAULT NULL,
  `numService` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `RoleApplicatif`
--

CREATE TABLE `RoleApplicatif` (
  `idAppli` varchar(255) NOT NULL,
  `idRoleAppli` varchar(255) NOT NULL,
  `mdpRoleAppli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `EstHabilite`
--
ALTER TABLE `EstHabilite`
  ADD PRIMARY KEY (`numMatriculePerso`,`idAppli`,`idRoleAppli`),
  ADD KEY `idAppli` (`idAppli`,`idRoleAppli`);

--
-- Index pour la table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`numMatriculePerso`);

--
-- Index pour la table `RoleApplicatif`
--
ALTER TABLE `RoleApplicatif`
  ADD PRIMARY KEY (`idAppli`,`idRoleAppli`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `EstHabilite`
--
ALTER TABLE `EstHabilite`
  ADD CONSTRAINT `EstHabilite_ibfk_1` FOREIGN KEY (`numMatriculePerso`) REFERENCES `Personnel` (`numMatriculePerso`),
  ADD CONSTRAINT `EstHabilite_ibfk_2` FOREIGN KEY (`idAppli`,`idRoleAppli`) REFERENCES `RoleApplicatif` (`idAppli`, `idRoleAppli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
