-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 06 2021 г., 14:33
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task_list`
--

CREATE TABLE `task_list` (
  `id` int NOT NULL,
  `task_title` varchar(240) NOT NULL,
  `task_name` varchar(240) NOT NULL,
  `task_descr` varchar(240) NOT NULL,
  `task_date` date NOT NULL,
  `task_completed` date DEFAULT NULL,
  `task_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `task_list`
--

INSERT INTO `task_list` (`id`, `task_title`, `task_name`, `task_descr`, `task_date`, `task_completed`, `task_status`) VALUES
(1, 'Сделать первый тестовый пример', 'Пелагея Максимова', 'Первый пример для теста', '2021-08-04', '2021-08-05', 'завершена'),
(2, 'Проверить вывод не одной задачи', 'Пелагея Максимова', 'Проверить вывод не одной задачи, а нескольких', '2021-08-05', NULL, 'в работе');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task_list`
--
ALTER TABLE `task_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
