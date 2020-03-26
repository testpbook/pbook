-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2020 г., 01:34
-- Версия сервера: 5.6.41
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phone_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `phone_book`
--

CREATE TABLE `phone_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_book_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `phone` varchar(18) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phone_book`
--

INSERT INTO `phone_book` (`id`, `user_id`, `phone_book_type_id`, `name`, `surname`, `middle_name`, `phone`, `description`) VALUES
(4, 2, 1, 'Иван', 'Иванов', 'Иванович', '+7 (926) 555-55-55', ''),
(7, 1, 2, 'Василий', 'Алибаба', 'Алибабаевич', '+7 (111) 111-11-11', 'тест');

-- --------------------------------------------------------

--
-- Структура таблицы `phone_book_type`
--

CREATE TABLE `phone_book_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phone_book_type`
--

INSERT INTO `phone_book_type` (`id`, `name`) VALUES
(5, 'Личные'),
(1, 'Общие'),
(2, 'Рабочие');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` smallint(3) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2MRJZVgF24rzTqQ9UYOhTCOof7rKDUOu', '$2y$13$nUxmaa/8cv3Z.MXUKowqBOqP3a64rS/AEztk5Wq1uoQ4Nfvu8aCDK', NULL, 'admin@localhost', 10, 20, 1463669733, 1463669733),
(2, 'user', 'tN6GxmjWJMBh53S4uLEtld9rmqY4WLa7', '$2y$13$TuaReAiNtMxXlZ/YsoIrb.12/Iqjs3NfWqU6qzp896d55/6PPc0Ia', NULL, 'user@localhost', 10, 10, 1463669870, 1463669870);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `phone_book`
--
ALTER TABLE `phone_book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`user_id`,`phone`) USING BTREE,
  ADD KEY `name` (`name`),
  ADD KEY `surname` (`surname`),
  ADD KEY `middle_name` (`middle_name`),
  ADD KEY `phone_book_type_id` (`phone_book_type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `phone_book_type`
--
ALTER TABLE `phone_book_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `phone_book`
--
ALTER TABLE `phone_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `phone_book_type`
--
ALTER TABLE `phone_book_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `phone_book`
--
ALTER TABLE `phone_book`
  ADD CONSTRAINT `phone_book_ibfk_1` FOREIGN KEY (`phone_book_type_id`) REFERENCES `phone_book_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phone_book_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
