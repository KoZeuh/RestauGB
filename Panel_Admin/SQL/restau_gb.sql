-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 jan. 2022 à 22:40
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restau_gb`
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
  `perm_gest_admin` int(1) NOT NULL,
  `perm_gest_reserv` int(1) NOT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin_comptes`
--

INSERT INTO `admin_comptes` (`prenom`, `nom`, `identifiant`, `mot_de_passe`, `perm_gest_admin`, `perm_gest_reserv`) VALUES
('KoZeuh', 'Dev', 'kozeuh.dev', '098f6bcd4621d373cade4e832627b4f6', 1, 1);

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
  `telephone` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `date_Reservation` date NOT NULL,
  `nbr_Personnes` int(2) NOT NULL,
  `service` varchar(10) NOT NULL,
  PRIMARY KEY (`id_Reservation`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
