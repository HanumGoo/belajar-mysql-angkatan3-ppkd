-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2026 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.5.9

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
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(100) DEFAULT NULL,
  `project_total` int(11) DEFAULT NULL,
  `award_total` int(11) DEFAULT NULL,
  `customer_total` int(11) DEFAULT NULL,
  `coffee_total` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `subtitle`, `button_text`, `button_link`, `project_total`, `award_total`, `customer_total`, `coffee_total`, `created_at`, `updated_at`) VALUES
(1, 'WE WANT YOU... ', 'The Architect of Forgotten Dreams & The Echo of First Laughter', 'Click Test 1', 'google.com', 11, 1500, 2000, 9, '2026-08-03 06:53:31', '2026-08-06 05:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `blog_content`
--

CREATE TABLE `blog_content` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `comment_count` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_content`
--

INSERT INTO `blog_content` (`id`, `title`, `description`, `date`, `image`, `link`, `comment_count`, `created_at`, `updated_at`) VALUES
(1, 'Represents the raw, creative energy that builds an', 'It is the ultimate source of all creation and cosmic order.', '2026-08-04', '6a703668c168c_1299189.png', 'single.html', 12, '2026-08-03 06:34:16', '2026-08-06 01:26:14'),
(2, 'Highlights a power so vast that human minds cannot', 'It stands completely separate from flaws, sin, and earthly corruption.', '2026-08-06', '6a7036d90fb5f_1327523.png', 'single.html', 121, '2026-08-03 06:36:09', '2026-08-06 01:26:12'),
(3, 'Captures the intense, overwhelming feeling of stan', 'It can also mean a pure, spiritual spark that lives inside every human heart.', '2026-08-28', '6a7036f76c935_1333023.png', 'single.html', 111, '2026-08-03 06:36:39', '2026-08-06 01:26:07'),
(4, 'The Weaver of Silent Stars', 'This being spins the fate of all worlds using threads of pure light. They live far beyond the sky and do not speak. They watch time pass and gently tie the end of one life to the start of another.', '2026-08-28', '6a716a0ed8166_1250238.png', 'single.html', 501, '2026-08-04 04:26:54', '2026-08-06 01:26:04'),
(5, 'The Keeper of Broken Oaths', 'A quiet shadow who walks among people to listen to false promises. They hold a heavy iron book where every lie is written down. When promises fail, they bring a cold and fair balance to the world.', '2026-08-31', '6a716a3417702_1147525.png', 'single.html', 111, '2026-08-04 04:27:32', '2026-08-06 01:26:01'),
(6, 'The Warden of the First Flame', 'A giant made of stone and bright embers who guards the original spark of life. They stay deep under the earth to keep the dark away. They only share their fire with those who show a brave heart.', '2026-08-07', '6a716a58c63b0_1151519.png', 'single.html', 121, '2026-08-04 04:28:08', '2026-08-06 01:25:54');

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
(1, 'sheehan', 'sheehan@gmail.com', 'please read', 'your website is suck bro', '2026-07-31 00:56:36', '2026-07-31 00:57:13'),
(2, 'sheehan', 'sheehan@gmail.com', 'BRO', 'YOUR WEBSITE IS VERY JELEK BEROO', '2026-08-04 06:31:19', NULL),
(3, 'sheehan', 'sheehan@gmail.com', 'BRO', 'YOUR WEBSITE IS VERY JELEK BEROO', '2026-08-04 06:32:16', NULL),
(18, 'asdfas', 'sheehanandya001@gmail.com', 'test', 'asdf', '2026-08-04 07:10:48', NULL),
(20, 'sheehan', 'sheehanandya001@gmail.com', 'hello im very interest with this pict', 'can you send me more about this?', '2026-08-05 01:44:35', NULL),
(21, 'hello sir', 'sheehanandya001@gmail.com', 'hello sir', 'hello again', '2026-08-05 01:49:45', NULL),
(23, 'sheehan', 'sheehanandya001@gmail.com', 'hahahah jelek', 'blebleblebelb wleeeblebleblebelb wleeeblebleblebelb wleeeblebleblebelb wleeeblebleblebelb wleeeblebleblebelb wleee', '2026-08-05 03:36:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `created_at`, `updated_at`) VALUES
(1, 'lampu', 60000, 'Elektronik', '2026-08-03 01:22:56', NULL),
(2, 'sapu', 30000, 'Perabot', '2026-08-03 01:23:21', '2026-08-03 01:23:29'),
(3, 'meja', 80000, 'Perabot', '2026-08-03 01:23:51', NULL),
(4, 'kursi', 40000, 'Perabot', '2026-08-03 01:24:05', NULL),
(5, 'komputer', 200000, 'Elektronik', '2026-08-03 01:24:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `type`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'The Architecture of Silence', 'Finding Divine Presence in a Loud World.', '6a70233b212a2_1333023.png', 'second.html', '2026-08-03 05:02:37', '2026-08-06 01:26:53'),
(2, 'The Timeless Compass', 'Navigating Human Life with Perfect Foresight.', '6a7022e53fa5a_1327523.png', 'second.html', '2026-08-03 05:02:53', '2026-08-06 01:26:50'),
(3, 'Shadows to Sanctuary', 'How Divine Grace Heals the Broken Spirit.', '6a7023115e7c8_1299189.png', 'second.html', '2026-08-03 05:11:45', '2026-08-06 01:26:47'),
(4, 'The Sovereign Mind', 'Understanding the Skills and Traits of the Creator.', '6a70465b3e0e9_1392983.png', 'second.html', '2026-08-03 07:42:19', '2026-08-06 01:26:40'),
(5, 'Echoes of Eternity', 'Walking the Path of Absolute Love and Justice.', '6a70466becf3f_1192318.png', 'second.html', '2026-08-03 07:42:35', '2026-08-06 01:26:32'),
(6, 'The Infinite Pulse', 'How the Divine Shapes Our Daily Existence.', '6a7047c22351f_1079661.png', 'second.html', '2026-08-03 07:48:18', '2026-08-06 01:26:30'),
(7, 'Beyond the Mortal Veil', 'Unlocking the Unlimited Power of Divine Wisdom.', '6a7048d6c34c0_1299190.png', 'second.html', '2026-08-03 07:52:54', '2026-08-06 01:26:27');

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
(2, 2011, 2014, 'NEW ERA', 'THIS IS NEW ERA', 'The travelers stood frozen at the edge of the cliff as the sky suddenly split open with a brilliant, golden light. A divine being descended slowly from the swirling clouds, its radiant form casting a warm glow over the ancient, quiet valley. No one dared to speak or breathe, overwhelmed by the pure peace and immense power radiating from the holy entity. With a gentle wave of its hand, the creature healed the barren land, turning the dry dirt into a field of blooming flowers.', '2026-08-01 01:47:43', '2026-08-01 07:13:08'),
(5, 2026, 2026, 'THE ULTIMATE LAST FIGHT', 'THE FIGHT BETWEEN GODDESS', 'no records available', '2026-08-01 07:44:58', NULL),
(6, 2022, 2026, 'THE GODLY KILLER', 'ELIMINATE ALL!', 'no records available', '2026-08-01 07:46:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `icon_class` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon_class`, `created_at`, `updated_at`) VALUES
(1, 'Unconditional Love', 'flaticon-ideas', '2026-08-03 04:41:08', '2026-08-04 03:17:25'),
(2, 'Spiritual Guidance', 'flaticon-ideas', '2026-08-03 04:41:25', '2026-08-04 03:17:30'),
(4, 'Profound Healing', 'flaticon-analysis', '2026-08-03 07:05:19', '2026-08-04 03:17:34'),
(5, 'Daily Provision', 'flaticon-flasks', '2026-08-03 07:05:47', '2026-08-04 03:17:39'),
(6, 'Ultimate Protection', 'flaticon-analysis', '2026-08-03 07:09:13', '2026-08-04 03:17:44'),
(7, 'Forgiveness', 'flaticon-analysis', '2026-08-03 07:09:19', '2026-08-04 03:17:50');

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
(3, 'musedash.com', 'musedash@gmail.com', '089637288051', 'UNDERWORLD', 'An ancient story says that a divine being created the stars and the moon in the sky. The travelers watched in awe as the divine being emerged from the golden clouds.', 'sheehandy_', '2026-07-30 02:55:34', '2026-08-03 01:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `percentage` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'All-knowing Wisdom', 90, '2026-08-03 04:55:27', '2026-08-04 03:24:54'),
(2, 'Infinite Power', 100, '2026-08-03 04:55:37', '2026-08-04 03:25:00'),
(3, 'Presence Everywhere', 60, '2026-08-03 04:57:53', '2026-08-04 03:25:06'),
(4, 'Absolute Creation', 65, '2026-08-03 07:14:53', '2026-08-04 03:31:35'),
(5, 'Timeless Existence', 97, '2026-08-03 07:14:59', '2026-08-04 03:25:17'),
(6, 'Flawless Empathy', 89, '2026-08-03 07:15:05', '2026-08-04 03:25:25'),
(7, 'Flawless Justice', 71, '2026-08-03 07:16:11', '2026-08-04 03:25:21'),
(8, 'Perfect Foresight', 83, '2026-08-03 07:16:16', '2026-08-04 03:25:30'),
(9, 'Transforming Authority', 100, '2026-08-03 07:16:29', '2026-08-04 03:25:35'),
(10, 'Absolute Truth', 99, '2026-08-03 07:16:36', '2026-08-06 07:38:58');

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
(13, 'NEW ERA', 'ANARCHY GOD', 'PLAY WITH US!!', 'CALL ME', 'single.html', 'TEXT ME', 'second.html', '6a716e4ca137f_1299189.png', 1, '2026-07-31 04:58:22', '2026-08-06 01:35:28'),
(14, 'THIRD ERA', 'IDOL GOD', 'HEAVENLY RESONANCE...', 'CALL ME', 'single.html', 'TEXT ME', 'second.html', '6a6d954fafe41_1327523.png', 1, '2026-07-31 04:58:30', '2026-08-06 07:36:03'),
(15, 'SECOND ERA', 'THE GLUTTONY', 'LOOK AFTER ME! HAHA', 'CALL ME', 'single.html', 'TEXT ME', 'second.html', '6a6d70022aee5_1073827.jpg', 1, '2026-08-01 04:03:14', '2026-08-06 01:35:21'),
(16, 'FIRST ERA', 'VOCALOID GOD', 'INTENDED TO LIVE FOREVER...', 'CALL ME', 'single.html', 'TEXT ME', 'second.html', '6a6d93bda405c_1333023.png', 1, '2026-08-01 05:03:00', '2026-08-06 01:57:33');

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
(16, 'mikudayo1', 'admin1@gmail.com', '$2y$10$dsnlw/KenrzeLmA7JwPbNeUhZUQnhbRjge98TrfP/4YfDuRv5J1yu'),
(18, 'admin', 'admin@gmail.com', '$2y$10$aDBfDm4O/bS8F14.qXzAnO3v.td/RQADtocH5uXzLvj79Zk29ZE2K'),
(20, 'mikudayo11', 'hahaha@gmail.com', '$2y$10$uTNJdXf9HmnSXK6CSyPBIehSzGk2bkOX8AwC48VtGCAGbdUfeptSW'),
(21, 'admin', 'admin2@gmail.com', '$2y$10$S/S6evGzLN1l2mO22prtTOa8sfsdJnb5An5rmmtPfN2Bo5KqvY/We');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_content`
--
ALTER TABLE `blog_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_content`
--
ALTER TABLE `blog_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
