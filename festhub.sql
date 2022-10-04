-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221002.e5875764bf
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 03:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `image_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_text` text NOT NULL,
  `image_desc` text NOT NULL,
  `edate` date NOT NULL,
  `etime` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`image_id`, `image`, `image_text`, `image_desc`, `edate`, `etime`, `location`, `price`) VALUES
(1, 'concert1.jpg', 'Music Concert', 'A Big Musical Concert...', '2022-05-25', '12:00', 'Karaikal', 'Rs. 1800'),
(4, 'dj.jpg', 'DJ Night ', 'DJ Night in Pondicherry...', '2022-06-07', '17:00', 'Puducherry', 'Rs. 1000'),
(5, 'bithday.jpg', 'Birthday Party', 'Birthday Party For my Child', '2022-06-11', '18:00', 'Chennai', 'Rs. 00'),
(7, 'farewell.jpg', 'Farewell Party', 'Farewell Party For Seniours', '2022-05-27', '10:00', 'Puducherry', 'Rs. 1000'),
(8, 'wed.jpg', 'Wedding', 'abc', '2022-06-23', '11:00', 'Madurai', 'Rs. 1000'),
(9, 'bithday.jpg', 'Acquinas Birthday Party', 'ivanuku idu onnu thaan keadu', '2022-05-20', '00:00', 'Karaikal', 'Rs. 20'),
(10, 'death.jpg', 'Harisudhan Death', 'sandhosam....aanandham.......perinbam.....', '2022-05-25', '05:42', 'Pondicherry', 'Rs. 13'),
(11, '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `familyfunction`
--

CREATE TABLE `familyfunction` (
  `image_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_text` text NOT NULL,
  `image_desc` text NOT NULL,
  `edate` date NOT NULL,
  `etime` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `familyfunction`
--

INSERT INTO `familyfunction` (`image_id`, `image`, `image_text`, `image_desc`, `edate`, `etime`, `location`, `price`) VALUES
(5, 'wedding.jpeg', 'Wedding', 'Brother Marriage', '2022-06-16', '11:00', 'Coimbatore', 'Rs. 00'),
(6, 'yellow.jpg', 'Manjal Neeraatu Vizha', 'Manjal Neeraatu Vizha for Girl', '2022-07-13', '12:00', 'Chennai', 'Rs. 100'),
(7, 'death.jpg', 'Funeral', 'Grandpa died today 😥', '2022-05-24', '14:02', 'Madurai', 'Rs. 00'),
(8, 'wedding1.jpg', 'Wedding', 'Royal Wedding..', '2022-06-03', '09:30', 'Puducherry', 'Rs. 101');

-- --------------------------------------------------------

--
-- Table structure for table `partyconcert`
--

CREATE TABLE `partyconcert` (
  `image_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_text` text NOT NULL,
  `image_desc` text NOT NULL,
  `edate` date NOT NULL,
  `etime` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partyconcert`
--

INSERT INTO `partyconcert` (`image_id`, `image`, `image_text`, `image_desc`, `edate`, `etime`, `location`, `price`) VALUES
(1, 'alanwalker.png', 'Musical Concert', 'Alan Walker Musical Concert in India', '2022-06-27', '22:00', 'Banglore', 'Rs. 2000'),
(2, 'eminem.jpg', 'Slim Shady', 'Eminem Musical Concert in India', '2022-07-13', '20:30', 'Kolkata', 'Rs. 2500'),
(3, 'snoop dogg.jpg', 'Snoop Dogg', 'Snoop Dogg Musical Concert in India', '2022-07-12', '19:20', 'Delhi', 'Rs. 3000'),
(4, 'wiz.jpeg', 'Wiz Khalifa', 'Wiz Khalifa Musical Concert in India', '2022-09-24', '17:40', 'Puducherry', 'Rs. 1900'),
(5, 'taylor.jpg', 'Taylor Swift', 'Taylor Swift Musical Concert in India', '2022-06-13', '16:30', 'Mumbai', 'Rs. 4000'),
(6, 'dualipa.jpg', 'Dua Lipa', 'Dua Lipa Musical Concert in India', '2022-06-18', '23:00', 'Chennai', 'Rs. 3800'),
(7, 'india.jpg', 'Indipendence Day Party', 'Celebration of Indipendence Day ...', '2022-08-15', '18:00', 'Delhi', 'Rs. 5000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `dob`, `gender`, `country`, `phone`) VALUES
(1, 'Anes', 'J', 'anesj2001@gmail.com', '2001-11-08', 'Male', 'India', 7094881039),
(3, 'Zaid', 'JK', 'zaid@gmail.com', '1998-08-16', 'Male', 'India', 6379080646),
(4, 'hari', 'z', 'zeera19x2@gmail.com', '2002-05-17', 'Male', 'India', 1234567890),
(5, 'Wazir', 'Ahamed', 'wazir@gmail.com', '1998-09-12', 'Male', 'India', 2345678911),
(6, 'Anes', 'J', 'anesj2001@gmail.com', '2001-11-08', 'Male', 'India', 1234567890),
(7, 'Acquinas', 'R', 'acquinas@gmail.com', '1111-11-11', 'Male', 'Afghanistan', 1234567890),
(8, 'Visveshvaran', 'J', 'vish@gmail.com', '2001-10-07', 'Male', 'India', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `familyfunction`
--
ALTER TABLE `familyfunction`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `partyconcert`
--
ALTER TABLE `partyconcert`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `familyfunction`
--
ALTER TABLE `familyfunction`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `partyconcert`
--
ALTER TABLE `partyconcert`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
