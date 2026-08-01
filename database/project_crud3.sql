-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2026 at 09:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_crud3`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'sheehan', 'sheehan@gmail.com', 'please read', 'your website is suck bro', '2026-07-31 00:56:36', '2026-07-31 00:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `year_start` smallint(4) NOT NULL,
  `year_end` smallint(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `year_start`, `year_end`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
(1, 2023, 2026, 'NEWEST ERA', 'THIS IS NEWEST ERA', 'The travelers stood frozen at the edge of the cliff as the sky suddenly split open with a brilliant, golden light. A divine being descended slowly from the swirling clouds, its radiant form casting a warm glow over the ancient, quiet valley. No one dared to speak or breathe, overwhelmed by the pure peace and immense power radiating from the holy entity. With a gentle wave of its hand, the creature healed the barren land, turning the dry dirt into a field of blooming flowers.', '2026-08-01 01:37:29', '2026-08-01 07:13:20'),
(2, 2011, 2014, 'NEW ERA', 'THIS IS NEW ERA', 'The travelers stood frozen at the edge of the cliff as the sky suddenly split open with a brilliant, golden light. A divine being descended slowly from the swirling clouds, its radiant form casting a warm glow over the ancient, quiet valley. No one dared to speak or breathe, overwhelmed by the pure peace and immense power radiating from the holy entity. With a gentle wave of its hand, the creature healed the barren land, turning the dry dirt into a field of blooming flowers.', '2026-08-01 01:47:43', '2026-08-01 07:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `website_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `ig` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `email`, `phone`, `address`, `description`, `ig`, `created_at`, `updated_at`) VALUES
(3, 'Muse Dash', 'musedash@gmail.com', '089637288051', 'UNDERWORLD', 'An ancient story says that a divine being created the stars and the moon in the sky. The travelers watched in awe as the divine being emerged from the golden clouds.', 'sheehandy_', '2026-07-30 02:55:34', '2026-08-01 06:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `button1_text` varchar(30) NOT NULL,
  `button1_link` varchar(50) NOT NULL,
  `button2_text` varchar(30) NOT NULL,
  `button2_link` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `description`, `button1_text`, `button1_link`, `button2_text`, `button2_link`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(13, 'NEW ERA', 'ANARCHY GOD', 'PLAY WITH US!!', 'CALL ME', 'thisislink', 'TEXT ME', 'thisislink2', '6a6d942a85d72_1299189.png', 1, '2026-07-31 04:58:22', '2026-08-01 06:37:30'),
(14, 'THIRD ERA', 'HUMAN GOD', 'YOU THINK YOU ARE WORTH!?', 'CALL ME', 'thisislink', 'TEXT ME', 'thisislink2', '6a6d954fafe41_1327523.png', 1, '2026-07-31 04:58:30', '2026-08-01 06:42:23'),
(15, 'SECOND ERA', 'THE GLUTTONY', 'LOOK AFTER ME! HAHA', 'CALL ME', 'nothing', 'TEXT ME', 'nothing', '6a6d70022aee5_1073827.jpg', 1, '2026-08-01 04:03:14', '2026-08-01 06:10:24'),
(16, 'FIRST ERA', 'DEATH GOD', 'INTENDED TO LIVE FOREVER...', 'CALL ME', 'thisislink', 'TEXT ME', 'tes1', '6a6d93bda405c_1333023.png', 1, '2026-08-01 05:03:00', '2026-08-01 06:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(13, 'test13', 'test13@gmail.com', '$2y$10$tf2IJ//vkzywytDsMtlaJuM6FazGjwxkAkwZHPwEBoSH6MDCgF/X6'),
(14, 'admin', 'admin@gmail.com', '$2y$10$Zgogx3lTikSWia3XMtGWUuvC/hl2VaDBx6LN3R0qn/0HLKWRvd6K.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
