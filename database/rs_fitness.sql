-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 08:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `rs_mealplan`
--

CREATE TABLE `rs_mealplan` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(60) NOT NULL,
  `plan_category` enum('Breakfast','Brunch','Lunch','Afternoon Snack','Dinner','Midnight Snack') NOT NULL,
  `plan_picture` varchar(60) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rs_meal_ingredients`
--

CREATE TABLE `rs_meal_ingredients` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL COMMENT 'connected sa pk ng rs_mealplan',
  `ingredient_name` varchar(100) NOT NULL,
  `calories` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rs_student_meal`
--

CREATE TABLE `rs_student_meal` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meal_name` varchar(100) NOT NULL,
  `calories_obtained` float NOT NULL,
  `meal_date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rs_users`
--

CREATE TABLE `rs_users` (
  `id` int(11) NOT NULL,
  `gmail_address` varchar(100) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rs_users`
--

INSERT INTO `rs_users` (`id`, `gmail_address`, `firstname`, `middlename`, `lastname`, `birthdate`, `gender`, `height`, `weight`, `bmi`, `created_at`, `is_admin`) VALUES
(1, 'calilchristopher052997@gmail.com', 'Calil Christopher', 'null', 'Jaudian', '1997-05-29', 'Male', 180.34, 198.41, 45.21, '2022-04-24 14:31:53', 0),
(2, 'bry@gmail.com', 'Bryan Nikko', 'Vitug', 'Barata', '1994-02-11', 'Male', 182.88, 176.37, 40.2, '2022-04-24 14:31:53', 0),
(3, 'patrick@gmail.com', 'Ben Patrick', 'Vitug', 'Chua', '2004-02-16', 'Male', 165.1, 154.324, 30.8, '2022-04-24 14:31:53', 0),
(4, 'hello@gmail.com', 'J', '', 'Doe', '1998-05-22', 'Male', 175.5, 110.8, 52.5, '2022-04-24 14:32:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rs_workout`
--

CREATE TABLE `rs_workout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workout_date` date NOT NULL DEFAULT current_timestamp(),
  `calories_burned` float NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rs_workout`
--

INSERT INTO `rs_workout` (`id`, `user_id`, `workout_date`, `calories_burned`, `description`, `created_at`) VALUES
(3, 4, '2022-04-24', 171.1, 'Hello', '2022-04-24 06:35:24'),
(4, 4, '2022-04-24', 171.1, 'Hellox', '2022-04-24 06:36:31'),
(5, 4, '2022-04-24', 171.1, 'Helloxzzz', '2022-04-24 06:36:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rs_mealplan`
--
ALTER TABLE `rs_mealplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_meal_ingredients`
--
ALTER TABLE `rs_meal_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_student_meal`
--
ALTER TABLE `rs_student_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_users`
--
ALTER TABLE `rs_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rs_workout`
--
ALTER TABLE `rs_workout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rs_mealplan`
--
ALTER TABLE `rs_mealplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rs_meal_ingredients`
--
ALTER TABLE `rs_meal_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rs_student_meal`
--
ALTER TABLE `rs_student_meal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rs_users`
--
ALTER TABLE `rs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rs_workout`
--
ALTER TABLE `rs_workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
