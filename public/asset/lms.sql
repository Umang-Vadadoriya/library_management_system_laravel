-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 10:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `lms_admin`
--

CREATE TABLE `lms_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_admin`
--

INSERT INTO `lms_admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `lms_author`
--

CREATE TABLE `lms_author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `author_status` enum('Enable','Disable') NOT NULL,
  `author_created_on` varchar(30) NOT NULL,
  `author_updated_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_author`
--

INSERT INTO `lms_author` (`author_id`, `author_name`, `author_status`, `author_created_on`, `author_updated_on`) VALUES
(5, 'Gargi Shah', 'Enable', '2023-08-26 10:32:20', ''),
(6, 'Aporva Desai', 'Disable', '2023-08-26 10:32:28', '2023-10-07 20:45:39'),
(7, 'Rustam Morena', 'Enable', '2023-08-26 10:32:37', ''),
(8, 'Ravi Gulati', 'Enable', '2023-08-26 10:32:45', ''),
(9, 'Dharmen Shah', 'Enable', '2023-08-26 10:32:56', '2023-08-26 11:51:25'),
(10, 'Vimal Chaudhri', 'Enable', '2023-08-26 10:35:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_book`
--

CREATE TABLE `lms_book` (
  `book_id` int(11) NOT NULL,
  `book_category` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `book_location_rack` varchar(100) NOT NULL,
  `book_name` text NOT NULL,
  `book_isbn_number` varchar(30) NOT NULL,
  `book_no_of_copy` int(5) NOT NULL,
  `book_status` enum('Enable','Disable') NOT NULL,
  `book_added_on` varchar(30) NOT NULL,
  `book_updated_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_book`
--

INSERT INTO `lms_book` (`book_id`, `book_category`, `book_author`, `book_location_rack`, `book_name`, `book_isbn_number`, `book_no_of_copy`, `book_status`, `book_added_on`, `book_updated_on`) VALUES
(1, 'Web Development', 'Gargi Shah', 'A1', 'The Joy of PHP Programming', '325678', 4, 'Enable', '2023-08-26 10:36:23', ''),
(2, 'Web Development', 'Gargi Shah', 'A3', 'PHP A Beginners Guide', '325673', 5, 'Enable', '2023-08-26 10:47:57', '2023-08-26 11:22:58'),
(3, 'Web Design', 'Vimal Chaudhri', 'B1', 'A Smarter Way to Learn JavaScript', '325634', 3, 'Enable', '2023-08-26 10:48:22', '2023-10-07 20:21:35'),
(4, 'Database', 'Ravi Gulati', 'A2', 'Basics Of RDBMS', '325652', 3, 'Enable', '2023-08-26 10:51:17', ''),
(5, 'Database', 'Ravi Gulati', 'A3', 'Introduction To Oracle 8i', '3259853', 5, 'Enable', '2023-08-26 10:52:55', '2023-10-07 20:21:47'),
(6, 'Technologies', 'Rustam Morena', 'A2', 'Mastering Blockchain Techonology', '651486', 9, 'Enable', '2023-08-26 11:07:00', '2023-08-26 12:05:09'),
(7, 'Automation', 'Aporva Desai', 'B1', 'Human Existence Without Machines', '412563', 4, 'Enable', '2023-08-26 11:08:13', ''),
(8, 'Automation', 'Aporva Desai', 'A2', 'Advance Neural Network', '652498', 4, 'Enable', '2023-08-26 11:09:11', ''),
(9, 'Web Development', 'Dharmen Shah', 'C1', 'Advanced ASP.NET', '624896', 5, 'Enable', '2023-08-26 11:12:44', '2023-08-26 11:36:54'),
(10, 'Technologies', 'Gargi Shah', 'B1', 'PHPPPP', '344355', 13, 'Enable', '2023-08-29 10:14:53', '2023-08-29 10:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `lms_category`
--

CREATE TABLE `lms_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_status` enum('Enable','Disable') NOT NULL,
  `category_created_on` varchar(30) NOT NULL,
  `category_updated_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_category`
--

INSERT INTO `lms_category` (`category_id`, `category_name`, `category_status`, `category_created_on`, `category_updated_on`) VALUES
(1, 'Web Design', 'Enable', '2023-08-25 12:54:59', '2023-10-06 11:15:51'),
(2, 'Database', 'Enable', '2023-08-25 12:56:14', ''),
(3, 'Programming', 'Enable', '2023-08-25 12:56:31', ''),
(4, 'Web Development', 'Enable', '2023-08-25 13:04:17', ''),
(5, 'Technologies', 'Enable', '2023-08-26 11:06:37', ''),
(6, 'Automation', 'Disable', '2023-08-26 11:07:40', '2023-10-07 18:00:38'),
(7, 'Data Structure', 'Enable', '2023-08-26 12:01:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_issue_book`
--

CREATE TABLE `lms_issue_book` (
  `issue_book_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `issue_date_time` varchar(30) NOT NULL,
  `expected_return_date` varchar(30) NOT NULL,
  `return_date_time` varchar(30) NOT NULL,
  `book_fines` varchar(30) NOT NULL,
  `book_issue_status` enum('Issue','Return','Not Return') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_issue_book`
--

INSERT INTO `lms_issue_book` (`issue_book_id`, `book_id`, `user_id`, `issue_date_time`, `expected_return_date`, `return_date_time`, `book_fines`, `book_issue_status`) VALUES
(1, '325673', 'U94616787', '2023-08-10 11:22:27', '2023-08-13 11:22:27', '2023-08-26 11:30:44', '130', 'Return'),
(2, '325673', 'U94616787', '2023-08-26 11:22:58', '2023-08-29 11:22:58', '', '90', 'Not Return'),
(3, '651486', 'U79248317', '2023-08-24 11:26:30', '2023-08-26 11:26:30', '2023-08-26 11:34:51', '0', 'Return'),
(4, '325673', 'U94616787', '2023-08-20 11:22:27', '2023-08-23 11:22:27', '', '150', 'Not Return'),
(5, '3259853', 'U57676226', '2023-08-26 11:35:09', '2023-08-29 11:35:09', '', '90', 'Not Return'),
(6, '651486', 'U57676226', '2023-08-26 12:05:09', '2023-08-29 12:05:09', '', '90', 'Not Return'),
(7, '344355', 'U94616787', '2023-08-29 10:16:38', '2023-09-01 10:16:38', '', '60', 'Not Return');

-- --------------------------------------------------------

--
-- Table structure for table `lms_location_rack`
--

CREATE TABLE `lms_location_rack` (
  `location_rack_id` int(11) NOT NULL,
  `location_rack_name` varchar(200) NOT NULL,
  `location_rack_status` enum('Enable','Disable') NOT NULL,
  `location_rack_created_on` varchar(30) NOT NULL,
  `location_rack_updated_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_location_rack`
--

INSERT INTO `lms_location_rack` (`location_rack_id`, `location_rack_name`, `location_rack_status`, `location_rack_created_on`, `location_rack_updated_on`) VALUES
(1, 'A1', 'Disable', '2023-08-25 12:58:50', '2023-10-07 20:48:29'),
(2, 'A2', 'Enable', '2023-08-25 12:59:04', ''),
(3, 'A3', 'Enable', '2023-08-25 12:59:09', ''),
(4, 'B1', 'Enable', '2023-08-25 12:59:14', ''),
(5, 'C1', 'Enable', '2023-08-25 12:59:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_setting`
--

CREATE TABLE `lms_setting` (
  `setting_id` int(11) NOT NULL,
  `library_name` varchar(200) NOT NULL,
  `library_address` text NOT NULL,
  `library_contact_number` varchar(30) NOT NULL,
  `library_email_address` varchar(100) NOT NULL,
  `library_total_book_issue_day` int(5) NOT NULL,
  `library_one_day_fine` decimal(4,2) NOT NULL,
  `library_issue_total_book_per_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_setting`
--

INSERT INTO `lms_setting` (`setting_id`, `library_name`, `library_address`, `library_contact_number`, `library_email_address`, `library_total_book_issue_day`, `library_one_day_fine`, `library_issue_total_book_per_user`) VALUES
(1, 'LMS', 'DCS VNSGU', '9023463256', 'lms@gmail.com', 3, 10.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lms_user`
--

CREATE TABLE `lms_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_address` text NOT NULL,
  `user_contact_no` varchar(30) NOT NULL,
  `user_profile` varchar(100) NOT NULL,
  `user_email_address` varchar(200) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_unique_id` varchar(30) NOT NULL,
  `user_status` enum('Enable','Disable') NOT NULL,
  `user_created_on` varchar(30) NOT NULL,
  `user_updated_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_user`
--

INSERT INTO `lms_user` (`user_id`, `user_name`, `user_address`, `user_contact_no`, `user_profile`, `user_email_address`, `user_password`, `user_unique_id`, `user_status`, `user_created_on`, `user_updated_on`) VALUES
(1, 'Umang', 'Varachha,\r\nSurat,\r\nGujarat-395006', '9535456243', '2b689db5b59f0108e494938bd1258d4d-215920-1692961535.jpeg', 'umang@gmail.com', 'pass', 'U79248317', 'Enable', '2023-08-25 13:05:35', ''),
(2, 'Pooja', 'Hostel,\r\nSurat,\r\nGujarat.', '9542368495', '34dd21b8357fd7eaa532d311dff48947-754908-1693038561.jpg', 'pooja@gmail.com', 'pass', 'U57676226', 'Enable', '2023-08-26 10:29:21', ''),
(3, 'GargiMam', 'Cabin,\r\nDCS,\r\nVNSGU', '9851236578', 'dbcd475327936a1d18bb167a03097b6a-944939-1693038643.jpg', 'gshah@gmail.com', 'pass', 'U94616787', 'Enable', '2023-08-26 10:30:43', '2023-08-26 11:21:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_admin`
--
ALTER TABLE `lms_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `lms_author`
--
ALTER TABLE `lms_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `lms_book`
--
ALTER TABLE `lms_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `lms_category`
--
ALTER TABLE `lms_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `lms_issue_book`
--
ALTER TABLE `lms_issue_book`
  ADD PRIMARY KEY (`issue_book_id`);

--
-- Indexes for table `lms_location_rack`
--
ALTER TABLE `lms_location_rack`
  ADD PRIMARY KEY (`location_rack_id`);

--
-- Indexes for table `lms_setting`
--
ALTER TABLE `lms_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `lms_user`
--
ALTER TABLE `lms_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_admin`
--
ALTER TABLE `lms_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lms_author`
--
ALTER TABLE `lms_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lms_book`
--
ALTER TABLE `lms_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lms_category`
--
ALTER TABLE `lms_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lms_issue_book`
--
ALTER TABLE `lms_issue_book`
  MODIFY `issue_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lms_location_rack`
--
ALTER TABLE `lms_location_rack`
  MODIFY `location_rack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lms_setting`
--
ALTER TABLE `lms_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lms_user`
--
ALTER TABLE `lms_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
