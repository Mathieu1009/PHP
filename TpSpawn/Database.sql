-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  lun. 20 mai 2019 à 12:21
-- Version du serveur :  10.3.12-MariaDB
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tpspawn`
--
CREATE DATABASE IF NOT EXISTS `tpspawn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tpspawn`;

-- --------------------------------------------------------

--
-- Structure de la table `spawns`
--

DROP TABLE IF EXISTS `spawns`;
CREATE TABLE IF NOT EXISTS `spawns` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `spawns`
--

INSERT INTO `spawns` (`ID`, `nom`, `img`) VALUES
(24, 'miltas', 'uploads/fortnite-tilted-towers.jpg'),
(23, 'milta', 'uploads/dl.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- CREATE USER FOR DATABASE 

IF NOT EXISTS(SELECT principal_id FROM sys.server_principals WHERE name = 'root') BEGIN
    CREATE LOGIN 'root' 
    WITH PASSWORD = '';
END

IF NOT EXISTS(SELECT principal_id FROM sys.database_principals WHERE name = 'root') BEGIN
    CREATE USER root FOR LOGIN root;
END

COMMIT;