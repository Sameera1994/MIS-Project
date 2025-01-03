-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Dec 30, 2024 at 03:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_portal`
--
CREATE DATABASE IF NOT EXISTS `student_management_portal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `student_management_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `access_level` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=default, 1=super_admin, 2=sub_admin',
  `profileImage` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `telephone`, `access_level`, `profileImage`) VALUES
(1, 'ABC Perera', 'perera@foc.sab.ac.lk', '$2y$10$.N0Y239/UHn7fHnt7kCBYe9wEEUYJZfQ/x9X5JX2XgI3aNmSHTgZy', '0765432100', 2, 'uploads/profileImages/1733430579_c4f24a1fbfd791392510.webp'),
(4, 'HWC Dilka', 'chamaalidilka@gmail.com', '$2y$10$tw7S8eC2Y0yqnstsmFA68OHTJ5juME6WsYHNMisgOZ/HtiTl4btwm', '0763560081', 1, 'https://plus.unsplash.com/premium_photo-1690086519096-0594592709d3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2ZpbGUlMjBwaG90b3xlbnwwfHwwfHx8MA%3D%3D');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `department` varchar(40) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `lecture_date` date DEFAULT NULL,
  `student_username` varchar(50) DEFAULT NULL,
  `attendance` tinyint(10) DEFAULT 0 CHECK (`attendance` in (0,1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `department`, `batch`, `semester`, `subject`, `lecture_date`, `student_username`, `attendance`) VALUES
(1, 'SE', '19/20', 2, 'ITG', '2022-10-05', '19APC4055', 1),
(2, 'CIS', '11/22', 1, 'Web', '2024-04-05', '19APC4055', 0),
(3, 'SE', '19/20', 2, 'ITG', '2022-10-05', '19APC4054', 0),
(4, 'CIS', '11/22', 1, 'Web', '2024-04-05', '19APC4054', 1),
(5, 'SE', '19/20', 2, 'ITG', '2022-10-12', '19APC4052', 1),
(6, 'SE', '19/20', 2, 'ITG', '2022-10-12', '19APC4053', 1),
(7, 'SE', '19/20', 2, 'ITG', '2022-10-12', '19APC4054', 1),
(8, 'SE', '19/20', 2, 'ITG', '2022-10-19', '19APC4052', 1),
(9, 'SE', '19/20', 2, 'ITG', '2022-10-19', '19APC4053', 1),
(10, 'SE', '19/20', 2, 'ITG', '2022-10-19', '19APC4054', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`) VALUES
(1, '2018/2019'),
(2, '2019/2020'),
(3, '2020/2021'),
(4, '2021/2022'),
(5, '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(2, 'CIS'),
(4, 'DS'),
(1, 'IS'),
(3, 'SE');

-- --------------------------------------------------------

--
-- Table structure for table `departmentandsyllabus`
--

CREATE TABLE `departmentandsyllabus` (
  `syllabus_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departmentandsyllabus`
--

INSERT INTO `departmentandsyllabus` (`syllabus_id`, `department_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `department` varchar(40) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `student_username` varchar(50) DEFAULT NULL,
  `result` enum('A+','A','A-','B+','B','B-','C+','C','C-','D+','D','E','AB','SD','Hold','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `department`, `batch`, `semester`, `subject`, `student_username`, `result`) VALUES
(1, 'CIS', '20/21', 5, 'Data Structures', '20APC6067', 'A+'),
(2, 'IS', '18/19', 5, 'Operating Systems', '18APC2525', 'B'),
(3, 'SE', '19/20', 6, 'Algorithms', '19APC4055', 'C+'),
(4, 'DS', '21/22', 4, 'Database Management', '21APC6060', 'B+'),
(5, 'CIS', '19/20', 5, 'Data Structures', '19APC4000', 'A+'),
(6, 'CIS', '19/20', 5, 'Data Structures', '19APC4001', 'B+'),
(7, 'CIS', '19/20', 5, 'Data Structures', '19APC4002', 'C'),
(8, 'CIS', '19/20', 5, 'Data Structures', '19APC4003', 'A-'),
(9, 'CIS', '19/20', 5, 'Data Structures', '19APC4004', 'B'),
(10, 'CIS', '19/20', 5, 'Data Structures', '19APC4005', 'C+'),
(11, 'CIS', '19/20', 5, 'Data Structures', '19APC4006', 'D+'),
(12, 'CIS', '19/20', 5, 'Data Structures', '19APC4007', 'E'),
(13, 'CIS', '19/20', 5, 'Data Structures', '19APC4008', 'B+'),
(14, 'CIS', '19/20', 5, 'Data Structures', '19APC4009', 'A+'),
(15, 'CIS', '19/20', 5, 'Data Structures', '19APC4010', 'B'),
(16, 'CIS', '19/20', 5, 'Data Structures', '19APC4011', 'AB'),
(17, 'CIS', '19/20', 5, 'Data Structures', '19APC4012', 'C'),
(18, 'CIS', '19/20', 5, 'Data Structures', '19APC4013', 'B'),
(19, 'CIS', '19/20', 5, 'Data Structures', '19APC4014', 'A'),
(20, 'CIS', '19/20', 5, 'Data Structures', '19APC4015', 'B-'),
(21, 'CIS', '19/20', 5, 'Data Structures', '19APC4016', 'C-'),
(22, 'CIS', '19/20', 5, 'Data Structures', '19APC4017', 'D'),
(23, 'CIS', '19/20', 5, 'Data Structures', '19APC4018', 'A+'),
(24, 'CIS', '19/20', 5, 'Data Structures', '19APC4019', 'B'),
(25, 'CIS', '19/20', 5, 'Data Structures', '19APC4020', 'C+'),
(26, 'CIS', '19/20', 5, 'Data Structures', '19APC4021', 'B+'),
(27, 'CIS', '19/20', 5, 'Data Structures', '19APC4022', 'E'),
(28, 'CIS', '19/20', 5, 'Data Structures', '19APC4023', 'SD'),
(29, 'CIS', '19/20', 5, 'Data Structures', '19APC4024', 'A'),
(30, 'CIS', '19/20', 5, 'Data Structures', '19APC4025', 'A+'),
(31, 'CIS', '19/20', 5, 'Data Structures', '19APC4026', 'A+'),
(32, 'CIS', '19/20', 5, 'Data Structures', '19APC4027', 'C'),
(33, 'CIS', '19/20', 5, 'Data Structures', '19APC4028', 'A-'),
(34, 'CIS', '19/20', 5, 'Data Structures', '19APC4029', 'B-'),
(35, 'CIS', '19/20', 5, 'Data Structures', '19APC4030', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_number`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `semester_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `syllabus_id` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`semester_id`, `department_id`, `syllabus_id`, `subject_id`, `subject_code`, `subject_name`) VALUES
(1, 4, 3, 12, 'IS1109', 'Statistics & Probability Theory'),
(1, 1, 1, 13, 'IS1103', 'Structured Programming Practicum'),
(1, 1, 1, 14, 'IS1104', 'Theories of Information Systems'),
(1, 2, 2, 15, 'IS1105', 'Computer System Organization'),
(1, 2, 2, 16, 'IS1106', 'Foundations of Web Technologies'),
(1, 3, 2, 17, 'IS1107', 'Personal Productivity with Information Technology'),
(1, 3, 2, 18, 'IS1108', 'Fundamentals of Mathematics'),
(1, 4, 3, 19, 'IS1109', 'Statistics & Probability Theory'),
(2, 1, 1, 20, 'IS1110', 'Communication Skills I'),
(2, 1, 1, 21, 'IS1101', 'Fundamentals of Information Systems'),
(2, 2, 2, 22, 'IS1102', 'Structured Programming Techniques'),
(2, 2, 2, 23, 'IS1103', 'Structured Programming Practicum'),
(2, 3, 2, 24, 'IS1104', 'Theories of Information Systems'),
(2, 3, 2, 25, 'IS1105', 'Computer System Organization'),
(2, 4, 3, 26, 'IS1106', 'Foundations of Web Technologies'),
(2, 4, 3, 27, 'IS1107', 'Personal Productivity with Information Technology'),
(1, 2, 2, 28, 'IS1108', 'Fundamentals of Mathematics'),
(1, 2, 2, 29, 'IS1109', 'Statistics & Probability Theory'),
(3, 1, 1, 30, 'IS1110', 'Communication Skills I'),
(3, 1, 1, 31, 'IS1101', 'Fundamentals of Information Systems'),
(3, 2, 2, 32, 'IS1102', 'Structured Programming Techniques'),
(3, 2, 2, 33, 'IS1103', 'Structured Programming Practicum'),
(3, 3, 2, 34, 'IS1104', 'Theories of Information Systems'),
(3, 3, 2, 35, 'IS1105', 'Computer System Organization'),
(3, 4, 3, 36, 'IS1106', 'Foundations of Web Technologies'),
(3, 4, 3, 37, 'IS1107', 'Personal Productivity with Information Technology'),
(4, 1, 1, 38, 'IS1108', 'Fundamentals of Mathematics'),
(4, 1, 1, 39, 'IS1109', 'Statistics & Probability Theory'),
(4, 2, 2, 40, 'IS1110', 'Communication Skills I'),
(4, 2, 2, 41, 'IS1111', 'Academic Integrity'),
(4, 3, 2, 42, 'IS-EGP-1101', 'General English I'),
(4, 3, 2, 43, 'IS1103', 'Structured Programming Practicum'),
(4, 4, 3, 44, 'IS1104', 'Theories of Information Systems'),
(4, 4, 3, 45, 'IS1105', 'Computer System Organization'),
(5, 1, 1, 46, 'IS1106', 'Foundations of Web Technologies'),
(5, 1, 1, 47, 'IS1107', 'Personal Productivity with Information Technology'),
(5, 2, 2, 48, 'IS1108', 'Fundamentals of Mathematics'),
(5, 2, 2, 49, 'IS1109', 'Statistics & Probability Theory'),
(5, 3, 2, 50, 'IS1110', 'Communication Skills I'),
(5, 3, 2, 51, 'IS1111', 'Academic Integrity'),
(5, 4, 3, 52, 'IS-EGP-1101', 'General English I'),
(5, 4, 3, 53, 'IS1103', 'Structured Programming Practicum'),
(6, 1, 1, 54, 'IS1104', 'Theories of Information Systems'),
(6, 1, 1, 55, 'IS1105', 'Computer System Organization'),
(6, 2, 2, 56, 'IS1106', 'Foundations of Web Technologies'),
(6, 2, 2, 57, 'IS1107', 'Personal Productivity with Information Technology'),
(6, 3, 2, 58, 'IS1108', 'Fundamentals of Mathematics'),
(6, 3, 2, 59, 'IS1109', 'Statistics & Probability Theory'),
(6, 4, 3, 60, 'IS1110', 'Communication Skills I'),
(6, 4, 3, 61, 'IS1111', 'Academic Integrity'),
(7, 1, 1, 62, 'IS-EGP-1101', 'General English I'),
(7, 1, 1, 63, 'IS1103', 'Structured Programming Practicum'),
(7, 2, 2, 64, 'IS1104', 'Theories of Information Systems'),
(7, 2, 2, 65, 'IS1105', 'Computer System Organization'),
(7, 3, 2, 66, 'IS1106', 'Foundations of Web Technologies'),
(7, 3, 2, 67, 'IS1107', 'Personal Productivity with Information Technology'),
(7, 4, 3, 68, 'IS1108', 'Fundamentals of Mathematics'),
(7, 4, 3, 69, 'IS1109', 'Statistics & Probability Theory'),
(8, 1, 1, 70, 'IS1110', 'Communication Skills I'),
(8, 1, 1, 71, 'IS1111', 'Academic Integrity'),
(8, 2, 2, 72, 'IS-EGP-1101', 'General English I'),
(8, 2, 2, 73, 'IS1103', 'Structured Programming Practicum'),
(8, 3, 2, 74, 'IS1104', 'Theories of Information Systems'),
(8, 3, 2, 75, 'IS1105', 'Computer System Organization'),
(8, 4, 3, 76, 'IS1106', 'Foundations of Web Technologies'),
(8, 4, 3, 77, 'IS1107', 'Personal Productivity with Information Technology'),
(8, 4, 3, 78, 'IS1108', 'Fundamentals of Mathematics'),
(8, 4, 3, 79, 'IS1109', 'Statistics & Probability Theory');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabus_id` int(11) NOT NULL,
  `syllabus_name` varchar(50) NOT NULL,
  `syllabus_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_id`, `syllabus_name`, `syllabus_year`) VALUES
(1, 'old', '2013'),
(2, 'new', '2019'),
(3, 'new_2', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `profileImage` varchar(300) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'innactive',
  `uniid` varchar(32) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_date` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `username`, `department`, `batch`, `profileImage`, `password`, `status`, `uniid`, `created_on`, `activation_date`, `updated_on`) VALUES
(48, 'Chamaali Dilka', 'chamalidilkapmnt1998@gmail.com', '19APC4054', 'Data Science', NULL, NULL, '$2y$10$3j/7yWSqQ4XcYONQWvAnvuRx7W40HFQe21MXURT.eCgy.iDZ/UoL6', 'active', 'f83f4f4f862de525452da76e80c2f223', '2024-12-30 14:10:59', '2024-12-30 14:10:59', '2024-12-30 14:12:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `departmentandsyllabus`
--
ALTER TABLE `departmentandsyllabus`
  ADD KEY `department_id` (`department_id`),
  ADD KEY `syllabus_id` (`syllabus_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD UNIQUE KEY `semester_number` (`semester_number`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `syllabus_id` (`syllabus_id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabus_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departmentandsyllabus`
--
ALTER TABLE `departmentandsyllabus`
  ADD CONSTRAINT `departmentandsyllabus_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `departmentandsyllabus_ibfk_2` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `subject_ibfk_3` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
