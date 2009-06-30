-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2009 at 12:53 
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
  `schueler_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `verspaetung` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anwesenheit`
--


-- --------------------------------------------------------

--
-- Table structure for table `eintragungen`
--

CREATE TABLE IF NOT EXISTS `eintragungen` (
  `datum` date NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `fach_id` int(11) NOT NULL,
  `block_nr` int(11) NOT NULL,
  `lehrer_id` int(11) NOT NULL,
  `inhalt` varchar(45) NOT NULL,
  `hausaufgaben` varchar(45) NOT NULL,
  `signature_id` int(11) NOT NULL COMMENT 'Signatur vom eintragenden Lehrer',
  PRIMARY KEY (`datum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eintragungen`
--


-- --------------------------------------------------------

--
-- Table structure for table `fach`
--

CREATE TABLE IF NOT EXISTS `fach` (
  `fach_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`fach_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fach`
--

INSERT INTO `fach` (`fach_id`, `name`) VALUES
(1, 'Deutsch'),
(2, 'Mathe'),
(3, 'Programmieren'),
(4, 'Sport'),
(5, 'AWL'),
(6, 'Englisch');

-- --------------------------------------------------------

--
-- Table structure for table `klasse`
--

CREATE TABLE IF NOT EXISTS `klasse` (
  `klasse_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`klasse_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `klasse`
--

INSERT INTO `klasse` (`klasse_id`, `name`) VALUES
(1, 'BIT06'),
(2, 'BIT07'),
(3, 'BIT08'),
(4, 'HOG06'),
(5, 'HOG07'),
(6, 'HOG08'),
(7, 'KOS06'),
(8, 'KOS07'),
(9, 'KOS08'),
(10, 'BLA06'),
(11, 'BLA07'),
(12, 'BLA08');

-- --------------------------------------------------------

--
-- Table structure for table `lehrer`
--

CREATE TABLE IF NOT EXISTS `lehrer` (
  `lehrer_id` int(11) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`lehrer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lehrer`
--

INSERT INTO `lehrer` (`lehrer_id`, `vorname`, `nachname`, `level`) VALUES
(1, 'Vivian', 'Uibel', 1);

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
  `typ` varchar(45) NOT NULL,
  `datum` date NOT NULL,
  `lehrer_id` int(11) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `note` int(11) NOT NULL COMMENT 'punktesystem',
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `noten`
--

INSERT INTO `noten` (`schueler_id`, `fach_id`, `typ`, `datum`, `lehrer_id`, `klasse_id`, `note`, `note_id`) VALUES
(0, 0, '', '0000-00-00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `raume`
--

CREATE TABLE IF NOT EXISTS `raume` (
  `raum_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`raum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `raume`
--


-- --------------------------------------------------------

--
-- Table structure for table `schueler`
--

CREATE TABLE IF NOT EXISTS `schueler` (
  `schueler_id` int(11) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(45) NOT NULL,
  `nachname` varchar(45) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `passwd` varchar(45) NOT NULL,
  PRIMARY KEY (`schueler_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `schueler`
--


-- --------------------------------------------------------

--
-- Table structure for table `wochenplan`
--

CREATE TABLE IF NOT EXISTS `wochenplan` (
  `datum` date NOT NULL,
  `raum_id` int(11) NOT NULL,
  `lehrer_id` int(11) NOT NULL,
  `vertretung_id` int(11) NOT NULL,
  `klasse_id` int(11) NOT NULL,
  `fach_id` int(11) NOT NULL,
  `block_nr` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wochenplan`
--


-- --------------------------------------------------------

--
-- Table structure for table `zeiten`
--

CREATE TABLE IF NOT EXISTS `zeiten` (
  `block_nr` int(11) NOT NULL AUTO_INCREMENT,
  `von` time NOT NULL,
  `bis` time NOT NULL,
  PRIMARY KEY (`block_nr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `zeiten`
--

INSERT INTO `zeiten` (`block_nr`, `von`, `bis`) VALUES
(1, '08:00:00', '09:30:00'),
(2, '09:45:00', '11:15:00'),
(3, '11:30:00', '13:00:00'),
(4, '13:30:00', '15:00:00'),
(5, '15:15:00', '16:45:00'),
(6, '17:00:00', '18:30:00'),
(7, '18:45:00', '20:15:00'),
(8, '20:30:00', '22:00:00');
