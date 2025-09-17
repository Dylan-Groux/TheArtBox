-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 sep. 2025 à 18:49
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
-- Base de données : `artbox`
--

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` varchar(500) NOT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `size` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `image_path`, `format`, `size`, `created_at`) VALUES
(1, 'img/clark-van-der-beken.png', 'png', 0, '2025-09-16 00:25:43'),
(2, 'img/pawel-czerwinski-3.png', 'png', 0, '2025-09-16 00:25:43'),
(3, 'img/dan-cristian-padure.png', 'png', 0, '2025-09-16 00:25:43'),
(4, 'img/steve-johnson-5.png', 'png', 0, '2025-09-16 00:25:43'),
(5, 'img/steve-johnson.png', 'png', 0, '2025-09-16 00:25:43'),
(6, 'img/pawel-czerwinski.png', 'png', 0, '2025-09-16 00:25:43'),
(7, 'img/jazmin-quaynor.png', 'png', 0, '2025-09-16 00:25:43'),
(8, 'img/steve-johnson-6.png', 'png', 0, '2025-09-16 00:25:43'),
(9, 'img/victor-grabarczyk.png', 'png', 0, '2025-09-16 00:25:43'),
(10, 'img/pawel-czerwinski-2.png', 'png', 0, '2025-09-16 00:25:43'),
(11, 'img/steve-johnson-2.png', 'png', 0, '2025-09-16 00:25:43'),
(12, 'img/fly-d.png', 'png', 0, '2025-09-16 00:25:43'),
(13, 'img/orfeas-green.png', 'png', 0, '2025-09-16 00:25:43'),
(14, 'img/steve-johnson-4.png', 'png', 0, '2025-09-16 00:25:43'),
(15, 'img/steve-johnson-3.png', 'png', 0, '2025-09-16 00:25:43'),
(26, 'https://i0.wp.com/www.nicolaswaravka.com/wp-content/uploads/2023/06/TEMPETE-3.jpg?fit=2000%2C1400&ssl=1', 'url', 0, '2025-09-17 01:33:13'),
(29, 'https://journals.openedition.org/abpo/docannexe/image/3401/img-3-small480.jpg', 'url', 0, '2025-09-17 20:39:43');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

DROP TABLE IF EXISTS `oeuvre`;
CREATE TABLE IF NOT EXISTS `oeuvre` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `artiste` varchar(55) NOT NULL,
  `image_id` int UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `image_id` (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`id`, `titre`, `description`, `artiste`, `image_id`, `created_at`) VALUES
(10, 'La marée rouge', 'Vivamus quis odio vel ligula feugiat facilisis. Donec eleifend pellentesque massa, ut malesuada est bibendum sit amet. Morbi tincidunt nec tellus vel ornare. Mauris dolor tellus, gravida eget euismod eu, viverra eget urna. Phasellus feugiat ipsum nec lorem accumsan, sed porta quam dictum massa nunc.', 'Martin Rodriguez', 10, '2025-09-16 00:27:03'),
(9, 'Hurricane', 'Aliquam tristique tempus molestie. Nulla nisl eros, dapibus eu lectus in, cursus accumsan arcu. Suspendisse bibendum diam dignissim porta maximus. Praesent sollicitudin consectetur faucibus. Cras pulvinar massa a orci rutrum, id blandit enim viverra. Praesent sed congue augue. Suspendisse efficitur, nisl quis finibus faucibus, lacus felis bibendum leo, eu euismod lacus mauris in felis. Quisque dignissim et dui et aliquet. Donec ut lobortis eros, vitae tincidunt augue metus.', 'Natalie Wellington', 9, '2025-09-16 00:27:03'),
(8, 'Blast from the past', 'Nunc fermentum purus dapibus justo fermentum auctor. Maecenas non tincidunt leo. Morbi vitae iaculis sem. Donec quis scelerisque massa. Fusce quis accumsan diam, et interdum lectus. Suspendisse mattis pulvinar vehicula. Duis nisi.', 'Juliette Baskerville', 8, '2025-09-16 00:27:03'),
(7, 'Digital Negative', 'Integer in nisl posuere, pulvinar ex ac, tincidunt risus. Nullam vel lorem et leo dignissim accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempor, magna non consectetur dapibus, est libero iaculis lacus, eget semper turpis orci vitae felis. Fusce eget molestie.', 'Hamish McKee', 7, '2025-09-16 00:27:03'),
(6, 'Chromatics', 'Vivamus commodo non libero at hendrerit. In lacinia dui sit amet pellentesque iaculis. Donec at ultricies sem porttitor.', 'Jean-Michel Delatronchette', 6, '2025-09-16 00:27:03'),
(5, 'Red Washover', 'Nunc euismod ullamcorper tortor, id efficitur ante interdum in. Integer eu condimentum nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras viverra suscipit feugiat. Mauris vehicula luctus tellus, eu hendrerit libero laoreet ut. In tristique vehicula nisl in tempus. Morbi tempus aliquet gravida. In eget est congue, rhoncus sapien at, cursus metus.', 'Kit Van Der Borght', 5, '2025-09-16 00:27:03'),
(4, 'Le refuge de l\'Havre', 'Nam tempus neque nec felis venenatis auctor. Nam velit risus, lobortis eu quam non, interdum efficitur nibh. Phasellus a augue ac orci lacinia mattis et vel lectus. Sed nec tellus urna. Donec at turpis turpis. Cras quam tellus, imperdiet vitae finibus id, varius quis felis. Maecenas blandit eleifend risus, vel hendrerit erat dignissim id. Nullam at laoreet nibh. Nulla gravida varius sollicitudin. Etiam non aliquam diam, tempor varius sapien. Aenean et velit eu nisi lobortis massa nunc.', 'Simon Pelletier', 4, '2025-09-16 00:27:03'),
(3, 'Nightlife Traffic', 'Quisque accumsan ultrices ligula vestibulum posuere. Aliquam feugiat ligula eget massa blandit condimentum. Morbi volutpat erat luctus suscipit pellentesque. Quisque cursus tempor nibh at sollicitudin. Sed blandit libero velit. Etiam tincidunt facilisis mollis. Ut mollis nunc sit amet lacinia luctus. Suspendisse volutpat enim semper arcu rutrum, et iaculis risus interdum. Duis at libero.', 'Andrew Forsythe', 3, '2025-09-16 00:27:03'),
(2, 'Aashaaheen Baadal', 'Sur cette oeuvre conceptuelle à la fois organique, minérale et liquide, Anaisha Devi nous transporte dans un nuage noir envoûtant. Un sombre tableau qui, par son verni éclatant, rayonne tel un marbre poli. Une oeuvre à la cohérence transcendantale, exécutée à la perfection', 'Anaisha Devi', 2, '2025-09-16 00:27:03'),
(1, 'Dodomu', 'Mia Tozerski est une artiste peintre ukrainienne réfugiée de la guerre. Sur cette œuvre, Dodomu (\"domicile\" en ukrainien), elle nous montre la tristesse du peuple ukrainien qu\'elle partage, ayant elle-même dû quitter son foyer. L\'œuvre évoque le drapeau liquéfié d\'une Ukraine en souffrance, pleurant la mort de ses compatriotes. Ce travail chargé d\'émotion est le symbole d\'un événement qui marquera l\'Histoire. Cette peinture à l\'acrylique rayonne grâce à son fond lisse et ses mélanges de couleurs', 'Mia Tozerski', 1, '2025-09-16 00:27:03'),
(11, 'Asimilacion', 'Mauris ut justo ac mi pretium eleifend. Curabitur sed magna ut elit facilisis pharetra. Maecenas tincidunt fermentum ipsum ut sollicitudin. Nullam feugiat, neque vel egestas sollicitudin, quam leo mattis mauris, in lacinia sem mi id risus. Nullam ultrices quam eu leo auctor tempus. Fusce vestibulum mi ex, vel ultricies purus mollis sollicitudin. Aenean ac vehicula ipsum. Nam turpis ante, ultrices eget odio sed, luctus bibendum mauris sodales sed.', 'Angel Sanchez-Fernandez', 11, '2025-09-16 00:27:03'),
(12, 'La Galaxia Gialla', 'Mauris maximus, orci sollicitudin ultrices elementum, tellus neque feugiat leo, quis lobortis purus neque vel lectus. Ut sagittis eros id lectus porttitor tincidunt. Donec scelerisque diam nec felis egestas, eget finibus ante porttitor. Sed malesuada sapien ut semper accumsan. Duis tristique dui vel egestas porttitor. Nunc tristique dapibus orci a amet.', 'Eduardo Tancredi', 12, '2025-09-16 00:27:03'),
(13, 'Puffy Amalgamate', 'Donec semper a massa quis congue. In malesuada lorem ligula, ut posuere magna pulvinar in. Proin vitae enim gravida, commodo odio.', 'Sandro De Blasi', 13, '2025-09-16 00:27:03'),
(14, 'Mirage', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam iaculis lorem ac ex tristique egestas et nec sapien. Donec tincidunt id erat sit amet tempus. Nullam vel molestie dui. Duis a neque massa. Vivamus quis ornare lacus. Nullam eleifend condimentum egestas. Vivamus magna purus, fermentum mollis mauris sed, consectetur interdum libero. Duis interdum tortor tellus, eget sollicitudin quis.', 'Stéphanie Kaiser', 14, '2025-09-16 00:27:03'),
(15, 'Blaue Gelbe Muster', 'Curabitur dui odio, porta vel tempor sed, consectetur vitae mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Orci varius natoque penatibus nec.', 'Adelheid Von Schreiber', 15, '2025-09-16 00:27:03'),
(42, 'Combat sanglant', 'Cette fois c\'est la bonne ! \r\n', 'Viviane Ducros', 29, '2025-09-17 20:39:43'),
(37, 'Tempête en mer', 'ispum dozal saoeldz', 'Baptiste Dorwich', 26, '2025-09-17 01:27:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
