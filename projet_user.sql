-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Serveur: sqletud.univ-mlv.fr
-- Généré le : Lun 02 Avril 2012 à 17:03
-- Version du serveur: 5.1.61
-- Version de PHP: 5.3.3-7+squeeze8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cdiverre_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `projet_user`
--

CREATE TABLE IF NOT EXISTS `projet_user` (
  `idUser` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `dateN` date NOT NULL,
  `dateI` date NOT NULL,
  `nbQuizz` int(10) unsigned NOT NULL,
  `score` int(10) unsigned NOT NULL,
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `projet_user`
--

