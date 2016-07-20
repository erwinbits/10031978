-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2015 at 01:42 AM
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