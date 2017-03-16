-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Mars 2017 à 10:31
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediatheque`
--
CREATE DATABASE IF NOT EXISTS `mediatheque` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mediatheque`;

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id`, `name`, `category`) VALUES
(1, 'Jerry Potter 4', 'Fantastique'),
(2, 'Harry Potter 2', 'Fantastique'),
(3, 'Harry Potter 3', 'Fantastique'),
(4, 'Harry Potter 4', 'Fantastique'),
(9, 'Harry 4', 'Livre'),
(6, 'Harry Potter 6', 'Fantastique'),
(7, 'Harry Potter 7', 'Fantastique'),
(8, 'La Remontada', 'Réaliste'),
(10, 'Harry Potter 4', 'Fantastique'),
(11, 'Harry Potter 4', 'Fantastique'),
(12, 'Tintin', 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`id`, `idBook`, `name`) VALUES
(1, 3, 'Kevin'),
(2, 3, 'Sifa'),
(1, 9, 'Kevin'),
(3, 11, 'Alexis');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
