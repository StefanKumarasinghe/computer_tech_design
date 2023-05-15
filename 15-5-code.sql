-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 02:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET sql_mode = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cos_design`
--

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `competition_id` bigint(20) NOT NULL,
  `name` int(11) NOT NULL,
  `round_num` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date` date NOT NULL,
  `ageGroup` varchar(255) NOT NULL,
  `championship` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competitors`
--

CREATE TABLE `competitors` (
  `player_id` bigint(20) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` enum('female','male','hidden') NOT NULL DEFAULT 'hidden',
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compResults`
--

CREATE TABLE `compResults` (
  `result_id` bigint(20) NOT NULL,
  `competition_id` bigint(20) NOT NULL,
  `round_id` bigint(20) NOT NULL,
  `range_id` bigint(20) NOT NULL,
  `end_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `end`
--

CREATE TABLE `end` (
  `end_id` bigint(20) NOT NULL,
  `shotId` bigint(20) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playerEnd`
--

CREATE TABLE `playerEnd` (
  `player_ids` bigint(20) NOT NULL,
  `end_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playerRange`
--

CREATE TABLE `playerRange` (
  `playerId` bigint(20) NOT NULL,
  `rangeId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playerRound`
--

CREATE TABLE `playerRound` (
  `player_id` bigint(20) NOT NULL,
  `round_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `range`
--

CREATE TABLE `range` (
  `range_id` bigint(20) NOT NULL,
  `distance` enum('20','30','40','50','60','70','90') DEFAULT NULL,
  `targetFace` enum('80','120') NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `round_id` bigint(20) NOT NULL,
  `rangeNum` int(11) NOT NULL,
  `equipment` enum('Recurve','Compound','Recurve Barebow','Compound Barebow','Longbow') DEFAULT 'Recurve',
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shot`
--

CREATE TABLE `shot` (
  `shotid` bigint(20) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`competition_id`);

--
-- Indexes for table `competitors`
--
ALTER TABLE `competitors`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `compResults`
--
ALTER TABLE `compResults`
  ADD PRIMARY KEY (`result_id`),
  ADD UNIQUE KEY `end_id` (`end_id`),
  ADD KEY `range_id` (`range_id`),
  ADD KEY `round_ids` (`round_id`),
  ADD KEY `competition_ids` (`competition_id`);

--
-- Indexes for table `end`
--
ALTER TABLE `end`
  ADD PRIMARY KEY (`end_id`),
  ADD KEY `shotid` (`shotId`);

--
-- Indexes for table `playerEnd`
--
ALTER TABLE `playerEnd`
  ADD KEY `end_id` (`end_id`),
  ADD KEY `player_id_ends` (`player_ids`);

--
-- Indexes for table `playerRange`
--
ALTER TABLE `playerRange`
  ADD KEY `player_idsx` (`playerId`),
  ADD KEY `range_idxs` (`rangeId`);

--
-- Indexes for table `playerRound`
--
ALTER TABLE `playerRound`
  ADD KEY `round_id` (`round_id`),
  ADD KEY `player_ids_round` (`player_id`) USING BTREE;

--
-- Indexes for table `range`
--
ALTER TABLE `range`
  ADD PRIMARY KEY (`range_id`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`round_id`);

--
-- Indexes for table `shot`
--
ALTER TABLE `shot`
  ADD PRIMARY KEY (`shotid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `competition_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competitors`
--
ALTER TABLE `competitors`
  MODIFY `player_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compResults`
--
ALTER TABLE `compResults`
  MODIFY `result_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `end`
--
ALTER TABLE `end`
  MODIFY `end_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `range`
--
ALTER TABLE `range`
  MODIFY `range_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `round_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shot`
--
ALTER TABLE `shot`
  MODIFY `shotid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compResults`
--
ALTER TABLE `compResults`
  ADD CONSTRAINT `competition_ids` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`competition_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `end_ids` FOREIGN KEY (`end_id`) REFERENCES `end` (`end_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `range_id` FOREIGN KEY (`range_id`) REFERENCES `range` (`range_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `round_ids` FOREIGN KEY (`round_id`) REFERENCES `round` (`round_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end`
--
ALTER TABLE `end`
  ADD CONSTRAINT `shotid` FOREIGN KEY (`shotId`) REFERENCES `shot` (`shotid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playerEnd`
--
ALTER TABLE `playerEnd`
  ADD CONSTRAINT `end_id` FOREIGN KEY (`end_id`) REFERENCES `end` (`end_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_id` FOREIGN KEY (`player_ids`) REFERENCES `competitors` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playerRange`
--
ALTER TABLE `playerRange`
  ADD CONSTRAINT `player_idsx` FOREIGN KEY (`playerId`) REFERENCES `competitors` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `range_idxs` FOREIGN KEY (`rangeId`) REFERENCES `range` (`range_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playerRound`
--
ALTER TABLE `playerRound`
  ADD CONSTRAINT `player_ids` FOREIGN KEY (`player_id`) REFERENCES `competitors` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `round_id` FOREIGN KEY (`round_id`) REFERENCES `round` (`round_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
