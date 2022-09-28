
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `tb_article`;
CREATE TABLE IF NOT EXISTS `tb_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_designation` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `article_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tb_article_achat`;
CREATE TABLE IF NOT EXISTS `tb_article_achat` (
  `article_achat_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `article_achat_prix_unitaire` int(11) NOT NULL,
  `article_achat_quantite` int(11) NOT NULL,
  `article_achat_date_fabrication` datetime NOT NULL,
  `date_expiration` datetime NOT NULL,
  `article_archat_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_achat_id`),
  KEY `article_id` (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tb_article_vente`;
CREATE TABLE IF NOT EXISTS `tb_article_vente` (
  `article_vente_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_vente_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_vente_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tb_article_vente_detail`;
CREATE TABLE IF NOT EXISTS `tb_article_vente_detail` (
  `article_vente_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_chat_id` int(11) NOT NULL,
  `article_vent_id` int(11) NOT NULL,
  `article_vente_detail_quantite` int(11) NOT NULL,
  `article_vente_detail_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_vente_detail_id`),
  KEY `article_chat_id` (`article_chat_id`),
  KEY `article_vent_id` (`article_vent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

