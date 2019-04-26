-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 08:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` int(11) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Course_Description` varchar(250) NOT NULL,
  `Course_isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_log`
--

CREATE TABLE `course_log` (
  `Course_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Course_Status` enum('PASS','FAIL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `identification`
--

CREATE TABLE `identification` (
  `Question_ID` int(11) NOT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `multiplechoice`
--

CREATE TABLE `multiplechoice` (
  `Question_ID` int(11) NOT NULL,
  `Choice1` varchar(50) DEFAULT NULL,
  `Choice2` varchar(50) DEFAULT NULL,
  `Choice3` varchar(50) DEFAULT NULL,
  `Choice4` varchar(50) DEFAULT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Quiz_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Question_Description` varchar(250) NOT NULL,
  `Quiz_Type` enum('I','MC','MT','ToF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Quiz_ID` int(11) NOT NULL,
  `Quiz_Name` varchar(50) NOT NULL,
  `Quiz_Difficulty` enum('EASY','MEDIUM','HARD') DEFAULT NULL,
  `Quiz_Description` varchar(250) NOT NULL,
  `Course_ID` int(11) DEFAULT NULL,
  `Quiz_PassingScore` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_log`
--

CREATE TABLE `quiz_log` (
  `Quiz_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Quiz_Score` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Address` varchar(250) NOT NULL,
  `User_Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trueorfalse`
--

CREATE TABLE `trueorfalse` (
  `Question_ID` int(11) NOT NULL,
  `Answer` enum('TRUE','FALSE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `course_log`
--
ALTER TABLE `course_log`
  ADD PRIMARY KEY (`Course_ID`,`User_ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `identification`
--
ALTER TABLE `identification`
  ADD KEY `Question_ID` (`Question_ID`);

--
-- Indexes for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD KEY `Question_ID` (`Question_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Question_ID`),
  ADD KEY `Quiz_ID` (`Quiz_ID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Quiz_ID`);

--
-- Indexes for table `quiz_log`
--
ALTER TABLE `quiz_log`
  ADD PRIMARY KEY (`Quiz_ID`,`User_ID`),
  ADD KEY `Quiz_ID` (`Quiz_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `trueorfalse`
--
ALTER TABLE `trueorfalse`
  ADD KEY `Question_ID` (`Question_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_log`
--
ALTER TABLE `course_log`
  ADD CONSTRAINT `course_log_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `course_log_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `registered_user` (`User_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `identification`
--
ALTER TABLE `identification`
  ADD CONSTRAINT `identification_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `question` (`Question_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD CONSTRAINT `multiplechoice_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `question` (`Question_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Quiz_ID`) REFERENCES `quiz` (`Quiz_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `quiz_log`
--
ALTER TABLE `quiz_log`
  ADD CONSTRAINT `quiz_log_ibfk_1` FOREIGN KEY (`Quiz_ID`) REFERENCES `quiz` (`Quiz_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_log_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `registered_user` (`User_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trueorfalse`
--
ALTER TABLE `trueorfalse`
  ADD CONSTRAINT `trueorfalse_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `question` (`Question_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
