-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 06:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Quiz_ID` int(11) NOT NULL,
  `Quiz_Name` varchar(50) NOT NULL,
  `Quiz_Difficulty` enum('EASY','MEDIUM','HARD') DEFAULT NULL,
  `Quiz_Description` varchar(250) DEFAULT NULL,
  `Course_ID` int(11) DEFAULT NULL,
  `Quiz_PassingScore` int(4) NOT NULL,
  `Quiz_Type` enum('MC','I','ToF','MT') NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Is_Closed` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`Quiz_ID`, `Quiz_Name`, `Quiz_Difficulty`, `Quiz_Description`, `Course_ID`, `Quiz_PassingScore`, `Quiz_Type`, `User_ID`, `Is_Closed`) VALUES
(1, 'C Test no. 1', 'EASY', 'Test to see basic C syntax', 11, 60, 'MC', 1, b'0'),
(2, 'C Test no. 2', 'EASY', NULL, 11, 60, 'I', 2, b'0'),
(4, 'Can you Java 1', 'EASY', NULL, 23, 60, 'I', 2, b'0'),
(5, 'Can you Java 2', 'MEDIUM', NULL, 23, 60, 'ToF', 3, b'0'),
(6, 'Data Structures Exam 1', 'MEDIUM', NULL, 123, 50, 'MT', 0, b'0'),
(7, 'Data Structures Exam 2', 'HARD', NULL, 123, 45, 'MC', 0, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Quiz_ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `User_id` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
