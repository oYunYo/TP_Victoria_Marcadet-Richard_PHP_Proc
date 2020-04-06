-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 avr. 2020 à 14:51
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
-- Base de données :  `dauphine`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_link` varchar(250) DEFAULT NULL,
  `contenu` text NOT NULL,
  `titre` varchar(250) NOT NULL,
  `nom_prenom_utilisateur` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `annonce_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `image_link`, `contenu`, `titre`, `nom_prenom_utilisateur`) VALUES
(4, '5e8b3dab18fc4.jpeg', 'Âgée de 21 ans, Léna Calvayrac habite Névache. Elle est actuellement étudiante en langues à Wuhan (Chine). Elle n’a pas souhaité être rapatriée. Elle raconte son quotidien.\"\"\"\"\"\"', 'La Haut-Alpine Léna raconte son confinement à Wuhan !', 'Richard Victoria'),
(5, '5e8b1c36ca267.jpeg', 'Plus que jamais, il faut avoir les bons gestes d’hygiène en période de crise sanitaire afin de limiter la propagation du coronavirus et préserver les équipes mobilisées sur le terrain, de la collecte aux usines de tri et d’incinération de déchets, ainsi qu’au sein des services des eaux.', 'Les bons gestes d’hygiène pour lutter contre l’épidémie', 'Klein Alexandre');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_id_uindex` (`id`),
  UNIQUE KEY `utilisateur_login_uindex` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `nom`, `prenom`, `password`) VALUES
(1, 'admin', 'Richard', 'Victoria', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Blout', 'Klein', 'Alexandre', '9b17c987d98788bbf137cce488c59fc3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
