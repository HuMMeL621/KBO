-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2009 at 12:56 
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `klabu`
--
CREATE DATABASE `klabu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `klabu`;

-- --------------------------------------------------------

--
-- Table structure for table `anwesenheit`
--

CREATE TABLE IF NOT EXISTS `anwesenheit` (
  `anwesenheit_id` int(11) NOT NULL AUTO_INCREMENT,
  `schueler_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `verspaetung` time NOT NULL,
  `unterrichtsstunde_id` int(11) NOT NULL,
  `status` enum('V','A','E','U') NOT NULL COMMENT 'V)erspaetet A)nwesend E)ntschuldigt U)nentschuldigt',
  PRIMARY KEY (`anwesenheit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `anwesenheit`
--

INSERT INTO `anwesenheit` (`anwesenheit_id`, `schueler_id`, `datum`, `klasse_id`, `verspaetung`, `unterrichtsstunde_id`, `status`) VALUES
(1, 1, '2009-07-09', 3, '00:00:00', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `eintragungen`
--

CREATE TABLE IF NOT EXISTS `eintragungen` (
  `eintragungen_id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `fach_id` int(11) NOT NULL,
  `block_nr` int(11) NOT NULL,
  `lehrer_id` int(11) NOT NULL,
  `inhalt` varchar(45) NOT NULL,
  `hausaufgaben` varchar(45) NOT NULL,
  `signature_id` int(11) NOT NULL COMMENT 'Signatur vom eintragenden Lehrer',
  PRIMARY KEY (`eintragungen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eintragungen`
--

INSERT INTO `eintragungen` (`eintragungen_id`, `datum`, `klasse_id`, `fach_id`, `block_nr`, `lehrer_id`, `inhalt`, `hausaufgaben`, `signature_id`) VALUES
(1, '2009-06-03', 4, 1, 1, 1, '', '', 0),
(2, '2009-10-03', 6, 2, 3, 2, '', '', 0),
(3, '2009-04-11', 8, 6, 3, 2, '', '', 0),
(4, '2009-07-08', 5, 1, 3, 4, '', '', 0),
(5, '2009-07-02', 2, 6, 4, 5, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fach`
--

CREATE TABLE IF NOT EXISTS `fach` (
  `fach_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `aktiv` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`fach_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fach`
--

INSERT INTO `fach` (`fach_id`, `name`, `aktiv`) VALUES
(1, 'Deutsch', 'TRUE'),
(2, 'Mathe', 'TRUE'),
(3, 'Programmieren', 'TRUE'),
(4, 'Sport', 'TRUE'),
(5, 'AWL', 'TRUE'),
(6, 'Englisch', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `klasse`
--

CREATE TABLE IF NOT EXISTS `klasse` (
  `klasse_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5) CHARACTER SET utf8 NOT NULL,
  `aktiv` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`klasse_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `klasse`
--

INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES
(1, 'BIT06', 'TRUE'),
(2, 'BIT07', 'TRUE'),
(3, 'BIT08', 'TRUE'),
(4, 'HOG06', 'TRUE'),
(5, 'HOG07', 'TRUE'),
(6, 'HOG08', 'TRUE'),
(7, 'KOS06', 'TRUE'),
(8, 'KOS07', 'TRUE'),
(9, 'KOS08', 'TRUE'),
(10, 'BLA06', 'TRUE'),
(11, 'BLA07', 'TRUE'),
(12, 'BLA08', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `lehrer`
--

CREATE TABLE IF NOT EXISTS `lehrer` (
  `lehrer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL,
  `level` int(11) NOT NULL COMMENT '0) Lehrer 1)FBL',
  `aktiv` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`lehrer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lehrer`
--

INSERT INTO `lehrer` (`lehrer_id`, `user_id`, `vorname`, `nachname`, `level`, `aktiv`) VALUES
(1, 0, 'Vivian', 'Uibel', 0, 'TRUE'),
(2, 0, 'Stefan', 'Voigt', 1, 'TRUE'),
(3, 0, 'Rolf', 'Haeckel', 0, 'TRUE'),
(4, 0, 'Brita', 'Lehmann', 1, 'TRUE'),
(5, 0, 'Anne', 'Jappel', 1, 'TRUE'),
(0, 0, 'NULL', 'NULL', 0, 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `lehrer_2_klasse`
--

CREATE TABLE IF NOT EXISTS `lehrer_2_klasse` (
  `lehrer_id` int(11) NOT NULL,
  `klasse_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lehrer_2_klasse`
--

INSERT INTO `lehrer_2_klasse` (`lehrer_id`, `klasse_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `noten`
--

CREATE TABLE IF NOT EXISTS `noten` (
  `schueler_id` int(11) NOT NULL,
  `fach_id` int(11) NOT NULL,
  `typ` enum('K','T','M','H') NOT NULL COMMENT 'K)lassenarbeit T)est M)uendlich H)ausaufgaben',
  `datum` date NOT NULL,
  `lehrer_id` int(11) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `note` int(11) NOT NULL COMMENT 'punktesystem',
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `noten`
--

INSERT INTO `noten` (`schueler_id`, `fach_id`, `typ`, `datum`, `lehrer_id`, `klasse_id`, `note`, `note_id`) VALUES
(3, 3, 'K', '2009-07-09', 3, 3, 2, 3),
(3, 3, 'M', '2009-07-09', 3, 3, 3, 2),
(1, 3, 'T', '2009-07-09', 3, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `raum`
--

CREATE TABLE IF NOT EXISTS `raum` (
  `raum_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`raum_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `raum`
--

INSERT INTO `raum` (`raum_id`, `name`) VALUES
(3, '1.19'),
(9, '0.13'),
(8, '2.13'),
(7, '0.12'),
(6, '0.11'),
(11, '1.18');

-- --------------------------------------------------------

--
-- Table structure for table `schueler`
--

CREATE TABLE IF NOT EXISTS `schueler` (
  `schueler_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `aktiv` enum('TRUE','FALSE') NOT NULL,
  PRIMARY KEY (`schueler_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schueler`
--

INSERT INTO `schueler` (`schueler_id`, `user_id`, `vorname`, `nachname`, `klasse_id`, `aktiv`) VALUES
(1, 1, 'Peter', 'Pan', 3, 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `unterrichtsstunde`
--

CREATE TABLE IF NOT EXISTS `unterrichtsstunde` (
  `unterrichtsstunde_id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `raum_id` int(11) NOT NULL,
  `lehrer_id` int(11) NOT NULL,
  `vertretung_id` int(11) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `fach_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `fbl_id` int(11) NOT NULL COMMENT '0)unlocked 1)Locked',
  `abgezeichnet_id` int(11) NOT NULL,
  PRIMARY KEY (`unterrichtsstunde_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `unterrichtsstunde`
--

INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES
(1, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 0),
(2, '2009-07-01', 3, 1, 0, 3, 2, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL COMMENT 'Login-Name',
  `passwd` varchar(45) NOT NULL COMMENT 'Password',
  `typ` enum('schueler','lehrer','fbl','admin') NOT NULL,
  `aktiv` enum('TRUE','FALSE') NOT NULL,
  `email` varchar(45) NOT NULL,
  `geburtstag` date NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--


-- --------------------------------------------------------

--
-- Table structure for table `zeiten`
--

CREATE TABLE IF NOT EXISTS `zeiten` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `von` time NOT NULL,
  `bis` time NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `zeiten`
--

INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES
(1, '08:00:00', '09:30:00'),
(2, '09:45:00', '11:15:00'),
(3, '11:30:00', '13:00:00'),
(4, '13:30:00', '15:00:00'),
(5, '15:15:00', '16:45:00'),
(6, '17:00:00', '18:30:00'),
(7, '18:45:00', '20:15:00'),
(8, '20:30:00', '22:00:00');
