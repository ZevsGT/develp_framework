-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2021 г., 20:16
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
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `email`, `message`) VALUES
(1, 'bugaty_x3@mail.ru', 'Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет '),
(2, 'bugaty_x3@mail.ru', 'Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет Новый заказ тест тут сообщение возможно большое а может и нет ');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `url_name`, `data`) VALUES
(2, 'Политика в отношении обработки персональных данных', 'privacy', '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');

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
(1, 'Название 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere debitis officia, non hic, officiis deserunt culpa eligendi expedita magnam iste eveniet suscipit sapiente temporibus unde veniam mollitia? Excepturi, similique sapiente.', '#5D433B', 'https://ashave-studio.ru/upload/iblock/087/08788aea251f64128adc740b50ff2b86.jpg', 'eNoNy0sOgyAQANC7zLqRfiwiN3DtsjTNCAO1ihDENI3x7mX/3mOH/Iv0WtATSOg8OupJ5zEscILeYEaQO6xJd94V8M45SsUUs6mMb0hTlTbFtjgHNKtiMaRswzyGIhoztJfrjYzgaO6IvNFckB1q0dZnQdUnOjiO5x/EAyyy', 1),
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
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `role_id` int(11) UNSIGNED DEFAULT NULL,
  `rtoken` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `worker`, `link_vk`, `src_photo`, `bg_src_img`, `status`, `group_id`, `role_id`, `rtoken`) VALUES
(1, 'bugaty_x3@mail.ru', '$2y$10$/y3HIF74JZZojtYB9WXohOGdXkTUiX/09RNh/VRCXLPtxyOo.rwXK', 'Дмитрий', 'Денисов', 1, '#', 'https://sun9-39.userapi.com/impf/c836737/v836737722/602e6/e_hRX9WCzbc.jpg?size=727x697&quality=96&proxy=1&sign=9f432220c4b9471ee1bf75c4fb9cff4b&type=album', 'uploads/maxresdefault.jpg', 0, 1, 1, 'eyJoYXNoX2FsZ28iOiJzaGEyNTYiLCJ0eXBlIjoiSldUIn0=.eyJpZCI6MSwibmFtZSI6Ilx1MDQxNFx1MDQzY1x1MDQzOFx1MDQ0Mlx1MDQ0MFx1MDQzOFx1MDQzOSIsInNyY19waG90byI6Imh0dHBzOlwvXC9zdW45LTM5LnVzZXJhcGkuY29tXC9pbXBmXC9jODM2NzM3XC92ODM2NzM3NzIyXC82MDJlNlwvZV9oUlg5V0N6YmMuanBnP3NpemU9NzI3eDY5NyZxdWFsaXR5PTk2JnByb3h5PTEmc2lnbj05ZjQzMjIyMGM0Yjk0NzFlZTFiZjc1YzRmYjljZmY0YiZ0eXBlPWFsYnVtIiwiZ3JvdXBfaWQiOjF9.1JJ9vCV0oeyIZ/soT+ppca6ECJwGwW3kEov5vf3LGJjAeLEXXKQcpmKxfcMga+UJr3Taqm5biZAKUO8yb+aW3J30pgyshSRodW4+CftQEcFZqfU99jysrgYefqu0glkNelSd92MZvx6AEv8HXrTXqfTEGBiIOH1vaSeABSmwBefYTZx1tPFGK/lH/vudFBwesZ34odH8JsWxFPB+cV6Og5kIREhNq26TL1UCqle4TvCtnK7yHW4QwSQo86yBJy/1NJLpsOfD6c19SGNMIiZxKrYkZ8+0WPqFRmPzsGnCRzfdeAaZ99FhDQHtsCJVVnuxYWZa94xXB+JRrdt+horMq2/LeaUHNSSKujlB2eTGmpEC9OXR2tHT/Xrf634oa0hzFinhwCTQmZ2hxLtjedmt+RwBYdnh3vgZ7AgjP7MHEeKY0dXv0DTxwLs/ufwwOCU1r/WLJD1mL4Ve+YH/qJOjiHd890Rm9Tp9pX5f2Iux0eQwiGINPqXSWQD9QG2sb2Snc+dn4Gyew2zYhGqPOikaJJnrlpki36tBYT/J+B7voLtAYkAARbJe7u7KDJGRM8H7');

-- --------------------------------------------------------

--
-- Структура таблицы `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_group`
--

INSERT INTO `user_group` (`id`, `name`) VALUES
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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `index_foreignkey_users_role` (`role_id`),
  ADD KEY `index_foreignkey_users_group` (`group_id`) USING BTREE;

--
-- Индексы таблицы `user_group`
--
ALTER TABLE `user_group`
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
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT для таблицы `user_group`
--
ALTER TABLE `user_group`
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
  ADD CONSTRAINT `c_fk_users_group_id` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
