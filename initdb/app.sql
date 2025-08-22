-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 août 2025 à 19:12
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `act_category_id` int NOT NULL,
  `act_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `act_content` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `act_reserve` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AC74095A91C9C87F` (`act_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hotel_internal` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `hotel_internal`) VALUES
(1, 'Tourisme', 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250820161733', '2025-08-20 16:17:43', 47),
('DoctrineMigrations\\Version20250820163437', '2025-08-20 16:34:46', 53),
('DoctrineMigrations\\Version20250820170520', '2025-08-20 17:05:27', 156),
('DoctrineMigrations\\Version20250820181345', '2025-08-20 18:13:52', 30),
('DoctrineMigrations\\Version20250820184853', '2025-08-20 18:49:02', 208),
('DoctrineMigrations\\Version20250820184933', '2025-08-20 18:49:59', 28),
('DoctrineMigrations\\Version20250820190306', '2025-08-20 19:03:31', 38);

-- --------------------------------------------------------

--
-- Structure de la table `hotel_data`
--

DROP TABLE IF EXISTS `hotel_data`;
CREATE TABLE IF NOT EXISTS `hotel_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hotel_phone` bigint NOT NULL,
  `hotel_email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hotel_map` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hotel_website` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `hotel_check_in` time NOT NULL,
  `hotel_check_out` time NOT NULL,
  `hotel_wifi_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `hotel_wifi_password` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `hotel_parking` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `service_desc` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `service_pos` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tourism`
--

DROP TABLE IF EXISTS `tourism`;
CREATE TABLE IF NOT EXISTS `tourism` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tourism_category_id` int DEFAULT NULL,
  `tourism_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tourism_content` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `tourism_reserve` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tourism_phone` bigint DEFAULT NULL,
  `tourism_website` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FCFA561E4E752A47` (`tourism_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `FK_AC74095A91C9C87F` FOREIGN KEY (`act_category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `tourism`
--
ALTER TABLE `tourism`
  ADD CONSTRAINT `FK_FCFA561E4E752A47` FOREIGN KEY (`tourism_category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
