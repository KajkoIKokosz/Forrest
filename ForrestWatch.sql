-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~xenial.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2016 at 02:23 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ForrestWatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `environment`
--

CREATE TABLE `environment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `environment`
--

INSERT INTO `environment` (`id`, `name`) VALUES
(2, 'Łęg wierzbowo-topolowy'),
(3, 'Piętro hal alpejskich'),
(1, 'Taras zalewowy');

-- --------------------------------------------------------

--
-- Table structure for table `environment_questions`
--

CREATE TABLE `environment_questions` (
  `environment_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kingdom`
--

CREATE TABLE `kingdom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `king_dom`
--

CREATE TABLE `king_dom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `king_dom`
--

INSERT INTO `king_dom` (`id`, `name`) VALUES
(1, 'Zwierzęta'),
(2, 'Grzyby'),
(3, 'Rośliny');

-- --------------------------------------------------------

--
-- Table structure for table `phylum`
--

CREATE TABLE `phylum` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kingdom_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phylum`
--

INSERT INTO `phylum` (`id`, `name`, `kingdom_id`) VALUES
(1, 'Ptaki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `source`, `description`, `question_id`, `image_name`) VALUES
(1, 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaa', 25, 'kot.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `questionContent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phylum_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic`, `questionContent`, `phylum_id`, `user_id`) VALUES
(18, 'Pies z dupy', 'TO jest pies z dupy', NULL, NULL),
(19, 'Pies z dupy', 'TO jest pies z dupy', NULL, NULL),
(20, 'Pies z dupy', 'TO jest pies z dupy', NULL, NULL),
(21, 'Pies z dupy', 'TO jest pies z dupy', NULL, NULL),
(22, 'TO jest pies z dupy', 'a ten nie', NULL, NULL),
(23, 'TO jest pies z dupy', 'dsddd', NULL, NULL),
(24, 'ldldl', 'lflflfl', NULL, NULL),
(25, 'wejriowe', 'reterte', NULL, NULL),
(27, 'Chrząszcz w jeziorze', 'Widziałem go', NULL, NULL),
(28, 'kfkfk', 'kfdkfk', NULL, NULL),
(29, 'Czy pies ma dupe', 'fff', NULL, NULL),
(30, 'kkdk', 'kfkfk', NULL, NULL),
(31, 'pies', 'kotlet', NULL, NULL),
(32, 'pies', 'koza', NULL, NULL),
(33, 'lol', 'kkkoookokoko', NULL, NULL),
(34, 'stefan', 'stefan był', NULL, NULL),
(35, 'JAdzia', 'Zdjęcie jadzi', NULL, NULL),
(36, 'ddd', 'ffff', NULL, NULL),
(37, 'ddd', 'ffff', NULL, NULL),
(38, 'Pies', 'Widziałęm psa', 1, NULL),
(39, 'Pies', 'Widziałęm psa', 1, NULL),
(40, 'jfjfkfkk', 'dkdkdkdk', NULL, NULL),
(41, 'ldflflfl', 'jfjfj', NULL, NULL),
(42, 'ldflflfl', 'jfjfj', NULL, NULL),
(43, 'stefan', 'ldlflfl', NULL, NULL),
(44, 'stefan', 'ldlflfl', NULL, NULL),
(45, 'Czy widzieliście krokodyla w autobusie', 'Kropodyl to był', NULL, NULL),
(46, 'Czy psy mają dupe?', 'Podobno pies nie ma dupy widziałem takiego', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions_region`
--

CREATE TABLE `questions_region` (
  `questions_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Mazowsze'),
(2, 'Tatry'),
(3, 'Kampinos'),
(4, 'Pojezierze drawsko-pomorskie');

-- --------------------------------------------------------

--
-- Table structure for table `responces`
--

CREATE TABLE `responces` (
  `id` int(11) NOT NULL,
  `responce` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latinName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phylum_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `name`, `latinName`, `phylum_id`) VALUES
(1, 'Sowa', 'Bubo bobo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `species_questions`
--

CREATE TABLE `species_questions` (
  `species_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `species_questions`
--

INSERT INTO `species_questions` (`species_id`, `questions_id`) VALUES
(1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `environment`
--
ALTER TABLE `environment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4626DE225E237E06` (`name`);

--
-- Indexes for table `environment_questions`
--
ALTER TABLE `environment_questions`
  ADD PRIMARY KEY (`environment_id`,`questions_id`),
  ADD KEY `IDX_48EF971C903E3A94` (`environment_id`),
  ADD KEY `IDX_48EF971CBCB134CE` (`questions_id`);

--
-- Indexes for table `kingdom`
--
ALTER TABLE `kingdom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_256D96145E237E06` (`name`);

--
-- Indexes for table `king_dom`
--
ALTER TABLE `king_dom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phylum`
--
ALTER TABLE `phylum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2513DDEA5E237E06` (`name`),
  ADD KEY `IDX_2513DDEA6976FEC0` (`kingdom_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8F7C2FC01E27F6BF` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8ADC54D5721C6AEF` (`phylum_id`),
  ADD KEY `IDX_8ADC54D5A76ED395` (`user_id`);

--
-- Indexes for table `questions_region`
--
ALTER TABLE `questions_region`
  ADD PRIMARY KEY (`questions_id`,`region_id`),
  ADD KEY `IDX_5654B4F1BCB134CE` (`questions_id`),
  ADD KEY `IDX_5654B4F198260155` (`region_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responces`
--
ALTER TABLE `responces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D793CE41E27F6BF` (`question_id`),
  ADD KEY `IDX_2D793CE4A76ED395` (`user_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A50FF7128E94AB99` (`latinName`),
  ADD KEY `IDX_A50FF712721C6AEF` (`phylum_id`);

--
-- Indexes for table `species_questions`
--
ALTER TABLE `species_questions`
  ADD PRIMARY KEY (`species_id`,`questions_id`),
  ADD KEY `IDX_DA3FE42BB2A1D860` (`species_id`),
  ADD KEY `IDX_DA3FE42BBCB134CE` (`questions_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `environment`
--
ALTER TABLE `environment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kingdom`
--
ALTER TABLE `kingdom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `king_dom`
--
ALTER TABLE `king_dom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phylum`
--
ALTER TABLE `phylum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `responces`
--
ALTER TABLE `responces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `environment_questions`
--
ALTER TABLE `environment_questions`
  ADD CONSTRAINT `FK_48EF971C903E3A94` FOREIGN KEY (`environment_id`) REFERENCES `environment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_48EF971CBCB134CE` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phylum`
--
ALTER TABLE `phylum`
  ADD CONSTRAINT `FK_2513DDEA6976FEC0` FOREIGN KEY (`kingdom_id`) REFERENCES `king_dom` (`id`);

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `FK_8F7C2FC01E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_8ADC54D5721C6AEF` FOREIGN KEY (`phylum_id`) REFERENCES `phylum` (`id`),
  ADD CONSTRAINT `FK_8ADC54D5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions_region`
--
ALTER TABLE `questions_region`
  ADD CONSTRAINT `FK_5654B4F198260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5654B4F1BCB134CE` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `responces`
--
ALTER TABLE `responces`
  ADD CONSTRAINT `FK_2D793CE41E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `FK_2D793CE4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `species`
--
ALTER TABLE `species`
  ADD CONSTRAINT `FK_A50FF712721C6AEF` FOREIGN KEY (`phylum_id`) REFERENCES `phylum` (`id`);

--
-- Constraints for table `species_questions`
--
ALTER TABLE `species_questions`
  ADD CONSTRAINT `FK_DA3FE42BB2A1D860` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DA3FE42BBCB134CE` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
