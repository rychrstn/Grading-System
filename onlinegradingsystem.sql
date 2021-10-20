-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 20, 2021 at 10:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinegradingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(6) NOT NULL,
  `Prof_ID` int(6) NOT NULL,
  `Subject_ID` int(6) NOT NULL,
  `Grades` int(2) NOT NULL,
  `Term` varchar(20) NOT NULL,
  `Remarks` varchar(20) NOT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `DateTimeUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `ID` int(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Middlename` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `DateTImeUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`ID`, `Username`, `Password`, `Firstname`, `Middlename`, `Lastname`, `Year`, `DateTimeCreated`, `DateTImeUpdated`) VALUES
(1, 'ff', 'ss', 'qwe', 'qwe', 'eee', '2', '2021-10-12 14:18:17', '2021-10-12 14:18:17'),
(2, 'aaa', '$2y$10$RJ.17IfTwfXCz0SLCqw0B.jOf.hFgdQcMmDVwU679blym2WMgi/SC', 'adf', 'ff', 'ss', '2 yr', '2021-10-20 09:34:59', '2021-10-20 09:34:59'),
(3, 'aaa', '$2y$10$a7oloP0JI/WpYqeaWVIgY.rohCJbrBn8FIIrjsh0mqf101.YDnOLS', 'adf', 'ff', 'ss', '2 yr', '2021-10-20 09:38:00', '2021-10-20 09:38:00'),
(4, 'aaa', '$2y$10$6aroT6xl2zOfeyq1IHTC7OFj03ySDFZ0zsVt5t9C1jxNgMCDnZCDe', 'adf', 'ff', 'ss', '2 yr', '2021-10-20 09:39:33', '2021-10-20 09:39:33'),
(5, 'adf', '$2y$10$41GbSJ998A7Vugq1JJ/zJe2SOb0AovWlbvzXXTo.HJcZdbNrcfYn.', 'adf', 'ff', 'ss', '2 ', '2021-10-20 09:39:58', '2021-10-20 09:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `studentgrades`
--

CREATE TABLE `studentgrades` (
  `ID` int(6) NOT NULL,
  `Students_ID` int(6) NOT NULL,
  `Prof_ID` int(6) NOT NULL,
  `DateTimeCreated` datetime NOT NULL,
  `DateTImeUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(12) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `StudentID` varchar(20) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Middlename` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `YearAndCourse` varchar(20) NOT NULL,
  `ContactNumber` int(12) NOT NULL,
  `StudentStatus` varchar(20) NOT NULL,
  `Valid` tinyint(1) NOT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `DateTimeUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Username`, `Password`, `StudentID`, `Firstname`, `Middlename`, `Lastname`, `YearAndCourse`, `ContactNumber`, `StudentStatus`, `Valid`, `DateTimeCreated`, `DateTimeUpdated`) VALUES
(10, 'anthony', '$2y$10$A3Xl0KKl2JzIOhVdN8.7n.LltW9iXPBPVhUUETHYxJW/0jUZDg2Xm', '12312312', 'anthonyffaa', 'rosalesaaass', 'yuvegaaaafa', '2-c', 2123123, 'Irregular', 1, '2021-10-20 06:50:47', '2021-10-20 08:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(6) NOT NULL,
  `Prof_id` int(6) NOT NULL,
  `SubjectCode` varchar(20) NOT NULL,
  `SubjectName` varchar(20) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `DateTimeUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `Prof_id`, `SubjectCode`, `SubjectName`, `Unit`, `DateTimeCreated`, `DateTimeUpdated`) VALUES
(3, 1, 'HCI101', 'ffff', '3', '2021-10-12 14:44:34', '2021-10-12 14:44:34'),
(4, 1, '', '', '', '2021-10-13 22:17:46', '2021-10-13 22:17:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Prof_ID` (`Prof_ID`,`Subject_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentgrades`
--
ALTER TABLE `studentgrades`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Students_ID` (`Students_ID`,`Prof_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Prof_id` (`Prof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentgrades`
--
ALTER TABLE `studentgrades`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `students` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`Prof_id`) REFERENCES `professor` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
