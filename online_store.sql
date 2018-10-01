-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 24, 2018 at 01:09 PM
-- Server version: 5.7.22
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `items` text NOT NULL,
  `img` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `items`, `img`) VALUES
(1, 'Adm', 'a:9:{i:0;i:3;i:1;i:4;i:2;i:5;i:3;i:6;i:4;i:7;i:5;i:8;i:6;i:9;i:7;i:10;i:8;i:11;}', NULL),
(2, 'Bocal', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', '');

-- --------------------------------------------------------

--
-- Table structure for table `coalitions`
--

CREATE TABLE `coalitions` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `items` text NOT NULL,
  `img` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coalitions`
--

INSERT INTO `coalitions` (`id`, `name`, `items`, `img`) VALUES
(1, 'Hive', 'a:12:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;}', '../img/Hive.png'),
(2, 'Alliance', 'a:12:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;}', '../img/Alliance.png'),
(3, 'Empire', 'a:12:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;}', '../img/Empire.png'),
(4, 'Union', 'a:12:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;}', '../img/Union.png');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(128) NOT NULL,
  `pcs` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `img`, `pcs`) VALUES
(1, 'UNIT Factory Community Services', 20, 'https://cdn.intra.42.fr/product/image/36/UNIT_Factory_Community_Services.png', 0),
(2, 'UNIT Tea Ceremony', 30, 'https://cdn.intra.42.fr/product/image/70/bocal_tea_v2_bang.png', 0),
(3, 'UNIT Flash', 420, 'https://cdn.intra.42.fr/product/image/35/UNIT_Flash.png', 0),
(4, 'UNIT Starter Set', 250, 'https://cdn.intra.42.fr/product/image/43/UNIT_Set.png', 0),
(5, 'UNIT Diary', 200, 'https://cdn.intra.42.fr/product/image/40/UNIT_Diary.png', 0),
(6, 'UNIT Notebook', 125, 'https://cdn.intra.42.fr/product/image/42/UNIT_Notebook.png', 0),
(7, 'UNIT Badge', 80, 'https://cdn.intra.42.fr/product/image/45/UNIT_Badge.png', 0),
(8, 'UNIT Pen', 50, 'https://cdn.intra.42.fr/product/image/39/UNIT_Pen.png', 0),
(9, 'UNIT Pencil', 25, 'https://cdn.intra.42.fr/product/image/38/UNIT_Pencil.png', 0),
(10, 'UNIT Sticker', 15, 'https://cdn.intra.42.fr/product/image/41/UNIT_Sticker.png', 0),
(11, 'UNIT Valentine', 5, 'https://cdn.intra.42.fr/product/image/61/valentine.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `items` text NOT NULL,
  `coalition` text NOT NULL,
  `pcs` text NOT NULL,
  `sum` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `items`, `coalition`, `pcs`, `sum`) VALUES
(1, '1', 'a:3:{i:0;i:3;i:1;i:4;i:2;i:5;}', 'a:3:{i:0;i:2;i:1;i:3;i:2;i:4;}', 'a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}', 2300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `passwd` varchar(128) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `passwd`, `name`, `email`, `phone`, `admin`) VALUES
(1, 'kshyshki', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 'Konstantin', 'kshyshki@student.unit.ua', '+380958157973', 1),
(2, 'amedvedi', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 'Anna', 'amedvedi@student.unit.ua', ' +380995196264', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `coalitions`
--
ALTER TABLE `coalitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `coalitions`
--
ALTER TABLE `coalitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
