-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 04 2016 г., 19:37
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test_task`
--
CREATE DATABASE `test_task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test_task`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `card_num` varchar(20) NOT NULL,
  `cv2` varchar(3) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `card_hold_num` varchar(255) NOT NULL,
  `card_amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `card_num`, `cv2`, `exp_date`, `card_hold_num`, `card_amount`) VALUES
(1, 'test123', 'TESTtest123', 'Aleksey', 'Starovierov', 'alekseystaroverov@gmail.com', '1111 2222 3333 4444', '123', 'November 2016', 'cdzcxz', 990),
(2, 'John1990', 'TestXXX000', 'John', 'Doe', 'jd@mail.ru', '1111 0101 2222 2323', '223', 'May 2020', '1234512345', 704.46),
(3, 'Jason_Born22', 'JasBorn911', 'Jason', 'Bourne', 'jason_bourne_big_boss@ololo.ru', '0002 0003 0004 0005', '555', 'October 2018', '00000000000000000000000', 24599.5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
