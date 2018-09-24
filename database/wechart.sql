-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-09-04 02:44:57
-- 服务器版本： 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

DROP TABLE IF EXISTS `wechart`;
CREATE TABLE IF NOT EXISTS `wechart` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `users_name` varchar(255) NOT NULL,
  `user_avator` TEXT(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `publish_time` varchar(255) NOT NULL,
  `publish_adresss` varchar(255) NOT NULL,
  `url` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wechart` (`users_name`, `user_avator`,`content`,`publish_adresss`,`url`) VALUES
('锅巴','http://bpic.588ku.com/element_origin_min_pic/18/06/10/84e1d2519ab682decbbfc7c6f9349bd7.jpg','沉默年代或许不该，太遥远的相爱','学府街凯通大厦','http://bpic.588ku.com/back_pic/05/61/29/345b4822ac5d5dc.jpg!r850/fw/800;http://bpic.588ku.com/back_pic/05/64/65/365b68056a7bf4b.jpg!r850/fw/800');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

