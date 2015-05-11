-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2015 at 09:05 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mtp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE IF NOT EXISTS `Transaction` (
  `TransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `TransactionUserID` int(11) NOT NULL,
  `TransactionCurrencyFrom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionCurrencyTo` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionAmountSell` decimal(10,2) NOT NULL,
  `TransactionAmountBuy` decimal(10,2) NOT NULL,
  `TransactionRate` decimal(10,5) NOT NULL,
  `TransactionTime` datetime NOT NULL,
  `TransactionOrigin` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TransactionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `Transaction`
--

INSERT INTO `Transaction` (`TransactionID`, `TransactionUserID`, `TransactionCurrencyFrom`, `TransactionCurrencyTo`, `TransactionAmountSell`, `TransactionAmountBuy`, `TransactionRate`, `TransactionTime`, `TransactionOrigin`) VALUES
(1, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(2, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'US'),
(3, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(4, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'RU'),
(5, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(6, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'BG'),
(7, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'US'),
(8, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'US'),
(9, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'CA'),
(10, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(11, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(12, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'BR'),
(13, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'BR'),
(14, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(15, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(16, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'IR'),
(17, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'IR'),
(18, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'RU'),
(19, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'RU'),
(20, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'RU'),
(21, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'RU'),
(22, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(23, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(24, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(25, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(26, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(27, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'GB'),
(28, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(29, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'CA'),
(30, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'BG'),
(31, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR'),
(32, 134256, 'EUR', 'GBP', 1000.00, 747.10, 0.74710, '2015-01-24 10:27:44', 'FR');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
