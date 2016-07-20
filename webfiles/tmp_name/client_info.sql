-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2015 at 09:57 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infinjc2_emanifest`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

DROP TABLE IF EXISTS `client_info`;
CREATE TABLE IF NOT EXISTS `client_info` (
  `id` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `province` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `company_name`, `address`, `province`, `country`, `zip_code`, `telephone`, `mobile`, `name`, `surname`, `middle_name`, `birth_date`, `date_created`, `last_modified`) VALUES
('150329002', 'Intercommers', 'Unit 501 The Pearlbank Centre, 146 Valero St. Salcedo Village Makati City', 'NCR', 'Philippines', '1227', '632 843 8182', '63 998 9647907', 'Ramon Tomas', 'Cristi', 'M', '1970-01-01', '2015-03-30 03:30:12', '2015-03-29 13:32:07'),
('132435135132', 'Bonafide', '21-AB Da Vincci Wing Grand Palazzo Residence, Eastwood City, Libis, Quezon City 1110 Philippines', 'NCR', 'Philippines', '1600', '1234567', '12345678900', 'DeeJay', 'Tocjayao', 'Delos Santos', '1989-03-11', '2015-04-14 06:07:52', '2015-04-14 06:07:52'),
('1234567', 'Allsectech', 'Pasig City', 'Metro Manila', '1611', '9495885', '09256120890', 'Michelle', 'Banez', 'violata', '1990-12-08', '1970-01-01', '2015-04-14 01:23:00', '2015-04-14 01:23:00'),
('8888', 'Test Company', 'Manila', 'Manila', 'Philippines', '1600', '8818888', '09328777125', 'Erwin', 'Tandoc', 'Tadeo', '1978-04-07', '2015-04-14 02:17:09', '2015-04-14 02:17:09'),
('5545184', 'Sample', 'Sample', 'Metro Manila', 'Philippines', '1611', '9498564', '09256120890', 'Sample', 'Sample', 'Sample', '2015-04-16', '2015-04-14 02:52:20', '2015-04-14 02:52:20'),
('123456789012', 'Bonafide', '21-AB Da Vinci Wing, Grand Palazzo Residence, Eastwood, Libis, Quezon City', 'NCR', 'Philippines', '1600', '+631234567', '+631231234567', 'DeeJay', 'Tocjayao', 'Delos Santos', '1989-03-11', '2015-04-16 03:27:03', '2015-04-16 03:27:03'),
('CM120890', 'Sample Company', 'Pasig City', 'NCR', 'Philippines', '1611', '+6329498558', '+639256120890', 'Michelle', 'Banez', 'Violata', '1990-12-08', '2015-04-23 06:47:18', '2015-04-23 06:47:18'),
('A100', 'Test Company', 'Manila', 'Manila', 'Philippines', '1600', '+6325211528', '+639178568877', 'Erwin', 'Tandoc', 'Tadeo', '1978-10-03', '2015-04-23 13:47:48', '2015-04-23 13:47:48'),
('MB931753', 'MyCompany', '11 Hindi makita street, Brgy. wala', 'NCR', 'Philippines', '1120', '+6328982132', '+639112205008', 'Atsuko', 'Noname', 'Secret', '1990-03-28', '2015-05-08 03:23:28', '2015-05-08 03:23:28'),
('123456789013', 'ABC', 'anc', 'manila', 'Philippines', '1600', '+631234567', '+631231234567', 'TRIAGE X', 'Tocjayao', 'Delos Santos', '2015-05-11', '2015-05-11 13:42:18', '2015-05-11 13:42:18'),
('TEST12345763', 'ABCD', 'Manila', 'Manila', 'Philippines', '1600', '+6325211528', '+639178568877', 'Erwin', 'Tandoc', 'Tadeo', '2015-05-31', '2015-05-11 14:17:37', '2015-05-11 14:17:37'),
('TEST1234567', 'Test Company', 'Manila', 'Non-US/Other', 'Philippines', '1600', '+6325211528', '+639178568877', 'Erwin', 'Tandoc', 'Tadeo', '2015-05-14', '2015-05-26 03:47:49', '2015-05-26 03:47:49');

--
-- Triggers `client_info`
--
DROP TRIGGER IF EXISTS `client_info_BEFORE_INSERT`;
DELIMITER //
CREATE TRIGGER `client_info_BEFORE_INSERT` BEFORE INSERT ON `client_info`
 FOR EACH ROW SET NEW.date_created = NOW()
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
