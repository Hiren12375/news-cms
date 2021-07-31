-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2021 at 05:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Entertainment', 4),
(2, 'Family', 3),
(3, 'Health', 0),
(4, 'Politics', 0),
(5, 'Business', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(11, 'Good Morrning', 'Have A Nice Day', '1', '11 03,2021', 8, 'img5.jpg'),
(3, 'Daily ', '    Heath.... Checking                                ', '1', '07 03,2021', 9, ''),
(9, 'Google Hack', 'To Day ...', '5', '08 03,2021', 8, 'hack.jpg'),
(5, 'News Daily', '                    SunDay   news                                  ', '1', '07 03,2021', 9, ''),
(6, 'News Daily', 'Ahmedabad  ', '2', '07 03,2021', 9, 'img9.jpeg'),
(8, 'to day post', 'FFdgfhgfgsdcg   ..... ', '1', '08 03,2021', 9, 'unnamed.png'),
(10, 'Corona', 'Ahmedabad ', '1', '08 03,2021', 3, 'Coronavirus.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Harsha', 'Dangodara', 'Harsha dangodara', 'f5c7bf41af348de866567e62ba09784a', '1'),
(2, 'Hiren', 'Dudhat', 'Hiren  dudhat', 'abcc4d4c301d2ca9e28cbd1c1134a0bc', '1'),
(3, 'NIlesh', 'Makwana', 'Nilesh makwana', '95fc7a2528730ad1f6d60663d19d9375', '0'),
(7, 'Rutvik', 'Jasoliya', 'Rutvik', 'b227039cfad6b3bb1121741ace556787', '0'),
(8, 'kavita', 'joshi', 'kavita', '38bd642af5cc5256b92aca4c6bc35cf5', '0'),
(9, 'Hiren ', 'Dudhat', 'Hiren Dudhat', '21232f297a57a5a743894a0e4a801fc3', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
