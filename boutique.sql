SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `boutique`;

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cat` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `item` (`id`, `name`, `description`, `cat`, `image`, `prix`) VALUES
(1, 'poire', 'c\'est un fruit plein de vitamine', 1, 'img/poire.jpeg', 1),
(2, 'pomme', 'fruit plein de vitamine c', 1, 'img/pomme.jpeg', 1);

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_de_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `e_mail`, `pass`, `date_de_creation`) VALUES
(7, 'toto@hotmail.fr', '2662a3c71dbf902fbec15d46139bd6d725991789c570f598743eb2d06ae02e6c79e7187487da2fd5cf69f90551110b16c46a2314960fc2386b340732bf931ad7', '2017-01-14'),
(8, 'titi@hotmail.fr', '8d21f1b203bd17c15dc1d433a4c5622293b8c0978146cea17ed9b22869a3f1460c1dbd4c5d867fd06db9c2d8c501c08a6387759dab9aec0e4e4400e26367ae69', '2017-01-14'),
(9, 'tata@hotmail.fr', '5ad9e0749efcefa2de23ab60b4111392adea9e7b9fad27480ce8f1a052e9dc14b66e1edee1a86fba2b458cb55f5949231415941bfc7cbd2e15aa8a3dbd9ea869', '2017-01-14');
