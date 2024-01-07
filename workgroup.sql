-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2022 г., 20:25
-- Версия сервера: 5.5.50
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `workgroup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `capcity_info`
--

CREATE TABLE IF NOT EXISTS `capcity_info` (
  `id_capcity` tinyint(3) NOT NULL,
  `capcity_number` int(11) NOT NULL,
  `capcity_name` varchar(255) NOT NULL,
  `time_auto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` datetime DEFAULT NULL,
  `FIO` varchar(255) NOT NULL,
  `kult` varchar(255) NOT NULL,
  `space` varchar(255) NOT NULL,
  `PH` varchar(255) NOT NULL,
  `CO2` varchar(255) NOT NULL,
  `OP` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `capcity_info`
--

INSERT INTO `capcity_info` (`id_capcity`, `capcity_number`, `capcity_name`, `time_auto`, `time`, `FIO`, `kult`, `space`, `PH`, `CO2`, `OP`) VALUES
(7, 1, '1', '2022-01-23 11:15:52', '0000-00-00 00:00:00', '8', '2', '30', '20,10', '1', '1,30');

-- --------------------------------------------------------

--
-- Структура таблицы `capcity_name`
--

CREATE TABLE IF NOT EXISTS `capcity_name` (
  `id` tinyint(3) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `capcity_name`
--

INSERT INTO `capcity_name` (`id`, `name`) VALUES
(1, 'Хранилище'),
(2, 'Аквариум'),
(3, 'Цистерна');

-- --------------------------------------------------------

--
-- Структура таблицы `capcity_number`
--

CREATE TABLE IF NOT EXISTS `capcity_number` (
  `id` tinyint(3) NOT NULL,
  `number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kult`
--

CREATE TABLE IF NOT EXISTS `kult` (
  `id` tinyint(3) NOT NULL,
  `kult` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kult`
--

INSERT INTO `kult` (`id`, `kult`) VALUES
(1, 'СОН'),
(2, 'культивация 1'),
(3, 'культивация 2'),
(4, 'культивация 3'),
(5, 'культивация 4'),
(6, 'культивация 5'),
(7, 'культивация 6'),
(8, 'культивация 7'),
(9, 'культивация 8'),
(10, 'культивация 9'),
(11, 'культивация 10');

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(10) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id`, `position`) VALUES
(1, 'Оператор'),
(2, 'Администратор'),
(3, 'Системный администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) unsigned NOT NULL,
  `users_login` varchar(30) NOT NULL,
  `users_password` varchar(32) NOT NULL,
  `users_hash` varchar(32) NOT NULL,
  `date` date DEFAULT NULL,
  `FIO` text,
  `position` text,
  `dismis` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `users_login`, `users_password`, `users_hash`, `date`, `FIO`, `position`, `dismis`) VALUES
(4, 'werty', 'd9b1d7db4cd6e70935368a1efb10e377', '66b143e6964cd2629e2608db12f475b5', '0000-00-00', 'Werty', '1', '2022-01-23'),
(5, 'test', '94022db78fc801d08a9f501ff844ed2c', '', '0000-00-00', 'test', '1', '2018-03-28'),
(3, 'wer13', 'd9b1d7db4cd6e70935368a1efb10e377', '', '0000-00-00', 'alex', '2', '2022-01-05'),
(6, 'a.a.arkov', '03251807ea85baedcafed8bd5daa32c2', '09e4324b703ff90aac4970ba2cef051e', '0000-00-00', 'Арьков А. А.', '3', NULL),
(7, '123', 'd9b1d7db4cd6e70935368a1efb10e377', 'c6df4b5c43d7c991e4d48be8e28bee6b', '0000-00-00', '123', '1', '2022-01-20'),
(8, 'a.al.arkov', '35777a50b824e47f9b8053b3bf9febeb', '836137ee0fa83732e985af95e6de5d75', '2022-01-23', 'Арьков А.А (Оператор)', '1', NULL),
(9, 'i.i.ivanov', 'ec6a6536ca304edf844d1d248a4f08dc', '', '2022-01-23', 'Иванов И.И', '1', NULL),
(10, 'test', 'fb469d7ef430b0baf0cab6c436e70375', '', '2022-01-24', 'test', '3', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `capcity_info`
--
ALTER TABLE `capcity_info`
  ADD PRIMARY KEY (`id_capcity`);

--
-- Индексы таблицы `capcity_name`
--
ALTER TABLE `capcity_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `capcity_number`
--
ALTER TABLE `capcity_number`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kult`
--
ALTER TABLE `kult`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `capcity_info`
--
ALTER TABLE `capcity_info`
  MODIFY `id_capcity` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `capcity_name`
--
ALTER TABLE `capcity_name`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `capcity_number`
--
ALTER TABLE `capcity_number`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `kult`
--
ALTER TABLE `kult`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
