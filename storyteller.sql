-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2022 at 05:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storyteller`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$OQVegA9z.Lwwp5ZNJEFRDeQDrMbQeNpWqsV6IVxxSqs.peBKN2bbe'),
(2, 'John Doe', 'john@gmail.com', '$2y$10$OQVegA9z.Lwwp5ZNJEFRDeQDrMbQeNpWqsV6IVxxSqs.peBKN2bbe');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `category` varchar(225) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `post_by` varchar(225) DEFAULT NULL,
  `datetime` timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `image`, `title`, `category`, `details`, `post_by`, `datetime`) VALUES
(1, '1.jpg', 'Brasil', 'adventure', 'On the surface, you might think that arranging this site would be a simple process.\r\n\r\nAfter all, how difficult could it be to persuade visitors to check out beautiful beaches and hikes through the Amazon?\r\n\r\nBut considering that Brazil is a huge country, making up almost half of the continent of South America, the site has a lot of information to cover.\r\n\r\nIt does this by dividing the various regions into different “Experiences.”', 'John Doe', '2023-03-14 03:01:05'),
(2, '2.jpg', 'Cookiesound', 'cultural', 'The pair has made a name for themselves taking photos around the world, and they’ve created a nice compilation of their journeys.\r\n\r\nAnd while the photos are likely what initially draw readers in, what sets this site apart from others is the personal perspective. You can tell that this site was made out of a passion for traveling.\r\n\r\nSo if you’re running a travel blog, it’s important to remember that photos can’t do all the work for you in building an audience and establishing a loyal reader base.', 'John Doe', '2023-03-13 03:01:05'),
(3, '3.jpg', 'Toucan Cafe & stories', 'wildlife', 'Their site is exceptionally comprehensive. It features different types of stories and details about the cafe, as well as general tourist information for visitors to the city.\r\n\r\nBest of all, everything is easily accessible from the big menu bar. Given that the site is designed to provide information about very distinct categories, it’s essential that visitors can immediately find what they’re looking for.\r\n\r\nAfter all, if a user were to arrive looking for details on a walking tour, but think they’d mistakenly come to the website of a random coffee shop, Toucan would quickly lose a potential customer.', 'John Doe', '2023-03-15 03:01:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
