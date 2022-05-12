-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 05:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
  `plan_description` text NOT NULL,
  `plan_category` enum('Breakfast','Brunch','Lunch','Afternoon Snack','Dinner','Midnight Snack') NOT NULL,
  `plan_picture` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rs_mealplan`
--

INSERT INTO `rs_mealplan` (`id`, `plan_name`, `plan_description`, `plan_category`, `plan_picture`, `created_by`, `created_at`) VALUES
(1, 'Loaded avocado toast', 'healthy and yet ever-so-slightly indulgent', 'Breakfast', NULL, 1, '2022-05-12 15:03:50'),
(2, 'Broccoli and cheese egg bake', ' an excellent source of protein, as well as several vitamins and minerals that are important for health', 'Breakfast', NULL, 1, '2022-05-12 15:03:50'),
(3, 'Yogurt and fruit parfaits', 'provides calcium, an important mineral for strong bones, making it a great addition to your breakfast', 'Breakfast', NULL, 1, '2022-05-12 15:03:50'),
(4, 'Bell pepper egg cups', 'a simple, veggie-loaded breakfast, slice bell peppers in half lengthwise and remove the stems and seeds. Place them into a greased baking dish and cook them for 15 minutes at 350°F (175°C)', 'Breakfast', NULL, 1, '2022-05-12 15:03:50'),
(5, 'Overnight oats', 'an easy breakfast option that requires no prep time in the morning. Plus, they’re made with basic ingredients that won’t break the bank', 'Breakfast', NULL, 1, '2022-05-12 15:03:50'),
(6, 'Brunch Burrito', 'Consists of a flour tortilla tightly wrapped around a filling of various American breakfast ingredients. \r\n                              Breakfast burritos typically feature bacon or sausage, potatoes, eggs, veggies, jalapeño, and salsa', 'Brunch', NULL, 1, '2022-05-12 15:03:50'),
(7, 'Cinnamon Rolls', 'Sweet rolled pastry made with a yeasted dough, gooey cinnamon-sugar filling, and topped with cream cheese icing', 'Brunch', NULL, 1, '2022-05-12 15:03:50'),
(8, 'Eggs Benedict', 'A classic breakfast dish made of a bread base (such as an English muffin, toast, or even a crab cake) and stacked high with a soft poached egg', 'Brunch', NULL, 1, '2022-05-12 15:03:50'),
(9, 'French Toast', 'Breakfast and brunch dish made with old bread slices that are soaked in a milk and egg mixture and fried until golden brown and crispy', 'Brunch', NULL, 1, '2022-05-12 15:03:50'),
(10, 'Omelet', 'Beaten eggs fried in fat in a pan. They can be folded, rolled, or cooked flat like a pancake', 'Brunch', NULL, 1, '2022-05-12 15:03:50'),
(11, 'Italian pasta salad', 'salad can be a balanced, nutritious meal. It’s often made with cooked pasta, non-starchy vegetables, and meat, cheese, or beans', 'Lunch', NULL, 1, '2022-05-12 15:03:50'),
(12, 'Pork Sinigang', 'A popular Filipino sour soup that makes use of different souring agents to flavor the broth', 'Lunch', NULL, 1, '2022-05-12 15:03:50'),
(13, 'Healthy tuna salad with cranberries', 'A budget-friendly ingredient to keep in your pantry for quick meals', 'Lunch', NULL, 1, '2022-05-12 15:03:50'),
(14, 'Veggie quesadillas', 'One of the easiest recipes to make, and they’re a good way to get kids to eat more veggies', 'Lunch', NULL, 1, '2022-05-12 15:03:50'),
(15, 'Tofu Scramble', 'This vegan tofu scramble tastes so similar to actual scrambled eggs! Made with tofu, turmeric, nutritional yeast, spices, and packed with veggies', 'Lunch', NULL, 1, '2022-05-12 15:03:50'),
(16, 'Red bell pepper with guacamole', 'The combo of red bell peppers and guac gives you plenty of nutrients that help keep you feeling full for hours', 'Afternoon Snack', NULL, 1, '2022-05-12 15:03:50'),
(17, 'Apple slices with peanut butter', 'one hand, apples are a fiber-rich fruit. On the other hand, peanuts provide healthy fats, plant-based protein, and fiber — pretty much all of the filling nutrients you should look for in a snack', 'Afternoon Snack', NULL, 1, '2022-05-12 15:03:50'),
(18, 'Celery sticks with cream cheese', 'This duo will have you enjoying a fiber-packed snack that combines a crunchy texture from the celery with creaminess from the cheese', 'Afternoon Snack', NULL, 1, '2022-05-12 15:03:50'),
(19, 'Dark chocolate and almonds', 'Dark chocolate and almonds are a fantastic pair. The rich chocolate flavor paired with the crunchy nuts is a powerful flavor and health duo.', 'Afternoon Snack', NULL, 1, '2022-05-12 15:03:50'),
(20, 'Hard-boiled eggs', 'one of the healthiest and most weight-loss-friendly foods you can eat. They are incredibly filling, thanks to their protein content', 'Afternoon Snack', NULL, 1, '2022-05-12 15:03:50'),
(21, 'Fridge/freezer stir-fry', 'stir-fries typically consist of protein, non-starchy veggies, and a carbohydrate, such as rice or noodles. Therefore, they’re balanced meals that will keep you full', 'Dinner', NULL, 1, '2022-05-12 15:03:50'),
(22, 'Baked potato bar with healthy toppings', 'one of the most affordable bases for a healthy meal. Plus, potatoes are incredibly nutritious, providing potassium, magnesium, iron, and vitamins B6 and C', 'Dinner', NULL, 1, '2022-05-12 15:03:50'),
(23, 'Caprese chicken breasts', 'For a delicious meal that`s on the table in 30 minutes, try chicken breasts made with caprese salad ingredients — tomatoes, mozzarella, and basil.', 'Dinner', NULL, 1, '2022-05-12 15:03:50'),
(24, 'Healthy mac and cheese (with veggies)', 'Mac and cheese is always a crowd-pleaser, and adding veggies to it brings the nutrition up a notch', 'Dinner', NULL, 1, '2022-05-12 15:03:50'),
(25, 'Slow cooker beef and broccoli', 'a popular take-out dish that you can easily make at home with wholesome ingredients for a more affordable price', 'Dinner', NULL, 1, '2022-05-12 15:03:50'),
(26, 'Tart Cherries', 'Contains the phytochemical procyanidin B-2, thought to protect the amino acid tryptophan in your blood, which can be used to make melatonin', 'Midnight Snack', NULL, 1, '2022-05-12 15:03:50'),
(27, 'Banana With Almond Butter', 'Almonds and almond butter supply some melatonin as well. Plus, they’re a good source of healthy fats, vitamin E and magnesium', 'Midnight Snack', NULL, 1, '2022-05-12 15:03:50'),
(28, 'Protein Smoothie', 'moothies are an easy and tasty way to sneak in protein-rich milk before bed.', 'Midnight Snack', NULL, 1, '2022-05-12 15:03:50'),
(29, 'Kiwis', 'one of few fruits containing a good amount of the nerve messenger serotonin, which has a relaxing effect and can help you fall asleep faster. Serotonin also helps curb carb cravings', 'Midnight Snack', NULL, 1, '2022-05-12 15:03:50'),
(30, 'Pistachios', 'Pistachios stand out among other nuts for their high levels of sleep-promoting melatonin', 'Midnight Snack', NULL, 1, '2022-05-12 15:03:50');

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

--
-- Dumping data for table `rs_meal_ingredients`
--

INSERT INTO `rs_meal_ingredients` (`id`, `meal_id`, `ingredient_name`, `calories`, `created_by`, `created_at`) VALUES
(1, 1, 'Toast', 97.5, 1, '2022-05-12 15:03:50'),
(2, 1, 'Avocado', 97.5, 1, '2022-05-12 15:03:50'),
(3, 2, 'Eggs', 155, 1, '2022-05-12 15:03:50'),
(4, 2, 'Milk', 42, 1, '2022-05-12 15:03:50'),
(5, 2, 'Onion', 40, 1, '2022-05-12 15:03:50'),
(6, 2, 'Broccoli', 45, 1, '2022-05-12 15:03:50'),
(7, 2, 'Cheese', 402, 1, '2022-05-12 15:03:50'),
(8, 3, 'Yogurt', 59, 1, '2022-05-12 15:03:50'),
(9, 3, 'Apple', 52, 1, '2022-05-12 15:03:50'),
(10, 3, 'Strawberry', 33, 1, '2022-05-12 15:03:50'),
(11, 3, 'Nuts', 607, 1, '2022-05-12 15:03:50'),
(12, 4, 'Bell Pepper', 30, 1, '2022-05-12 15:03:50'),
(13, 4, 'Eggs', 155, 1, '2022-05-12 15:03:50'),
(14, 5, 'Milk', 42, 1, '2022-05-12 15:03:50'),
(15, 5, 'Oats', 303, 1, '2022-05-12 15:03:50'),
(16, 6, 'Sausage', 346, 1, '2022-05-12 15:03:50'),
(17, 6, 'Potato', 77, 1, '2022-05-12 15:03:50'),
(18, 6, 'Eggs', 155, 1, '2022-05-12 15:03:50'),
(19, 6, 'Jalapeno', 28, 1, '2022-05-12 15:03:50'),
(20, 6, 'Salsa', 36, 1, '2022-05-12 15:03:50'),
(21, 7, 'Dough', 289, 1, '2022-05-12 15:03:50'),
(22, 7, 'Cinnamon', 247, 1, '2022-05-12 15:03:50'),
(23, 7, 'Icing', 418, 1, '2022-05-12 15:03:50'),
(24, 8, 'Toast', 313, 1, '2022-05-12 15:03:50'),
(25, 8, 'Eggs', 155, 1, '2022-05-12 15:03:50'),
(26, 8, 'Butter', 717, 1, '2022-05-12 15:03:50'),
(27, 9, 'Toast', 313, 1, '2022-05-12 15:03:50'),
(28, 9, 'Eggs', 155, 1, '2022-05-12 15:03:50'),
(29, 9, 'Bacon', 541, 1, '2022-05-12 15:03:50'),
(30, 9, 'Syrup', 260, 1, '2022-05-12 15:03:50'),
(31, 10, 'Eggs', 155, 1, '2022-05-12 15:03:50'),
(32, 11, 'Diced Chicken', 231, 1, '2022-05-12 15:03:50'),
(33, 11, 'Mozzarella Cheese', 280, 1, '2022-05-12 15:03:50'),
(34, 11, 'White Beans', 67, 1, '2022-05-12 15:03:50'),
(35, 12, 'Pork', 242, 1, '2022-05-12 15:03:50'),
(36, 12, 'Water Spinach', 19, 1, '2022-05-12 15:03:50'),
(37, 12, 'Tomatoes', 33, 1, '2022-05-12 15:03:50'),
(38, 13, 'Canned Tuna', 159, 1, '2022-05-12 15:03:50'),
(39, 13, 'Spinach', 23, 1, '2022-05-12 15:03:50'),
(40, 13, 'Cranberries', 308, 1, '2022-05-12 15:03:50'),
(41, 14, 'Canned Tuna', 159, 1, '2022-05-12 15:03:50'),
(42, 14, 'Spinach', 23, 1, '2022-05-12 15:03:50'),
(43, 14, 'Tortilla', 237, 1, '2022-05-12 15:03:50'),
(44, 14, 'Cheese', 402, 1, '2022-05-12 15:03:50'),
(45, 15, 'Tofu', 76, 1, '2022-05-12 15:03:50'),
(46, 15, 'Spinach', 23, 1, '2022-05-12 15:03:50'),
(47, 15, 'Onions', 40, 1, '2022-05-12 15:03:50'),
(48, 16, 'Red Bell Pepper', 31, 1, '2022-05-12 15:03:50'),
(49, 16, 'Guacamole', 45, 1, '2022-05-12 15:03:50'),
(50, 17, 'Apple', 52, 1, '2022-05-12 15:03:50'),
(51, 17, 'Peanut Butter', 588, 1, '2022-05-12 15:03:50'),
(52, 18, 'Celery', 14, 1, '2022-05-12 15:03:50'),
(53, 18, 'Cream Cheese', 342, 1, '2022-05-12 15:03:50'),
(54, 19, 'Dark Chocolate', 160, 1, '2022-05-12 15:03:50'),
(55, 19, 'Almonds', 162, 1, '2022-05-12 15:03:50'),
(56, 20, 'Eggs', 155, 1, '2022-05-12 15:03:50'),
(57, 21, 'Broccoli', 45, 1, '2022-05-12 15:03:50'),
(58, 21, 'Carrots', 41, 1, '2022-05-12 15:03:50'),
(59, 21, 'Cauliflower', 25, 1, '2022-05-12 15:03:50'),
(60, 22, 'Potato', 77, 1, '2022-05-12 15:03:50'),
(61, 22, 'Avocado', 97.5, 1, '2022-05-12 15:03:50'),
(62, 22, 'Sour Cream', 193, 1, '2022-05-12 15:03:50'),
(63, 23, 'Tomatoes', 33, 1, '2022-05-12 15:03:50'),
(64, 23, 'Mozzarella', 280, 1, '2022-05-12 15:03:50'),
(65, 23, 'Basil', 22, 1, '2022-05-12 15:03:50'),
(66, 23, 'Chicken Breast', 165, 1, '2022-05-12 15:03:50'),
(67, 24, 'Cheddar Cheese', 402, 1, '2022-05-12 15:03:50'),
(68, 24, 'Elbow Macaroni', 371, 1, '2022-05-12 15:03:50'),
(69, 24, 'Parmesan', 431, 1, '2022-05-12 15:03:50'),
(70, 24, 'Carrots', 41, 1, '2022-05-12 15:03:50'),
(71, 24, 'Broccoli', 45, 1, '2022-05-12 15:03:50'),
(72, 25, 'Beef', 250, 1, '2022-05-12 15:03:50'),
(73, 25, 'Broccoli', 45, 1, '2022-05-12 15:03:50'),
(74, 26, 'Tart Cherries', 60, 1, '2022-05-12 15:03:50'),
(75, 27, 'Banana', 89, 1, '2022-05-12 15:03:50'),
(76, 27, 'Almond Butter', 614, 1, '2022-05-12 15:03:50'),
(77, 28, 'Banana', 89, 1, '2022-05-12 15:03:50'),
(78, 28, 'Strawberries', 33, 1, '2022-05-12 15:03:50'),
(79, 28, 'Blueberries', 30, 1, '2022-05-12 15:03:50'),
(80, 28, 'Raspberries', 53, 1, '2022-05-12 15:03:50'),
(81, 29, 'Kiwis', 61, 1, '2022-05-12 15:03:50'),
(82, 30, 'Pistachios', 562, 1, '2022-05-12 15:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `rs_student_meal`
--

CREATE TABLE `rs_student_meal` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meal_name` varchar(100) NOT NULL,
  `meal_description` varchar(100) NOT NULL,
  `meal_category` varchar(50) NOT NULL,
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
  `middlename` varchar(50) DEFAULT '',
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
(1, 'calilchristopher052997@gmail.com', 'Calil Christopher', 'null', 'Jaudian', '1997-05-29', 'Male', 180.34, 198.41, 45.21, '2022-05-12 23:03:50', 1),
(2, 'barata.bryannikko.dev@gmail.com', 'Bryan Nikko', 'Vitug', 'Barata', '1994-02-11', 'Male', 182.88, 176.37, 40.2, '2022-05-12 23:03:50', 1),
(3, 'patrick@gmail.com', 'Ben Patrick', 'Vitug', 'Chua', '2004-01-31', 'Male', 165.1, 154.324, 30.8, '2022-05-12 23:03:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_workout`
--

CREATE TABLE `rs_workout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workout_date` date NOT NULL DEFAULT current_timestamp(),
  `workout_duration` varchar(60) NOT NULL,
  `calories_burned` float NOT NULL,
  `description` varchar(100) DEFAULT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rs_meal_ingredients`
--
ALTER TABLE `rs_meal_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `rs_student_meal`
--
ALTER TABLE `rs_student_meal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rs_users`
--
ALTER TABLE `rs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rs_workout`
--
ALTER TABLE `rs_workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
