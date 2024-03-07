-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 07, 2024 at 03:17 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5225CMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `museum_id` int(3) NOT NULL,
  `comment` text NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `museum_id`, `comment`, `dateAdded`) VALUES
(1, 3, 3, 'Cool shoes!', '2024-03-06 22:17:08'),
(2, 2, 6, 'Cool military stuff!', '2024-03-06 22:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `museums`
--

INSERT INTO `museums` (`id`, `name`, `image`, `address`, `type`, `summary`) VALUES
(1, 'Aga Khan Museum', '', 'North York', 'Art', 'Muslim arts and culture'),
(2, 'Applewood Shaver Homestead', '', 'Etobicoke', 'Historic House', 'Historic house museum situated in a homestead dating back to c. 1850s'),
(3, 'Bata Shoe Museum', '', 'Old Toronto', 'Fashion', 'History of footwear from around the world'),
(4, 'Black Creek Pioneer Village', '', 'North York', 'Living Museum', 'A living history museum situated in North York. The property contains a number of early-to-mid 19th century buildings.'),
(5, 'Casa Loma', '', 'Old Toronto', 'Historic House', 'A historic house museum situated in an estate completed in 1914. The estate was converted into a historical house in 1937.'),
(6, 'Fort York', '', 'Old Toronto', 'Military', 'Fort York was a defensive fortification, featuring buildings from the late-18th to early 19th century. Operated by City of Toronto government, it is presently used as a War of 1812 museum, featuring exhibits and historical re-enactments. The fort was reopened for public use by the city in 1934.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first` varchar(25) DEFAULT NULL,
  `last` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `email`, `password`, `active`, `dateAdded`) VALUES
(2, 'Test', 'User', 'test@test.com', '8b1a9953c4611296a827abf8c47804d7', 'Yes', '2024-03-06 19:00:18'),
(3, 'Kyle', 'Scott', 'kyle@test.com', 'e8b579fe36f15209c6f167396a46b04e', 'Yes', '2024-03-06 22:11:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_museum_id` (`museum_id`);

--
-- Indexes for table `museums`
--
ALTER TABLE `museums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `museums`
--
ALTER TABLE `museums`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_museum_id` FOREIGN KEY (`museum_id`) REFERENCES `museums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
