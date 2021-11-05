-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2021 at 11:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odp`
--

-- --------------------------------------------------------

--
-- Table structure for table `controller`
--

CREATE TABLE `controller` (
  `cont_id` int(11) NOT NULL,
  `cont_name` varchar(70) NOT NULL,
  `cont_phone` varchar(14) NOT NULL,
  `cont_phone2` varchar(14) DEFAULT NULL,
  `cont_mail` varchar(50) NOT NULL,
  `cont_addr` varchar(255) NOT NULL,
  `cont_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `controller`
--

INSERT INTO `controller` (`cont_id`, `cont_name`, `cont_phone`, `cont_phone2`, `cont_mail`, `cont_addr`, `cont_img`) VALUES
(1, 'Iona Franks', '1-438-357-5822', '1-438-357-5822', 'aliquam.nisl@fermentumrisusat.org', '718-4722 Purus Rd.', NULL),
(2, 'Ivan Juarez', '(315) 659-8073', '1-815-442-7514', 'lectus.justo@lobortisauguescelerisque.org', '286-5721 Donec Street', NULL),
(4, 'Dylan Kennedy', '(635) 436-6913', '(548) 541-7834', 'diam.duis@nulla.ca', '992-2786 Vulputate St.', NULL),
(5, 'Fatima Byrd', '(548) 541-7834', '1-438-357-5822', 'a.magna@sedpede.edu', '7132 Fringilla St.', NULL),
(7, 'Kai Kerr', '08 65 12 93 33', '07 60 47 58 08', 'ut.pellentesque@consequatenim.edu', 'Ap #627-2870 Euismod Ave', NULL),
(8, 'Plato Mayo', '01 61 45 61 96', '06 13 66 84 50', 'tincidunt@acmattissemper.net', '262-2846 Lacus. Ave', NULL),
(9, 'Paul Anthony', '04 83 57 38 42', '02 34 85 37 25', 'vestibulum@accumsaninterdum.org', '104-7132 Cras St.', NULL),
(10, 'Castor Garcia', '07 18 81 84 38', '03 21 05 74 31', 'amet.ultricies@tempusnon.co.uk', '825-6615 Pede. Av.', NULL),
(11, 'Zachery Morgan', '07 11 18 46 87', '07 01 65 20 47', 'cras@sedmalesuada.co.uk', '4312 Molestie Rd.', NULL),
(12, 'Josephine Webster', '06 18 90 27 66', '05 62 97 43 51', 'vestibulum.lorem@dictummagna.co.uk', 'P.O. Box 763, 9756 A Road', NULL),
(13, 'Price Slater', '08 26 20 25 21', '04 84 06 52 37', 'dictum.placerat@vulputate.com', '411 Lectus, Avenue', NULL),
(14, 'Dahlia Torres', '01 89 25 48 68', '01 53 08 13 55', 'sit@ametornare.com', '486-2777 Ante Avenue', NULL),
(15, 'Talon Wooten', '06 64 07 18 71', '06 10 51 28 17', 'ornare.lectus@volutpatnulla.ca', '3229 Urna. St.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rkey` char(64) NOT NULL,
  `time` int(11) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

CREATE TABLE `intervention` (
  `inter_id` int(11) NOT NULL,
  `panne` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `diagnostic` text DEFAULT NULL,
  `solution` varchar(255) DEFAULT NULL,
  `statut` varchar(12) NOT NULL DEFAULT 'Recues',
  `priorite` varchar(15) NOT NULL DEFAULT 'moyen',
  `user_id` int(11) NOT NULL,
  `info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intervention`
--

INSERT INTO `intervention` (`inter_id`, `panne`, `description`, `diagnostic`, `solution`, `statut`, `priorite`, `user_id`, `info_id`) VALUES
(1, 'Ordianteur', 'js', NULL, '', 'En cours', 'Moyen', 2, 4),
(2, 'Imprimante', 'Test', NULL, '', 'En cours', 'Moyen', 2, 6),
(3, 'Internet', 'internet deconne', NULL, '', 'En cours', 'Faible', 2, 1),
(4, 'Internet', 'internet deconne', NULL, '', '', 'normal', 2, NULL),
(5, 'Internet', 'Kjd', NULL, '', '', 'normal', 2, NULL),
(6, 'Ordianteur', 's', NULL, '', '', 'normal', 2, NULL),
(7, 'Imprimante', 'test', NULL, '', '', 'normal', 2, NULL),
(8, 'Ordianteur', '', NULL, '', '', 'normal', 2, NULL),
(9, 'Ordianteur', 'jk', NULL, '', '', 'normal', 2, NULL),
(10, 'Ordianteur', '', NULL, '', '', 'normal', 2, NULL),
(11, 'Ordinateur', 'sh', NULL, '', '', 'normal', 2, NULL),
(12, 'Ordinateur', 'oi', NULL, '', 'En cours', 'Elevé', 2, 1),
(13, 'Internet', 'test', NULL, '', '', 'normal', 2, 3),
(14, 'Ordinateur', 'yt', NULL, '', 'En cours', 'Elevé', 2, 4),
(15, 'Autres', 'prob', NULL, '', 'En cours', 'normal', 2, 1),
(16, 'Imprimante', 'Imprimante ne s&#39;allume pas', NULL, NULL, 'En cours', 'Elevé', 5, 6),
(17, 'Internet', 'Connexion ne passe plus', NULL, NULL, 'Recues', 'moyen', 5, NULL),
(18, 'Autres', 'xwcwC', NULL, NULL, 'En cours', 'Moyen', 5, 3),
(19, 'Internet', 'Problème de connexion', 'Cable non branché', 'cable branché', 'Resolue', 'Elevé', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `odp`
--

CREATE TABLE `odp` (
  `odp_id` int(11) NOT NULL,
  `reference` varchar(12) NOT NULL,
  `annee` varchar(5) NOT NULL,
  `jour` varchar(11) NOT NULL,
  `longu` int(4) NOT NULL,
  `larg` int(4) NOT NULL,
  `sup` int(6) NOT NULL,
  `indic` int(11) NOT NULL,
  `reste` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `obs` text DEFAULT NULL,
  `secteur` varchar(50) NOT NULL,
  `localisation` text NOT NULL,
  `trader_id` varchar(255) NOT NULL,
  `cont_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `odp`
--

INSERT INTO `odp` (`odp_id`, `reference`, `annee`, `jour`, `longu`, `larg`, `sup`, `indic`, `reste`, `total`, `obs`, `secteur`, `localisation`, `trader_id`, `cont_id`) VALUES
(1, 'Ref', '2021', '34', 2, 4, 8, 65, 68, 98, 'ras', '4', 'Lycee 3', '11', '7'),
(3, 'Ref1', '2021', '34', 2, 4, 8, 65, 68, 98, 'ras', '4', 'Lycee Eyemon', '20', '7'),
(4, 'Ref1', '2021', '34', 2, 4, 8, 65, 68, 98, 'ras', '4', 'Lycee 1', '12', '15'),
(5, 'Ref1', '2021', '34', 2, 4, 8, 65, 68, 98, 'ras', '4', 'Lycee', '12', '5'),
(28, 'Ref', '2021', '2', 2, 2, 4, 73, 9, 667, '', '6', 'hopital', '12', '9');

-- --------------------------------------------------------

--
-- Table structure for table `rememberme`
--

CREATE TABLE `rememberme` (
  `id` int(11) NOT NULL,
  `authentificator1` char(12) NOT NULL,
  `f2authentificator` char(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trader`
--

CREATE TABLE `trader` (
  `trader_id` int(11) NOT NULL,
  `trader_name` varchar(255) NOT NULL,
  `trader_phone` varchar(14) NOT NULL,
  `trader_phone2` varchar(14) DEFAULT NULL,
  `trader_mail` varchar(50) DEFAULT NULL,
  `trader_addr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `trader_company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trader`
--

INSERT INTO `trader` (`trader_id`, `trader_name`, `trader_phone`, `trader_phone2`, `trader_mail`, `trader_addr`, `trader_company`) VALUES
(1, 'Konte Cheick Oumar', '0709786567', '0578986545', 'cheickoumarkonte@gmail.com', 'Adahou Maquis Bleu - derriere l&#39;hopital general', 'Konte & Frere Compagnie'),
(10, 'Jerry Gardner', '1-406-908-6414', '65795', 'magnis.dis@eu.org', 'Ap #805-2199 Interdum Road', 'TZQD'),
(11, 'Robin Doyle', '1-915-714-5711', NULL, 'pede.nec@musproinvel.ca', '6204 Posuere Street', NULL),
(12, 'Stuart Harding', '1-923-484-8498', NULL, 'fermentum.convallis@congueelitsed.net', '118-3372 Cras Av.', NULL),
(13, 'Jarrod Monroe', '1-721-480-7721', NULL, 'lorem@diam.org', 'Ap #370-1032 Sapien Street', NULL),
(14, 'Brock Stephens', '1-896-417-6655', '1233', 'molestie.sed.id@famesacturpis.net', 'Ap #388-2922 Non Avenue1', 'Tes'),
(15, 'Todd Boone', '1-315-286-4428', NULL, 'mollis.phasellus@tellus.net', '961-2270 Nibh. Avenue', NULL),
(18, 'Chava Whitfield', '1-284-427-8284', NULL, 'dolor.quam@diam.com', '978-2118 Egestas Street', NULL),
(19, 'Yardley Hayes', '1-446-641-2415', NULL, 'feugiat.non.lobortis@iderat.ca', 'Ap #696-5079 Et St.', NULL),
(20, 'test2', '934', '87', 'test2@fls.ks', 'test21', 'test234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `service` varchar(250) NOT NULL,
  `poste` varchar(250) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `service`, `poste`, `phone`, `role`) VALUES
(1, 'info1', 'test@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '', 'admin'),
(2, 'User', 'user@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'User', '0100220022', 'user'),
(3, 'info2', 'test1@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '0932', 'admin'),
(4, 'info3', 'test2@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '93993', 'admin'),
(5, 'User2', 'user2@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '0902', 'user'),
(6, 'info4', 'test4@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '8976', 'admin'),
(7, 'Test5', 'test5@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '8976', 'user'),
(8, 'Test6', 'test6@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '767', 'user'),
(9, 'test7', 'test7@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '0976', 'user'),
(10, 'test8', 'test8@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '99930', 'user'),
(11, 'test9', 'test9@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Secrétaire General', 'test', '288399', 'user'),
(12, 'Admin', 'admin@odp.com', '6b9418c1aeec9dbbfa2cd97d2d04961c', 'Service Financier', 'Informaticien', '00-00-00-00-00', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controller`
--
ALTER TABLE `controller`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`inter_id`);

--
-- Indexes for table `odp`
--
ALTER TABLE `odp`
  ADD PRIMARY KEY (`odp_id`);

--
-- Indexes for table `rememberme`
--
ALTER TABLE `rememberme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trader`
--
ALTER TABLE `trader`
  ADD PRIMARY KEY (`trader_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `controller`
--
ALTER TABLE `controller`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `inter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `odp`
--
ALTER TABLE `odp`
  MODIFY `odp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rememberme`
--
ALTER TABLE `rememberme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trader`
--
ALTER TABLE `trader`
  MODIFY `trader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
