-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 fév. 2021 à 05:42
-- Version du serveur :  8.0.21
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
  `account_id` int NOT NULL AUTO_INCREMENT,
  `connect_id` int DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_status` int DEFAULT NULL,
  `account_amount` int DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`account_id`, `connect_id`, `account_name`, `account_status`, `account_amount`) VALUES
(1, 1, 'seb', NULL, 2000),
(4, 4, 'sebou', NULL, 50);

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `animal_id` int NOT NULL AUTO_INCREMENT,
  `animal_name` int DEFAULT NULL,
  `animal_species` int DEFAULT NULL,
  `animals_life` int DEFAULT NULL,
  `animal_property1` int DEFAULT NULL,
  `animal_property2` int DEFAULT NULL,
  `animal_food1` int DEFAULT NULL,
  `animal_food2` int DEFAULT NULL,
  `animal_benefit` varchar(255) DEFAULT NULL,
  `animal_value` int DEFAULT NULL,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE IF NOT EXISTS `building` (
  `building_id` int NOT NULL AUTO_INCREMENT,
  `building_name` varchar(255) DEFAULT NULL,
  `building_descr` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `building_price` int DEFAULT NULL,
  `building_img` varchar(255) NOT NULL,
  `status_id` int DEFAULT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `building`
--

INSERT INTO `building` (`building_id`, `building_name`, `building_descr`, `building_price`, `building_img`, `status_id`) VALUES
(1, 'corps de ferme', 'lieu d\'habitation, administratif', 50, 'https://i.pinimg.com/originals/26/91/d1/2691d1c95d90a57fdebbc96bbcc11203.jpg?epik=dj0yJnU9TGR4WWM3XzhhZWVscmpwXzZDZ0hEZHRlUS1RNVF6UjUmcD0wJm49VC1aV25OMWFiN1JxM2pIeE40bGRIUSZ0PUFBQUFBR0FSZmxR', NULL),
(2, 'grange', 'lieu de stockage nourriture ou matériel', 50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0Dy3s87uG6P0xj1jZbnv9vq5hlOAoQQE8og&usqp=CAU', NULL),
(3, 'porcherie', 'lieu de vie des porc', 100, 'http://ferrieres-st-mary.com/IMG/jpg/P1010167.jpg', NULL),
(4, 'poulailler', 'lieu de vie des poules, coq. lieu de collecte des oeufs', 100, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSExIWFhUXFxgYFxUWFhcXGBUYFRgYFxgYGBoYHiggGBolGxgVITEiJSkrLi4uFx8zODMsNygtLisBCgoKDg0OGhAQGy0lICYtMC0tKy03NS0tLS8vLzctLS0tLS01LS0tLS0rLy0tLS0tLS0tLS0tLS4tLS0tLS0tLf/AABEIAN0A5AMBIgACEQEDEQH/', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `connect`
--

DROP TABLE IF EXISTS `connect`;
CREATE TABLE IF NOT EXISTS `connect` (
  `connect_id` int NOT NULL AUTO_INCREMENT,
  `connect_pseudo` varchar(255) DEFAULT NULL,
  `connect_password` varchar(255) NOT NULL,
  `connect_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`connect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connect`
--

INSERT INTO `connect` (`connect_id`, `connect_pseudo`, `connect_password`, `connect_email`) VALUES
(1, 'speleo', '$2y$10$pzVkC0PBRxOA2FotQ06mDeQUUcz2AzoYolGV.a/TfNfaUks1U6ttq', 'seb@toto.fr'),
(4, 'seboufou', '$2y$10$5iHr3N4xD7q/9CVG8Bnwh.rbqXzZj4i1kRgsIh/JRDdPUcOizLxNO', 'sebone@toto.fr');

-- --------------------------------------------------------

--
-- Structure de la table `farm`
--

DROP TABLE IF EXISTS `farm`;
CREATE TABLE IF NOT EXISTS `farm` (
  `farm_id` int NOT NULL AUTO_INCREMENT,
  `connect_id` int DEFAULT NULL,
  `farm_name` varchar(255) NOT NULL,
  `animal_id` int DEFAULT NULL,
  `building_id` int DEFAULT NULL,
  `techno_id` int NOT NULL,
  `sector_id` int DEFAULT NULL,
  `farm_value` int DEFAULT NULL,
  `buy_id` int DEFAULT NULL,
  PRIMARY KEY (`farm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `farm`
--

INSERT INTO `farm` (`farm_id`, `connect_id`, `farm_name`, `animal_id`, `building_id`, `techno_id`, `sector_id`, `farm_value`, `buy_id`) VALUES
(1, 4, 'seboufarm', NULL, 1, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `farmbuildings`
--

DROP TABLE IF EXISTS `farmbuildings`;
CREATE TABLE IF NOT EXISTS `farmbuildings` (
  `farm_id` int NOT NULL,
  `building_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `farmbuildings`
--

INSERT INTO `farmbuildings` (`farm_id`, `building_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `farmtechno`
--

DROP TABLE IF EXISTS `farmtechno`;
CREATE TABLE IF NOT EXISTS `farmtechno` (
  `farm_id` int NOT NULL,
  `techno_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int NOT NULL AUTO_INCREMENT,
  `food_name` varchar(255) DEFAULT NULL,
  `food_value` int DEFAULT NULL,
  `food_price` int DEFAULT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_value`, `food_price`) VALUES
(1, 'blé ', 5, 10),
(2, 'mais', 15, 20),
(3, 'pelure de légumes', 2, 0),
(4, 'eau', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) DEFAULT NULL,
  `property_action` varchar(255) DEFAULT NULL,
  `property_point` int DEFAULT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sector`
--

DROP TABLE IF EXISTS `sector`;
CREATE TABLE IF NOT EXISTS `sector` (
  `sector_id` int NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sector_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sector`
--

INSERT INTO `sector` (`sector_id`, `sector_name`) VALUES
(1, 'nord'),
(2, 'sud'),
(3, 'est'),
(4, 'ouest');

-- --------------------------------------------------------

--
-- Structure de la table `specie`
--

DROP TABLE IF EXISTS `specie`;
CREATE TABLE IF NOT EXISTS `specie` (
  `specie_id` int NOT NULL AUTO_INCREMENT,
  `specie_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`specie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

DROP TABLE IF EXISTS `techno`;
CREATE TABLE IF NOT EXISTS `techno` (
  `techno_id` int NOT NULL AUTO_INCREMENT,
  `techno_name` varchar(255) DEFAULT NULL,
  `techno_value` int DEFAULT NULL,
  `techno_price` int DEFAULT NULL,
  PRIMARY KEY (`techno_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `techno`
--

INSERT INTO `techno` (`techno_id`, `techno_name`, `techno_value`, `techno_price`) VALUES
(1, 'nettoyage poulailler', 75, 25),
(2, 'nettoyage porcherie', 140, 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
