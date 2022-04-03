-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: mysql:3306
-- Время создания: Апр 03 2022 г., 19:54
-- Версия сервера: 8.0.28
-- Версия PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `good_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `good_id`) VALUES
(30, '44c5a934beaaaf863f61fd2ac717ce82', 1),
(31, '44c5a934beaaaf863f61fd2ac717ce82', 2),
(32, '44c5a934beaaaf863f61fd2ac717ce82', 5),
(40, 'f1f1a833d69bea6923125f6250b80860', 5),
(41, 'f1f1a833d69bea6923125f6250b80860', 6),
(42, 'f1f1a833d69bea6923125f6250b80860', 7),
(43, 'b6f2e591e42348819504d42937f03704', 2),
(44, 'b6f2e591e42348819504d42937f03704', 5),
(45, 'b6f2e591e42348819504d42937f03704', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.jpg',
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `image`, `name`, `description`, `price`) VALUES
(1, 'default.jpg', 'Хлеб', NULL, 50),
(2, 'milk.jpg', 'Молоко', 'Коровье молоко', 80),
(5, 'tomato.jpg', 'Помидор', 'Красный помидор', 120),
(6, 'water.jpg', 'Вода', 'Бутылка чистой воды', 43),
(7, 'fish.jpg', 'Рыба', 'Рыба, вкусная, сырая', 123),
(8, 'flower.jpg', 'Цветок', 'Красивый цветок', 187);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_login` varchar(64) NOT NULL,
  `good_id` int UNSIGNED NOT NULL,
  `good_fixed_price` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `user_login`, `good_id`, `good_fixed_price`) VALUES
(17, '6d47d3d657246c150aa3d07cccb19c64', 'admin', 6, 43),
(18, '6d47d3d657246c150aa3d07cccb19c64', 'admin', 5, 120);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(64) NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass_hash`, `role`) VALUES
(1, 'anton', '$2y$10$.H5RYVyKNy7OofYt1qiy4eH/2onQlVEyywIOO7ADNPbBlP/I9y6E6', 'user'),
(2, 'admin', '$2y$10$5DC8CEb0n5pvSpquAvOpeOwqOdOdMX/9wJJKRQqgmdNuMsA86mD8m', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
