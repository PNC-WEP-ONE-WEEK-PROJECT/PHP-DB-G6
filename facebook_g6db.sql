-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_g6db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `userid`, `postid`) VALUES
(6, 'Good morning', 13, 61),
(7, 'Good morning', 14, 66),
(8, 'Hello world', 14, 61),
(9, 'Good morning', 1, 66);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user_id`, `friend_id`) VALUES
(10, 7),
(10, 1),
(10, 6),
(12, 1),
(12, 7),
(12, 9),
(12, 8),
(14, 1),
(14, 7),
(14, 6),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(14, 12),
(14, 13),
(1, 10),
(1, 6),
(1, 7),
(1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `hidden`
--

CREATE TABLE `hidden` (
  `id` int(11) NOT NULL,
  `postsid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hidden`
--

INSERT INTO `hidden` (`id`, `postsid`, `userid`) VALUES
(9, 5, 1),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `description` varchar(220) NOT NULL,
  `userid` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `dateofposts` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `description`, `userid`, `image`, `dateofposts`) VALUES
(61, 'The first design ', 1, 'SOKUNBOPHA_SOVANN_WEB_DESIGN1.png', NULL),
(66, 'Hello! How are you today?', 1, 'homepage.png', NULL),
(68, '#the first post', 13, 'S4 homework01.png', NULL),
(69, 'The first time in my life', 14, 'S4 homework02.png', NULL),
(70, ' ', 14, 'processed-removebg-preview 1.png', NULL),
(74, 'ggg', 1, 'cover.png', NULL),
(75, 'Hello world', 1, 'pn-logo.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `locationaddress` varchar(150) NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `profile_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `password`, `locationaddress`, `dateofbirth`, `cover`, `profile_img`) VALUES
(1, 'Hello', 'm', 'sokunbophasovann@gmail.com', '123456789', 'Pnom Penh city', '2003-06-10', 'cover.png', '360_F_367464887_f0w1JrL8PddfuH3P2jSPlIGjKU2BI0rn.jpg'),
(6, 'hyacinthe', 'm', 'hyacinthe@gmail.com', '987654321', 'Frence', '2022-03-04', NULL, NULL),
(7, 'Sokunbopha Sovann', 'm', 'sokunbopha.sovann@student.passerellesnumeriques.org', '12345678998763', 'I love you', '2022-03-09', NULL, NULL),
(8, 'Sokunbopha Sovann', 'm', 'sokunbopha.sovann@student.passerllesnumeriques.org', '888888888', 'Hello Cambodia', '2022-03-18', NULL, NULL),
(9, 'hyacinthe', 'm', 'sokunbopha.sovann@student.passerellesnumeriques.org', '111111111', 'Frence', '2022-03-09', NULL, NULL),
(10, 'Nga Hoeun', 'm', 'NGa.houen@student.passerllesnumeriques.org', '123456789', 'cambodia', '2022-03-10', NULL, NULL),
(11, 'John Smit', 'm', 'johnsmit@gmail.com', '2222222222', 'America', '1995-06-10', 'cover.png', 'profile.jpg'),
(12, 'heak heng', 'm', 'heng.heak@student.passerllesnumeriques.org', '23456789', 'BMC cambodia', '2022-03-17', 'S4 homework01.png', 'bopa.JPG'),
(13, 'soknhok', 'm', 'sok.nhok@student.passerllesnumeriques.org', '123456789', 'BMC cambodia', '2022-03-10', 'SOKUNBOPHA_SOVANN_1.png', 'Sokunbopha Sovann3.png'),
(14, 'What is my name', 'm', 'name@gmail.com', '444444444', 'My home', '1998-02-09', 'homepage.png', 'bopa.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `hidden`
--
ALTER TABLE `hidden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hidden`
--
ALTER TABLE `hidden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hidden`
--
ALTER TABLE `hidden`
  ADD CONSTRAINT `hidden_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
