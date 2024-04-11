-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Apr 06, 2024 at 07:12 PM
-- Server version: 8.0.26
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme_widget`
--

-- --------------------------------------------------------

--
-- Table structure for table `acme_associates`
--

CREATE TABLE `acme_associates` (
  `associateId` int NOT NULL,
  `associateName` varchar(255) NOT NULL,
  `associateTitle` varchar(255) NOT NULL,
  `supervisorRole` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acme_associates`
--

INSERT INTO `acme_associates` (`associateId`, `associateName`, `associateTitle`, `supervisorRole`) VALUES
(375060387, 'Kermit the Frog', 'Director of Gadgets Engineering', 1),
(465859737, 'Fozzie Bear', 'Time-Travel Project Manager', 1),
(608145878, 'Elmer Fudd', 'Time-Travel Safety Specialist', 0),
(718186498, 'Daffy Duck', 'Gadgets Safety Coordinator', 0),
(746239844, 'Miss Piggy', 'Director of Communication and Disguise', 1),
(824828306, 'Bugs Bunny', 'Chief Disguise Strategist', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acme_departments`
--

CREATE TABLE `acme_departments` (
  `departmentID` int NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acme_departments`
--

INSERT INTO `acme_departments` (`departmentID`, `departmentName`) VALUES
(1, 'Acme Gadgets and Gizmos Department'),
(2, 'Acme Time-Travel and Space Manipulation Department'),
(3, 'Acme Communication and Disguise Department');

-- --------------------------------------------------------

--
-- Table structure for table `hazards_controls`
--

CREATE TABLE `hazards_controls` (
  `id` int NOT NULL,
  `hazaards` varchar(255) NOT NULL,
  `controls` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hazards_controls`
--

INSERT INTO `hazards_controls` (`id`, `hazaards`, `controls`) VALUES
(1, 'Design flaws or defects leading to potential product malfunctions or safety hazards', 'Conduct thorough design reviews and risk assessments to identify potential flaws and hazards'),
(2, 'Exposure to hazardous materials during prototype construction or manufacturing processes', 'Provide proper training and personal protective equipment (PPE) for employees handling hazardous materials'),
(3, 'Mechanical failures during testing leading to injuries or accidents', 'Implement safety protocols during prototype construction, testing, and equipment maintenance'),
(4, 'Electrical malfunctions during testing resulting in shocks or fires', 'Regular inspection and maintenance of testing equipment to prevent mechanical or electrical failures'),
(5, 'Exposure to noise, vibration, or visual stimuli during testing', 'Implement noise-reducing measures and provide appropriate protection for employees during testing'),
(6, 'Exposure to electromagnetic radiation during device testing', 'Implement safety protocols for handling electromagnetic radiation or other hazardous substances during testing');


--
CREATE TABLE `jsa_data` (
  `associateId` int NOT NULL,
  `departmentId` varchar(255) NOT NULL,
  `formId` varchar(255) NOT NULL,
  `formDate` varchar(255) NOT NULL
  `formLocation` varchar(255) NOT NULL
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
CREATE TABLE `step_hazard` (
  `step_id` int NOT NULL,
  `hazard_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
CREATE TABLE `step_hazard` (
  `step_id` int NOT NULL,
  `step_description` varchar(255) NOT NULL,
  `hazard_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `acme_associates`
--
ALTER TABLE `acme_associates`
  ADD PRIMARY KEY (`associateId`);

--
-- Indexes for table `acme_departments`
--
ALTER TABLE `acme_departments`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `hazards_controls`
--
ALTER TABLE `hazards_controls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hazards_controls`
--
ALTER TABLE `hazards_controls`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
