-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 jan. 2022 à 16:21
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restau_gb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_comptes`
--

DROP TABLE IF EXISTS `admin_comptes`;
CREATE TABLE IF NOT EXISTS `admin_comptes` (
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin_comptes`
--

INSERT INTO `admin_comptes` (`prenom`, `nom`, `identifiant`, `mot_de_passe`) VALUES
('Maxime', 'DP', 'max.dp', '098f6bcd4621d373cade4e832627b4f6'),
('Maxime2', 'DP2', 'max.dp2', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `platdujour`
--

DROP TABLE IF EXISTS `platdujour`;
CREATE TABLE IF NOT EXISTS `platdujour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numJour` int(5) NOT NULL,
  `numMois` int(5) NOT NULL,
  `nomPlatJour` varchar(255) NOT NULL,
  `prixHT` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_Reservation` int(10) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `date_Reservation` date NOT NULL,
  PRIMARY KEY (`id_Reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
