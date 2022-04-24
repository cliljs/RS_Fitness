-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 08:30 AM
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
  `meal_date` date NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `rs_workout`
--

CREATE TABLE `rs_workout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workout_date` date NOT NULL DEFAULT current_timestamp(),
  `calories_burned` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rs_workout`
--
ALTER TABLE `rs_workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
