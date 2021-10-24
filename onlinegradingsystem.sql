-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 24, 2021 at 01:01 AM
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
  `id` int(12) NOT NULL,
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

INSERT INTO `professor` (`id`, `Username`, `Password`, `Firstname`, `Middlename`, `Lastname`, `Year`, `DateTimeCreated`, `DateTImeUpdated`) VALUES
(1, 'roger', '$2y$10$/oH66wpyAFRctbo1vX1lE.P1SWuSWuuP0zy.bNHr9MqdVow/QYR.G', 'rogelio', 'unknown', 'plaza ', '3rd yr - BSCS', '2021-10-23 11:22:38', '2021-10-23 11:22:39'),
(2, 'bernard', '$2y$10$b3nw0eo2eKnWrruydybXDew9F3fjt5VDoq3bjz4CgTWmC67ta7Gru', 'bernard ', 'unknown', 'gresola', '3rd yr - BSCS', '2021-10-24 01:14:17', '2021-10-24 01:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `studentgrades`
--

CREATE TABLE `studentgrades` (
  `ID` int(6) NOT NULL,
  `Students_ID` int(6) NOT NULL,
  `Grades_ID` int(6) NOT NULL,
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
(1, 'aaass', '$2y$10$PKzeB8sPzGYR8m77Zbilluoc/m.5YsSV3HmgVraXguXC2oyKUOS1y', '213123', 'aass', 'ss', 'dd', '2-c', 123123123, 'Regular', 0, '2021-10-22 17:38:39', '2021-10-22 17:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(12) NOT NULL,
  `Prof_id` int(12) NOT NULL,
  `SubjectCode` varchar(20) NOT NULL,
  `SubjectName` varchar(20) NOT NULL,
  `Unit` tinyint(1) NOT NULL,
  `DateTimeCreated` datetime DEFAULT current_timestamp(),
  `DateTimeUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `Prof_id`, `SubjectCode`, `SubjectName`, `Unit`, `DateTimeCreated`, `DateTimeUpdated`) VALUES
(1, 1, 'AR101', 'Human Computer Inter', 3, '2021-10-23 11:22:58', '2021-10-23 11:22:58'),
(2, 1, 'Al102', 'Automata Theory and ', 3, '2021-10-23 11:23:14', '2021-10-23 11:23:14'),
(3, 2, 'HCI101', 'Human Computer Inter', 3, '2021-10-24 01:14:30', '2021-10-24 01:14:30');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentgrades`
--
ALTER TABLE `studentgrades`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Students_ID` (`Students_ID`,`Grades_ID`),
  ADD KEY `Grades_ID` (`Grades_ID`);

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
  ADD KEY `index` (`Prof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentgrades`
--
ALTER TABLE `studentgrades`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`Prof_ID`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentgrades`
--
ALTER TABLE `studentgrades`
  ADD CONSTRAINT `studentgrades_ibfk_1` FOREIGN KEY (`Grades_ID`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentgrades_ibfk_2` FOREIGN KEY (`Students_ID`) REFERENCES `students` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`Prof_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
