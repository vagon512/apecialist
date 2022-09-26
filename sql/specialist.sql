-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 26 2022 г., 19:34
-- Версия сервера: 8.0.19
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `specialist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id_book` int NOT NULL,
  `author` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id_book`, `author`, `title`, `price`, `description`) VALUES
(1, 'author1', 'book1', '1000.00', 'description book1 for'),
(2, 'author1', 'book2', '1020.00', 'description book2 for'),
(3, 'author7', 'book4', '1700.00', 'description book4 for'),
(4, 'author5', 'book5', '2200.00', 'description book5 for'),
(5, 'author2', 'book3', '1200.00', 'description book3 for'),
(6, 'author6', 'book6', '3200.00', 'description book6 for'),
(7, 'author7', 'book7', '3250.00', 'description book7 for'),
(8, 'author8', 'book8', '800.00', 'description book8 for'),
(9, 'ewrw', 'sdf', '111.00', 'wwwwww');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
