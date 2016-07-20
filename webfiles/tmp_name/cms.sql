-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2015 at 01:43 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE IF NOT EXISTS `account_info` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `cltcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endingBal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `runningBal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastReload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `amount`, `cltcode`, `endingBal`, `runningBal`, `LastReload`) VALUES
('150329002', 500.00, 'cltcode002', '4440', '2680', '2015-11-09 11:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE IF NOT EXISTS `client_info` (
  `id` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `TIN` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `province` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `companyemail` varchar(255) NOT NULL,
  `bir` blob NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `ZONE_CODE` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `cltcode` varchar(255) NOT NULL,
  `regAct` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `company_name`, `TIN`, `address`, `province`, `country`, `zip_code`, `telephone`, `mobile`, `companyemail`, `bir`, `usertype`, `name`, `surname`, `middle_name`, `designation`, `birth_date`, `ZONE_CODE`, `status`, `cltcode`, `regAct`, `date_created`, `last_modified`) VALUES
('150329002', 'Intercommers', '', 'Unit 501 The Pearlbank Centre, 146 Valero St. Salcedo Village Makati City', 'NCR', 'Philippines', '1227', '632 843 8182', '63 998 9647907', '', '', '', 'Ramon Tomas', 'Cristi', 'M', '', '1970-01-01', 'zone1', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('132435135132', 'Bonafide', '', '21-AB Da Vincci Wing Grand Palazzo Residence, Eastwood City, Libis, Quezon City 1110 Philippines', 'NCR', 'Philippines', '1600', '1234567', '12345678900', '', '', '', 'DeeJay', 'Tocjayao', 'Delos Santos', '', '1989-03-11', 'zone1', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1234567', 'Allsectech', '', 'Pasig City', 'Metro Manila', '1611', '9495885', '09256120890', 'Michelle', '', '', '', 'Banez', 'violata', '1990-12-08', '', '1970-01-01', 'zone2', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('8888', 'Test Company', '', 'Manila', 'Manila', 'Philippines', '1600', '8818888', '09328777125', '', '', '', 'Erwin', 'Tandoc', 'Tadeo', '', '1978-04-07', '', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5545184', 'Sample', '', 'Sample', 'Metro Manila', 'Philippines', '1611', '9498564', '09256120890', '', '', '', 'Sample', 'Sample', 'Sample', '', '2015-04-16', 'Zone 11', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('123456789012', 'Bonafide', '', '21-AB Da Vinci Wing, Grand Palazzo Residence, Eastwood, Libis, Quezon City', 'NCR', 'Philippines', '1600', '+631234567', '+631231234567', '', '', '', 'DeeJay', 'Tocjayao', 'Delos Santos', '', '1989-03-11', 'Zone 3', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('CM120890', 'Sample Company', '', 'Pasig City', 'NCR', 'Philippines', '1611', '+6329498558', '+639256120890', '', '', '', 'Michelle', 'Banez', 'Violata', '', '1990-12-08', 'Zone 4', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('A100', 'Test Company', '', 'Manila', 'Manila', 'Philippines', '1600', '+6325211528', '+639178568877', '', '', '', 'Erwin', 'Tandoc', 'Tadeo', '', '1978-10-03', 'Zone 5', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MB931753', 'MyCompany', '', '11 Hindi makita street, Brgy. wala', 'NCR', 'Philippines', '1120', '+6328982132', '+639112205008', '', '', '', 'Atsuko', 'Noname', 'Secret', '', '1990-03-28', 'Zone 6', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('123456789013', 'ABC', '', 'anc', 'manila', 'Philippines', '1600', '+631234567', '+631231234567', '', '', '', 'TRIAGE X', 'Tocjayao', 'Delos Santos', '', '2015-05-11', 'Zone 7', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TEST12345763', 'ABCD', '', 'Manila', 'Manila', 'Philippines', '1600', '+6325211528', '+639178568877', '', '', '', 'Erwin', 'Tandoc', 'Tadeo', '', '2015-05-31', 'Zone 8', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('TEST1234567', 'Test Company', '', 'Manila', 'Non-US/Other', 'Philippines', '1600', '+6325211528', '+639178568877', '', '', '', 'Erwin', 'Tandoc', 'Tadeo', '', '2015-05-14', '', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('563c51614bca62015', 'BITS', '123456789999', 'Pasig', 'NCR', 'Philippines', '1606', '63026421709', '639255885264', 'bits@mail.com', 0x75736572732e73716c, 'Broker', 'Cherryl', 'Tulang', 'Mata', '', '0000-00-00', 'samplezone', 0, 'samplecltcode', '', '2015-11-10 06:35:55', '0000-00-00 00:00:00'),
('5640310a93b322015', '', '', '', '', '', '', '', '', '', '', '', 'tester', 'trial', 'sample', '', '0000-00-00', '', 0, '', '', '2015-11-09 05:37:14', '0000-00-00 00:00:00'),
('564031dd358e92015', '', '', '', '', '', '', '', '', '', '', '', 'Test', 'Testing', 'Sample', '', '0000-00-00', '', 0, '', '', '2015-11-09 05:40:45', '0000-00-00 00:00:00'),
('564038c5017c22015', '', '', '', '', '', '', '', '', '', '', '', 'test', 'wan', 'sample', '', '0000-00-00', '', 0, '', '', '2015-11-09 06:10:13', '0000-00-00 00:00:00'),
('56403ff129a662015', '', '', '', '', '', '', '', '', '', '', '', 'testing', 'two', 'trial', '', '0000-00-00', '', 0, '', '', '2015-11-09 06:40:49', '0000-00-00 00:00:00'),
('564079990cdbd2015', '', '', '', '', '', '', '', '', '', '', '', 'three', 'tres', 'tatlo', '', '0000-00-00', '', 0, '', '', '2015-11-09 10:46:49', '0000-00-00 00:00:00');

--
-- Triggers `client_info`
--
DROP TRIGGER IF EXISTS `client_info_BEFORE_INSERT`;
DELIMITER //
CREATE TRIGGER `client_info_BEFORE_INSERT` BEFORE INSERT ON `client_info`
 FOR EACH ROW SET NEW.date_created = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `companyName` varchar(255) NOT NULL,
  `add1` varchar(255) NOT NULL,
  `add2` varchar(255) NOT NULL,
  `add3` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `TIN` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`companyName`, `add1`, `add2`, `add3`, `email`, `TIN`, `zone`) VALUES
('Bonafide', 'City Land', 'Gil Puyat', 'Makati City', 'sample@bnfde.com', '123456789', 'LPT1'),
('Smart Telecom', 'Smart tower', 'Ayala Ave', 'Makati City', 'sample@smart.com', '987654321', 'LPT1'),
('SMDC', 'One E-com builing', 'MOA', 'Pasay City', 'sample@smdc.com', '6547646476', 'LPT1'),
('ACESTAR INTEGRATED LOGISTICS INC.', 'CRI Bldg Phase 3 SEZ Laguna Technopark', 'Binan Laguna', '', 'gm@acestarlog.com.ph', '7487785000', 'LTP1'),
('ACK PHILIPPINES INC.', '2F MD Distripack Manila Bldg,', '121 East Science Ave, Binan, Laguna', '', 'togashi.ichiro@ack-it.com', '8223112000', 'LTP1'),
('ADVANCED MOLDING COMPANY. INC. (LOGISTICS)', '5 Circuit St. LISP 1 Cabuyao Laguna 4025', '', '', 'KUmali@texwipe.com', '236203142000', 'LSP1'),
('ADVANCED TRADELINKS PHILS., INC. (CIP2)', 'Aries 1400 Bldg Carmelray Industrial', 'Park II Brgy Tulo Calamba City', '', 'tmiranda.atpi@rommagroup.com.ph', '218875021002', 'CIP2'),
('AGILITY SOLUTIONS INC. (CLIP)', 'Blk 5 Lot 1 Main Road Cor. Middle Road', 'Cebu Light Industrial Park Lapu LapuCity', '', 'fpino@agilitylogistics.com', '231264698001', 'CLIP'),
('AGILITY SOLUTIONS INC. (PTCO)', 'Block 1 lot 7 People Technology Complex Special', 'Economi Zone Governors Drive Carmona Cavite', '', 'hreyes@agilitylogistics.com', '231264698000', 'PTCO'),
('ANALOG DEVICES GEN. TRIAS, INC. - WAREHOUSING DIVISION', 'Gateway Business Park, Javalera,', 'Gen Trias, Cavite', '', 'marivie.soriano@analog.com', '4690063002', 'GBPA'),
('APLUS PACK INC.', 'Unit E Metrococo Export Bldg 1 Filinvest', 'Technology Park Calamba City Laguna', '', 'apluspack.impex@gmail.com', '8914593000', 'FITP'),
('APM TECHNICA AG - WAREHOUSING DIVISION', 'Ampere St. cor. West Road LISP1 Cabuyao', 'Laguna', '', 'raquel.munji@apm-technica.com', '245349664001', 'LSP1'),
('ASPAC WORLDWIDE LOGISTICS INC', '2nd Avenue Mactan Economic Zone 1 Ibo', 'Lapu Lapu City Cebu', '', 'elvie.s@aspaccebu.com.ph', '206584975001', 'MEZO'),
('ASPAC WORLDWIDE LOGISTICS INC (LIIP)', 'Bldg 6 Panorama Compound CNB St. LIIP', 'PEZA Mamplasan exit Binan Laguna.', '', 'bong.chan@awli.com.ph', '206584975000', 'LIIP'),
('CEVA WAREHOUSING AND DISTRIBUTIONS INC.', 'CORNER 1 AND 10TH ST. PHASE IV', 'CEPZ ROSARIO CAVITE', '', 'Edelyn.Panteriore@cevalogistics.com', '214967970000', 'CEZO'),
('CHIYODA INTEGRE (PHILIPPINES) CORPORATION', 'LIGHT AND INDUSTRY AND SCIENCE PARK III,', 'SAN RAFAEL, STO. TOMAS BATANGAS', '', 'ederlina.doydora@cijpn.com', '8364398000', 'LSP3'),
('CJ GLS PHILIPPINES VMI WAREHOUSE INC.', 'WHSE7 EZP Business Park CPIP Brgy Batino', 'Calamaba Laguna', '', 'medrano@cj.net', '7015269000', 'CPIP'),
('COMINIX (PHILIPPINES) INC', '2F Administration Bldg 1, North Main Ave', 'Laguna Technopark, Binan, Laguna', '', 'la.pabonita@cominix-p.com', '7906368000', 'LTP1'),
('DOHO METAL (PH) CORPORATION-WAREHOUSING DIVISION', 'Block 16 phase IV C.E.P.Z Rosario Cavite', '4106 Phils', '', 'a.grey@doho.co.jp', '8013521000', 'CEZO'),
('DYNAPAC PACKAGING TECHNOLOGY (PHILIPPINES) INC.', 'Unit F, Centereach Resources Inc bldg 1', 'Lot 3 Block 20 Lima Technology Center', '', 'atienzaroxane@yahoo.com', '8787410000', 'LTCL'),
('EMORI PHILIPPINES INC.', 'UNIT A 149 EAST MAIN AVENUE LOOP 6-C ', 'LAGUNA TECHNOPARK BINAN LAGUNA', '', 'tama@emori.co.jp', '8306834000', 'LTP1'),
('EPE (PHILIPPINES) CORP.', 'L 4 B 6-10 Amplefiled SME Part, J.P.', 'Rizal Ave. LTCL, Lipa City Batangas ', '', 'diane@epepack.com.hk', '8749302000', 'LTCL'),
('FURUKAWA SANGYO KAISHA PHILIPPINES, INC', 'Bldg 5,6 Panorama Compound 5, ', 'Binan, Laguna', '', 'malimet-fsk@pldtdsl.net', '7254467000', 'LTPA'),
('GLOWINGPOINT MATERIALS, INC.', 'Bldg 5 Panorama Compound CPIP-SEZ Brgy', 'Batino Calamba City Laguna', '', 'glowingpoint@gmail.com', '8710403000', 'CPIP'),
('GMV MATERIALS, INC', '107 North Main Avenue Laguna Technopark', 'Inc Binan Laguna', '', 'junvalerio@gmv.com.ph', '241242600001', 'LTP1'),
('GRM ECOZONES STORAGE, INC. (LTP1)', '124 East Science Ave. Laguna Technopark', 'SEZ Binan Laguna', '', 'nel.vergara@grmonline.com', '5067776002', 'LTP1'),
('HAAS GROUP INTERNATIONAL PHILIPPINES INC.', 'Peza Loakan Road Baguio City 2600', '', '', 'grace.palisoc@haasgroupintl.com', '8222312000', 'BCEZ'),
('HANKYU HANSHIN LOGISTICS PHILIPPINES INC (LTP1)', 'Panorama Bldg No 5 and 6, South Science ', 'Laguna Technopark, Sta Rosa, Laguna', '', 'rbayot.hhlpi@ph.hh-express.com', '7663643000', 'LTP1'),
('HANKYU HANSHIN LOGISTICS PHILIPPINES INC. (MEZO)', '2nd Avenue Mactan Economic Zone 1 Lapu', 'Lapu Lapu City Cebu', '', 'evelyn@ph.hh-express.com', '7663643001', 'MEZO'),
('INOUEKI PHILIPPINES, INC.', '2F Panorama Bldg 5 & 6 South Science Ave', 'Laguna Technopark Sta Rosa Laguna', '', 'inoueki-manila@inoueki.com', '8533493000', 'LTP1'),
('INTEGRATED PACKAGING LOGISTICS MANUFACTURING INC-WD', 'C3-3C Lakeview Road CIP II Calamba City', 'Laguna', '', 'clarita.igonio@iplmi.com', '229521917001', 'CIP2'),
('JFE SHOJI STEEL PHILIPPINES, INC', '107 Trade Ave, Laguna Technopark,', 'Binan, Laguna', '', 'rgmorales@jssp.ph', '5031446000', 'LTP1'),
('JIO MHW GLOBAL CHANNEL MFG.CORP (WAREHOUSING)', '2/F 3rd Benami Bldg. Peoples Technology', 'Complex Gov. Drive Carmona Cavite', '', 'jiomhw8@gmail.com;JIOLHEN13@gmail.com', '8544963000', 'PTCO'),
('JX NIPPON MINING AND METALS PHILIPPINES INC-WAREHOUSING DIV', '117 East Science Avenue Laguna ', 'Technopark Bina Laguna', '', 'ccanete@nmph-ix-group.com', '4847735000', 'LTP1'),
('KAMOGAWA LAGUNA PHILIPPINES., INC.', 'BLDG. 8 BLK 2, PHASE V, EAST MAIN AVENUE', 'LAGUNA TECHNOPARK, SEPZ, BINAN LAGUNA', '', 'elsa@kamog.com.ph', '6926093000', 'LTP1'),
('KDTECHNOLOGIES INC', 'Lot 3, Blk 6, Phase 2, CEZIA Road, Phase2', 'CEZO Rosario, Cavite', '', 'rowenasison@kdtechinc.com', '230409352000', 'CEZO'),
('KORCHINA LOGISTICS PHILIPPINES SERVICES INC', 'Bldg 2, Technohub LIMA Technology Center', 'Brgy Santiago, Malvar, Batangas', '', 'gilgelvez@korchina.com', '8303186000', 'LTCL'),
('Koyo Manufacturing (Philippines) Corporation', 'LIMA TECHNOLOGY CENTER Malvar, Batangas', '', '', 'kmp-pur@koyo.ph', '5194767000', 'LTCL'),
('KOYO MANUFACTURING (PHILIPPINES) CORPORATION - WD', 'Lima Technology Center,', 'Malvar, Batangas', '', 'kmp-pur@koyo.ph', '5194767000', 'LTCL'),
('KURODA ELECTRIC PHILIPPINES INC.', 'Unit 4, No 125, North Science Ave, Ph 2,', 'Binan, Laguna', '', 'casino.michelle@kuroda-electric.com', '225039509000', 'LTP1'),
('LIMA ENERZONE CORPORATION', 'JP Laurel Highway Brgy Santiago Malvar', 'Batangas City', '', 'jay.navarro@aboitiz. com', '5183049000', 'LTCL'),
('LIMA LOGISTICS CORPORATION (LTCL)', 'Lima Technology Center, SEZ', 'Lipa City', '', 'endaya-j@limalogistics.com.ph', '201512098000', 'LTCL'),
('LIMA LOGISTICS CORPORATION-LTI', 'Techno Freeze Building 1 and 2 East Science', 'drive Laguna Technopark Binan Laguna ', '', 'lhea.bebita@limalogistics.com.ph', '201069239001', 'LTP1'),
('MCPL PHILIPPINES, INC.', '121 East Science Ave Laguna Technopark', '', '', 'kathy.san-blas@mitsubishicorp.com', '242913821000', 'LTP1'),
('MEDIA MERIT TRADING PHILIPPINES CORPORATION', 'Laguna Technopark, Binan, Laguna', '', '', 'operation@mediamerit.com.ph', '239865871000', 'LTP1'),
('MT SUPPLY INC. PHILIPPINES BRANCH', 'Peza Loakan Road Baguio City', '', '', 'vivian.petero@dnow.com', '418973669000', 'BCEZ'),
('NAGASE PHILIPPINES INTERNATIONAL SERVICES CORP (B25 D)', 'B25 D PHASE 4 Expansion Cavite Economic', 'Zone Rosario Cavite', '', 'eds@nagase.com.ph', '242285845001', 'CEZO'),
('NAGASE PHILIPPINES INTERNATIONAL SERVICES CORP (CCMC COMP)', 'CCMC Compound 3 (Murase), Lot 8 Block 1 North Ave.', 'Cavite Economic Zone (CEZ) Rosario, Cavite', '', 'eds@nagase.com.ph', '242285845002', 'CEZO'),
('NAGASE PHILIPPINES INTERNATIONAL SERVICES CORP (LTP1)', 'Unit 4, 125 North Science Avenue, Phase 2 Laguna', 'Technopark, Special Economic Zone Binan, Laguna', '', 'eds@nagase.com.ph', '242285845000', 'LTP1'),
('NEP LOGISTICS INC.', 'Unit 1 lot1 0 phase 4 east Science Ave Cor', 'Trade Ave Laguna Technopark Inc Binan', '', 'dcornejo@nittsu.com.ph', '204562495000', 'LTP1'),
('NIHON DENKEI PHILIPPINES, INC.', 'MEC Bldg.5 105 Industry Road LTI-SEZ', 'Sta. Rosa City Laguna', '', 'allan@n-denkei.com.ph', '8624220000', 'LTP1'),
('NIPPON EXPRESS NEC LOGISTICS SINGAPORE PTE LTD PHILIPPINES B', 'Bldg 2 Panorama Compound 5 Lot 5 Block 3', 'Laguna Technopark Annex Binan Laguna', '', 'marissa@necl.com.sg', '8441306000', 'LTPA'),
('ACESTAR INTEGRATED LOGISTICS INC.', 'CRI Bldg Phase 3 SEZ Laguna Technopark', 'Binan Laguna', '', 'gm@acestarlog.com.ph', '7487785000', 'LTP1'),
('ACK PHILIPPINES INC.', '2F MD Distripack Manila Bldg,', '121 East Science Ave, Binan, Laguna', '', 'togashi.ichiro@ack-it.com', '8223112000', 'LTP1'),
('ADVANCED MOLDING COMPANY. INC. (LOGISTICS)', '5 Circuit St. LISP 1 Cabuyao Laguna 4025', '', '', 'KUmali@texwipe.com', '236203142000', 'LSP1'),
('ADVANCED TRADELINKS PHILS., INC. (CIP2)', 'Aries 1400 Bldg Carmelray Industrial', 'Park II Brgy Tulo Calamba City', '', 'tmiranda.atpi@rommagroup.com.ph', '218875021002', 'CIP2'),
('AGILITY SOLUTIONS INC. (CLIP)', 'Blk 5 Lot 1 Main Road Cor. Middle Road', 'Cebu Light Industrial Park Lapu LapuCity', '', 'fpino@agilitylogistics.com', '231264698001', 'CLIP'),
('AGILITY SOLUTIONS INC. (PTCO)', 'Block 1 lot 7 People Technology Complex Special', 'Economi Zone Governors Drive Carmona Cavite', '', 'hreyes@agilitylogistics.com', '231264698000', 'PTCO'),
('ANALOG DEVICES GEN. TRIAS, INC. - WAREHOUSING DIVISION', 'Gateway Business Park, Javalera,', 'Gen Trias, Cavite', '', 'marivie.soriano@analog.com', '4690063002', 'GBPA'),
('APLUS PACK INC.', 'Unit E Metrococo Export Bldg 1 Filinvest', 'Technology Park Calamba City Laguna', '', 'apluspack.impex@gmail.com', '8914593000', 'FITP'),
('APM TECHNICA AG - WAREHOUSING DIVISION', 'Ampere St. cor. West Road LISP1 Cabuyao', 'Laguna', '', 'raquel.munji@apm-technica.com', '245349664001', 'LSP1'),
('ASPAC WORLDWIDE LOGISTICS INC', '2nd Avenue Mactan Economic Zone 1 Ibo', 'Lapu Lapu City Cebu', '', 'elvie.s@aspaccebu.com.ph', '206584975001', 'MEZO'),
('ASPAC WORLDWIDE LOGISTICS INC (LIIP)', 'Bldg 6 Panorama Compound CNB St. LIIP', 'PEZA Mamplasan exit Binan Laguna.', '', 'bong.chan@awli.com.ph', '206584975000', 'LIIP'),
('CEVA WAREHOUSING AND DISTRIBUTIONS INC.', 'CORNER 1 AND 10TH ST. PHASE IV', 'CEPZ ROSARIO CAVITE', '', 'Edelyn.Panteriore@cevalogistics.com', '214967970000', 'CEZO'),
('CHIYODA INTEGRE (PHILIPPINES) CORPORATION', 'LIGHT AND INDUSTRY AND SCIENCE PARK III,', 'SAN RAFAEL, STO. TOMAS BATANGAS', '', 'ederlina.doydora@cijpn.com', '8364398000', 'LSP3'),
('CJ GLS PHILIPPINES VMI WAREHOUSE INC.', 'WHSE7 EZP Business Park CPIP Brgy Batino', 'Calamaba Laguna', '', 'medrano@cj.net', '7015269000', 'CPIP'),
('COMINIX (PHILIPPINES) INC', '2F Administration Bldg 1, North Main Ave', 'Laguna Technopark, Binan, Laguna', '', 'la.pabonita@cominix-p.com', '7906368000', 'LTP1'),
('DOHO METAL (PH) CORPORATION-WAREHOUSING DIVISION', 'Block 16 phase IV C.E.P.Z Rosario Cavite', '4106 Phils', '', 'a.grey@doho.co.jp', '8013521000', 'CEZO'),
('DYNAPAC PACKAGING TECHNOLOGY (PHILIPPINES) INC.', 'Unit F, Centereach Resources Inc bldg 1', 'Lot 3 Block 20 Lima Technology Center', '', 'atienzaroxane@yahoo.com', '8787410000', 'LTCL'),
('EMORI PHILIPPINES INC.', 'UNIT A 149 EAST MAIN AVENUE LOOP 6-C ', 'LAGUNA TECHNOPARK BINAN LAGUNA', '', 'tama@emori.co.jp', '8306834000', 'LTP1'),
('EPE (PHILIPPINES) CORP.', 'L 4 B 6-10 Amplefiled SME Part, J.P.', 'Rizal Ave. LTCL, Lipa City Batangas ', '', 'diane@epepack.com.hk', '8749302000', 'LTCL'),
('FURUKAWA SANGYO KAISHA PHILIPPINES, INC', 'Bldg 5,6 Panorama Compound 5, ', 'Binan, Laguna', '', 'malimet-fsk@pldtdsl.net', '7254467000', 'LTPA'),
('GLOWINGPOINT MATERIALS, INC.', 'Bldg 5 Panorama Compound CPIP-SEZ Brgy', 'Batino Calamba City Laguna', '', 'glowingpoint@gmail.com', '8710403000', 'CPIP'),
('GMV MATERIALS, INC', '107 North Main Avenue Laguna Technopark', 'Inc Binan Laguna', '', 'junvalerio@gmv.com.ph', '241242600001', 'LTP1'),
('GRM ECOZONES STORAGE, INC. (LTP1)', '124 East Science Ave. Laguna Technopark', 'SEZ Binan Laguna', '', 'nel.vergara@grmonline.com', '5067776002', 'LTP1'),
('HAAS GROUP INTERNATIONAL PHILIPPINES INC.', 'Peza Loakan Road Baguio City 2600', '', '', 'grace.palisoc@haasgroupintl.com', '8222312000', 'BCEZ'),
('HANKYU HANSHIN LOGISTICS PHILIPPINES INC (LTP1)', 'Panorama Bldg No 5 and 6, South Science ', 'Laguna Technopark, Sta Rosa, Laguna', '', 'rbayot.hhlpi@ph.hh-express.com', '7663643000', 'LTP1'),
('HANKYU HANSHIN LOGISTICS PHILIPPINES INC. (MEZO)', '2nd Avenue Mactan Economic Zone 1 Lapu', 'Lapu Lapu City Cebu', '', 'evelyn@ph.hh-express.com', '7663643001', 'MEZO'),
('INOUEKI PHILIPPINES, INC.', '2F Panorama Bldg 5 & 6 South Science Ave', 'Laguna Technopark Sta Rosa Laguna', '', 'inoueki-manila@inoueki.com', '8533493000', 'LTP1'),
('INTEGRATED PACKAGING LOGISTICS MANUFACTURING INC-WD', 'C3-3C Lakeview Road CIP II Calamba City', 'Laguna', '', 'clarita.igonio@iplmi.com', '229521917001', 'CIP2'),
('JFE SHOJI STEEL PHILIPPINES, INC', '107 Trade Ave, Laguna Technopark,', 'Binan, Laguna', '', 'rgmorales@jssp.ph', '5031446000', 'LTP1'),
('JIO MHW GLOBAL CHANNEL MFG.CORP (WAREHOUSING)', '2/F 3rd Benami Bldg. Peoples Technology', 'Complex Gov. Drive Carmona Cavite', '', 'jiomhw8@gmail.com', '8544963000', 'PTCO'),
('JX NIPPON MINING AND METALS PHILIPPINES INC-WAREHOUSING DIV', '117 East Science Avenue Laguna ', 'Technopark Bina Laguna', '', 'ccanete@nmph-ix-group.com', '4847735000', 'LTP1'),
('KAMOGAWA LAGUNA PHILIPPINES., INC.', 'BLDG. 8 BLK 2, PHASE V, EAST MAIN AVENUE', 'LAGUNA TECHNOPARK, SEPZ, BINAN LAGUNA', '', 'elsa@kamog.com.ph', '6926093000', 'LTP1'),
('KDTECHNOLOGIES INC', 'Lot 3, Blk 6, Phase 2, CEZIA Road, Phase2', 'CEZO Rosario, Cavite', '', 'rowenasison@kdtechinc.com', '230409352000', 'CEZO'),
('KORCHINA LOGISTICS PHILIPPINES SERVICES INC', 'Bldg 2, Technohub LIMA Technology Center', 'Brgy Santiago, Malvar, Batangas', '', 'gilgelvez@korchina.com', '8303186000', 'LTCL'),
('Koyo Manufacturing (Philippines) Corporation', 'LIMA TECHNOLOGY CENTER Malvar, Batangas', '', '', 'kmp-pur@koyo.ph', '5194767000', 'LTCL'),
('KOYO MANUFACTURING (PHILIPPINES) CORPORATION - WD', 'Lima Technology Center,', 'Malvar, Batangas', '', 'kmp-pur@koyo.ph', '5194767000', 'LTCL'),
('KURODA ELECTRIC PHILIPPINES INC.', 'Unit 4, No 125, North Science Ave, Ph 2,', 'Binan, Laguna', '', 'casino.michelle@kuroda-electric.com', '225039509000', 'LTP1'),
('LIMA ENERZONE CORPORATION', 'JP Laurel Highway Brgy Santiago Malvar', 'Batangas City', '', 'jay.navarro@aboitiz. com', '5183049000', 'LTCL'),
('LIMA LOGISTICS CORPORATION (LTCL)', 'Lima Technology Center, SEZ', 'Lipa City', '', 'endaya-j@limalogistics.com.ph', '201512098000', 'LTCL'),
('LIMA LOGISTICS CORPORATION-LTI', 'Techno Freeze Building 1 and 2 East Science', 'drive Laguna Technopark Binan Laguna ', '', 'lhea.bebita@limalogistics.com.ph', '201069239001', 'LTP1'),
('MCPL PHILIPPINES, INC.', '121 East Science Ave Laguna Technopark', '', '', 'kathy.san-blas@mitsubishicorp.com', '242913821000', 'LTP1'),
('MEDIA MERIT TRADING PHILIPPINES CORPORATION', 'Laguna Technopark, Binan, Laguna', '', '', 'operation@mediamerit.com.ph', '239865871000', 'LTP1'),
('MT SUPPLY INC. PHILIPPINES BRANCH', 'Peza Loakan Road Baguio City', '', '', 'vivian.petero@dnow.com', '418973669000', 'BCEZ'),
('NAGASE PHILIPPINES INTERNATIONAL SERVICES CORP (B25 D)', 'B25 D PHASE 4 Expansion Cavite Economic', 'Zone Rosario Cavite', '', 'eds@nagase.com.ph', '242285845001', 'CEZO'),
('NAGASE PHILIPPINES INTERNATIONAL SERVICES CORP (CCMC COMP)', 'CCMC Compound 3 (Murase), Lot 8 Block 1 North Ave.', 'Cavite Economic Zone (CEZ) Rosario, Cavite', '', 'eds@nagase.com.ph', '242285845002', 'CEZO'),
('NAGASE PHILIPPINES INTERNATIONAL SERVICES CORP (LTP1)', 'Unit 4, 125 North Science Avenue, Phase 2 Laguna', 'Technopark, Special Economic Zone Binan, Laguna', '', 'eds@nagase.com.ph', '242285845000', 'LTP1'),
('NEP LOGISTICS INC.', 'Unit 1 lot1 0 phase 4 east Science Ave Cor', 'Trade Ave Laguna Technopark Inc Binan', '', 'dcornejo@nittsu.com.ph', '204562495000', 'LTP1'),
('NIHON DENKEI PHILIPPINES, INC.', 'MEC Bldg.5 105 Industry Road LTI-SEZ', 'Sta. Rosa City Laguna', '', 'allan@n-denkei.com.ph', '8624220000', 'LTP1'),
('NIPPON EXPRESS NEC LOGISTICS SINGAPORE PTE LTD PHILIPPINES B', 'Bldg 2 Panorama Compound 5 Lot 5 Block 3', 'Laguna Technopark Annex Binan Laguna', '', 'marissa@necl.com.sg', '8441306000', 'LTPA'),
('PHILIPPINE ICHIKAWA RUBBER CORP - WAREHOUSING DIVISION', 'SFB 10 PHASE 3 CEPZA ROSARIO CAVITE', '', '', 'impex@pirc.com.ph', '3832846000', 'CEZO'),
('PHILKO-CHEM LOGISTICS INC.', 'Unit Lot1 Block 2, Fillinvest Technology', 'Park Brgy Punta Calamba City Laguna', '', 'zhazha-rodrigo@yahoo,com', '8296983000', 'FITP'),
('PILIPINAS TOTAL GAS, INC.', 'MD Districtpark East Science Avenue', 'LAGUNA TECHNOPARK, SEPZ, BINAN LAGUNA', '', 'gdv-querol@pldtdsl.net', '4609538000', 'LTP1'),
('PLA MATELS (PHILIPPINES) CORPORATION (LTP1)', 'Lot 3, Bk 4, East Ave, Laguna Technopark', 'Binan, Laguna', '', 'naoyuki.yamashita@plamatels.com', '8079909000', 'LTP1'),
('POSCO-PHILIPPINE MANILA PROCESSING CENTER INC (WD)', 'FPIP, Lot 22A, Brgy. Ulango,', 'Tanauan City, Batangas', '', 'kjp2058@poscopns.com', '6937180000', 'FPIP'),
('SAGAWA GLOBAL LOGISTICS PHILS., INC.', 'Unit 5 Orient Gold Crest Compound Bldg 5', 'phase 5 east main ave Laguna Technopark', '', 'apigason.sglpi@gmail.com', '6526710000', 'LTP1'),
('SAMHONGSA PHILIPPINES, INC. [LOGISTICS]', 'BLDG. B BLOCK 1 LOT 6 CPIP BATINO', 'CALAMBA CITY LAGUNA', '', 'logistics_phils@samhongsa.co.kr', '228887101000', 'CPIP'),
('SCHENKER LOGISTICS INC.', 'Orient Compound bldg 4 Block 4 lot 1Road', '3 Cr. Rd 5 CPIP brgy Batino Calamba', '', 'marinel.lincallo@dbschenker.com', '230675817000', 'CPIP'),
('SCHNEIDER ELECTRIC IT LOGISTICS ASIA PACIFIC PTE LTD', 'Bldg 1, Gabriel Industrial Complex, Rd 1', 'Ph IV, CEZ, Rosario, Cavite', '', 'jchavez@scheider-electric.com', '412015307000', 'CEZO'),
('SLTI LOGISTICS SERVICES INC.', '6C Gabriel Industrial Complex Phase II', 'Cavite Economic Zone Rosario Cavite', '', 'whousedds@orientfreight.com', '244891851000', 'CEZO'),
('SSCP MLA, INC.', 'BLK 9 LOT PHASE 1 PEZA ROSARIO CAVITE', '', '', 'sscpmlainc@yahoo.com', '237211127000', 'CEZO'),
('STANDARD UNITS SUPPLY PHILIPPINES CORPORATION', 'Bldg U-2 Lot 22B Phase 1B FPIP Special', 'Economic Zone Tanauan City Batangas', '', 'c-alintanahin@sus.ph', '8670977000', 'FPIP'),
('STT PHILIPPINES, INC. Warehousing Division [LOGISTICS]', 'Lot 5 Blk5 Greenfield Automotive Park', 'Brgy Don Jose Sta Rosa Laguna', '', 'amabella.garcia@stt-inc.co.jp', '5241447000', 'GAPA'),
('SUMITRONICS PHILS. INC.', '3A MOUNTAIN DRIVE LISP2 BRGY LA MESA', 'CALAMBA CITY LAGUNA', '', 'michael-rubio@sumitronics.co.jp', '5239330000', 'LSP2'),
('TEST SOLUTIONS SERVICES, INC. - WAREHOUSE DIVISION', 'Lot 8, Blk 5, CNB St, LIIP, Mamplasan, Binan,', 'Laguna', '', 'pdelmundo@tss-ph.com', '5376807000', 'LIIP'),
('TOKYO BYOKANE PHILIPPINES CORPORATION', 'LOT C2-6B CARMELRAY INDUSTRIAL PARK II BRGY.', 'PUNTA, CALAMBA CITY, LAGUNA', '', 'impex@tokyobyokane.com.ph', '206011462000', 'CIP2'),
('TOYOTA TSUSHO PHILIPPINES CORP. (CPIP)', 'B4 L2, Main Road 3, CPIP,', 'Calamba City, Laguna', '', 'eldayo@toyotsu.com.ph', '229624446000', 'CPIP'),
('TRANSNATIONAL LOGISTICS, INC (CEZO)', 'TLI Bldg, Phase III, 3rd St,', 'Rosario, Cavite', '', 'arvin.tugadi@tlsc.com.ph', '345491000', 'CEZO'),
('URE-SHI TECHNOLOGIES, INC.', '8th cor 9th Golden Mile Business Park', 'Bgy Caduya Carmona Cavite ', '', 'df_eureshiitech@yahoo.com.ph', '7000500000', 'GMSE'),
('VANTAGE RESOURCES CORPORATION', '3RD FLOOR FASTECH BLDG 3 FASTECH MFG COMPLEX', 'LISP1 CABUYAO LAGUNA', '', 'egrosales@vantageresources.net', '149180000', 'LSP1'),
('WAREHOUSE MANAGEMENT AND TRADE DEVELOPMENT SERVICES INC.', '9TH ST. CEPZA, ROSARIO CAVITE', '', '', 'feberesacastro@gmail.com', '239374381000', 'CEZO'),
('XYLEM WATER SYSTEM INTERNATIONAL INC. (PHILIPPINE BRANCH)-WD', 'NO.12 Ring Road LISP II Brgy La Mesa', 'Calamba City Laguna', '', 'erlinda.borja@xyleminc.com', '246534865001', 'LSP2'),
('YJC INTERNATIONAL CORPORATION - WAREHOUSING DIVISION', 'Lot 2-B 5th St. First Cavite Industrial', 'Estate Bgy Langkaan II Dasmarinas City', '', 'yjcintl@gmail.com', '8346403001', 'FCIE'),
('YUSEN LOGISTICS CENTER INC (CEZO)', 'CCMC Compound 3 Murase Lot Block 1 North', 'Avenue CEZ Rosario Cavite', '', 'grezamae.zinampan@ph.yusen-logistics.com', '245264466003', 'CEZO'),
('YUSEN LOGISTICS CENTER INC (LTP1)', 'Unit 1-4,125 North Science Ave. Ph 2', 'Laguna Technopark Inc, Binan, Laguna', '', 'cherrylou.patron@ph.yusen-logistics.com', '245264466', 'LTP1');

-- --------------------------------------------------------

--
-- Table structure for table `declarant`
--

CREATE TABLE IF NOT EXISTS `declarant` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TIN` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `cltcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `declarant` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `declarant`
--

INSERT INTO `declarant` (`id`, `companyName`, `TIN`, `cltcode`, `declarant`, `payment`, `status`) VALUES
('150329002', 'APLUS PACK INC.', '8914593000', 'cltcode100', 1, 1, 1);

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
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f907fd88f1e2015', '0000-00-00 00:00:00'),
('55f907fd88f1e2015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('55f8d31080ad62015', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('123456789012', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('563859bfe83da2015', '0000-00-00 00:00:00'),
('563859bfe83da2015', '0000-00-00 00:00:00'),
('563859bfe83da2015', '0000-00-00 00:00:00'),
('56387f34967c72015', '0000-00-00 00:00:00'),
('56387f34967c72015', '0000-00-00 00:00:00'),
('56387f34967c72015', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('5639a084865242015', '0000-00-00 00:00:00'),
('5639a3d2045c72015', '0000-00-00 00:00:00'),
('150329002', '0000-00-00 00:00:00'),
('5639a3d2045c72015', '0000-00-00 00:00:00'),
('563ac52281c512015', '0000-00-00 00:00:00'),
('563ae6f9d53282015', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services_info`
--

CREATE TABLE IF NOT EXISTS `services_info` (
  `id` varchar(255) NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_info`
--

INSERT INTO `services_info` (`id`, `servicename`, `status`) VALUES
('563c51614bca62015', 'eLOA', 0);

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
('35lhnla2n82941gsfnv0f39mh1', '', 1445571155),
('8siidm9sil113dirroik6895c1', '', 1445571047),
('me81ipt8qsda6f3un6jq8238v2', 'userid|s:9:"150329002";UserLoginString|s:352:"5632196743ba224d321725a9f1f63e88103870fd62949fed8b0903b6ed1e1a8550547dd09ddfe98fa1e18c894d9de3645e804068ca2544445c9260d83221550ce4da0c018705c4deef02a83071631368fbf650252d5d2d550468e54355bc964c07376d975a8f47a8eaac5a8af1400514093f055bf78997fad943540fc4db3a983cb86488538226ec2f4da7114283d8a21af801c004ff93f7144d548a8515b0467c7d299f00c58a0a4c0c3aebd26c1212";Page|s:4:"Home";', 1445571173),
('obr83ti46vqvuhkfcdr7h4b3a4', 'userid|s:9:"150329002";UserLoginString|s:352:"5632196743ba224d321725a9f1f63e88103870fd62949fed8b0903b6ed1e1a8550547dd09ddfe98fa1e18c894d9de3645e804068ca2544445c9260d83221550ce4da0c018705c4deef02a83071631368fbf650252d5d2d550468e54355bc964c07376d975a8f47a8eaac5a8af1400514093f055bf78997fad943540fc4db3a983cb86488538226ec2f4da7114283d8a21af801c004ff93f7144d548a8515b0467c7d299f00c58a0a4c0c3aebd26c1212";Page|s:4:"Home";', 1445571165),
('uvic9hgrpitelhds1ln381rol2', 'userid|s:9:"150329002";UserLoginString|s:352:"5632196743ba224d321725a9f1f63e88103870fd62949fed8b0903b6ed1e1a8550547dd09ddfe98fa1e18c894d9de3645e804068ca2544445c9260d83221550ce4da0c018705c4deef02a83071631368fbf650252d5d2d550468e54355bc964c07376d975a8f47a8eaac5a8af1400514093f055bf78997fad943540fc4db3a983cb86488538226ec2f4da7114283d8a21af801c004ff93f7144d548a8515b0467c7d299f00c58a0a4c0c3aebd26c1212";Page|s:4:"Home";', 1445571089),
('vohb8fvomr22fdpkasidh4jc43', 'userid|s:9:"150329002";UserLoginString|s:352:"5632196743ba224d321725a9f1f63e88103870fd62949fed8b0903b6ed1e1a8550547dd09ddfe98fa1e18c894d9de3645e804068ca2544445c9260d83221550ce4da0c018705c4deef02a83071631368fbf650252d5d2d550468e54355bc964c07376d975a8f47a8eaac5a8af1400514093f055bf78997fad943540fc4db3a983cb86488538226ec2f4da7114283d8a21af801c004ff93f7144d548a8515b0467c7d299f00c58a0a4c0c3aebd26c1212";Page|s:4:"Home";', 1445571068);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_info`
--

CREATE TABLE IF NOT EXISTS `transaction_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(8,2) NOT NULL,
  `ORnum` varchar(255) NOT NULL,
  `refnum` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `cltcode` varchar(255) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaction_info`
--

INSERT INTO `transaction_info` (`id`, `amount`, `ORnum`, `refnum`, `remarks`, `cltcode`, `DateCreated`) VALUES
(1, 5000.00, 'OR002', 'RN002', 'test1', 'cltcode002', '2015-10-27 08:52:22'),
(2, 500.00, 'OR004', 'RN004', 'test4', 'cltcode002', '2015-10-27 10:17:50');

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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account` varchar(100) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `cltcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `account`, `password`, `salt`, `cltcode`) VALUES
('150329001', 'null', 'admin@bnfdeit.com', '0', '2f301b87bc40de454bb17d76d4d9e8ab131090888b89f9d05634c40318432e20cdea39de755ff65d7977508772911ffaad9bf179df85424e27359179430cb384', '81c19fd114ab5f6292df35a7b1361265ba214dc74dee9b36bfcdb648936e4f112342abcf6f30ab04f1b73c27f3ee1bb5471df417fe5e3cce16a3188e1b8cd865', 'cltcode11'),
('150329002', 'null', 'client@ins.com', '3', '44ebfd86bfca98f00c591ef3a50326b9a3b2124f0b5ed7ee4e90467f358fef93b9b65791350f147b4e71f2e0ea0b22c44d7b735f082ddf7e1413ad8c0f525fb7', '6689cd5757db66586925ee4ac694c07bcf72217d0ad2ca67f8ff0a3bd630aa44e4dd80f5996bd5a853741287d6a5b9229fbadc40549e69a8e7c4a270dc6d6b93', 'cltcode002'),
('123456789012', '', 'ddtocjayao@gmail.com', 'Client', '4e91c238bfeacc3d90d60bf7de7204a136aa5857410a07245fd4c8e16a6f9c5441fb6d766f9175e6a963e462879049a550a360f5edc1246eddc970a782389d64', 'fbcdef731199d524e01e455c927753b1f2a225d6d0d72a0407ade0473fa16293899d2b0b03c39582aa0a4302ff1c13804427a9c18639be1f8b00550d9f6a3fca', 'cltcode003'),
('5545184', '', 'sample@gmail.com', 'viewr', '3fc92b285313954a08798b0d79651b04dd822dc9b4f4f93794e9659bd85c94bb6e3fe951aeb6a54294acbdf1c34a4f575e5b036db924b6dcb749b80c98c02640', '83d8e346680cdeb75578f273b6f7aad3a6263eed49a6468a0f127c74b46e410a2e1512bd1129c3c3b93af84cda28c855b8b55fc3bc267b283b364d9661652ddc', 'cltcode001'),
('563982b769d782015', '', 'mail100123@mailinator.com', 'Client', 'beff82e3556900317c35c89b936cf8102637dcd7e67cc5687669019c2027c7d462e005a0b92341eab921c6e30a131c59b909c6a1dcd94ad23420dbe69cd72cf0', 'da6e52fe3a857b520c959fd59d682b47881461348a5398adc12efe9937c2ff8f8636d0e408587adf96e96f336cbd4dd53e61c23268f00a52167258ea3ded1391', '001001'),
('1234567', '', 'michellebanez2014@gmail.com', 'Client', '577ce3b6ae4fc593b0f6864056f7a0524e24a94663040dfe3c52aac38d5c785a12e33e9474078e261292a46cc0590e4b43d50e26bc99f0484f4f565d00700664', 'f67526a6bb7250c99473ad82df5ef55d5b2f86817e39589df0a97f27cf9d129fe70b510f29fbda9cc8de5ec76b5f5507e8329c70667af4813597058b6e8be3d1', 'cltcode007'),
('132435135132', '', 'ddtocjayao@gmail.com', 'admin', 'e382e3a887df49ba431618ca883c9808acbe9b342bed75b6c31601bad6998f1c845aa15b45a83f916290de26c4be19bdeea29594483882cb9ebd9b21af630c82', '5f707990cfd5b1ac410609be1f1e396b9374ce9975d49fb2cab062e341dfd9afe118230fca7e208d53e70affed0575d7780134c0d4f6146c484b25c837c8763b', 'cltcode008'),
('CM120890', '', 'cm.developers8@gmail.com', 'Client', '780b3ba030ce12efb6204b67d248faea4e279df62d5959bf0bb76d532d1e3e9e20b900de47a44e91e268eec1a5bcbcdf6f85a4095d7c5357fa2d47a787737fc5', 'b0baf64d71a9d4d7d343380eb4ee8a75712f671a37dba9f1a29fec344498820e89fef63afd83ae6757e1144dd39bcd0249cae779c765d01f236ba57877de7137', 'cltcode005'),
('A100', '', 'erwin@bnfdeit.com', 'Client', '595a898e93e7505aab51425b030a4a6a51d6febf713e051d163c54704a206227be5178b98e91d2b04b4b6d7543c9ef6074805aea32c4bbf58502adef43a491bc', '09220cf20626fd0e1addd5bd861d8566435ebbc6f90e062697d4da69b37f330ee9d865dc6061d53b5dd298fb811bf64a47d19862ea2330bd37ca4c79288cd6b4', 'cltcode006'),
('MB931753', '', 'atsuko08.mb@gmail.com', 'Client', '78eda9f82d29d638938522677a41ef7e730eb788abacbaf64a759083826b735da885c2a5b0cfb53c8557a14dd48c0735ae07efc637de78f55996208e7ffa31b7', '74fbd5ef1c2bbfad0827ff62acdf54404cb2d94226adf8a22162d7f93073b54ee37457d7a86ca632ab071cf25a15f876ff65799745ea388c61124667ec8c2622', 'cltcode012'),
('123456789013', '', 'testingabc@mailinator.com', 'Client', '0461672c28643c82c21cee256f6421fa36253f210ac7007d8bc43b786984aa4387d2265904c6707259f50d647cc43dfa36604d212d6895bca9dd485bb603a4da', '6b9a0838ec86e902eea520f65ce64685b04674ac76df69455a5dc0ba6c217408d85a25ebcdda8b19c4f5b72a5c9a17014b9bcf705e09e41a2845c4229ebd75fd', 'cltcode009'),
('TEST12345763', '', 'deejaytest1@mailinator.com', 'Client', '8c22432266c28af419ef9f9799435ef878b4bffc7d357a686d82bbb6be5503b46d5310c08eca6499ffa5c0e3e516eddc602b427f1d0c592bf5e752e0af430363', 'b340efcd9dab95e3a9928b230a927281664b1eff37778653563e3064586371004387f9831d29696410c49a6e40b496dcfbce62f57e19ff2f318693c9a7cf76a7', 'cltcode010'),
('TEST1234567', '', 'grabe@mailinator.com', 'Client', '1fe30e3aa5eb75f51216467e4fa5c0ae8ab91830ee3d61f9c12bda7ddd74cab4ff685c171ca045ef4a6c9a9f32090886dd0c727fb55409ca5296f2dcc7fb3d62', '7bf042349e9c5929bd8f2fdf4be1c05659fc282313513d5a8402025a3fd918a45d608279e8337e6363c181d29e7668178fd07ae76f519b766452775b311d560a', 'cltcode011'),
('564079990cdbd2015', '', 'test3@mailinator.com', '3', '9c7c0daf9757aaf0a31171e72b64403f03c345a189ea1f4c99bd84a983f4ce6cbad57d1ca5e3d51b302d287cb9f244e4bf20de09747a9abdb7989f3088c294ff', '046d55d8239bbfd1550a1a0442ff584713f4569f58cca25968b35861d59500130dff69b30fd3a70fe9f82fa8f84d4cafa478a54fb853b7c1045599d7fb3163df', '020202');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
