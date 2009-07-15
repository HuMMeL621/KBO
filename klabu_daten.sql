-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 15. Juli 2009 um 11:07
-- Server Version: 5.0.67
-- PHP-Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `klabu`
--

--
-- Daten für Tabelle `anwesenheit`
--

INSERT INTO `anwesenheit` (`anwesenheit_id`, `schueler_id`, `datum`, `klasse_id`, `verspaetung`, `unterrichtsstunde_id`, `status`) VALUES(1, 1, '2009-07-09', 3, '00:00:00', 1, 'A');

--
-- Daten für Tabelle `eintragungen`
--

INSERT INTO `eintragungen` (`eintragungen_id`, `datum`, `klasse_id`, `fach_id`, `block_nr`, `lehrer_id`, `inhalt`, `hausaufgaben`, `signature_id`) VALUES(1, '2009-06-03', 4, 1, 1, 1, '', '', 0);
INSERT INTO `eintragungen` (`eintragungen_id`, `datum`, `klasse_id`, `fach_id`, `block_nr`, `lehrer_id`, `inhalt`, `hausaufgaben`, `signature_id`) VALUES(2, '2009-10-03', 6, 2, 3, 2, '', '', 0);
INSERT INTO `eintragungen` (`eintragungen_id`, `datum`, `klasse_id`, `fach_id`, `block_nr`, `lehrer_id`, `inhalt`, `hausaufgaben`, `signature_id`) VALUES(3, '2009-04-11', 8, 6, 3, 2, '', '', 0);
INSERT INTO `eintragungen` (`eintragungen_id`, `datum`, `klasse_id`, `fach_id`, `block_nr`, `lehrer_id`, `inhalt`, `hausaufgaben`, `signature_id`) VALUES(4, '2009-07-08', 5, 1, 3, 4, '', '', 0);
INSERT INTO `eintragungen` (`eintragungen_id`, `datum`, `klasse_id`, `fach_id`, `block_nr`, `lehrer_id`, `inhalt`, `hausaufgaben`, `signature_id`) VALUES(5, '2009-07-02', 2, 6, 4, 5, '', '', 0);

--
-- Daten für Tabelle `fach`
--

INSERT INTO `fach` (`fach_id`, `name`, `aktiv`) VALUES(1, 'Deutsch', 'TRUE');
INSERT INTO `fach` (`fach_id`, `name`, `aktiv`) VALUES(2, 'Mathe', 'TRUE');
INSERT INTO `fach` (`fach_id`, `name`, `aktiv`) VALUES(3, 'Programmieren', 'TRUE');
INSERT INTO `fach` (`fach_id`, `name`, `aktiv`) VALUES(4, 'Sport', 'TRUE');
INSERT INTO `fach` (`fach_id`, `name`, `aktiv`) VALUES(5, 'AWL', 'TRUE');
INSERT INTO `fach` (`fach_id`, `name`, `aktiv`) VALUES(6, 'Englisch', 'TRUE');

--
-- Daten für Tabelle `klasse`
--

INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(1, 'BIT06', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(2, 'BIT07', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(3, 'BIT08', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(4, 'HOG06', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(5, 'HOG07', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(6, 'HOG08', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(7, 'KOS06', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(8, 'KOS07', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(9, 'KOS08', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(10, 'BLA06', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(11, 'BLA07', 'TRUE');
INSERT INTO `klasse` (`klasse_id`, `name`, `aktiv`) VALUES(12, 'BLA08', 'TRUE');

--
-- Daten für Tabelle `lehrer`
--

INSERT INTO `lehrer` (`lehrer_id`, `user_id`, `vorname`, `nachname`, `level`, `aktiv`) VALUES(1, 0, 'Vivian', 'Uibel', 0, 'TRUE');
INSERT INTO `lehrer` (`lehrer_id`, `user_id`, `vorname`, `nachname`, `level`, `aktiv`) VALUES(2, 0, 'Stefan', 'Voigt', 1, 'TRUE');
INSERT INTO `lehrer` (`lehrer_id`, `user_id`, `vorname`, `nachname`, `level`, `aktiv`) VALUES(3, 0, 'Rolf', 'Haeckel', 0, 'TRUE');
INSERT INTO `lehrer` (`lehrer_id`, `user_id`, `vorname`, `nachname`, `level`, `aktiv`) VALUES(4, 0, 'Brita', 'Lehmann', 1, 'TRUE');
INSERT INTO `lehrer` (`lehrer_id`, `user_id`, `vorname`, `nachname`, `level`, `aktiv`) VALUES(5, 0, 'Anne', 'Jappel', 1, 'TRUE');
INSERT INTO `lehrer` (`lehrer_id`, `user_id`, `vorname`, `nachname`, `level`, `aktiv`) VALUES(0, 0, 'NULL', 'NULL', 0, 'TRUE');

--
-- Daten für Tabelle `lehrer_2_klasse`
--

INSERT INTO `lehrer_2_klasse` (`lehrer_id`, `klasse_id`) VALUES(1, 1);
INSERT INTO `lehrer_2_klasse` (`lehrer_id`, `klasse_id`) VALUES(1, 2);

--
-- Daten für Tabelle `noten`
--

INSERT INTO `noten` (`schueler_id`, `fach_id`, `typ`, `datum`, `lehrer_id`, `klasse_id`, `note`, `note_id`, `unterrichtsstunde_id`) VALUES(3, 3, 'K', '2009-07-09', 3, 3, 2, 3, 0);
INSERT INTO `noten` (`schueler_id`, `fach_id`, `typ`, `datum`, `lehrer_id`, `klasse_id`, `note`, `note_id`, `unterrichtsstunde_id`) VALUES(3, 3, 'M', '2009-07-09', 3, 3, 3, 2, 0);
INSERT INTO `noten` (`schueler_id`, `fach_id`, `typ`, `datum`, `lehrer_id`, `klasse_id`, `note`, `note_id`, `unterrichtsstunde_id`) VALUES(1, 3, 'T', '2009-07-09', 3, 2, 1, 4, 0);

--
-- Daten für Tabelle `raum`
--

INSERT INTO `raum` (`raum_id`, `name`) VALUES(3, '1.19');
INSERT INTO `raum` (`raum_id`, `name`) VALUES(9, '0.13');
INSERT INTO `raum` (`raum_id`, `name`) VALUES(8, '2.13');
INSERT INTO `raum` (`raum_id`, `name`) VALUES(7, '0.12');
INSERT INTO `raum` (`raum_id`, `name`) VALUES(6, '0.11');
INSERT INTO `raum` (`raum_id`, `name`) VALUES(11, '1.18');

--
-- Daten für Tabelle `schueler`
--

INSERT INTO `schueler` (`schueler_id`, `user_id`, `vorname`, `nachname`, `klasse_id`, `aktiv`) VALUES(1, 1, 'Peter', 'Pan', 3, 'TRUE');

--
-- Daten für Tabelle `unterrichtsstunde`
--

INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES(1, '2009-07-01', 3, 1, 0, 3, 3, 2, 0, 0);
INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES(2, '2009-07-01', 3, 1, 0, 3, 2, 3, 0, 0);
INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES(3, '2009-07-01', 3, 1, 0, 3, 1, 4, 0, 0);
INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES(4, '2009-07-02', 6, 2, 0, 3, 4, 1, 0, 0);
INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES(5, '2009-07-02', 6, 1, 0, 3, 4, 2, 0, 0);
INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES(6, '2009-07-02', 3, 5, 0, 3, 5, 3, 0, 0);
INSERT INTO `unterrichtsstunde` (`unterrichtsstunde_id`, `datum`, `raum_id`, `lehrer_id`, `vertretung_id`, `klasse_id`, `fach_id`, `block_id`, `fbl_id`, `abgezeichnet_id`) VALUES(7, '2009-07-03', 3, 3, 0, 5, 6, 1, 0, 0);

--
-- Daten für Tabelle `user`
--


--
-- Daten für Tabelle `zeiten`
--

INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(1, '08:00:00', '09:30:00');
INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(2, '09:45:00', '11:15:00');
INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(3, '11:30:00', '13:00:00');
INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(4, '13:30:00', '15:00:00');
INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(5, '15:15:00', '16:45:00');
INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(6, '17:00:00', '18:30:00');
INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(7, '18:45:00', '20:15:00');
INSERT INTO `zeiten` (`block_id`, `von`, `bis`) VALUES(8, '20:30:00', '22:00:00');
