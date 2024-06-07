-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2024 г., 22:31
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lesson20`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Directory`
--

CREATE TABLE `Directory` (
  `Id` int NOT NULL,
  `Name` varchar(15) NOT NULL,
  `IdParent` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Directory`
--

INSERT INTO `Directory` (`Id`, `Name`, `IdParent`) VALUES
(1, 'Каталог товаров', NULL),
(2, 'Мойки', 1),
(3, 'Ulgran', 2),
(4, 'Something', 3),
(5, 'Something', 3),
(6, 'Samsung', 2),
(7, 'Smht', 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Directory`
--
ALTER TABLE `Directory`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Directory`
--
ALTER TABLE `Directory`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
