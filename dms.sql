-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 11:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_studentprofile`
--

CREATE TABLE `account_studentprofile` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `matric` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account_studentprofile`
--

INSERT INTO `account_studentprofile` (`id`, `fullname`, `matric`, `password`, `course_id`) VALUES
(1, 'Ayinde Wasiu', '15N02/012', '5212ff879101c62047ba7646fd63aba5', 1),
(2, 'Odewale Ayuba', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'Ojewole Ijiwere', '15N04/004', 'cf5f668e9b5aaa8c04929599a3de8517', 1),
(4, 'Testing', '129-8542', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'Julius Mostero', '2415413212', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bursary_schoolfees`
--

CREATE TABLE `bursary_schoolfees` (
  `id` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `did_id` int(11) DEFAULT NULL,
  `sid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bursary_schoolfees`
--

INSERT INTO `bursary_schoolfees` (`id`, `amount`, `did_id`, `sid_id`) VALUES
(1, '200500', 1, 1),
(2, '670000', 1, 2),
(3, '22', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_payment`
--

CREATE TABLE `confirmed_payment` (
  `id` int(11) NOT NULL,
  `feesId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `directory` varchar(50) DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL,
  `dateConfirmed` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `feesId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `datePaid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `feesId`, `studentId`, `amount`, `datePaid`) VALUES
(1, 2, 2, '20000', '2019-08-12'),
(2, 2, 2, '400500', ''),
(3, 2, 2, '150000', '2019-06-05 14:07:43pm');

-- --------------------------------------------------------

--
-- Table structure for table `system_coursedata`
--

CREATE TABLE `system_coursedata` (
  `id` int(11) NOT NULL,
  `course_name` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_coursedata`
--

INSERT INTO `system_coursedata` (`id`, `course_name`, `created_on`) VALUES
(1, 'AIT - Automotive', '2024-09-22 09:41:27'),
(2, 'DT - IT', '2024-09-22 10:13:03'),
(3, 'DT - Electrical', '2024-09-22 10:13:51'),
(4, 'AIT - Garments and Convenience Store', '2024-09-22 10:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `system_curriculum`
--

CREATE TABLE `system_curriculum` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `curriculum_name` longtext NOT NULL,
  `school_year` longtext NOT NULL,
  `semester` longtext NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_curriculum`
--

INSERT INTO `system_curriculum` (`id`, `course_id`, `curriculum_name`, `school_year`, `semester`, `created_date`) VALUES
(1, 2, '00001', '2024-2025', '1', '2024-09-29 16:32:18'),
(2, 2, '00002', '2024-2025', '2', '2024-09-29 16:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `system_departmentdata`
--

CREATE TABLE `system_departmentdata` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL,
  `fid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_departmentdata`
--

INSERT INTO `system_departmentdata` (`id`, `dept_name`, `created_on`, `fid_id`) VALUES
(1, 'Law', NULL, 1),
(2, 'Psychology', '2019-06-05 14:03:02pm', 1),
(3, 'Sociology', '2019-06-05 14:52:19pm', 1),
(4, 'History', '2019-06-05 14:52:36pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_facultydata`
--

CREATE TABLE `system_facultydata` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(30) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_facultydata`
--

INSERT INTO `system_facultydata` (`id`, `faculty_name`, `created_on`) VALUES
(1, 'ITE', '2019-06-14 00:00:00.000288');

-- --------------------------------------------------------

--
-- Table structure for table `system_sessiondata`
--

CREATE TABLE `system_sessiondata` (
  `id` int(11) NOT NULL,
  `session_name` varchar(15) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_sessiondata`
--

INSERT INTO `system_sessiondata` (`id`, `session_name`, `created_on`) VALUES
(1, '2014/2015', '2019-06-05 14:03:02pm'),
(2, '2015/2016', '2019-06-05 14:03:02pm'),
(3, '2016/2017', '2019-06-05 14:13:31pm');

-- --------------------------------------------------------

--
-- Table structure for table `system_subjectdata`
--

CREATE TABLE `system_subjectdata` (
  `id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `code` longtext NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_subjectdata`
--

INSERT INTO `system_subjectdata` (`id`, `curriculum_id`, `name`, `code`, `created_date`) VALUES
(1, 1, 'Introduction To Programmming', 'ITCC - 101', '2024-09-29 17:02:27'),
(2, 2, 'Data Structure', 'ITCC - 104', '2024-09-29 17:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `system_teacher`
--

CREATE TABLE `system_teacher` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `prof_type` longtext NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_teacher`
--

INSERT INTO `system_teacher` (`id`, `name`, `prof_type`, `created_date`) VALUES
(1, 'Jryl Jroa', 'professional', '2024-09-29 17:47:23'),
(2, 'Steve S. Lord', 'visiting-lecturer', '2024-09-29 17:53:33'),
(3, 'Steve S. Lords', 'visiting-lecturer', '2024-09-29 17:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `system_teacher_records`
--

CREATE TABLE `system_teacher_records` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `created_on`) VALUES
(1, 'Adebola', 'debola', 'f57b5bfccccfd94ea60fc9303b54665f', '2019-06-05 15:52:52pm'),
(2, 'CampCodes', 'campcodes', 'ac09c14446487b84da336c98e97d45a8', '2021-04-28 13:03:27pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_studentprofile`
--
ALTER TABLE `account_studentprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_course` (`course_id`);

--
-- Indexes for table `bursary_schoolfees`
--
ALTER TABLE `bursary_schoolfees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bursary_schoolfees_did_id_c11c5cf3_fk_system_departmentdata_id` (`did_id`),
  ADD KEY `bursary_schoolfees_sid_id_7cba7ebd_fk_system_sessiondata_id` (`sid_id`);

--
-- Indexes for table `confirmed_payment`
--
ALTER TABLE `confirmed_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feesId` (`feesId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feesId` (`feesId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `system_coursedata`
--
ALTER TABLE `system_coursedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_curriculum`
--
ALTER TABLE `system_curriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_curriculum` (`course_id`);

--
-- Indexes for table `system_departmentdata`
--
ALTER TABLE `system_departmentdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_facultydata`
--
ALTER TABLE `system_facultydata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_sessiondata`
--
ALTER TABLE `system_sessiondata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_subjectdata`
--
ALTER TABLE `system_subjectdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curriculum_subject` (`curriculum_id`);

--
-- Indexes for table `system_teacher`
--
ALTER TABLE `system_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_teacher_records`
--
ALTER TABLE `system_teacher_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_teacher` (`teacher_id`),
  ADD KEY `records_curriculum` (`curriculum_id`),
  ADD KEY `records_subject` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_studentprofile`
--
ALTER TABLE `account_studentprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bursary_schoolfees`
--
ALTER TABLE `bursary_schoolfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `confirmed_payment`
--
ALTER TABLE `confirmed_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_coursedata`
--
ALTER TABLE `system_coursedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_curriculum`
--
ALTER TABLE `system_curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_departmentdata`
--
ALTER TABLE `system_departmentdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_facultydata`
--
ALTER TABLE `system_facultydata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_sessiondata`
--
ALTER TABLE `system_sessiondata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_subjectdata`
--
ALTER TABLE `system_subjectdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_teacher`
--
ALTER TABLE `system_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_teacher_records`
--
ALTER TABLE `system_teacher_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_studentprofile`
--
ALTER TABLE `account_studentprofile`
  ADD CONSTRAINT `student_course` FOREIGN KEY (`course_id`) REFERENCES `system_coursedata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bursary_schoolfees`
--
ALTER TABLE `bursary_schoolfees`
  ADD CONSTRAINT `bursary_schoolfees_ibfk_1` FOREIGN KEY (`did_id`) REFERENCES `system_departmentdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bursary_schoolfees_ibfk_3` FOREIGN KEY (`sid_id`) REFERENCES `system_sessiondata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`feesId`) REFERENCES `bursary_schoolfees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `account_studentprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_curriculum`
--
ALTER TABLE `system_curriculum`
  ADD CONSTRAINT `course_curriculum` FOREIGN KEY (`course_id`) REFERENCES `system_coursedata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_departmentdata`
--
ALTER TABLE `system_departmentdata`
  ADD CONSTRAINT `system_departmentdata_ibfk_1` FOREIGN KEY (`fid_id`) REFERENCES `system_facultydata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_subjectdata`
--
ALTER TABLE `system_subjectdata`
  ADD CONSTRAINT `curriculum_subject` FOREIGN KEY (`curriculum_id`) REFERENCES `system_curriculum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_teacher_records`
--
ALTER TABLE `system_teacher_records`
  ADD CONSTRAINT `records_curriculum` FOREIGN KEY (`curriculum_id`) REFERENCES `system_curriculum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_subject` FOREIGN KEY (`subject_id`) REFERENCES `system_subjectdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `system_teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
