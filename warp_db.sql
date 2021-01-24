-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 21 2021 г., 17:33
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `warp_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `src_preview` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_category_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `description`, `color`, `src_preview`, `body`, `p_category_id`) VALUES
(1, 'Название 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere debitis officia, non hic, officiis deserunt culpa eligendi expedita magnam iste eveniet suscipit sapiente temporibus unde veniam mollitia? Excepturi, similique sapiente.', '#5D433B', 'https://ashave-studio.ru/upload/iblock/087/08788aea251f64128adc740b50ff2b86.jpg', NULL, 1),
(3, 'Regrand', 'тестовое описание да это оно вот так', '#eb700b', 'http://framework.ru/uploads/portfolio/b1f5bb969ba9665ead180a89d1fb8345.png', 'eNoNy0sOgjAQANC7zNpQBWqkN2DNkhrTDtNKpJ+UIcYQ7i7798Yd+JfpFU0gUNAH42kg5DlFuMAwGTagdlgL9sGf4M2clRZauHKObyqfqmxabHlJZlq1yKmwS8uctHhcqXWtJXNrJFGNaFHW96brrJQOHVU5ejiO5x/FRi0F', NULL),
(10, 'Regrand', 'тестовое описание да это оно вот так', '#eb700b', 'http://framework.ru/uploads/portfolio/b1f5bb969ba9665ead180a89d1fb8345.png', 'eNoNy0sOgjAQANC7zNpQBWqkN2DNkhrTDtNKpJ+UIcYQ7i7798Yd+JfpFU0gUNAH42kg5DlFuMAwGTagdlgL9sGf4M2clRZauHKObyqfqmxabHlJZlq1yKmwS8uctHhcqXWtJXNrJFGNaFHW96brrJQOHVU5ejiO5x/FRi0F', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `name`) VALUES
(1, 'Разработка сайтов');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `bg_color`, `bg_img`) VALUES
(1, 'Разработка сайтов', 'Профессиональное создание сайтов под ключ. Разработаем сайт любой сложности с адаптивным дизайном. Срок изготовления от 2х недель.', '#12739E', 'images/devsite.png'),
(2, 'Разработка веб-приложений', 'Разработка интернет-приложения с определенным функционалом решающим конкретные задачи клиента.', '#5C69D9', 'images/devwebapp.png'),
(3, 'Графический дизайн', 'Создание уникального стиля Вашей компании. Отрисовка логотипов, уникальных шрифтов для Вашего бизнеса.', '#129E6C', 'images/devdesign.png'),
(4, 'SEO-оптимизация', 'В процессе использования вы увидите, что с помощью SEO рекламный бюджет сократился вдвое, а заявок с поиска стало больше.', '#7E4499', 'images/devseo.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worker` tinyint(1) UNSIGNED DEFAULT NULL,
  `link_vk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `src_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_src_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `role_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `worker`, `link_vk`, `src_photo`, `bg_src_img`, `status`, `category_id`, `role_id`) VALUES
(1, 'bugaty_x3@mail.ru', '$2y$10$/y3HIF74JZZojtYB9WXohOGdXkTUiX/09RNh/VRCXLPtxyOo.rwXK', 'Дмитрий', 'Денисов', 1, '#', 'https://sun9-39.userapi.com/impf/c836737/v836737722/602e6/e_hRX9WCzbc.jpg?size=727x697&quality=96&proxy=1&sign=9f432220c4b9471ee1bf75c4fb9cff4b&type=album', 'uploads/maxresdefault.jpg', 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_categories`
--

CREATE TABLE `user_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_categories`
--

INSERT INTO `user_categories` (`id`, `name`) VALUES
(1, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'Разработчик');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_portfolio_p_category` (`p_category_id`);

--
-- Индексы таблицы `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_users_category` (`category_id`),
  ADD KEY `index_foreignkey_users_role` (`role_id`);

--
-- Индексы таблицы `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `c_fk_portfolio_p_category_id` FOREIGN KEY (`p_category_id`) REFERENCES `portfolio_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `c_fk_users_category_id` FOREIGN KEY (`category_id`) REFERENCES `user_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
