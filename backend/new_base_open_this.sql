-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2020 at 10:18 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssa`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonne`
--

DROP TABLE IF EXISTS `abonne`;
CREATE TABLE IF NOT EXISTS `abonne` (
  `matricule` int(100) NOT NULL,
  `nom` char(40) NOT NULL,
  `prenom` char(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telephone` int(12) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abonne`
--

INSERT INTO `abonne` (`matricule`, `nom`, `prenom`, `email`, `telephone`) VALUES
(1, 'kk', 'kk', 'k@n.com', 188),
(6, 'kkl', 'll', 'll@hgh.com', 454545),
(7, 'ss', 'gg', 'h@k.com', 56),
(785, 'dd', 'ddd', 'dd@j.com', 47);

-- --------------------------------------------------------

--
-- Table structure for table `docement`
--

DROP TABLE IF EXISTS `docement`;
CREATE TABLE IF NOT EXISTS `docement` (
  `reference` varchar(100) NOT NULL,
  `titre` char(40) NOT NULL,
  `auteur` char(40) NOT NULL,
  `edition` char(40) NOT NULL,
  `anne` int(14) DEFAULT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docement`
--

INSERT INTO `docement` (`reference`, `titre`, `auteur`, `edition`, `anne`) VALUES
('1', 'hh', 'hh', 'hh', 1),
('14', 'mm', 'mm', 'mm', 141),
('2', 'kk', 'kk', 'kk', 1111),
('3', 'mm', 'mm', 'mm', 3),
('55', 'gg', 'gg', 'gg', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `refid` int(30) NOT NULL,
  `matricule` int(11) NOT NULL,
  `date_sortie` datetime NOT NULL,
  `date_rendu` datetime NOT NULL,
  `nbremp` int(10) NOT NULL,
  PRIMARY KEY (`refid`),
  KEY `matricule` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`refid`, `matricule`, `date_sortie`, `date_rendu`, `nbremp`) VALUES
(3, 7, '1111-11-11 00:00:00', '1111-12-11 00:00:00', 1),
(14, 7, '2020-02-02 00:00:00', '2020-03-02 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exomplaire`
--

DROP TABLE IF EXISTS `exomplaire`;
CREATE TABLE IF NOT EXISTS `exomplaire` (
  `nbrexp` int(100) NOT NULL,
  `refid` varchar(40) NOT NULL,
  PRIMARY KEY (`nbrexp`),
  KEY `refid` (`refid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exomplaire`
--

INSERT INTO `exomplaire` (`nbrexp`, `refid`) VALUES
(9, '1'),
(4, '14'),
(3, '2'),
(10, '3'),
(2, '55');

-- --------------------------------------------------------

--
-- Table structure for table `penaliser`
--

DROP TABLE IF EXISTS `penaliser`;
CREATE TABLE IF NOT EXISTS `penaliser` (
  `idm` int(20) NOT NULL,
  KEY `idm` (`idm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penaliser`
--

INSERT INTO `penaliser` (`idm`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom_utilisateur` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_utilisateur`, `mot_de_passe`) VALUES
('', ''),
('sefouane', 'djamaa'),
('soltane ', '1234');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `abonne` (`matricule`);

--
-- Constraints for table `exomplaire`
--
ALTER TABLE `exomplaire`
  ADD CONSTRAINT `exomplaire_ibfk_1` FOREIGN KEY (`refid`) REFERENCES `docement` (`reference`) ON UPDATE CASCADE;

--
-- Constraints for table `penaliser`
--
ALTER TABLE `penaliser`
  ADD CONSTRAINT `penaliser_ibfk_1` FOREIGN KEY (`idm`) REFERENCES `abonne` (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
