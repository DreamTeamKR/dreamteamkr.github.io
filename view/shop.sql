-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2017 at 04:01 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `image` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Прямые диваны',1),
(2, 'Комплекты',2),
(3, 'Мягкие уголки',3),
(4, 'Кожаные диваны',4),
(5, 'Офисные диваны',5),
(6, 'Модульные диваны',6),
(7, 'Детские диваны',7),
(8, 'Тахты',8),
(9, 'Бескаркасная мебель',9),
(10, 'Кресла-кровати',10),
(11, 'Мягкие кресла',11),
(12, 'Пуфы, банкетки',12);

-- --------------------------------------------------------

--
-- Table structure for table `category_characteristic`
--

CREATE TABLE IF NOT EXISTS `category_characteristic` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `characteristic` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_characteristic`
--

INSERT INTO `category_characteristic` (`id`, `category`, `characteristic`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 2, 1),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 2, 5),
(15, 2, 6),
(16, 2, 7),
(17, 2, 8),
(18, 2, 9),
(19, 3, 1),
(20, 3, 2),
(21, 3, 3),
(22, 3, 4),
(23, 3, 5),
(24, 3, 6),
(25, 3, 7),
(26, 3, 8),
(27, 3, 9),
(28, 4, 1),
(29, 4, 2),
(30, 4, 3),
(31, 4, 4),
(32, 4, 5),
(33, 4, 6),
(34, 4, 7),
(35, 4, 8),
(36, 4, 9),
(37, 5, 1),
(38, 5, 2),
(39, 5, 3),
(40, 5, 4),
(41, 5, 5),
(42, 5, 6),
(43, 5, 7),
(44, 5, 8),
(45, 5, 9),
(46, 6, 1),
(47, 6, 2),
(48, 6, 3),
(49, 6, 4),
(50, 6, 5),
(51, 6, 7),
(52, 6, 8),
(53, 6, 9),
(54, 7, 1),
(55, 7, 2),
(56, 7, 3),
(57, 7, 4),
(58, 7, 5),
(59, 7, 6),
(60, 7, 7),
(61, 7, 8),
(62, 7, 9),
(63, 8, 1),
(64, 8, 2),
(65, 8, 3),
(66, 8, 4),
(67, 8, 7),
(68, 8, 8),
(69, 8, 9),
(70, 9, 1),
(71, 9, 2),
(72, 9, 3),
(73, 9, 4),
(74, 9, 5),
(75, 9, 7),
(76, 9, 8),
(77, 10, 1),
(78, 10, 2),
(79, 10, 3),
(80, 10, 4),
(81, 10, 7),
(82, 10, 8),
(83, 10, 9),
(84, 11, 1),
(85, 11, 2),
(86, 11, 3),
(87, 11, 4),
(88, 11, 5),
(89, 11, 7),
(90, 12, 1),
(91, 12, 2),
(92, 12, 3),
(93, 12, 4),
(94, 12, 5),
(95, 12, 7),
(96, 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `characteristic`
--

CREATE TABLE IF NOT EXISTS `characteristic` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `characteristic`
--

INSERT INTO `characteristic` (`id`, `name`) VALUES
(1, 'Ширина'),
(2, 'Высота'),
(3, 'Длина'),
(4, 'Производитель'),
(5, 'Форма'),
(6, 'Механизм трансформации'),
(7, 'Наполнение'),
(8, 'Обивка'),
(9, 'Дополнительно');

-- --------------------------------------------------------

--
-- Table structure for table `contragent`
--

CREATE TABLE IF NOT EXISTS `contragent` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `phone` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contragent`
--

INSERT INTO `contragent` (`id`, `name`, `phone`) VALUES
(1, 'Андрей', '351-(633)883-8391'),
(2, 'Anna', '94-(900)497-2058'),
(3, 'John', '55-(472)861-3595'),
(4, 'Anthony', '55-(935)754-3668'),
(5, 'Willie', '507-(159)193-3133'),
(6, 'Richard', '33-(454)429-7579'),
(7, 'Johnny', '226-(504)436-7841'),
(8, 'Joyce', '62-(937)926-5067'),
(9, 'Kenneth', '256-(389)272-0402'),
(10, 'Lois', '86-(520)244-4545'),
(11, 'Ryan', '7-(534)492-3980'),
(12, 'Benjamin', '66-(253)655-7253'),
(13, 'Lori', '256-(189)813-7331'),
(14, 'Tina', '86-(451)975-7704'),
(15, 'Diane', '386-(912)956-6171');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `name`) VALUES
(1, 1, 'Прямой диван "Красота"'),
(2, 1, 'Прямой диван "Шик"'),
(3, 2, 'Комплект "Семейный"'),
(4, 2, 'Комплект "Фантазия"'),
(5, 2, 'Комплект "Виктория"'),
(6, 3, 'Мягкий уголок "Мишель"'),
(7, 4, 'Кожаный диван "Уют"'),
(8, 6, 'Модульный диван "Модерн"'),
(9, 7, 'Детский диван "Солнышко"'),
(10, 8, 'Тахта "Комфорт"'),
(11, 9, 'Бескаркасный диван"Яркие дни"'),
(12, 10, 'Кресло-кровать "Компакт"'),
(13, 11, 'Мягкое кресло "Гнездо"'),
(14, 12, 'Пуф "Крошка"'),
(15, 12, 'Банкетка "Креатив"');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE IF NOT EXISTS `storage` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `contragent` int(11) NOT NULL,
  `image` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `price`, `product`, `count`, `contragent`, `image`) VALUES
(1, 350, 1, 2, 1, '1'),
(2, 725, 2, 5, 1, '2'),
(3, 421, 2, 6, 1, '2'),
(4, 312, 3, 3, 1, '3'),
(5, 4144, 9, 13, 1, '9'),
(6, 5808, 2, 22, 8, '2'),
(7, 2306, 2, 10, 1, '2'),
(8, 7864, 15, 1, 6, '15'),
(9, 8241, 6, 6, 10, '6'),
(10, 502, 3, 11, 11, '3'),
(11, 6129, 12, 28, 15, '12'),
(12, 4065, 11, 4, 3, '11'),
(13, 6524, 3, 7, 13, '3'),
(14, 8207, 11, 22, 5, '11'),
(15, 2333, 13, 4, 12, '13'),
(16, 5310, 13, 15, 10, '13'),
(17, 526, 15, 28, 6, '15'),
(18, 3517, 7, 14, 11, '7'),
(19, 1776, 3, 1, 2, '3'),
(20, 6291, 10, 22, 5, '10'),
(21, 2715, 10, 28, 11, '10'),
(22, 8488, 13, 27, 3, '13'),
(23, 6563, 3, 28, 4, '3'),
(24, 1508, 5, 7, 2, '5'),
(25, 2355, 10, 12, 4, '10');

-- --------------------------------------------------------

--
-- Table structure for table `storage_characteristic`
--

CREATE TABLE IF NOT EXISTS `storage_characteristic` (
  `id` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `characteristic` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `storage_characteristic`
--

INSERT INTO `storage_characteristic` (`id`, `storage`, `characteristic`, `value`) VALUES
(1, 1, 1, 2),
(31, 1, 6, 31),
(41, 1, 6, 41),
(2, 2, 2, 5),
(26, 2, 6, 26),
(32, 2, 6, 32),
(42, 2, 7, 42),
(52, 2, 8, 52),
(3, 3, 1, 1),
(30, 3, 6, 30),
(33, 3, 6, 33),
(53, 3, 8, 53),
(4, 4, 2, 4),
(34, 4, 6, 34),
(40, 4, 6, 40),
(54, 4, 8, 54),
(5, 5, 2, 5),
(35, 5, 6, 35),
(55, 5, 8, 55),
(6, 6, 2, 6),
(36, 6, 6, 36),
(56, 6, 8, 56),
(66, 6, 9, 66),
(7, 7, 3, 7),
(27, 7, 6, 27),
(37, 7, 6, 37),
(43, 7, 7, 43),
(57, 7, 8, 57),
(67, 7, 9, 67),
(8, 8, 3, 8),
(28, 8, 6, 28),
(38, 8, 6, 38),
(44, 8, 7, 44),
(58, 8, 8, 58),
(9, 9, 3, 9),
(29, 9, 6, 29),
(39, 9, 6, 39),
(45, 9, 7, 45),
(59, 9, 8, 59),
(10, 10, 4, 10),
(46, 10, 7, 46),
(60, 10, 8, 60),
(11, 11, 4, 11),
(47, 11, 7, 47),
(61, 11, 9, 61),
(12, 12, 4, 12),
(48, 12, 7, 48),
(62, 12, 9, 62),
(13, 13, 4, 13),
(49, 13, 8, 49),
(63, 13, 9, 63),
(14, 14, 4, 14),
(50, 14, 8, 50),
(64, 14, 9, 64),
(15, 15, 4, 15),
(51, 15, 8, 51),
(65, 15, 9, 65),
(16, 16, 4, 16),
(17, 17, 4, 17),
(18, 18, 4, 18),
(19, 19, 4, 19),
(20, 20, 5, 20),
(21, 21, 5, 21),
(22, 22, 5, 22),
(23, 23, 5, 23),
(24, 24, 6, 24),
(25, 25, 6, 25);

-- --------------------------------------------------------

--
-- Table structure for table `value`
--

CREATE TABLE IF NOT EXISTS `value` (
  `id` int(11) NOT NULL,
  `characteristic` int(11) NOT NULL,
  `name` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `value`
--

INSERT INTO `value` (`id`, `characteristic`, `name`) VALUES
(1, 1, '270 - 12750'),
(2, 1, '12751 - 25500'),
(3, 1, '25501 - 38520'),
(4, 2, '270 - 930'),
(5, 2, '931 - 1860'),
(6, 2, '1861 - 3100'),
(7, 3, '900 - 1500'),
(8, 3, '1501 - 2000'),
(9, 3, '2001 - 2200'),
(10, 4, 'Веста'),
(11, 4, 'Киевский стандарт'),
(12, 4, 'МебельЕП'),
(13, 4, 'НСТ Альянс'),
(14, 4, 'Novetly'),
(15, 4, 'Art-Nika'),
(16, 4, 'Cubby'),
(17, 4, 'BBUF'),
(18, 4, 'Элегант'),
(19, 4, 'Cama'),
(20, 5, 'Прямой'),
(21, 5, 'Угловой'),
(22, 5, 'Круглый'),
(23, 5, 'Фигурный'),
(24, 6, 'Еврокнижка'),
(25, 6, 'Дельфин'),
(26, 6, 'Книжка'),
(27, 6, 'Аккордеон'),
(28, 6, 'Софа'),
(29, 6, 'Бескаркасный'),
(30, 6, 'Нераскладной'),
(31, 6, 'Седофлекс'),
(32, 6, 'Тик-Так'),
(33, 6, 'Алеко'),
(34, 6, 'Выкатной'),
(35, 6, 'Н/Д'),
(36, 6, 'Пантграф'),
(37, 6, 'Меларат'),
(38, 6, 'Сабли'),
(39, 6, 'Миллениум'),
(40, 6, 'Кушетка'),
(41, 6, 'Поворотный'),
(42, 7, 'Пенополиуретан'),
(43, 7, 'Пружинный блок'),
(44, 7, 'Ламельный блок'),
(45, 7, 'Н/Д'),
(46, 7, 'Пружинная змейка'),
(47, 7, 'Пружинный блок на пружинной змейке'),
(48, 7, 'Войлок'),
(49, 8, 'Велюр'),
(50, 8, 'Скотчгард'),
(51, 8, 'Жаккард'),
(52, 8, 'Терможаккард'),
(53, 8, 'Шеннил'),
(54, 8, 'Флок'),
(55, 8, 'Микрофибра'),
(56, 8, 'Искусственная кожа'),
(57, 8, 'Искусственная замша'),
(58, 8, 'Натуральная кожа'),
(59, 8, 'Вельвет'),
(60, 8, 'Арпатек'),
(61, 9, 'Ниша для белья'),
(62, 9, 'Кресло'),
(63, 9, 'Подушка'),
(64, 9, 'Деревянные подлокотники'),
(65, 9, 'Отделка из дерева'),
(66, 9, 'Полка'),
(67, 9, 'Декоративные элементы');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_characteristic`
--
ALTER TABLE `category_characteristic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`,`characteristic`),
  ADD KEY `characteristic` (`characteristic`);

--
-- Indexes for table `characteristic`
--
ALTER TABLE `characteristic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contragent`
--
ALTER TABLE `contragent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`,`contragent`),
  ADD KEY `contragent` (`contragent`);

--
-- Indexes for table `storage_characteristic`
--
ALTER TABLE `storage_characteristic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storage` (`storage`,`characteristic`,`value`),
  ADD KEY `value` (`value`),
  ADD KEY `characteristic` (`characteristic`);

--
-- Indexes for table `value`
--
ALTER TABLE `value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `characteristic` (`characteristic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `category_characteristic`
--
ALTER TABLE `category_characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `characteristic`
--
ALTER TABLE `characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contragent`
--
ALTER TABLE `contragent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `storage_characteristic`
--
ALTER TABLE `storage_characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `value`
--
ALTER TABLE `value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_characteristic`
--
ALTER TABLE `category_characteristic`
  ADD CONSTRAINT `category_characteristic_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_characteristic_ibfk_2` FOREIGN KEY (`characteristic`) REFERENCES `characteristic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`contragent`) REFERENCES `contragent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storage_characteristic`
--
ALTER TABLE `storage_characteristic`
  ADD CONSTRAINT `storage_characteristic_ibfk_1` FOREIGN KEY (`value`) REFERENCES `value` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storage_characteristic_ibfk_2` FOREIGN KEY (`characteristic`) REFERENCES `characteristic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storage_characteristic_ibfk_3` FOREIGN KEY (`storage`) REFERENCES `storage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `value`
--
ALTER TABLE `value`
  ADD CONSTRAINT `value_ibfk_1` FOREIGN KEY (`characteristic`) REFERENCES `characteristic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
