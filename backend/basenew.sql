-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2020 at 08:16 AM
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
(1, '1', 'gg', 'gg', 3),
(6, '14', 'mm', 'dd', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exomplaire`
--
ALTER TABLE `exomplaire`
  ADD CONSTRAINT `exomplaire_ibfk_1` FOREIGN KEY (`refid`) REFERENCES `docement` (`reference`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
