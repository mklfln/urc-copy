-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 10:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urc`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `file_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `subDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`file_id`, `user_id`, `fileName`, `subDate`) VALUES
(32, 58, 'test-5.2.1.9 Lab - Researching Network Monitoring Software.pdf', '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` mediumtext NOT NULL,
  `fName` tinytext NOT NULL,
  `lName` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinytext NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fName`, `lName`, `email`, `password`, `user_type`, `token`, `verified`) VALUES
(58, 'test', 'Mikel Reynce', 'Faulan', 'mfaulan@gmail.com', '$2y$10$oEjJ3IJXMbrGQLlXMjED4uF8aa7MGkBZbEB4KHls4RieJQRSmFcI6', 'Admin', 'b417c75f9a7f41b1d84729080bc324256a3b5d347a44bc7a5b78e9671a55a438f8c557aa8ba251fc4cf3a89475d16c0e6bc7', 0),
(59, 'test1', 'test', 'test', 'mklfaw@gmail.com', '$2y$10$Uxg7iMos4AXCPogBJrIYGu4us.Fm3NvP0OQ4zoWGJGLMVBkYIHCEK', 'user', '6c17690536a7e2c252b97332aa92aff0dadba687859da46ee237133384c1bbe580107c0120533aa2974edaab938209e3c21c', 0),
(60, 'test2', 'test', 'test', 'test2@gmail.com', '$2y$10$6nQJ0ymhNgh0aSs3RDWtZ.nuB1RMLzm3OtHRNtRRz7wufoqoq9/de', 'user', 'fc6e33356826cd5db764f82e5bdd94a6f607f87dfdca20f93e24e25fcf75b37cb3022e2f13b38c465ee18322795da933e910', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `file_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
