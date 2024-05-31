-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2024 at 05:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quilet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `title` varchar(255) NOT NULL,
  `corr` int NOT NULL,
  `wrong` int NOT NULL,
  `total` int NOT NULL,
  `tag` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`title`, `corr`, `wrong`, `total`, `tag`, `date`, `eid`) VALUES
('Pseudoscience', 2, 2, 1, 'science', '2024-05-21 19:58:53', '664c8c7de58ee'),
('Astronomy', 2, 1, 2, 'science', '2024-05-21 19:59:34', '664c8ca6bbed4'),
('Php', 2, 1, 15, 'PHP', '2024-05-21 20:07:29', '664c8e8194768'),
('Mythology', 2, 1, 1, 'gods', '2024-05-23 12:53:46', '664ecbda9d624');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `FilesID` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `downloads` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categ` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`FilesID`, `name`, `size`, `downloads`, `categ`) VALUES
(17, 'Blue-Professional-CV-Resume_2.pdf', '97819', '0', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`id`, `question`, `answer`) VALUES
(48, 'fsdgdhg', 'eryertdyhert');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int NOT NULL,
  `eid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(250) NOT NULL,
  `correct_answer` varchar(250) NOT NULL,
  `marks` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `eid`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `marks`) VALUES
(15, '664c8c7de58ee', 'The study of something that claims or appears to be scientific in nature, but is not related to science is known as what?', 'Pseudoscience', 'Alchemy', 'Mysticism', 'None of the answers are correct.', 'a', 1),
(16, '664c8ca6bbed4', 'how many moons are there in jupiter', '45', '23', '95', '60', 'c', 1),
(17, '664c8ca6bbed4', 'what is the closest planet to the sun', 'Earth', 'Mercury', 'Saturn', 'Jupiter', 'b', 1),
(18, '664c8e8194768', 'a', '1', '2', '3', '4', 'a', 1),
(19, '664c8e8194768', 'b', '1', '2', '3', '4', 'c', 1),
(20, '664c8e8194768', 'c', '45', '23', '95', '60', 'c', 1),
(21, '664c8e8194768', 'd', '45', '2', '4', '2', 'b', 1),
(22, '664c8e8194768', 'v', '2', '3', '4', '2', 'c', 1),
(23, '664c8e8194768', 'asd', 'q', 's', 'd', 'w', 'c', 1),
(24, '664c8e8194768', '3', 'f', 's', 'fx', 's', 'b', 1),
(25, '664c8e8194768', 'The study of something that claims or appears to be scientific in nature, but is not related to science is known as what?', '45', '23', '95', '60', 'a', 1),
(26, '664c8e8194768', 'how many moons are there in jupiter', '45', '23', '95', '60', 'b', 1),
(27, '664c8e8194768', 'The study of something that claims or appears to be scientific in nature, but is not related to science is known as what?', 'Pseudoscience', 'Alchemy', 'Mysticism', 'None of the answers are correct.', 'c', 1),
(28, '664c8e8194768', 'how many moons are there in jupiter', '45', 'Alchemy', 'Mysticism', '60', 'c', 1),
(29, '664c8e8194768', 'The study of something that claims or appears to be scientific in nature, but is not related to science is known as what?', '45', 'Alchemy', 'Mysticism', 'None of the answers are correct.', 'c', 1),
(30, '664c8e8194768', 'how many moons are there in jupiter', '45', 'Alchemy', '95', 'None of the answers are correct.', 'b', 1),
(31, '664c8e8194768', 'The study of something that claims or appears to be scientific in nature, but is not related to science is known as what?', 'Pseudoscience', 'Alchemy', '95', '60', 'a', 1),
(32, '664c8e8194768', 'how many moons are there in jupiter', 'Pseudoscience', '23', 'Mysticism', 'None of the answers are correct.', 'b', 1),
(33, '664ecbda9d624', 'Who is the king of the gods?', 'Zeus', 'Hades', 'Hera', 'Hestia', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `email_verified_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `verification_code`, `email_verified_at`) VALUES
(44, 'asdfasfwe', 'ict1mercado.cdlb@gmail.com', '$2y$10$My2hx5Ty27hfP1zsRU45eeBZx.iuThFS8RZynd4P5gRQH6.oX203u', '733483', '2024-05-18 12:20:28.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `eid` varchar(255) NOT NULL,
  `qid` int NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `eid`, `qid`, `answer`) VALUES
(28, 44, '664c8c7de58ee', 15, 'a'),
(29, 44, '664c8c7de58ee', 15, 'a'),
(30, 44, '664c8c7de58ee', 15, 'a'),
(31, 44, '664c8e8194768', 18, 'c'),
(32, 44, '664c8e8194768', 19, 'c'),
(33, 44, '664c8e8194768', 20, 'c'),
(34, 44, '664c8e8194768', 21, 'c'),
(35, 44, '664c8e8194768', 22, 'd'),
(36, 44, '664c8e8194768', 23, 'b'),
(37, 44, '664c8e8194768', 24, 'b'),
(38, 44, '664c8e8194768', 25, 'c'),
(39, 44, '664c8e8194768', 26, 'c'),
(40, 44, '664c8e8194768', 27, 'c'),
(41, 44, '664c8e8194768', 28, 'b'),
(42, 44, '664c8e8194768', 29, 'c'),
(43, 44, '664c8e8194768', 30, 'b'),
(44, 44, '664c8e8194768', 31, 'b'),
(45, 44, '664c8e8194768', 32, 'b'),
(46, 44, '664c8ca6bbed4', 16, ''),
(47, 44, '664c8ca6bbed4', 17, ''),
(48, 44, '664c8ca6bbed4', 16, ''),
(49, 44, '664c8ca6bbed4', 17, 'c'),
(50, 44, '664c8ca6bbed4', 16, 'c'),
(51, 44, '664c8ca6bbed4', 17, 'c'),
(52, 44, '664c8ca6bbed4', 16, 'c'),
(53, 44, '664c8ca6bbed4', 17, 'c'),
(54, 44, '664c8ca6bbed4', 16, 'c'),
(55, 44, '664c8ca6bbed4', 17, 'c'),
(56, 44, '664c8c7de58ee', 15, ''),
(57, 44, '664c8c7de58ee', 15, ''),
(58, 44, '664c8c7de58ee', 15, 'b'),
(59, 44, '664c8c7de58ee', 15, 'c'),
(60, 44, '664c8c7de58ee', 15, 'd'),
(61, 44, '664c8c7de58ee', 15, 'b'),
(62, 44, '664c8c7de58ee', 15, 'b'),
(63, 44, '664c8ca6bbed4', 16, 'c'),
(64, 44, '664c8ca6bbed4', 17, 'c'),
(65, 44, '664c8ca6bbed4', 16, 'c'),
(66, 44, '664c8ca6bbed4', 17, 'c'),
(67, 44, '664c8c7de58ee', 15, 'b'),
(68, 44, '664c8c7de58ee', 15, 'b'),
(69, 44, '664c8c7de58ee', 15, 'a'),
(70, 44, '664c8c7de58ee', 15, 'd'),
(71, 44, '664c8ca6bbed4', 16, 'c'),
(72, 44, '664c8ca6bbed4', 17, 'b'),
(73, 44, '664ecbda9d624', 33, 'b'),
(74, 44, '664ecbda9d624', 33, 'a'),
(75, 44, '664ecbda9d624', 33, 'd'),
(76, 44, '664ecbda9d624', 33, 'a'),
(77, 44, '664c8ca6bbed4', 16, 'c'),
(78, 44, '664c8ca6bbed4', 17, 'c'),
(79, 44, '664c8ca6bbed4', 16, 'c'),
(80, 44, '664c8ca6bbed4', 17, 'c'),
(81, 44, '664c8ca6bbed4', 16, 'c'),
(82, 44, '664c8ca6bbed4', 17, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `eid` varchar(255) NOT NULL,
  `score` int NOT NULL,
  `correct_answers` int NOT NULL,
  `wrong_answers` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_scores`
--

INSERT INTO `user_scores` (`id`, `user_id`, `eid`, `score`, `correct_answers`, `wrong_answers`, `date`) VALUES
(9, 44, '664c8c7de58ee', 1, 1, 0, '2024-05-23 04:21:08'),
(10, 44, '664c8c7de58ee', 1, 1, 0, '2024-05-23 04:21:33'),
(11, 44, '664c8c7de58ee', 1, 1, 0, '2024-05-23 04:21:58'),
(12, 44, '664c8e8194768', 7, 7, 8, '2024-05-23 04:24:09'),
(13, 44, '664c8ca6bbed4', 0, 0, 2, '2024-05-23 04:32:36'),
(14, 44, '664c8ca6bbed4', 0, 0, 2, '2024-05-23 04:32:40'),
(15, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 04:32:44'),
(16, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 04:32:54'),
(17, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 04:33:00'),
(18, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:33:49'),
(19, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:33:52'),
(20, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:33:57'),
(21, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:34:00'),
(22, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:34:04'),
(23, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:41:10'),
(24, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:42:36'),
(25, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 04:46:31'),
(26, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 04:47:01'),
(27, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:47:26'),
(28, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:50:39'),
(29, 44, '664c8c7de58ee', 1, 1, 0, '2024-05-23 04:51:38'),
(30, 44, '664c8c7de58ee', 0, 0, 1, '2024-05-23 04:51:44'),
(31, 44, '664c8ca6bbed4', 2, 2, 0, '2024-05-23 04:52:08'),
(32, 44, '664ecbda9d624', 0, 0, 1, '2024-05-23 04:54:42'),
(33, 44, '664ecbda9d624', 1, 1, 0, '2024-05-23 04:54:47'),
(34, 44, '664ecbda9d624', 0, 0, 1, '2024-05-23 04:54:50'),
(35, 44, '664ecbda9d624', 1, 1, 0, '2024-05-23 04:54:54'),
(36, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 05:00:38'),
(37, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 05:02:34'),
(38, 44, '664c8ca6bbed4', 1, 1, 1, '2024-05-23 05:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `category` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `embed_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `category`, `youtube_url`, `embed_url`, `created_at`) VALUES
(1, 'Science', 'https://www.youtube.com/watch?v=f02fIW5V9n8', 'https://www.youtube.com/embed/f02fIW5V9n8', '2024-05-19 06:14:44'),
(2, 'Mathematics', 'https://www.youtube.com/watch?v=AGSgDa9Jyso&t=2s', 'https://www.youtube.com/embed/AGSgDa9Jyso&t=2s', '2024-05-19 06:20:58'),
(3, 'Communication', 'https://www.youtube.com/watch?v=PmtVcTgu9lI', 'https://www.youtube.com/embed/PmtVcTgu9lI', '2024-05-19 06:32:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FilesID`);

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`eid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test2` (`user_id`);

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test1` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FilesID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_scores`
--
ALTER TABLE `user_scores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `test` FOREIGN KEY (`eid`) REFERENCES `exam` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `test2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD CONSTRAINT `test1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
