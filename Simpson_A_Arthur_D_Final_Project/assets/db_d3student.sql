-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2016 at 03:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_d3student`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `country_id` smallint(15) unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(75) NOT NULL,
  `country_pop` smallint(75) NOT NULL,
  `country_completion` smallint(75) NOT NULL,
  `country_employment` smallint(75) NOT NULL,
  `country_edurating` varchar(75) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`, `country_pop`, `country_completion`, `country_employment`, `country_edurating`) VALUES
(1, 'Canada', 35, 54, 72, 'high'),
(2, 'USA', 321, 44, 68, 'med'),
(3, 'Ireland', 4, 41, 61, 'med'),
(4, 'UK', 64, 42, 75, 'med'),
(5, 'Mexico', 121, 19, 60, 'low'),
(6, 'Russia', 142, 55, 69, 'high'),
(7, 'Spain', 47, 35, 56, 'low');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
