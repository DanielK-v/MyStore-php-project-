-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 04:14 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` tinyint(4) NOT NULL,
  `cat_name` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Хранителни стоки'),
(2, 'Строителни материали'),
(3, 'Канцеларски материали');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `prod_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `prod_desc` varchar(2000) COLLATE utf8_bin NOT NULL,
  `price_1` float NOT NULL,
  `price_2` float NOT NULL,
  `prod_amount` int(11) NOT NULL,
  `prod_code` varchar(10) COLLATE utf8_bin NOT NULL,
  `image` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `cat_id`, `prod_name`, `prod_desc`, `price_1`, `price_2`, `prod_amount`, `prod_code`, `image`) VALUES
(2, 2, 'Тест', 'Тестване', 2.5, 5, 3, 'ааааа123', NULL),
(22, 1, 'Тестване на ябълка', 'храна', 0.5, 1, 100, 'ябълка123', 'apple-clipart-real-1.jpg'),
(23, 1, 'Тестване на ябълка', 'храна', 0.5, 1, 100, 'ябълка123', 'apple-clipart-real-1.jpg'),
(24, 1, 'Тестване на ябълка', 'храна', 0.5, 1, 100, 'ябълка123', 'apple-clipart-real-1.jpg'),
(25, 3, 'Кола', 'Тестване на снимка', 12000, 20000, 1, 'кола1', '34847_1_1.jpg'),
(26, 1, 'Тестване на хедър', 'тестване', 12, 23, 4, '12345667', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` longtext COLLATE utf8_bin NOT NULL,
  `email` varchar(32) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(20) COLLATE utf8_bin DEFAULT 'Няма телефон'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telephone`) VALUES
(4, 'eminem', '$2y$10$U/fPAiIbjv8SLc01dpG4WOrIV6C3NjsjKaiJVEKg.2.mTqU4xugBm', 'eminem@gmail.com', ''),
(5, 'daniel.kadirev', '$2y$10$DNm5aXNQ7JprO5tLDbsfMuOkNiQ9b0Gs1NS3bKlyirPstfYUFYlpu', 'test@test.com', ''),
(17, 'admin', '$2y$10$AXZW2Amqal1dsYEY3WeCp.xAGQFrIILTUAH8yhNBMR.icBJ2LWGT2', 'd.kadirev@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
