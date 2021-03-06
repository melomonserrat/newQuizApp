-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 06:10 AM
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
  `Course_Description` varchar(1000) NOT NULL,
  `Course_isOpen` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Course_Name`, `Course_Description`, `Course_isOpen`, `user_id`) VALUES
(11, 'Intro to ComSci: C language', 'Learn how to code in C language!!', 1, 0),
(21, 'C++ Course', 'After C, improve with C++', 1, 0),
(23, 'Java: The Programming Language', 'Learn how to take over the world with Java', 1, 0),
(123, 'Data Structures', 'Use any language you want to implement several data structures', 1, 5),
(124, 'Computer Architecture and Organization', 'This course covers the function and design of the various units of digital computers that store and process information.  It deals with the units of the computer that receive information from and that send computed results to the outside world. It also covers the conceptual design and fundamental operational structure of computer systems, as well the factors influencing their evolution.', 1, 5),
(125, 'BS Wesley', 'Pogi ko', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `course_log`
--

CREATE TABLE `course_log` (
  `Course_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Course_Status` enum('PASS','FAIL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_log`
--

INSERT INTO `course_log` (`Course_ID`, `User_ID`, `Course_Status`) VALUES
(11, 2, NULL),
(11, 3, 'PASS'),
(11, 4, NULL),
(21, 1, 'PASS'),
(21, 2, NULL),
(23, 3, 'PASS'),
(23, 4, 'FAIL');

-- --------------------------------------------------------

--
-- Table structure for table `identification`
--

CREATE TABLE `identification` (
  `Question_ID` int(11) NOT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identification`
--

INSERT INTO `identification` (`Question_ID`, `Answer`) VALUES
(2, '#include<stdio.h>');

-- --------------------------------------------------------

--
-- Table structure for table `multiplechoice`
--

CREATE TABLE `multiplechoice` (
  `Question_ID` int(11) NOT NULL,
  `Choice1` varchar(50) DEFAULT NULL,
  `Choice2` varchar(50) DEFAULT NULL,
  `Choice3` varchar(50) DEFAULT NULL,
  `Choice4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiplechoice`
--

INSERT INTO `multiplechoice` (`Question_ID`, `Choice1`, `Choice2`, `Choice3`, `Choice4`) VALUES
(1, 'printf', 'echo', 'System.out.println', 'cout'),
(4, 'Object-Oriented', 'Procedural', 'Functional', 'Scripting');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Quiz_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Question_Description` varchar(250) NOT NULL,
  `Question_Type` enum('I','MC','MT','ToF') NOT NULL,
  `Question_Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Quiz_ID`, `Question_ID`, `Question_Description`, `Question_Type`, `Question_Answer`) VALUES
(1, 1, 'How to print text?', 'MC', 'A'),
(2, 2, 'The way to import the header file for standard input and output', 'I', '#include<stdio.h>'),
(4, 3, 'To access the values that the user enters, the syntax to use is scanf.', 'ToF', 'True'),
(1, 4, 'What kind of a programming language is C', 'MC', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Quiz_ID` int(11) NOT NULL,
  `Quiz_Name` varchar(50) NOT NULL,
  `Quiz_Difficulty` enum('EASY','MEDIUM','HARD') DEFAULT NULL,
  `Quiz_Description` varchar(250) DEFAULT NULL,
  `Course_ID` int(11) NOT NULL,
  `Quiz_PassingScore` int(4) NOT NULL,
  `Quiz_Type` enum('MC','I','ToF','MT') NOT NULL,
  `User_ID` int(11) NOT NULL,
  `is_open` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`Quiz_ID`, `Quiz_Name`, `Quiz_Difficulty`, `Quiz_Description`, `Course_ID`, `Quiz_PassingScore`, `Quiz_Type`, `User_ID`, `is_open`) VALUES
(1, 'C Test no. 1', 'EASY', 'Test to see basic C syntax', 11, 60, 'MC', 1, 1),
(2, 'C Test no. 2', 'EASY', NULL, 11, 60, 'I', 2, 0),
(4, 'Can you Java 1', 'EASY', NULL, 23, 60, 'I', 2, 0),
(5, 'Can you Java 2', 'MEDIUM', NULL, 23, 60, 'ToF', 3, 0),
(6, 'Data Structures Exam 1', 'MEDIUM', NULL, 123, 50, 'MT', 0, 0),
(7, 'Data Structures Exam 2', 'HARD', NULL, 123, 45, 'MC', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_log`
--

CREATE TABLE `quiz_log` (
  `Quiz_ID` int(11) NOT NULL,
  `User_ID_Take` int(11) NOT NULL,
  `Quiz_Score` int(4) NOT NULL,
  `Quiz_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_log`
--

INSERT INTO `quiz_log` (`Quiz_ID`, `User_ID_Take`, `Quiz_Score`, `Quiz_Date`) VALUES
(1, 5, 2, '2019-04-27'),
(1, 7, 1, '2019-04-27'),
(2, 5, 0, '2019-04-27'),
(4, 5, 0, '2019-04-27'),
(4, 7, 0, '2019-04-27'),
(6, 5, 0, '2019-04-27');

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

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`User_ID`, `User_Name`, `User_Email`, `User_Address`, `User_Password`) VALUES
(1, 'James Wallabee', 'jwbee@yahoo.com', 'No. 45 Rodeo Drive, LA, CA', 'chilloutmydudez'),
(2, 'Bjorn Richardson', 'bjornrichson@yahoo.com', 'No. 54 Rodeo Drive, LA, CA', 'ilikeice'),
(3, 'Neo Anderson', 'neo@yahoo.com', 'The Matrix, Everywhere', 'ilovetrinity'),
(4, 'Johnny Blaze', 'grider@yahoo.com', '123 Mephisto St., 7th Ring, Hell', 'imissroxanne'),
(5, 'ken', 'asdf@a.com', '123', 'ken'),
(6, 'bob', '', '', 'bobafett'),
(7, 'wes', 'wesley.buibui@gmail.com', 'tandang sora', '123');

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
  ADD PRIMARY KEY (`Quiz_ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `quiz_log`
--
ALTER TABLE `quiz_log`
  ADD PRIMARY KEY (`Quiz_ID`,`User_ID_Take`,`Quiz_Date`),
  ADD KEY `Quiz_ID` (`Quiz_ID`),
  ADD KEY `quiz_log_ibfk_2` (`User_ID_Take`);

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
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_course_id` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);

--
-- Constraints for table `quiz_log`
--
ALTER TABLE `quiz_log`
  ADD CONSTRAINT `quiz_log_ibfk_1` FOREIGN KEY (`Quiz_ID`) REFERENCES `quiz` (`Quiz_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_log_ibfk_2` FOREIGN KEY (`User_ID_Take`) REFERENCES `registered_user` (`User_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trueorfalse`
--
ALTER TABLE `trueorfalse`
  ADD CONSTRAINT `trueorfalse_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `question` (`Question_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
