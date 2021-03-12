-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2021 at 02:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clgupdates`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `issueDate` date NOT NULL,
  `lastDate` date NOT NULL,
  `news` text NOT NULL,
  `votePoint` tinyint(11) NOT NULL DEFAULT 0,
  `category` tinytext NOT NULL,
  PRIMARY KEY (`newsID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `userID`, `issueDate`, `lastDate`, `news`, `votePoint`, `category`) VALUES
(1, 1, '2021-03-08', '2021-03-09', 'Aliquam mollis ut tellus eget scelerisque. Praesent nec blandit arcu. Nulla et cursus tellus. Vestibulum consequat magna vel augue porttitor consectetur. Quisque risus tortor, dapibus eget velit sed, suscipit rhoncus felis. Mauris laoreet urna nec nisi bibendum dictum. Etiam iaculis luctus arcu ac cursus', 0, 'news'),
(2, 1, '2021-03-05', '2021-03-09', 'Nulla pretium, augue nec semper condimentum, erat elit bibendum sem, sit amet hendrerit arcu orci eget turpis. In hac habitasse platea dictumst. Phasellus augue arcu, tincidunt eget diam sed, tincidunt tincidunt nisi. Cras dignissim ligula id metus eleifend, vitae fermentum felis blandit. In malesuada purus facilisis massa sagittis volutpat.', 0, 'event'),
(3, 1, '2021-03-05', '2021-03-09', 'Ut risus nunc, fringilla vel lorem a, fringilla eleifend tortor. Quisque aliquet ex dolor, id dapibus magna hendrerit eu. Sed semper in dolor at ultrices. Morbi sit amet massa ante. Duis vitae elit id risus tempor pulvinar. Fusce vel lacus vel tortor auctor luctus. Proin porta diam at tellus fringilla molestie.', 0, 'event'),
(4, 2, '2021-03-03', '2021-03-10', 'Nam efficitur eros eget metus pretium, id lobortis metus ultricies. Vivamus maximus vel risus non pharetra. Nullam non libero erat. Donec commodo vehicula imperdiet. Ut congue posuere iaculis. Aenean eu ante leo. Integer quis velit at ipsum tristique dictum. Fusce blandit malesuada lectus, non dictum justo rhoncus eu.', 1, 'news'),
(5, 2, '2021-03-18', '2021-03-19', 'Quisque in magna eget est rhoncus lobortis. Cras pretium lorem et ipsum semper, in dapibus lacus egestas. Pellentesque et nulla id erat blandit aliquam a id velit. Morbi ut convallis nunc.', 1, 'event'),
(6, 2, '2021-03-25', '2021-03-31', 'Donec facilisis vel nisi eu tristique. Praesent rhoncus tellus ipsum, eget egestas ipsum pretium vel. Vivamus accumsan ac orci at iaculis. Proin nisl eros, cursus non sagittis eget, vulputate non ante.', 0, 'news'),
(7, 3, '2021-03-24', '2021-03-26', 'Phasellus a nisl mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac mollis lectus. Praesent blandit faucibus risus sit amet feugiat. Fusce euismod sit amet ex quis scelerisque. Proin sit amet ligula in lacus ultrices viverra. Integer feugiat erat quis sapien ultricies, non scelerisque sem volutpat.', 1, 'news'),
(8, 3, '2021-03-29', '2021-03-30', 'Donec facilisis vel nisi eu tristique. Praesent rhoncus tellus ipsum, eget egestas ipsum pretium vel. Vivamus accumsan ac orci at iaculis. Proin nisl eros, cursus non sagittis eget, vulputate non ante.', 0, 'news'),
(9, 3, '2021-03-20', '2021-03-23', 'Nam elit odio, venenatis eget massa et, cursus faucibus lacus. Praesent ullamcorper nibh dui, sed mattis purus consectetur a. Vivamus et justo quis libero commodo ullamcorper. Morbi eu ex pulvinar, molestie tellus nec, aliquet ipsum.', 1, 'event');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`) VALUES
(1, 'Vikash', 'vikash@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(2, 'Noddy', 'Noddy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(3, 'Sweety', 'sweety@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `voteID` int(11) NOT NULL AUTO_INCREMENT,
  `newsID` int(11) NOT NULL,
  `voteBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`voteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
