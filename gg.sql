-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2022 г., 17:21
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
-- База данных: `gg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Лазерные принтеры'),
(2, 'Принтер струйный'),
(3, 'Термопринтеры');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `image`, `price`, `year`, `country`, `model`, `count`, `date`, `id_category`) VALUES
(1, 'Принтер лазерный HP Laser', 'pr1.png', '18980', '2021', 'Китай', '107r черно-белый, цвет: белый', '20', '2022-05-05 06:38:05', 2),
(2, 'Принтер струйный HP Ink Tank', 'pr2.png', '24990', '2021', 'Китай', '115 цветной, цвет: черный', '20', '2022-05-05 06:38:05', 3),
(3, 'Принтер лазерный HP Color LaserJet Laser', 'pr3.png', '39990', '2020', 'Китай', '150a цветной, цвет: белый', '25', '2022-05-05 06:40:02', 3),
(4, 'Принтер струйный HP OfficeJet', 'pr4.png', '15530', '2022', 'Корея', '202 цветной, цвет: черный', '10', '2022-05-05 06:40:02', 3),
(5, 'Термопринтер стационарный Brother', 'pr5.png', '90940', '2022', 'Корея', 'PT-P950NW, светло-серый [ptp950nwr1]', '10', '2022-05-05 06:41:23', 2),
(6, 'Термопринтер стационарный TSC', 'pr6.png', '46390', '2022', 'Корея', 'TC200, черный [99-059a003-6002]', '5', '2022-05-05 06:41:23', 2),
(7, 'Термопринтер стационарный TSC', 'pr7.png', '95090', '2021', 'Россия', 'MB340T, черный [99-068a002-1202]', '5', '2022-05-05 06:46:29', 1),
(8, 'Принтер струйный Canon Pixma', 'pr8.png', '10990', '2020', 'Китай', 'TS304 цветной, цвет: черный [2321c007]', '15', '2022-05-05 06:42:40', 1),
(9, 'Принтер лазерный Brother', 'pr9.png', '17380', '2021', 'Корея', 'HL-L2300DR черно-белый, цвет: черный [hll2300dr1]', '8', '2022-05-05 06:42:40', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'Администратор'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `auth_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `id_role`, `auth_key`) VALUES
(6, 'Никита', 'Сафронов', 'Дмитриевич', 'admin', 'cool.super22134@yandex.ru', '$2y$13$ht9/tYQErxqbufwdaP2Df.wezLkq10NNFCuG8Moa5RS2w3GMvJPT6', 2, 'EexhNukpSG3bBAu2JnM_LsDf1lrHVRbp'),
(14, 'Никита', 'Сафронов', 'Дмитриевич', 'kaito', 'cool.super2213@yandex.ru', '$2y$13$YOgD8AGP5rZsBcxRpvBg0OyMfyphueWvGUhQisdhbJhnXaIxi.4MO', 2, '-Mw2UAnwSucU2unw4r2yqiB8Blch4qtv');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
