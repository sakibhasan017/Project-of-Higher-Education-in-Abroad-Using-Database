-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2026 at 05:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project22`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Email`, `Password`, `Answer`) VALUES
(1, 'bup@gmail.com', '1234', 'Cat');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `App_ID` int(11) NOT NULL,
  `University_Name` varchar(255) DEFAULT NULL,
  `Applicant_Info` varchar(255) DEFAULT NULL,
  `Application_Details` varchar(255) DEFAULT NULL,
  `Status` enum('Accepted','Rejected','Pending') DEFAULT NULL,
  `Application_Date` date DEFAULT curdate(),
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`App_ID`, `University_Name`, `Applicant_Info`, `Application_Details`, `Status`, `Application_Date`, `Email`) VALUES
(2, 'University of Cambridge', 'hassansakib512@gmail.com', 'https://drive.google.com/file/d/1KMJvRbU-XLFeOeqNmVhKXqTrGB-iG8/view?usp=sharing', 'Pending', '2024-05-10', 'sakib@gmail.com'),
(3, 'Massachusetts Institute of Technology (MIT)', 'shihab@gmail.com', 'https://drive.google.com/file/d/1KMJvRbU-XqTrGB-iG8/view?usp=sharing', 'Rejected', '2024-05-11', 'shihab@gmail.com'),
(4, 'Technical University of Munich', 'shihab@gmail.com', 'https://drive.google.com/file/d/1KMJvRbU-XqTrGB-iG8/view?usp=sharing', 'Accepted', '2024-05-11', 'shihab@gmail.com'),
(5, 'Harvard University', 'ornob@gmail.com', 'https://drive.google.com/file/d/1KMJvRbU-XLXqTrGB-iG8/view?usp=sharing', 'Accepted', '2024-05-11', 'ornob12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `educational_institute`
--

CREATE TABLE `educational_institute` (
  `Ins_ID` int(11) NOT NULL,
  `Ins_Name` varchar(255) NOT NULL,
  `App_Last_Date` date NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_institute`
--

INSERT INTO `educational_institute` (`Ins_ID`, `Ins_Name`, `App_Last_Date`, `Location`, `Country`) VALUES
(1, 'Technical University of Munich', '2024-07-31', 'Munich, Germany', 'Germany'),
(2, 'Heidelberg University', '2024-08-15', 'Heidelberg, Germany', 'Germany'),
(3, 'Ludwig Maximilian University of Munich', '2024-08-30', 'Munich, Germany', 'Germany'),
(4, 'Harvard University', '2024-07-15', 'Cambridge, Massachusetts, USA', 'USA'),
(5, 'Stanford University', '2024-08-01', 'Stanford, California, USA', 'USA'),
(6, 'Massachusetts Institute of Technology (MIT)', '2024-08-16', 'Cambridge, Massachusetts, USA', 'USA'),
(7, 'University of Oxford', '2024-07-31', 'Oxford, UK', 'UK'),
(8, 'University of Cambridge', '2024-08-15', 'Cambridge, UK', 'UK'),
(9, 'Imperial College London', '2024-08-30', 'London, UK', 'UK'),
(10, 'Australian National University', '2024-07-15', 'Canberra, Australia', 'Australia'),
(11, 'University of Melbourne', '2024-07-31', 'Melbourne, Australia', 'Australia'),
(12, 'University of Sydney', '2024-08-15', 'Sydney, Australia', 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

CREATE TABLE `education_info` (
  `Stu_ID` int(11) DEFAULT NULL,
  `Institute_Name` varchar(255) DEFAULT NULL,
  `Program_Name` varchar(255) DEFAULT NULL,
  `Dept_Name` varchar(255) DEFAULT NULL,
  `IELTS_Score` float DEFAULT NULL,
  `Total_CGPA` float DEFAULT NULL,
  `Passing_Year` int(11) DEFAULT NULL,
  `TOEFL_Score` int(11) DEFAULT NULL,
  `SAT_Score` int(11) DEFAULT NULL,
  `ACT_Score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_info`
--

INSERT INTO `education_info` (`Stu_ID`, `Institute_Name`, `Program_Name`, `Dept_Name`, `IELTS_Score`, `Total_CGPA`, `Passing_Year`, `TOEFL_Score`, `SAT_Score`, `ACT_Score`) VALUES
(1, 'Bangladesh University of Professionals', 'BSc', 'ICT', 7.5, 3.9, 2024, 80, 1250, NULL),
(4, 'Bangladesh University of Professionals', 'BSc', 'CSE', 7, 3.8, 2023, 70, 1300, NULL),
(5, 'Bangladesh University of Professionals', 'BSc', 'ICT', 6.5, 4, 2024, 85, 1300, 33),
(6, 'Bangladesh University of Professionals', 'BSc', 'ICT', 8, 4, 2024, 80, 1300, 32),
(7, 'IBIT', 'BSc', 'CSE', 7, 4, 2025, 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Faculty_ID` int(11) NOT NULL,
  `Program_ID` int(11) DEFAULT NULL,
  `Faculty_Name` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Faculty_ID`, `Program_ID`, `Faculty_Name`, `Designation`, `Email`) VALUES
(1, 1, 'Dr. Hans Müller', 'Professor', 'hans.mueller@gmail.com'),
(2, 1, 'Dr. Maria Schmidt', 'Associate Professor', 'maria.schmidt@gmail.com'),
(3, 1, 'Prof. Klaus Fischer', 'Assistant Professor', 'klaus.fischer@gmail.com'),
(4, 2, 'Dr. John Smith', 'Professor', 'john.smith@gmail.com'),
(5, 2, 'Dr. Sarah Johnson', 'Associate Professor', 'sarah.johnson@gmail.com'),
(6, 2, 'Prof. Emily Davis', 'Assistant Professor', 'emily.davis@gmail.com'),
(7, 3, 'Dr. Michael Brown', 'Professor', 'michael.brown@gmail.com'),
(8, 3, 'Dr. Jennifer Wilson', 'Associate Professor', 'jennifer.wilson@gmail.com'),
(9, 3, 'Prof. David Martinez', 'Assistant Professor', 'david.martinez@gmail.com'),
(10, 4, 'Dr. Daniel Thompson', 'Professor', 'daniel.thompson@gmail.com'),
(11, 4, 'Dr. Jessica White', 'Associate Professor', 'jessica.white@gmail.com'),
(12, 4, 'Prof. Robert Johnson', 'Assistant Professor', 'robert.johnson@gmail.com'),
(13, 5, 'Dr. Andrew Clark', 'Professor', 'andrew.clark@gmail.com'),
(14, 5, 'Dr. Laura Lee', 'Associate Professor', 'laura.lee@gmail.com'),
(15, 5, 'Prof. Michelle Taylor', 'Assistant Professor', 'michelle.taylor@gmail.com'),
(16, 6, 'Dr. Christopher Harris', 'Professor', 'christopher.harris@gmail.com'),
(17, 6, 'Dr. Amanda Young', 'Associate Professor', 'amanda.young@gmail.com'),
(18, 6, 'Prof. Samantha Turner', 'Assistant Professor', 'samantha.turner@gmail.com'),
(19, 7, 'Dr. Peter Brown', 'Professor', 'peter.brown@gmail.com'),
(20, 7, 'Dr. Emily Wilson', 'Associate Professor', 'emily.wilson@gmail.com'),
(21, 7, 'Prof. William Johnson', 'Assistant Professor', 'william.johnson@gmail.com'),
(22, 8, 'Dr. Michael Jackson', 'Professor', 'michael.jackson@gmail.com'),
(23, 8, 'Dr. Laura Harris', 'Associate Professor', 'laura.harris@gmail.com'),
(24, 8, 'Prof. Samuel White', 'Assistant Professor', 'samuel.white@gmail.com'),
(25, 9, 'Dr. Elizabeth Clark', 'Professor', 'elizabeth.clark@gmail.com'),
(26, 9, 'Dr. Kevin Brown', 'Associate Professor', 'kevin.brown@gmail.com'),
(27, 9, 'Prof. Kimberly Wilson', 'Assistant Professor', 'kimberly.wilson@gmail.com'),
(28, 10, 'Dr. Matthew Johnson', 'Professor', 'matthew.johnson@gmail.com'),
(29, 10, 'Dr. Sarah Lee', 'Associate Professor', 'sarah.lee@gmail.com'),
(30, 10, 'Prof. Jennifer Harris', 'Assistant Professor', 'jennifer.harris@gmail.com'),
(31, 11, 'Dr. Alexander Wilson', 'Professor', 'alexander.wilson@gmail.com'),
(32, 11, 'Dr. Sarah Brown', 'Associate Professor', 'sarah.brown@gmail.com'),
(33, 11, 'Prof. David Johnson', 'Assistant Professor', 'david.johnson@gmail.com'),
(34, 12, 'Dr. Emily Turner', 'Professor', 'emily.turner@gmail.com'),
(35, 12, 'Dr. Michael Clark', 'Associate Professor', 'michael.clark@gmail.com'),
(36, 12, 'Prof. Jennifer Harris', 'Assistant Professor', 'jennifer.harris@gmail.com'),
(37, 13, 'Dr. William Martinez', 'Professor', 'william.martinez@gmail.com'),
(38, 13, 'Dr. Jessica Garcia', 'Associate Professor', 'jessica.garcia@gmail.com'),
(39, 13, 'Prof. Daniel Lee', 'Assistant Professor', 'daniel.lee@gmail.com'),
(40, 14, 'Dr. Samantha Taylor', 'Professor', 'samantha.taylor@gmail.com'),
(41, 14, 'Dr. Christopher White', 'Associate Professor', 'christopher.white@gmail.com'),
(42, 14, 'Prof. Amanda Brown', 'Assistant Professor', 'amanda.brown@gmail.com'),
(43, 15, 'Dr. Matthew Turner', 'Professor', 'matthew.turner@gmail.com'),
(44, 15, 'Dr. Lauren Martinez', 'Associate Professor', 'lauren.martinez@gmail.com'),
(45, 15, 'Prof. Andrew Harris', 'Assistant Professor', 'andrew.harris@gmail.com'),
(46, 16, 'Dr. Elizabeth Turner', 'Professor', 'elizabeth.turner@gmail.com'),
(47, 16, 'Dr. Kevin Rodriguez', 'Associate Professor', 'kevin.rodriguez@gmail.com'),
(48, 16, 'Prof. Samantha Johnson', 'Assistant Professor', 'samantha.johnson@gmail.com'),
(49, 17, 'Dr. Daniel Garcia', 'Professor', 'daniel.garcia@gmail.com'),
(50, 17, 'Dr. Emily Martinez', 'Associate Professor', 'emily.martinez@gmail.com'),
(51, 17, 'Prof. Michael Harris', 'Assistant Professor', 'michael.harris@gmail.com'),
(52, 18, 'Dr. Jennifer Rodriguez', 'Professor', 'jennifer.rodriguez@gmail.com'),
(53, 18, 'Dr. William Garcia', 'Associate Professor', 'william.garcia@gmail.com'),
(54, 18, 'Prof. Jessica Turner', 'Assistant Professor', 'jessica.turner@gmail.com'),
(55, 19, 'Dr. Christopher Johnson', 'Professor', 'christopher.johnson@gmail.com'),
(56, 19, 'Dr. Samantha Martinez', 'Associate Professor', 'samantha.martinez@gmail.com'),
(57, 19, 'Prof. Matthew Turner', 'Assistant Professor', 'matthew.turner@gmail.com'),
(58, 20, 'Dr. Amanda Garcia', 'Professor', 'amanda.garcia@gmail.com'),
(59, 20, 'Dr. Andrew Rodriguez', 'Associate Professor', 'andrew.rodriguez@gmail.com'),
(60, 20, 'Prof. Lauren Harris', 'Assistant Professor', 'lauren.harris@gmail.com'),
(61, 21, 'Dr. Michael Turner', 'Professor', 'michael.turner@gmail.com'),
(62, 21, 'Dr. Jessica Rodriguez', 'Associate Professor', 'jessica.rodriguez@gmail.com'),
(63, 21, 'Prof. Emily Garcia', 'Assistant Professor', 'emily.garcia@gmail.com'),
(64, 22, 'Dr. David Johnson', 'Professor', 'david.johnson@gmail.com'),
(65, 22, 'Dr. Samantha Turner', 'Associate Professor', 'samantha.turner@gmail.com'),
(66, 22, 'Prof. Christopher Martinez', 'Assistant Professor', 'christopher.martinez@gmail.com'),
(67, 23, 'Dr. Lauren Garcia', 'Professor', 'lauren.garcia@gmail.com'),
(68, 23, 'Dr. Andrew Turner', 'Associate Professor', 'andrew.turner@gmail.com'),
(69, 23, 'Prof. Jessica Rodriguez', 'Assistant Professor', 'jessica.rodriguez@gmail.com'),
(70, 24, 'Dr. Matthew Harris', 'Professor', 'matthew.harris@gmail.com'),
(71, 24, 'Dr. Elizabeth Rodriguez', 'Associate Professor', 'elizabeth.rodriguez@gmail.com'),
(72, 24, 'Prof. Kevin Garcia', 'Assistant Professor', 'kevin.garcia@gmail.com'),
(73, 25, 'Dr. Samantha Johnson', 'Professor', 'samantha.johnson@gmail.com'),
(74, 25, 'Dr. Daniel Rodriguez', 'Associate Professor', 'daniel.rodriguez@gmail.com'),
(75, 25, 'Prof. Emily Martinez', 'Assistant Professor', 'emily.martinez@gmail.com'),
(76, 26, 'Dr. Michael Turner', 'Professor', 'michael.turner@gmail.com'),
(77, 26, 'Dr. Jessica Garcia', 'Associate Professor', 'jessica.garcia@gmail.com'),
(78, 26, 'Prof. Christopher Rodriguez', 'Assistant Professor', 'christopher.rodriguez@gmail.com'),
(79, 27, 'Dr. Samantha Johnson', 'Professor', 'samantha.johnson@gmail.com'),
(80, 27, 'Dr. Andrew Rodriguez', 'Associate Professor', 'andrew.rodriguez@gmail.com'),
(81, 27, 'Prof. Lauren Garcia', 'Assistant Professor', 'lauren.garcia@gmail.com'),
(82, 28, 'Dr. Matthew Harris', 'Professor', 'matthew.harris@gmail.com'),
(83, 28, 'Dr. Elizabeth Rodriguez', 'Associate Professor', 'elizabeth.rodriguez@gmail.com'),
(84, 28, 'Prof. Kevin Garcia', 'Assistant Professor', 'kevin.garcia@gmail.com'),
(85, 29, 'Dr. Samantha Johnson', 'Professor', 'samantha.johnson@gmail.com'),
(86, 29, 'Dr. Daniel Rodriguez', 'Associate Professor', 'daniel.rodriguez@gmail.com'),
(87, 29, 'Prof. Emily Martinez', 'Assistant Professor', 'emily.martinez@gmail.com'),
(88, 30, 'Dr. Michael Turner', 'Professor', 'michael.turner@gmail.com'),
(89, 30, 'Dr. Jessica Garcia', 'Associate Professor', 'jessica.garcia@gmail.com'),
(90, 30, 'Prof. Christopher Rodriguez', 'Assistant Professor', 'christopher.rodriguez@gmail.com'),
(91, 31, 'Dr. Samantha Johnson', 'Professor', 'samantha.johnson@gmail.com'),
(92, 31, 'Dr. Andrew Rodriguez', 'Associate Professor', 'andrew.rodriguez@gmail.com'),
(93, 31, 'Prof. Lauren Garcia', 'Assistant Professor', 'lauren.garcia@gmail.com'),
(94, 32, 'Dr. Matthew Harris', 'Professor', 'matthew.harris@gmail.com'),
(95, 32, 'Dr. Elizabeth Rodriguez', 'Associate Professor', 'elizabeth.rodriguez@gmail.com'),
(96, 32, 'Prof. Kevin Garcia', 'Assistant Professor', 'kevin.garcia@gmail.com'),
(97, 33, 'Dr. Samantha Johnson', 'Professor', 'samantha.johnson@gmail.com'),
(98, 33, 'Dr. Daniel Rodriguez', 'Associate Professor', 'daniel.rodriguez@gmail.com'),
(99, 33, 'Prof. Emily Martinez', 'Assistant Professor', 'emily.martinez@gmail.com'),
(100, 34, 'Dr. Michael Turner', 'Professor', 'michael.turner@gmail.com'),
(101, 34, 'Dr. Jessica Garcia', 'Associate Professor', 'jessica.garcia@gmail.com'),
(102, 34, 'Prof. Christopher Rodriguez', 'Assistant Professor', 'christopher.rodriguez@gmail.com'),
(103, 35, 'Dr. Samantha Johnson', 'Professor', 'samantha.johnson@gmail.com'),
(104, 35, 'Dr. Andrew Rodriguez', 'Associate Professor', 'andrew.rodriguez@gmail.com'),
(105, 35, 'Prof. Lauren Garcia', 'Assistant Professor', 'lauren.garcia@gmail.com'),
(106, 36, 'Dr. Matthew Harris', 'Professor', 'matthew.harris@gmail.com'),
(107, 36, 'Dr. Elizabeth Rodriguez', 'Associate Professor', 'elizabeth.rodriguez@gmail.com'),
(108, 36, 'Prof. Kevin Garcia', 'Assistant Professor', 'kevin.garcia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `Hall_ID` int(11) NOT NULL,
  `Ins_ID` int(11) DEFAULT NULL,
  `Hall_Name` varchar(255) DEFAULT NULL,
  `Total_Seats` int(11) DEFAULT NULL,
  `Available_Seats` int(11) DEFAULT NULL,
  `Hall_Cost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`Hall_ID`, `Ins_ID`, `Hall_Name`, `Total_Seats`, `Available_Seats`, `Hall_Cost`) VALUES
(1, 1, 'Brandenburg Hall', 500, 400, 800),
(2, 2, 'Golden Gate Hall', 600, 450, 1000),
(3, 3, 'Hoover Tower Hall', 700, 50, 1000),
(4, 4, 'Sheldonian Hall', 550, 420, 800),
(5, 5, 'Kings College Hall', 480, 380, 0),
(6, 6, 'Federation Square Hall', 520, 420, 800),
(7, 7, 'English Garden Hall', 450, 360, 1000),
(8, 8, 'Lake Zurich Hall', 580, 470, 0),
(9, 9, 'CN Tower Hall', 540, 430, 1000),
(10, 10, 'Sydney Opera House Hall', 500, 400, 800),
(11, 11, 'Berlin Park Hall', 500, 400, 800),
(12, 11, 'Frankfurt Plaza Hall', 400, 350, 750),
(13, 12, 'London Tower Hall', 600, 550, 900),
(14, 12, 'Buckingham Square Hall', 550, 500, 850);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `Parent_Id` int(11) NOT NULL,
  `Student_Id` int(11) DEFAULT NULL,
  `Parent_Email` varchar(255) NOT NULL,
  `Parent_Password` varchar(255) NOT NULL,
  `Answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`Parent_Id`, `Student_Id`, `Parent_Email`, `Parent_Password`, `Answer`) VALUES
(1, 1, 'abcd@gmail.com', '1234', 'Blue'),
(2, 4, 'shihab89@gmail.com', '1234', 'Red'),
(3, 6, 'ornobsp@gmail.com', '1234', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Stu_Id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Stu_Id`, `Name`, `Phone_Number`, `Email`, `Address`) VALUES
(1, 'Sakib Hasan', '01726215756', 'hassansakib512@gmail.com', '75/B,Shobujbag,Bonpukur,Savar,Dhaka'),
(4, 'Shihab Ahmed', '01827363743', 'shihab@gmail.com', '23/D,Mirpur,Dhaka'),
(5, 'Shahrukh Hossain', '01567896523', 'shahrukh@gmail.com', '34/H,Shemoly,Dhaka'),
(6, 'Shihaful Islam', '017843454655', 'ornob@gmail.com', '34/B,Uttara,Dhaka'),
(7, 'Riad', '01783782421', 'riad@gmail.com', 'Savar');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `Prog_ID` int(11) NOT NULL,
  `Ins_ID` int(11) DEFAULT NULL,
  `Program_Name` varchar(255) DEFAULT NULL,
  `Tuition_Fee` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Prog_ID`, `Ins_ID`, `Program_Name`, `Tuition_Fee`) VALUES
(1, 1, 'Computer Science', 8000.00),
(2, 1, 'Mechanical Engineering', 8500.00),
(3, 1, 'Business Administration', 9000.00),
(4, 2, 'Electrical Engineering', 10000.00),
(5, 2, 'Physics', 9000.00),
(6, 2, 'English Literature', 9500.00),
(7, 3, 'Computer Science', 11000.00),
(8, 3, 'Biochemistry', 10500.00),
(9, 3, 'Political Science', 10000.00),
(10, 4, 'Mathematics', 12000.00),
(11, 4, 'Economics', 11500.00),
(12, 4, 'History', 11000.00),
(13, 5, 'Chemistry', 12500.00),
(14, 5, 'Linguistics', 12000.00),
(15, 5, 'Psychology', 11500.00),
(16, 6, 'Civil Engineering', 13000.00),
(17, 6, 'Environmental Science', 12500.00),
(18, 6, 'Visual Arts', 12500.00),
(19, 7, 'Computer Engineering', 8000.00),
(20, 7, 'Biotechnology', 8500.00),
(21, 7, 'Architecture', 9000.00),
(22, 8, 'Physics', 10000.00),
(23, 8, 'Materials Science', 9500.00),
(24, 8, 'Finance', 10000.00),
(25, 9, 'Chemical Engineering', 11000.00),
(26, 9, 'Sociology', 10500.00),
(27, 9, 'Music', 10000.00),
(28, 10, 'Information Technology', 11500.00),
(29, 10, 'Medical Science', 12000.00),
(30, 10, 'Business Analytics', 12500.00),
(31, 11, 'Computer Science', 8500.00),
(32, 11, 'Electrical Engineering', 9000.00),
(33, 11, 'Business Administration', 9500.00),
(34, 12, 'Physics', 9500.00),
(35, 12, 'Biology', 9000.00),
(36, 12, 'Chemistry', 8500.00);

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `Req_ID` int(11) NOT NULL,
  `Ins_ID` int(11) DEFAULT NULL,
  `TOEFL_Score` int(11) DEFAULT NULL,
  `IELTS_Score` float DEFAULT NULL,
  `SAT_Score` int(11) DEFAULT NULL,
  `ACT_Score` int(11) DEFAULT NULL,
  `Application_Fee` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`Req_ID`, `Ins_ID`, `TOEFL_Score`, `IELTS_Score`, `SAT_Score`, `ACT_Score`, `Application_Fee`) VALUES
(1, 1, 80, 6.5, 1200, NULL, 50.00),
(2, 2, 100, 7, 1300, NULL, 75.00),
(3, 3, 95, 6.5, 1250, NULL, 70.00),
(4, 4, 90, 6, 1200, NULL, 60.00),
(5, 5, 100, 7.5, NULL, NULL, 80.00),
(6, 6, 90, 7.5, 1300, NULL, 70.00),
(7, 7, 85, 6.5, 1250, NULL, 65.00),
(8, 8, 100, 7.5, NULL, NULL, 80.00),
(9, 9, 95, 7, NULL, NULL, 75.00),
(10, 10, 85, 6.5, 1200, NULL, 60.00),
(11, 11, 80, 6.5, 1200, NULL, 80.00),
(12, 12, 90, 7, 1300, NULL, 68.00);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Stu_Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stu_Id`, `Email`, `Password`, `Answer`) VALUES
(1, 'hassansakib512@gmail.com', '1234', 'gbs'),
(4, 'shihab@gmail.com', '112233', 'shb'),
(5, 'shahrukh@gmail.com', 'shk123', 'shk'),
(6, 'ornob@gmail.com', '1234', 'Ornob'),
(7, 'riad@gmail.com', '1234', 'riad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`App_ID`);

--
-- Indexes for table `educational_institute`
--
ALTER TABLE `educational_institute`
  ADD PRIMARY KEY (`Ins_ID`);

--
-- Indexes for table `education_info`
--
ALTER TABLE `education_info`
  ADD KEY `Stu_ID` (`Stu_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Faculty_ID`),
  ADD KEY `Program_ID` (`Program_ID`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`Hall_ID`),
  ADD KEY `Ins_ID` (`Ins_ID`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`Parent_Id`),
  ADD KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD KEY `Stu_Id` (`Stu_Id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Prog_ID`),
  ADD KEY `Ins_ID` (`Ins_ID`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`Req_ID`),
  ADD KEY `Ins_ID` (`Ins_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Stu_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `App_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `educational_institute`
--
ALTER TABLE `educational_institute`
  MODIFY `Ins_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Faculty_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `Hall_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `Parent_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `Prog_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
  MODIFY `Req_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Stu_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education_info`
--
ALTER TABLE `education_info`
  ADD CONSTRAINT `education_info_ibfk_1` FOREIGN KEY (`Stu_ID`) REFERENCES `student` (`Stu_Id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`Program_ID`) REFERENCES `program` (`Prog_ID`);

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`Ins_ID`) REFERENCES `educational_institute` (`Ins_ID`);

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Stu_Id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`Stu_Id`) REFERENCES `student` (`Stu_Id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`Ins_ID`) REFERENCES `educational_institute` (`Ins_ID`);

--
-- Constraints for table `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `requirement_ibfk_1` FOREIGN KEY (`Ins_ID`) REFERENCES `educational_institute` (`Ins_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
