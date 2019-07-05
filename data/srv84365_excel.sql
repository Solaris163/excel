-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: mysql-srv84365.ht-systems.ru
-- Время создания: Июл 03 2019 г., 08:21
-- Версия сервера: 5.6.42
-- Версия PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `srv84365_excel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Goods`
--

CREATE TABLE `Goods` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level1` varchar(255) DEFAULT NULL,
  `level2` varchar(255) DEFAULT NULL,
  `level3` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `priceSP` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `property` varchar(255) DEFAULT NULL,
  `joint_purchase` int(11) DEFAULT NULL,
  `measure` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `show_on_main` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Goods`
--
ALTER TABLE `Goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Goods`
--
ALTER TABLE `Goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
