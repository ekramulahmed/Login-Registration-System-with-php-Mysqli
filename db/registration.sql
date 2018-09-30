-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 06:00 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `image`, `date`) VALUES
(1, 'Ahmed', 'Sagor', 'simplysagor@gmail.com', '8920778ss', 'IMG_20160928_191931.jpg', ''),
(2, 'Zenifar', 'Lopez', 'zenifar@gmail.com', '111222333', 'small.jpg', ''),
(3, 'SEA', 'beach', 'sea@gmail.com', '000111999', 'IMG_20161207_225843.jpg', ''),
(4, 'Dipti', 'Chowdhury', 'dipty@gmail.com', '1753c2d342c9c3cb28077f36287c7988', 'small.jpg', ''),
(5, 'Ahmed', 'Sagor', 'email@gmail.com', '95d19195458ab9dd7086e8b045bb69f6', '6532325055655371489152480.jpg', ''),
(6, 'Imran', 'Pada', 'patha@gmail.com', 'b78d35416d192189aee5ef82ce37db24', '4241992643153621489210678.jpg', ''),
(7, 'Sara', 'Tanjil', 'sara@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1785990543615051489211229.jpg', ''),
(8, 'Modhu', 'Rema', 'modhu@gmail.com', '90ba56cc6e059513b49d251ac6c22219', '7610853735823281489211322.jpg', ''),
(9, 'Tania', 'Sarkar', 'tania@gmail.com', '7163e7620fab5ee66afb267df9b5b928', '2228432248792611489211478.jpg', ''),
(11, 'Mehzabin', 'Chowdhury', 'meh@gmail.com', 'c6e4303288d39f69ecc5047eddb0caf2', '2514081101916871489246555.jpg', 'March 11, 2017'),
(12, 'Zara', 'Tasnim', 'zara@gmail.com', '6ccf5759c6154eaea06498a846e69a4d', '8363184635425111489249559.jpg', 'March 11, 2017'),
(13, 'Ash', 'Rai', 'rai@gmail.com', '95d19195458ab9dd7086e8b045bb69f6', '3074634350943881489249765.jpg', 'March 11, 2017'),
(14, 'Rafat', 'Ahmed', 'rafat@gmail.com', '77df1b2ab4203c698c0ffefcba0020f5', '880503799190001489305256.jpg', 'March 12, 2017'),
(15, 'Abul', 'Mal', 'mal@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '7360612219633211489334701.jpg', 'March 12, 2017'),
(16, 'Javed', 'Kawser', 'javed01@gmail.com', '4d171dfd69719c06c70224a26ce637bd', '21829299649531489397960.jpg', 'March 13, 2017'),
(17, 'Moktadir', 'Sowmick', 'sowmic@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7856576200918401490789487.jpg', 'March 29, 2017'),
(18, 'Kazi', 'Moshi', 'moshi@gmail.com', '123456789', '659213400395911502850331.jpg', 'August 16, 2017');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
