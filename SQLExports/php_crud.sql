-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2023 at 04:20 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

DROP TABLE IF EXISTS `cakes`;
CREATE TABLE IF NOT EXISTS `cakes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flavor` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `cooktime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `name`, `flavor`, `price`, `cooktime`) VALUES
(14, 'Sugar Cake', 'Vanilla and crushed sugar cookies', 45.99, 45),
(8, 'Green Eggs and Ham cake', 'Pistachios and Vanilla', 15.99, 45),
(9, 'Spam Cake', 'Spam and chocolate', 59.99, 50),
(10, 'Cookies and Cream Ice Cream Cake', 'Crushed Oreos and vanilla ice cream', 30.99, 30),
(11, 'Chocolate Sour Cream Cake', 'Sour cream, whipped cream, and chocolate', 49.99, 60),
(12, 'Angel Cake', 'Vanilla', 30.99, 40),
(13, 'Squeallin Cake', 'Bacon and nutmeg', 20.99, 60);

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

DROP TABLE IF EXISTS `cookies`;
CREATE TABLE IF NOT EXISTS `cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flavor` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `cooktime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cookies`
--

INSERT INTO `cookies` (`id`, `name`, `flavor`, `price`, `cooktime`) VALUES
(1, 'Lemon Cookies', 'Lemon', 5.99, 50),
(2, 'Bluegrass', 'Blueberries and mint', 6.99, 15),
(3, 'Sugar Cookies', 'Vanila coated in sugar', 6.99, 13),
(4, 'Pecan Molasses Crinkles', 'Molasse & pecans', 4.99, 20),
(5, 'Breakfast Cookie', 'Bacon and cheesecake', 5.99, 30),
(6, 'Pancake Cookie', 'Maple, chocolate chips, and blueberries', 6.99, 20),
(7, 'Ginger Tree Cookie', 'Gingerbread', 3.99, 16);

-- --------------------------------------------------------

--
-- Table structure for table `cupcakes`
--

DROP TABLE IF EXISTS `cupcakes`;
CREATE TABLE IF NOT EXISTS `cupcakes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flavor` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `cooktime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cupcakes`
--

INSERT INTO `cupcakes` (`id`, `name`, `flavor`, `price`, `cooktime`) VALUES
(1, 'Oreo Bomb', 'Chocolate with oreo stuffing in the middle', 6.99, 20),
(2, 'Winter Wonderland', 'Mint and chocolate', 6.99, 15),
(3, 'Spring Sugar', 'Vanilla with pastel sprinkles', 5.99, 13),
(4, 'Snickerdoodle Cupcakes', 'Cinnamon & sugar topping, with buttercream filling', 3.99, 15),
(5, 'Suprise Cupcakes', 'Vanilla with caramel bacon center', 6.99, 25),
(6, 'Sweet and Salty Cupcakes', 'Chocolate with caramel and pretzels', 4.99, 15),
(7, 'Sparking Red Velvet', 'Chocolate with cherry pop rocks', 4.99, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
