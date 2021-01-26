-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 jan. 2021 à 17:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `groin_groin`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `connect_id` int(11) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_status` int(11) DEFAULT NULL,
  `account_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`account_id`, `connect_id`, `account_name`, `account_status`, `account_amount`) VALUES
(1, 1, 'seb', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_name` int(11) DEFAULT NULL,
  `animal_species` int(11) DEFAULT NULL,
  `animals_life` int(11) DEFAULT NULL,
  `animal_property1` int(11) DEFAULT NULL,
  `animal_property2` int(11) DEFAULT NULL,
  `animal_food1` int(11) DEFAULT NULL,
  `animal_food2` int(11) DEFAULT NULL,
  `animal_benefit` varchar(255) DEFAULT NULL,
  `animal_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE IF NOT EXISTS `building` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(255) DEFAULT NULL,
  `building_price` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `connect`
--

DROP TABLE IF EXISTS `connect`;
CREATE TABLE IF NOT EXISTS `connect` (
  `connect_id` int(11) NOT NULL AUTO_INCREMENT,
  `connect_pseudo` varchar(255) DEFAULT NULL,
  `connect_password` varchar(255) NOT NULL,
  `connect_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`connect_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connect`
--

INSERT INTO `connect` (`connect_id`, `connect_pseudo`, `connect_password`, `connect_email`) VALUES
(1, 'speleo', '$2y$10$pzVkC0PBRxOA2FotQ06mDeQUUcz2AzoYolGV.a/TfNfaUks1U6ttq', 'seb@toto.fr');

-- --------------------------------------------------------

--
-- Structure de la table `farm`
--

DROP TABLE IF EXISTS `farm`;
CREATE TABLE IF NOT EXISTS `farm` (
  `farm_id` int(11) NOT NULL AUTO_INCREMENT,
  `connect_id` int(11) DEFAULT NULL,
  `farm_name` varchar(255) NOT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `techno_id` int(11) NOT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `farm_value` int(11) DEFAULT NULL,
  `buy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`farm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(255) DEFAULT NULL,
  `food_value` int(11) DEFAULT NULL,
  `food_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) DEFAULT NULL,
  `property_action` varchar(255) DEFAULT NULL,
  `property_point` int(11) DEFAULT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sector`
--

DROP TABLE IF EXISTS `sector`;
CREATE TABLE IF NOT EXISTS `sector` (
  `sector_id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sector_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `specie`
--

DROP TABLE IF EXISTS `specie`;
CREATE TABLE IF NOT EXISTS `specie` (
  `specie_id` int(11) NOT NULL AUTO_INCREMENT,
  `specie_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`specie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

DROP TABLE IF EXISTS `techno`;
CREATE TABLE IF NOT EXISTS `techno` (
  `techno_id` int(11) NOT NULL AUTO_INCREMENT,
  `techno_name` varchar(255) DEFAULT NULL,
  `techno_value` int(11) DEFAULT NULL,
  `techno_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`techno_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
