-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2015 at 12:53 AM
-- Server version: 5.5.44
-- PHP Version: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `PEZA`
--

-- --------------------------------------------------------

--
-- Table structure for table `eLOA_transaction`
--

CREATE TABLE IF NOT EXISTS `eLOA_transaction` (
  `id` varchar(255) NOT NULL,
  `ItemID` varchar(255) NOT NULL,
  `appno` varchar(255) NOT NULL,
  `eLOAno` varchar(255) NOT NULL,
  `beginningBal` varchar(255) NOT NULL,
  `currentBal` varchar(255) NOT NULL,
  `endingBal` varchar(255) NOT NULL,
  `qtyToBeTransferred` decimal(10,0) NOT NULL,
  `DateOfTransfer` datetime NOT NULL,
  `TIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eLOA_transaction`
--

INSERT INTO `eLOA_transaction` (`id`, `ItemID`, `appno`, `eLOAno`, `beginningBal`, `currentBal`, `endingBal`, `qtyToBeTransferred`, `DateOfTransfer`, `TIN`) VALUES
('56581cead12122015', '', 'APLOA-944617-7868-2015', '', '20', '20', '20', 10, '2015-11-30 00:00:00', ''),
('56581a0dabc312015', 'IMP-943724-3900-2015', 'APLOA-945212-7060-2015', 'ELSE-LPT1-SR-97550915-16A', '70', '70', '70', 0, '0000-00-00 00:00:00', ''),
('56581a0dabc312015', 'IMP-943750-6177-2015', 'APLOA-945212-7060-2015', 'ELSE-LPT1-SR-97550915-16A', '80', '80', '80', 0, '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
