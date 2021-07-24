-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 04:09 PM
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
-- Database: `freetimetutoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `counselling`
--

CREATE TABLE `counselling` (
  `T_ID` char(9) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Selected_Start_Date_Time` datetime DEFAULT NULL,
  `S_ID` char(9) NOT NULL,
  `Collected_B_R_T` int(11) DEFAULT NULL,
  `Collected_TSRS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counselling`
--

INSERT INTO `counselling` (`T_ID`, `Date_Time`, `Selected_Start_Date_Time`, `S_ID`, `Collected_B_R_T`, `Collected_TSRS`) VALUES
('011162013', '2019-04-24 10:30:48', '2019-04-04 12:59:00', '011162034', 9, 9),
('011162027', '2019-04-22 09:11:25', '2019-04-02 12:59:00', '011162034', 6, 4),
('011162034', '2019-04-22 09:12:02', '2019-04-01 01:00:00', '011162027', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` varchar(10) NOT NULL,
  `Course_Name` varchar(50) DEFAULT NULL,
  `Department_ID` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Course_Name`, `Department_ID`) VALUES
('CSI  122', 'SPL Lab', 'CSE'),
('CSI 219', 'Discrete Mathematics', 'CSE'),
('MAT 1101', 'Calculus 1', 'EEE'),
('PHY 101', 'Physics', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_ID` char(3) NOT NULL,
  `Department_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_ID`, `Department_Name`) VALUES
('CSE', 'Computer Science and Engineering'),
('EEE', 'Electrical and Electronics Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `group_study`
--

CREATE TABLE `group_study` (
  `Person_ID` char(9) NOT NULL,
  `Topic_ID` int(11) NOT NULL,
  `Course_ID` varchar(10) DEFAULT NULL,
  `Scheduled_Start_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_study`
--

INSERT INTO `group_study` (`Person_ID`, `Topic_ID`, `Course_ID`, `Scheduled_Start_Time`) VALUES
('011162013', 1, 'CSI 219', '2019-04-05 12:59:00'),
('011162034', 1, 'CSI 219', '2019-04-05 12:59:00'),
('011162013', 2, 'CSI 219', '2019-04-19 12:59:00'),
('011162034', 2, 'CSI 219', '2019-04-19 12:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Person_ID` char(9) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL,
  `Balance` double DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `Phone_NB` int(11) DEFAULT NULL,
  `Department_ID` char(3) DEFAULT NULL,
  `Section_Name` char(1) DEFAULT NULL,
  `Course_ID` varchar(10) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `B_R` int(11) DEFAULT '0',
  `T_R` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Person_ID`, `Email`, `First_Name`, `Last_Name`, `Balance`, `Start_Date`, `Phone_NB`, `Department_ID`, `Section_Name`, `Course_ID`, `password`, `B_R`, `T_R`) VALUES
('011162013', 'monir@gmail.com', 'Monirul', 'Islam', NULL, NULL, 1677603319, NULL, NULL, NULL, '12345', 9, 9),
('011162027', 'nifat@gmail.com', 'Nafiur', 'Nifat', 234, '2019-04-22', 1754698754, NULL, NULL, NULL, '123', 6, 4),
('011162034', 'mrana@gmail.com', 'Rana', 'M', -234, NULL, 1796704503, NULL, NULL, NULL, '123', 5, 5),
('1', 'm@gmail.com', 'm', 'r', NULL, NULL, 1598587811, NULL, NULL, NULL, '1', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Date_Time` datetime NOT NULL,
  `Person_ID` char(9) NOT NULL,
  `Post_Type` varchar(15) DEFAULT NULL,
  `Selected_Start_Date_Time` datetime DEFAULT NULL,
  `Selected_End_Date_Time` datetime DEFAULT NULL,
  `Selected_Person_ID` char(9) DEFAULT NULL,
  `Selected_Payment` double DEFAULT NULL,
  `Post_Description` varchar(1000) DEFAULT NULL,
  `Course_ID` varchar(10) DEFAULT NULL,
  `result` varchar(15) DEFAULT 'uncompleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Date_Time`, `Person_ID`, `Post_Type`, `Selected_Start_Date_Time`, `Selected_End_Date_Time`, `Selected_Person_ID`, `Selected_Payment`, `Post_Description`, `Course_ID`, `result`) VALUES
('2019-04-22 08:48:55', '011162013', NULL, '2019-04-04 01:00:00', '2019-04-04 12:59:00', '011162034', 100, 'des', 'CSI 219', 'uncompleted'),
('2019-04-22 08:49:47', '011162034', NULL, '2019-04-05 12:00:00', '2019-04-18 12:00:00', '011162027', 10, 'ddsjbfvakjdf', 'CSI 219', 'uncompleted'),
('2019-04-22 09:11:25', '011162034', 'student', '2019-04-02 12:59:00', '2019-04-05 00:59:00', '011162027', 234, 'mmmmmmmm', 'CSI 219', 'Completed'),
('2019-04-24 10:30:48', '011162034', 'student', '2019-04-04 12:59:00', '2019-04-04 12:59:00', '011162013', 1000, 'This is a post', 'CSI 219', 'Completed'),
('2019-04-24 11:28:18', '011162034', 'student', '2019-04-27 12:59:00', '2019-04-20 12:59:00', NULL, 25, 'post', 'CSI 219', 'uncompleted'),
('2019-04-24 12:07:03', '011162034', 'student', '2019-04-05 12:59:00', '2019-04-05 12:59:00', NULL, 222, 'Chyecking for balance', 'CSI 219', 'uncompleted'),
('2019-04-24 12:23:51', '011162034', 'teacher', '2019-04-11 12:59:00', '2019-04-19 12:59:00', '011162027', 20, 'tddghdrthrdth', 'CSI 219', 'uncompleted'),
('2019-04-24 13:50:24', '011162034', 'teacher', '2019-04-05 12:59:00', '0000-00-00 00:00:00', NULL, 1, '', 'CSI 219', 'uncompleted');

-- --------------------------------------------------------

--
-- Table structure for table `post_interested_id`
--

CREATE TABLE `post_interested_id` (
  `Date_And_Time` datetime NOT NULL,
  `Person_ID` char(9) NOT NULL,
  `Interested_ID` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_interested_id`
--

INSERT INTO `post_interested_id` (`Date_And_Time`, `Person_ID`, `Interested_ID`) VALUES
('2019-04-22 08:48:55', '011162013', '011162027'),
('2019-04-22 08:49:47', '011162034', '011162027'),
('2019-04-22 09:11:25', '011162034', '011162027'),
('2019-04-22 09:12:02', '011162034', '011162027'),
('2019-04-24 10:30:48', '011162034', '011162013'),
('2019-04-24 11:28:18', '011162034', '011162013'),
('2019-04-24 12:23:51', '011162034', '011162027');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `Section_Name` char(1) NOT NULL,
  `Course_ID` varchar(10) NOT NULL,
  `File` varchar(1000) DEFAULT NULL,
  `Message` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Person_ID` char(9) NOT NULL,
  `Eligibility` varchar(10) DEFAULT NULL,
  `Behaviour_Rating` int(11) DEFAULT NULL,
  `Learning_Skill_Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_scheduled_times`
--

CREATE TABLE `student_scheduled_times` (
  `Person_ID` char(9) NOT NULL,
  `Scheduled_Start_Time` datetime NOT NULL,
  `Scheduled_End_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Behaviour_Rating` int(11) DEFAULT NULL,
  `Teaching_Skill_Rating` int(11) DEFAULT NULL,
  `Person_ID` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_free_times`
--

CREATE TABLE `teacher_free_times` (
  `Person_ID` char(9) NOT NULL,
  `Free_Start_Time` datetime NOT NULL,
  `Free_End_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_scheduled_times`
--

CREATE TABLE `teacher_scheduled_times` (
  `Person_ID` char(9) NOT NULL,
  `Scheduled_Start_Time` datetime NOT NULL,
  `Scheduled_End_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_topic`
--

CREATE TABLE `teacher_topic` (
  `Person_ID` char(9) DEFAULT NULL,
  `Topic_ID` int(11) DEFAULT NULL,
  `Course_ID` varchar(10) DEFAULT NULL,
  `Teacher_Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `Topic_ID` int(11) NOT NULL,
  `Course_ID` varchar(10) NOT NULL,
  `Topic_Title` varchar(50) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`Topic_ID`, `Course_ID`, `Topic_Title`, `Description`) VALUES
(1, 'CSI  122', 'Conditional Statement', 'Description for Conditional Statement'),
(1, 'CSI 219', 'Boolean Algebra', 'Description for Boolean Algebra'),
(1, 'MAT 1101', 'Differentiation', 'Description For Differentiation'),
(1, 'PHY 101', 'Motion', 'Description for Motion'),
(2, 'CSI  122', 'Structure', 'Description For Structure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counselling`
--
ALTER TABLE `counselling`
  ADD PRIMARY KEY (`T_ID`,`S_ID`,`Date_Time`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `fk_Department_ID` (`Department_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `group_study`
--
ALTER TABLE `group_study`
  ADD PRIMARY KEY (`Topic_ID`,`Scheduled_Start_Time`,`Person_ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Person_ID`),
  ADD KEY `fkk_Department_ID` (`Department_ID`),
  ADD KEY `fkk_CS` (`Course_ID`,`Section_Name`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Person_ID`,`Date_Time`),
  ADD KEY `fk131` (`Selected_Person_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Indexes for table `post_interested_id`
--
ALTER TABLE `post_interested_id`
  ADD PRIMARY KEY (`Date_And_Time`,`Person_ID`,`Interested_ID`),
  ADD KEY `Interested_ID` (`Interested_ID`),
  ADD KEY `Person_ID` (`Person_ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`Course_ID`,`Section_Name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Person_ID`);

--
-- Indexes for table `student_scheduled_times`
--
ALTER TABLE `student_scheduled_times`
  ADD PRIMARY KEY (`Person_ID`,`Scheduled_Start_Time`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Person_ID`);

--
-- Indexes for table `teacher_free_times`
--
ALTER TABLE `teacher_free_times`
  ADD PRIMARY KEY (`Person_ID`,`Free_Start_Time`);

--
-- Indexes for table `teacher_scheduled_times`
--
ALTER TABLE `teacher_scheduled_times`
  ADD PRIMARY KEY (`Person_ID`,`Scheduled_Start_Time`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`Topic_ID`,`Course_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_Department_ID` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`Department_ID`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fkk_CS` FOREIGN KEY (`Course_ID`,`Section_Name`) REFERENCES `section` (`Course_ID`, `Section_Name`),
  ADD CONSTRAINT `fkk_Department_ID` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`Department_ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk111` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`Person_ID`),
  ADD CONSTRAINT `fk131` FOREIGN KEY (`Selected_Person_ID`) REFERENCES `person` (`Person_ID`),
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fk_Course_ID` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Person_ID2` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`Person_ID`);

--
-- Constraints for table `student_scheduled_times`
--
ALTER TABLE `student_scheduled_times`
  ADD CONSTRAINT `fk_Person_ID3` FOREIGN KEY (`Person_ID`) REFERENCES `student` (`Person_ID`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_Person_ID1` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`Person_ID`);

--
-- Constraints for table `teacher_free_times`
--
ALTER TABLE `teacher_free_times`
  ADD CONSTRAINT `fk_Person_ID5` FOREIGN KEY (`Person_ID`) REFERENCES `teacher` (`Person_ID`);

--
-- Constraints for table `teacher_scheduled_times`
--
ALTER TABLE `teacher_scheduled_times`
  ADD CONSTRAINT `fk_Person_ID4` FOREIGN KEY (`Person_ID`) REFERENCES `teacher` (`Person_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
