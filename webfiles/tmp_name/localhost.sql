-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2015 at 02:12 AM
-- Server version: 5.5.44
-- PHP Version: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--
CREATE DATABASE `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Table structure for table `access_info`
--

CREATE TABLE IF NOT EXISTS `access_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cltcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueID` (`uniqueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `access_info`
--

INSERT INTO `access_info` (`id`, `uniqueID`, `username`, `password`, `salt`, `pw`, `cltcode`, `status`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '55f8d31080ad62015', 'cheng@mail.com', '$2y$10$9Lz/mqVdBRUNs5u9..6eCublFwmod.ctpLXxSvYPOTJVyZL1pvdlq', '', 'cheng123', 'cltcode123', '1', 3, 'b8uquhH3zw6C4oYQhH4vFYVfSWde1NzNuwk2JwXEGNnXrlRY9ghyY8gCOKMF', '2015-09-16 06:25:20', '2015-09-30 10:33:56'),
(2, '55f902a5378d82015', 'cashier@mail.com', '$2y$10$PLoBHjcQ6HHdRvEhBIAeOu3lkn.tP9BH/MYB9GkHXiBLakaDtfAPi', '', 'cash123', 'cltcode456', '1', 5, 'KRDQE69Apc17bBMJyKTLjgjQxSigrYi4WT9A8LB7Pt6sThpDUFVjYYPm3qDf', '2015-09-16 09:48:21', '2015-09-18 11:28:11'),
(3, '55f907fd88f1e2015', 'test@mail.com', '$2y$10$cnWbEcTvp0wcEPOpQ5wXKOgjt/QN8xouC.l09AnOCUyZxovr9geQC', '', '1234', 'cltcode321', '1', 2, '5qXvI0DOiTyOUa6LOMtyGOuOHiPC5QUuiF6o0My8mk15PqwPSNzr7E4zdKCk', '2015-09-16 10:11:09', '2015-09-17 09:03:32'),
(10, 'UID7766953098', 'qwe@mail.com', 'c84eabe730e7e04e23b512c803c29ff7a01fffde524f91052994d8b0893c71462aeea13a04e27532c6e6293877724d92ac164ac241fe84ca2381e51bd52043e0', 'ffa02a4dc71aa5db1a0598f1a80b7e5b3a85d7447e313da2b62218f717347be92cb0e21b7f56144577d1764fec6ae76e1377f7e1adc42a4f019967094965a7a6', '12345', '', '', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'UID7767909324', 'qwerty@mail.com', 'ac2344b0ccc42fb32d072cf85f8f32e457291f500e851b799b1bd2f221c88486cbc7ddeaf0c164178b636d15c0701f6952ca7756f181c06c25aa4fb286191315', '5affc15cfee11ef966dc37126db7c50f5c3a977957a7ca2af2bdadecb251db174ee7df8254235df7cdcee0196d72be1c9dbd6d4dd9a7f338bc68ee5143b1b859', '123456', '', '0', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE IF NOT EXISTS `account_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `ORnum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `refnum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cltcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `uniqueID`, `amount`, `ORnum`, `refnum`, `remarks`, `cltcode`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '55f8d31080ad62015', 1500.00, 'OR1234', 'ref1234', 'none', 'cltcode123', NULL, '2015-09-17 09:36:58', '2015-09-17 09:36:58'),
(2, '55f907fd88f1e2015', 999999.99, 'OR9876', 'Ref9876', 'NONE', 'cltcode321', NULL, '2015-09-18 11:27:33', '2015-09-18 11:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `declarant`
--

CREATE TABLE IF NOT EXISTS `declarant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brokerID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brkrname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brkradd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brkremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cltcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `declarant` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `declarant`
--

INSERT INTO `declarant` (`id`, `brokerID`, `brkrname`, `brkradd`, `brkremail`, `cltcode`, `declarant`, `payment`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fnhweknfekl79879', 'broker name 1', 'broker add 1', 'brokeremail1@mail.com', '', 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'jkdsfbfjkdy78s6869', 'broker name 2', 'broker add 2', 'brokeremail2@mail.com', '', 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'nfisdjk768f8ds7', 'broker name 3', 'broker add 3', 'brokeremail3@mail.com', '', 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'fshvjdskhfu43985', 'broker name 4', 'broker add 4', 'brokeremail4@mail.com', '', 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'bhasjbas567578', 'broker name 5', 'broker add 5', 'brokeremail5@mail.com', '', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_09_09_055525_create_access_info_table', 1),
('2015_09_09_055632_create_user_info_table', 2),
('2015_09_09_055923_create_services_info_table', 2),
('2015_09_09_080755_create_upload_file_table', 3),
('2015_09_09_082345_create_access_info_table', 3),
('2015_09_09_094151_create_service_info_table', 4),
('2015_09_13_054855_create_session_table', 5),
('2015_09_16_053059_create_admin_user_table', 6),
('2015_09_17_020728_create_account_info_table', 6),
('2015_09_17_024213_create_account_info_table', 7),
('2015_09_30_050022_create_declarant_table', 8),
('2015_09_30_052408_create_declarant_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `services_info`
--

CREATE TABLE IF NOT EXISTS `services_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eCAI` tinyint(1) NOT NULL,
  `CPRS` tinyint(1) NOT NULL,
  `ED` tinyint(1) NOT NULL,
  `OLRS` tinyint(1) NOT NULL,
  `EMS` tinyint(1) NOT NULL,
  `IED` tinyint(1) NOT NULL,
  `OV` tinyint(1) NOT NULL,
  `eTAPS1` tinyint(1) NOT NULL,
  `eEDS` tinyint(1) NOT NULL,
  `MAV` tinyint(1) NOT NULL,
  `BPIeSPS` tinyint(1) NOT NULL,
  `BFAReSPS` tinyint(1) NOT NULL,
  `BAIeSPS` tinyint(1) NOT NULL,
  `BPIeRFI` tinyint(1) NOT NULL,
  `BFAReRFI` tinyint(1) NOT NULL,
  `BAIeRFI` tinyint(1) NOT NULL,
  `eIPS` tinyint(1) NOT NULL,
  `EAEDS` tinyint(1) NOT NULL,
  `eLOA` tinyint(1) NOT NULL,
  `eTAPS2` tinyint(1) NOT NULL,
  `JAFR` int(11) NOT NULL,
  `eZTS` int(11) NOT NULL,
  `eDW` int(11) NOT NULL,
  `PAE` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueID` (`uniqueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `services_info`
--

INSERT INTO `services_info` (`id`, `uniqueID`, `eCAI`, `CPRS`, `ED`, `OLRS`, `EMS`, `IED`, `OV`, `eTAPS1`, `eEDS`, `MAV`, `BPIeSPS`, `BFAReSPS`, `BAIeSPS`, `BPIeRFI`, `BFAReRFI`, `BAIeRFI`, `eIPS`, `EAEDS`, `eLOA`, `eTAPS2`, `JAFR`, `eZTS`, `eDW`, `PAE`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '55f8d31080ad62015', 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-09-16 06:27:06', '2015-09-16 06:27:06'),
(2, '55f907fd88f1e2015', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2015-09-16 10:12:42', '2015-09-16 10:12:42'),
(3, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `data` mediumtext NOT NULL,
  `timestamp` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `data`, `timestamp`) VALUES
('9a8uruprt4srudir5utbdnrrj1', '', 1444012088),
('jlln21vulutc4pmtpemc0iu1g7', '', 1444012045),
('vluui9m9e1j4lhaua5oe6gqdm3', '', 1444012077);

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE IF NOT EXISTS `upload_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `content` blob NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE IF NOT EXISTS `user_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cltcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companyname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TIN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zpcd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mbleno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companyemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueID` (`uniqueID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `uniqueID`, `companyname`, `TIN`, `address`, `province`, `country`, `zpcd`, `telno`, `mbleno`, `companyemail`, `usertype`, `bir`, `firstname`, `lastname`, `middlename`, `designation`, `zone`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, '55f8d31080ad62015', 'Bonafide', '123456789', 'Caniogan', 'Aparri', 'Philippines', '1606', '6326414680', '6329255885264', 'bits@mail.com', 'importer', '', 'Cherryl', 'Tulang', 'Mata', 'Pasig', '', NULL, '2015-09-16 06:27:06', '2015-09-16 06:27:06', 0),
(2, '55f907fd88f1e2015', 'Test Company', '123456789', 'Test Address', 'Test Province', 'Test Country', '1606', '6326421709', '6329255885264', 'ship', 'broker', '', 'Testing', 'Test', 'T', 'Test Designation', '', NULL, '2015-09-16 10:12:42', '2015-09-16 10:12:42', 0),
(7, 'UID7832619406', 'name', '324567876543', 'add 1', 'prov 1', 'country 1', '5678', '234567890876', '234567890876', 'mail@gmail.com', 'Importer', '', 'cheng', 'tuls', 'mats', 'pasigs', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'UID7881799129', 'fvjmbjhb', '345678987654', 'gvjhvhjv', 'vjhvhjv', 'jhvjhvjh', '4598', '567890987654', '456789087654', 'vjhgvjhv@mail.com', 'Broker', '', 'gfxh', 'VGVH', 'HGJVHGV', 'HGVG', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
