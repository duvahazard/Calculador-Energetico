-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2012 at 11:41 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `calculador`
--

-- --------------------------------------------------------

--
-- Table structure for table `ce_cfe_consumohistorico_prueba1`
--

CREATE TABLE IF NOT EXISTS `ce_cfe_consumohistorico_prueba1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` int(11) DEFAULT NULL,
  `mes` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `consumo` int(10) DEFAULT NULL,
  `demanda` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ce_cfe_consumohistorico_prueba1`
--

INSERT INTO `ce_cfe_consumohistorico_prueba1` (`id`, `ano`, `mes`, `dia`, `consumo`, `demanda`) VALUES
(1, 2010, 2, 1, 190, NULL),
(2, 2010, 4, 1, 148, NULL),
(3, 2010, 6, 1, 158, NULL),
(5, 2010, 8, 1, 199, NULL),
(6, 2010, 10, 1, 198, NULL),
(7, 2010, 12, 1, 216, NULL),
(8, 2011, 2, 1, 231, NULL),
(9, 2011, 4, 1, 177, NULL),
(10, 2011, 6, 1, 244, NULL);
