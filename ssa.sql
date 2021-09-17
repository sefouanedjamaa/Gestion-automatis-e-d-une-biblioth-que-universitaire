-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2020 at 09:02 PM
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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES
('sefouaness', 'sefouanes@gmail.com', 'rien de rien ', 'juste un message'),
('sefouaness', 'sefouanes@gmail.com', 'rien de rien ', 'juste un message'),
('un conatct', 'dodo-1977@live.fr', 'ya pas', 'jhfsjkg'),
('raouf', 'sefouanes@gmail.com', 'kwana', 'uiiiiiiiiiiiiiiiiiiiiiidrj'),
('sollt', 'sefouanes@gmail.com', 'mmmmm', 'zegjkkkkkkkk'),
('anfel', 'sefouanes@gmail.com', 'php', 'livreeeeeeeeeee'),
('fatihhhhhhhhhhhh', 'fatima@gmail.com', 'un sjet dhhhhhhhhh', 'je suis bienjjjjj'),
('jkld', 'soso@gmail.com', 'jehzkjke', 'sober'),
('slt', 'slt@gmail.com', 'final', 'jkdsfdk'),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `docement`
--

DROP TABLE IF EXISTS `docement`;
CREATE TABLE IF NOT EXISTS `docement` (
  `reference` varchar(100) NOT NULL,
  `titre` varchar(40) NOT NULL,
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
('111', 'ggg 47 kj', 'hyhyh', 'hyh', 2010),
('2', 'kk', 'kk', 'kk', 1111),
('3', 'mm', 'mm', 'mm', 3),
('55', 'gg', 'gg', 'gg', 1111),
('kjkkj', 'kjkj', 'kjkj', 'kjkjk', 1411);

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `refexmp` int(30) NOT NULL,
  `matricule` int(11) NOT NULL,
  `date_sortie` text NOT NULL,
  `date_rendu` text NOT NULL,
  KEY `matricule` (`matricule`),
  KEY `refexmp` (`refexmp`) USING BTREE,
  KEY `refexmp_2` (`refexmp`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`refexmp`, `matricule`, `date_sortie`, `date_rendu`) VALUES
(666, 6, '1111/11/12', '1111/12/11'),
(666, 7, 'jjjj', 'jjjj');

-- --------------------------------------------------------

--
-- Table structure for table `exomplaire`
--

DROP TABLE IF EXISTS `exomplaire`;
CREATE TABLE IF NOT EXISTS `exomplaire` (
  `refexmp` int(100) NOT NULL,
  `refid` varchar(40) NOT NULL,
  `emplacement` varchar(20) NOT NULL,
  `etat` char(20) NOT NULL,
  `nbrexmp` int(10) NOT NULL,
  PRIMARY KEY (`refexmp`),
  KEY `refid` (`refid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exomplaire`
--

INSERT INTO `exomplaire` (`refexmp`, `refid`, `emplacement`, `etat`, `nbrexmp`) VALUES
(1, '1', 'gg', 'gg', 0),
(485, '111', 'mol54', 'bonne', 1),
(666, '2', 'cote', 'bien', 11);

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
  ADD CONSTRAINT `exomplaire_ibfk_1` FOREIGN KEY (`refid`) REFERENCES `docement` (`reference`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penaliser`
--
ALTER TABLE `penaliser`
  ADD CONSTRAINT `penaliser_ibfk_1` FOREIGN KEY (`idm`) REFERENCES `abonne` (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
