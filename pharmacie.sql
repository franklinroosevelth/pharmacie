-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 28 juil. 2022 à 13:35
-- Version du serveur :  8.0.18
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
-- Base de données :  `pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_article`
--

DROP TABLE IF EXISTS `tb_article`;
CREATE TABLE IF NOT EXISTS `tb_article` (
  `article_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_designation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_categorie_id` int(10) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_article`
--

INSERT INTO `tb_article` (`article_id`, `article_designation`, `article_date_creation`, `article_categorie_id`) VALUES
('b1ba94e87214cc53d08df41a18426fba', 'ADM', '2022-05-15 15:35:05', 2),
('37fdb03f920bf0635d1418a2169519e9', 'Ibucap', '2022-05-14 22:23:37', 1),
('292a5cea1f91e40acad676149e18d96a', 'Paracetamol', '2022-05-15 13:42:31', 1),
('992c078d51fa1f5738e170842f624d0b', 'Quinine', '2022-05-16 23:18:50', 44),
('a9d2708ac773476e0d9e05df80266535', 'MANADIAR', '2022-05-17 10:17:07', 37),
('e7dbbd7ea47bbe7f56ef2ce98074d16e', 'Cypomex', '2022-05-17 14:07:02', 39),
('4480add3507003385491e1c1fe876c74', 'Amoxyciline', '2022-05-26 04:30:04', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tb_article_achat`
--

DROP TABLE IF EXISTS `tb_article_achat`;
CREATE TABLE IF NOT EXISTS `tb_article_achat` (
  `article_achat_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `devise_id` int(11) NOT NULL,
  `article_achat_fabricant` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_achat_prix_unitaire` float NOT NULL,
  `article_achat_quantite` int(11) NOT NULL,
  `article_achat_date_fabrication` date NOT NULL,
  `article_achat_date_expiration` date NOT NULL,
  `article_achat_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_achat_id`),
  KEY `article_id` (`article_id`),
  KEY `devise_id` (`devise_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_article_achat`
--

INSERT INTO `tb_article_achat` (`article_achat_id`, `devise_id`, `article_achat_fabricant`, `article_id`, `article_achat_prix_unitaire`, `article_achat_quantite`, `article_achat_date_fabrication`, `article_achat_date_expiration`, `article_achat_date_creation`) VALUES
('6a8a31891ad73a7810b1d1be727b13a2', 0, 'Shalina', '4480add3507003385491e1c1fe876c74', 1.45, 50, '2022-05-01', '2022-06-11', '2022-05-28 17:43:12'),
('467418aa28e91bc1e86ec09de5a87f10', 0, 'Cypomex', 'e7dbbd7ea47bbe7f56ef2ce98074d16e', 2.95, 41, '2022-05-01', '2022-06-11', '2022-05-28 17:45:20');

-- --------------------------------------------------------

--
-- Structure de la table `tb_article_categorie`
--

DROP TABLE IF EXISTS `tb_article_categorie`;
CREATE TABLE IF NOT EXISTS `tb_article_categorie` (
  `article_categorie_id` int(10) NOT NULL AUTO_INCREMENT,
  `article_categorie_designation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_categorie_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_article_categorie`
--

INSERT INTO `tb_article_categorie` (`article_categorie_id`, `article_categorie_designation`, `article_categorie_date_creation`) VALUES
(1, 'ANALGESIQUES ET ANTI-INFLAMMATOIRES', '2022-05-14 22:13:05'),
(2, 'ANTIBIOTIQUES ET ANTIBACTERIENS', '2022-05-14 22:13:06'),
(3, 'ANTITUBERCULEUX ET ANTILEPREUX', '2022-05-14 22:13:07'),
(4, 'ANTIMYCOSIQUES', '2022-05-14 22:13:08'),
(5, 'ANTIVIRAUX', '2022-05-14 22:13:09'),
(6, 'CARDIOLOGIE', '2022-05-14 22:13:10'),
(7, 'DERMATOLOGIE', '2022-05-14 22:13:11'),
(8, 'DIETETIQUE ET NUTRITION', '2022-05-14 22:13:12'),
(9, 'ENDOCRINOLOGIE', '2022-05-14 22:13:13'),
(10, 'GASTRO-ENTEROLOGIE ET HEPATOLOGIE', '2022-05-14 22:13:14'),
(11, 'GYNECOLOGIE OBSTETRIQUE ET CONTRACEPTION', '2022-05-14 22:13:15'),
(12, 'HEMATOLOGIE', '2022-05-14 22:13:16'),
(13, 'IMMUNOLOGIE ALLERGOLOGIE', '2022-05-14 22:13:17'),
(14, 'MEDICAMENTS DES TROUBLES METABOLIQUES', '2022-05-14 22:13:18'),
(15, 'NEUROLOGIE', '2022-05-14 22:13:19'),
(16, 'OPHTALMOLOGIE', '2022-05-14 22:13:20'),
(17, 'OTO-RHINO-LARYNGOLOGIE', '2022-05-14 22:13:21'),
(18, 'PARASITOLOGIE', '2022-05-14 22:13:22'),
(19, 'PNEUMOLOGIE', '2022-05-14 22:13:23'),
(20, 'PSYCHIATRIE', '2022-05-14 22:13:24'),
(21, 'REANIMATION TOXICOLOGIE', '2022-05-14 22:13:25'),
(22, 'RHUMATOLOGIE', '2022-05-14 22:13:26'),
(23, 'STOMATOLOGIE', '2022-05-14 22:13:27'),
(24, 'UROLOGIE', '2022-05-14 22:13:28'),
(25, 'VACCINS, IMMUNOGLOBULINES, SEROTHERAPIE', '2022-05-14 22:13:29'),
(26, 'CANCEROLOGIE', '2022-05-14 22:13:30'),
(27, 'ANESTHESIQUES LOCAUX', '2022-05-14 22:13:31'),
(28, 'ANTIACIDES', '2022-05-14 22:13:32'),
(29, 'ANTAGONISTES DU CALCIUM (BLOQUEURS DES CANAUX CALCIQUES)', '2022-05-14 22:13:33'),
(30, 'ANTIAGREGANTS PLAQUETTAIRES', '2022-05-14 22:13:34'),
(31, 'ANTIARYTHMIQUES', '2022-05-14 22:13:35'),
(32, 'ANTIBIOTIQUES', '2022-05-14 22:13:36'),
(33, 'ANTICHOLINERGIQUES', '2022-05-14 22:13:37'),
(34, 'ANTIEPILEPTIQUES', '2022-05-14 22:13:38'),
(35, 'ANTICOAGULANTS CIRCULANTS', '2022-05-14 22:13:39'),
(36, 'ANTICOAGULANTS DE TYPE AVK', '2022-05-14 22:13:40'),
(37, 'ANTIDIARRHEIQUES', '2022-05-14 22:13:41'),
(38, 'ANTIHISTAMINIQUES H1', '2022-05-14 22:13:42'),
(39, 'ANTIHISTAMINIQUES H2', '2022-05-14 22:13:43'),
(40, 'ANTIHYPERTENSEURS', '2022-05-14 22:13:44'),
(41, 'ANTIPSYCHOTIQUES', '2022-05-14 22:13:45'),
(42, 'ANTISPASMODIQUES', '2022-05-14 22:13:46'),
(43, 'ANTITHYRO', '2022-05-14 22:13:47'),
(44, 'ANXIOLYTIQUES', '2022-05-14 22:13:48'),
(45, 'BETA-BLOQUANTS', '2022-05-14 22:13:49'),
(46, 'CARDIOTONIQUES', '2022-05-14 22:13:50'),
(47, 'DIURETIQUES', '2022-05-14 22:13:51'),
(48, 'HYPNOTIQUES', '2022-05-14 22:13:52'),
(49, 'HYPOGLYCEMIANTS INJECTABLES', '2022-05-14 22:13:53'),
(50, 'HYPOGLYCEMIANTS ORAUX', '2022-05-14 22:13:54'),
(51, 'HYPOLIPEMIANTS', '2022-05-14 22:13:55'),
(52, 'INHIBITEURS DE L\'ENZYME DE CONVERSION', '2022-05-14 22:13:56'),
(53, 'INHIBITEURS DE L\'ANGIOTENSINE II', '2022-05-14 22:13:57'),
(54, 'MUCOLYTIQUES', '2022-05-14 22:13:58'),
(55, 'NOOTROPIQUES', '2022-05-14 22:13:59'),
(56, 'PHENYLETHYLAMINES', '0000-00-00 00:00:00'),
(57, 'SARTANS (ANTAGONISTES DE L\'ANGIOTENSINE II)', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tb_article_vente`
--

DROP TABLE IF EXISTS `tb_article_vente`;
CREATE TABLE IF NOT EXISTS `tb_article_vente` (
  `article_vente_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_vente_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_vente_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_article_vente`
--

INSERT INTO `tb_article_vente` (`article_vente_id`, `article_vente_date_creation`) VALUES
('cae74f6d1f2102dfd59aebc4226c6644', '2022-05-28 17:43:13'),
('c7735cc65173941cfaba35864a8dca91', '2022-05-28 17:45:20'),
('3b2a06209b437cc9d6371d5bdda83f49', '2022-05-28 17:56:13');

-- --------------------------------------------------------

--
-- Structure de la table `tb_article_vente_detail`
--

DROP TABLE IF EXISTS `tb_article_vente_detail`;
CREATE TABLE IF NOT EXISTS `tb_article_vente_detail` (
  `article_vente_detail_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_achat_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_vente_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `article_vente_detail_quantite` int(11) NOT NULL,
  `article_vente_detail_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_vente_detail_id`),
  KEY `article_chat_id` (`article_achat_id`),
  KEY `article_vent_id` (`article_vente_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_article_vente_detail`
--

INSERT INTO `tb_article_vente_detail` (`article_vente_detail_id`, `article_achat_id`, `article_vente_id`, `article_vente_detail_quantite`, `article_vente_detail_date_creation`) VALUES
('71abc4e0c4af9063e2455921694c2b52', '6a8a31891ad73a7810b1d1be727b13a2', 'cae74f6d1f2102dfd59aebc4226c6644', 0, '2022-05-28 17:43:13'),
('8259dcf9a6fc409bb1a3ddefd90f3263', '467418aa28e91bc1e86ec09de5a87f10', 'c7735cc65173941cfaba35864a8dca91', 0, '2022-05-28 17:45:20'),
('1c45bd2a7fc77ecbb1c6ad63e05572f2', '467418aa28e91bc1e86ec09de5a87f10', '3b2a06209b437cc9d6371d5bdda83f49', 3, '2022-05-28 17:56:13'),
('939372d90cb18251819bf92b3b258fc4', '6a8a31891ad73a7810b1d1be727b13a2', '3b2a06209b437cc9d6371d5bdda83f49', 3, '2022-05-28 17:56:14');

-- --------------------------------------------------------

--
-- Structure de la table `tb_devise`
--

DROP TABLE IF EXISTS `tb_devise`;
CREATE TABLE IF NOT EXISTS `tb_devise` (
  `devise_id` int(11) NOT NULL AUTO_INCREMENT,
  `devise_designation` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `devise_taux` int(11) NOT NULL,
  PRIMARY KEY (`devise_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2006 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_devise`
--

INSERT INTO `tb_devise` (`devise_id`, `devise_designation`, `devise_taux`) VALUES
(1, 'USD', 2000),
(2001, 'USD', 2001),
(2002, 'USD', 2001),
(2003, 'USD', 2005),
(2004, 'USD', 2003),
(2005, 'USD', 2100),
(20, 'abc', 1000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
