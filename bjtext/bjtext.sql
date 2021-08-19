-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 août 2021 à 16:16
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
-- Base de données : `bjtext`
--

-- --------------------------------------------------------

--
-- Structure de la table `abw_admin`
--

DROP TABLE IF EXISTS `abw_admin`;
CREATE TABLE IF NOT EXISTS `abw_admin` (
  `admin_email` varchar(255) NOT NULL,
  `admin_nom` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `abw_admin`
--

INSERT INTO `abw_admin` (`admin_email`, `admin_nom`, `admin_password`) VALUES
('jeremiedansou1@gmail.com', 'DANSOU', '181fe0994decedf33c91d11946ca2f8865842be1'),
('dansou@gmail.com', 'DANSOU', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Structure de la table `abw_categories`
--

DROP TABLE IF EXISTS `abw_categories`;
CREATE TABLE IF NOT EXISTS `abw_categories` (
  `categories_id` int NOT NULL AUTO_INCREMENT,
  `categories_libelles` varchar(255) NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `abw_news`
--

DROP TABLE IF EXISTS `abw_news`;
CREATE TABLE IF NOT EXISTS `abw_news` (
  `news_id` int NOT NULL AUTO_INCREMENT,
  `news_titre` varchar(70) NOT NULL,
  `news_description` varchar(150) NOT NULL,
  `news_contenutext` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_date` datetime NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `abw_news`
--

INSERT INTO `abw_news` (`news_id`, `news_titre`, `news_description`, `news_contenutext`, `news_image`, `news_date`, `slug`) VALUES
(115, 'La déontologie', 'C\'est l\'ensemble des règles qui régissent le fonctionnement du monde du numérique', 'Bienvenue à vous', '611e6731cbc3eCapture.png', '2021-08-19 10:25:04', 'la-deontologie'),
(119, 'Règles de gestion', 'Bienvenu à vous', 'Bienvenue à vous', '../../asset/images/611e4932cc5c5depositphotos_132103168-stock-photo-jpeg-tiled-letters-concept-and.jpg', '2021-08-19 10:51:26', 'regles-de-gestion'),
(120, 'La déontologie Informatique', 'C\'est l\'ensemble des règles qui régissent le fonctionnement du monde du numérique', 'Bienvenue à vous', '../../asset/images/611e4585d4aa8depositphotos_132103168-stock-photo-jpeg-tiled-letters-concept-and.jpg', '2021-08-19 11:06:52', 'la-deontologie-informatique'),
(124, 'La déontologie Informatique', 'Bienvenu', 'Bienvenue à vous', '611e5b9ccef40jpeg-fi.jpg', '2021-08-19 12:32:18', 'la-deontologie-informatique'),
(129, 'La déontologie Informatique', 'Bienvenu', 'Bienvenue à vous', '611e5b7545bd1Felis_s.png', '2021-08-19 13:16:02', 'la-deontologie-informatique');

-- --------------------------------------------------------

--
-- Structure de la table `abw_texte`
--

DROP TABLE IF EXISTS `abw_texte`;
CREATE TABLE IF NOT EXISTS `abw_texte` (
  `texte_id` int NOT NULL AUTO_INCREMENT,
  `texte_titre` varchar(255) NOT NULL,
  `texte_mot_cles` varchar(255) NOT NULL,
  `texte_description` varchar(255) NOT NULL,
  `texte_fichier_pdf` longblob NOT NULL,
  `texte_categories` varchar(255) NOT NULL,
  PRIMARY KEY (`texte_id`),
  KEY `FK_Produit` (`texte_categories`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
