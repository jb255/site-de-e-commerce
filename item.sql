-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 15 Janvier 2017 à 18:02
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `fruit` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `jaune` int(11) DEFAULT NULL,
  `rouge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `fruit`, `image`, `prix`, `jaune`, `rouge`) VALUES
(1, 'Poire', 'C\'est un fruit plein de vitamine', 1, 'img/poire.jpeg', 1, 1, NULL),
(2, 'Pomme', 'Source de vitamine c', 1, 'img/pomme.jpeg', 1, NULL, 1),
(4, 'Cerises', 'Trop bon !', 1, 'img/cerises.jpg', 2, NULL, 1),
(5, 'Bananes', 'Super nourissant', 1, 'img/bananes.jpg', 2, 1, NULL),
(6, 'Triporteur', 'Super pour les livraisons !', NULL, 'img/triporteur.png', 1500, NULL, 1),
(7, 'T&eacute;l&eacute;phone rouge', 'Le fameux t&eacute;l&eacute;phone rouge', NULL, 'img/tel-rouge.jpg', 50, NULL, 1),
(8, 'Pacman', 'Il a tr&egrave;s faim', NULL, 'img/pacman.jpg', 5, 1, NULL),
(9, 'Sticker poussin', 'Super d&eacute;co !', NULL, 'img/poussin.jpg', 10, 1, NULL),
(20, 'Truc jaune', 'Truc jaune', NULL, 'img/truc-jaune.jpg', 15, 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
