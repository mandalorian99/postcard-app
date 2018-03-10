-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 04:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `postcard_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `pc_confirmation`
--

CREATE TABLE IF NOT EXISTS `pc_confirmation` (
  `email_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` char(32) NOT NULL,
  `to_email` varchar(100) NOT NULL,
  `to_name` varchar(50) NOT NULL,
  `from_name` varchar(50) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `postcard` varchar(255) NOT NULL,
  `message` text,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pc_confirmation`
--

INSERT INTO `pc_confirmation` (`email_id`, `token`, `to_email`, `to_name`, `from_name`, `from_email`, `subject`, `postcard`, `message`) VALUES
(1, 'bf618ea4e2046d3f1af3ffce9eb40aca', 'priyankarajawat98@gmail.com', 'pari', 'mahendra choudhary', 'mahenrachoudhary1156@gmail.com', 'I am stuck yaaar ', 'postcard_pic/img6.jpg', 'My dear pari \r\n\r\nhope you are well \r\n\r\nDestroying earth is not the same without you here to feast with me .\r\n\r\ndid little treeba get her first yet ? i know how much she been looking forward to that \r\n\r\ngive my best to the little shugs .\r\n\r\nlove \r\nmahendra                '),
(2, 'c73897c2952a16897e1f48cfc6f37f89', 'priyankarajawat98@gmail.com', 'pari', 'mahendra choudhary', 'mahenrachoudhary1156@gmail.com', 'I am stuck yaaar ', 'postcard_pic/img6.jpg', 'My dear pari \r\n\r\nhope you are well \r\n\r\nDestroying earth is not the same without you here to feast with me .\r\n\r\ndid little treeba get her first yet ? i know how much she been looking forward to that \r\n\r\ngive my best to the little shugs .\r\n\r\nlove \r\nmahendra                '),
(3, '3f843c487f97634e03f871ce49ee63ed', 'wolf@gmail.co', 'wolf', 'fox', 'fox@gmail.com', 'heya ', 'postcard_pic/img6.jpg', 'fooo'),
(4, 'd9186eaba13d8f039d04631711bd227f', 'wofla@gmail.com', 'wolfofstreet', 'fox11', 'fox@gmail.com', 'ssss', 'postcard_pic/img4.jpg', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `pc_image`
--

CREATE TABLE IF NOT EXISTS `pc_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) NOT NULL DEFAULT ' ',
  `description` varchar(255) NOT NULL DEFAULT ' ',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pc_image`
--

INSERT INTO `pc_image` (`image_id`, `image_url`, `description`) VALUES
(1, 'postcard_pic/img1.jpg', 'you are in dream'),
(2, 'postcard_pic/img2.jpg', 'congralutaion'),
(3, 'postcard_pic/img3.jpg', 'we met again'),
(4, 'postcard_pic/img4.jpg', 'love you so much'),
(5, 'postcard_pic/img5.jpg', 'Happy new year'),
(6, 'postcard_pic/img6.jpg', 'merry chrismas'),
(7, 'postcard_pic/img7.jpg', 'happy holi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
