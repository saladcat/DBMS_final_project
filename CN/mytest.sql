-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-06-23 18:27:35
-- 服务器版本： 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytest`
--

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_id_uindex` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`id`, `name`, `class`, `grade`) VALUES
(1, 'cs', 'cs1', '1'),
(2, 'ee', 'ee1', '1'),
(3, 'eecs', 'eecs', '1');

-- --------------------------------------------------------

--
-- 表的结构 `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `team_limit` int(20) NOT NULL,
  `max_team_members` int(20) NOT NULL,
  `min_team_members` int(20) NOT NULL,
  `year` int(4) NOT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `event`
--

INSERT INTO `event` (`id`, `name`, `team_limit`, `max_team_members`, `min_team_members`, `year`, `comment`, `is_delete`) VALUES
(1, 'Q2', 9999, 9999, 0, 2018, 'æ— ', 1),
(2, 'footballaa', 3, 3, 1, 2016, 'aaaa', 1),
(3, 'pingpangss', 3, 3, 1, 2015, 'sssss', 1),
(4, '123', 1, 1, 1, 2, 'sad', 1),
(5, 'AA', 2, 5, 3, 1, '4', 1),
(6, 'AA', 2, 5, 3, 1, '4', 1),
(7, 'QQ', 2, 4, 3, 1, '5', 1),
(8, 'Q', 2, 4, 3, 1, 'sjkaldlkasjskdl', 0),
(9, 'empty', 9999, 9999, 0, 2018, 'æ— ', 0),
(10, 'QQ', 115, 88, 123, 123, 'XXX', 0),
(11, 'qq', 123, 123123, 123, 123, '123', 0),
(12, 'ss', 2, 4, 3, 1, '5', 0),
(13, 'A', 5, 9, 78, 12, '8', 0);

-- --------------------------------------------------------

--
-- 表的结构 `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id` int(20) NOT NULL,
  `event_id` int(20) NOT NULL,
  `team_id` int(20) NOT NULL,
  `match_order` int(20) NOT NULL,
  `score` int(20) NOT NULL,
  `is_valid` int(1) NOT NULL,
  `datetime` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `match_event_id_uindex` (`id`),
  KEY `match_event_event_id_fk` (`event_id`),
  KEY `match_event_team_team_id_fk` (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `match`
--

INSERT INTO `match` (`id`, `event_id`, `team_id`, `match_order`, `score`, `is_valid`, `datetime`) VALUES
(1, 1, 1, 1, 40, 1, '2018-04-13 06:06:55.546000'),
(2, 2, 2, 2, 50, 1, '2018-04-13 07:02:29.414000'),
(3, 3, 3, 3, 60, 1, '2018-04-13 07:02:43.212000');

-- --------------------------------------------------------

--
-- 表的结构 `register_student`
--

DROP TABLE IF EXISTS `register_student`;
CREATE TABLE IF NOT EXISTS `register_student` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `event_id` int(20) NOT NULL,
  `team_id` int(20) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_id_uindex` (`id`),
  KEY `registration_event_id_fk` (`event_id`),
  KEY `registration_team_team_id_fk` (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `registration`
--

INSERT INTO `registration` (`id`, `event_id`, `team_id`, `time`) VALUES
(1, 1, 1, '2018-04-12 23:03:33.844000'),
(2, 2, 2, '2018-04-12 23:03:42.767000'),
(3, 3, 3, '2018-04-12 23:03:50.289000'),
(4, 1, 4, '2018-06-23 18:27:09.616260');

-- --------------------------------------------------------

--
-- 表的结构 `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  PRIMARY KEY (`team_id`,`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `team`
--

INSERT INTO `team` (`team_id`, `user_id`) VALUES
(1, 3223),
(1, 640143),
(2, 123),
(3, 321),
(4, 123);

-- --------------------------------------------------------

--
-- 表的结构 `team_name`
--

DROP TABLE IF EXISTS `team_name`;
CREATE TABLE IF NOT EXISTS `team_name` (
  `team_id` int(20) NOT NULL,
  `team_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `team_name`
--

INSERT INTO `team_name` (`team_id`, `team_name`) VALUES
(1, 'cn1'),
(2, 'cn2'),
(3, 'cn3');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department_id` varchar(20) NOT NULL,
  `gender` int(1) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_user_id_uindex` (`user_id`),
  KEY `user_department_id_fk` (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `department_id`, `gender`, `phone_number`, `password`) VALUES
(640143, 'zsy', 'djytyang@gmail.com', '1', 1, '13072339523', 0),
(123, 'ysz', 'dsjak@gmail.com', '2', 0, '321312', 0),
(321, 'jdk', 'djsaj@gmail.com', '3', 1, '23421', 0),
(3223, 'dsa', 'ds', 'dsad', 1, '123', 123);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
