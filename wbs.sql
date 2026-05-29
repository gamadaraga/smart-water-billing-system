-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 02:16 PM
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
-- Database: `wbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_number` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_number`, `user_id`, `balance`) VALUES
('10000789456', 1, 68740.00),
('10007896457', 13, 20280.00);

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `assign_id` int(11) NOT NULL,
  `technician_name` varchar(60) NOT NULL,
  `assigned_for` varchar(60) NOT NULL,
  `assigned_date` datetime NOT NULL,
  `maintenance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `technician_name`, `assigned_for`, `assigned_date`, `maintenance_id`) VALUES
(1, 'Lamesa Diriba Bula', 'Tura', '2022-08-27 00:00:00', 2),
(2, 'Lamesa Diriba Bula', 'Tura', '2022-08-31 00:00:00', 3),
(3, 'Lamesa Diriba Bula', 'Dabala', '2022-08-11 00:00:00', 1),
(4, 'Lamesa Diriba Bula', 'Dabala', '2025-02-15 00:00:00', 1),
(5, 'Lamesa Diriba Bula', 'Gemechu', '2025-02-15 00:00:00', 5),
(6, 'Tura', 'Gemechu', '2025-02-15 00:00:00', 5),
(7, 'Tura Lami Jara', 'Dabala', '2025-02-19 00:00:00', 1),
(8, 'Tura Lami Jara', 'Dabala', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `owners_id` int(10) NOT NULL,
  `prev` varchar(20) NOT NULL,
  `pres` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `owners_id`, `prev`, `pres`, `price`, `date`) VALUES
(1, 1, '56', '78', '10', '16/02/04 03:28:20'),
(2, 1, '78', '67', '10', '16/02/04 03:42:03'),
(3, 1, '67', '67', '0', '16/02/04 03:52:51'),
(4, 1, '67', '80', '130', '16/02/04 03:53:44'),
(5, 1, '80', '100', '200', '16/02/04 03:54:19'),
(6, 1, '100', '500', '4000', '16/02/04 08:15:33'),
(7, 2, '122', '500', '3780', '18/09/11 14:23:49'),
(8, 3, '100', '01', '-990', '18/09/17 16:18:21'),
(9, 1, '500', '600', '1000', '20/10/28 22:40:03'),
(10, 18, '748', '750', '20', '22/08/17 09:05:18'),
(11, 19, '160', '162', '40', '22/08/17 09:59:55'),
(12, 18, '750', '756', '150', '22/08/17 10:18:00'),
(13, 1, '78', '90', '240', '22/08/17 10:19:47'),
(14, 1, '56', '76', '200', '22/08/22 21:25:44'),
(15, 4, '166', '168', '40', '22/08/22 21:26:40'),
(16, 1, '1000', '500', '-5000', '25/02/09 10:08:24'),
(17, 1, '1000', '20', '-9800', '25/02/09 10:10:31'),
(18, 1, '100', '5', '-950', '25/02/09 10:21:18'),
(19, 1, '100', '20', '-1600', '25/02/09 10:57:10'),
(20, 1, '100', '20', '-800', '25/02/09 11:49:39'),
(21, 1, '100', '120', '20', '25/02/09 11:58:06'),
(22, 1, '100', '150', '1000', '25/02/09 12:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `topic` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Pending','Completed') NOT NULL,
  `requested_by` varchar(60) NOT NULL,
  `assigned_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `topic`, `description`, `status`, `requested_by`, `assigned_date`) VALUES
(1, 'meter maintenance', 'uhihil8789yty', 'Pending', 'Dabala', '2022-08-18'),
(2, 'meter equipment change', 'testing....', 'Pending', 'Tura', '2022-08-18'),
(3, 'meter equipment change and repair services', 'xhdhiyg uhuhiyuj  hjhjkhjklyugu', 'Pending', 'Abdela', '2022-08-18'),
(4, 'meter equipment change request', 'hghjkjk', 'Pending', 'Tura', '0000-00-00'),
(5, 'Meter change', 'As I explained I need exchange for my meter', 'Completed', 'Gemechu', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(10) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mi` varchar(2) NOT NULL,
  `address` varchar(60) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `lname`, `fname`, `mi`, `address`, `contact`) VALUES
(1, 'Tadesse', 'Bashanana', '78', 'Bule Hora', '0972257845'),
(2, 'Wako', 'Nagasa', '45', 'Bule Hora', '0972259874');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_code` varchar(50) NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `amount`, `payment_method`, `payment_code`, `transaction_id`, `status`, `date`) VALUES
(13, NULL, 2880.00, NULL, '468738', NULL, 'Pending', '2025-02-16 11:46:14'),
(14, '13', 2880.00, NULL, '275254', NULL, 'Pending', '2025-02-16 11:50:49'),
(15, '13', 2880.00, NULL, '198521', NULL, 'Pending', '2025-02-16 11:51:15'),
(16, '13', 2880.00, NULL, '647523', NULL, 'Pending', '2025-02-16 11:51:29'),
(17, '13', 2880.00, NULL, '179863', NULL, 'Pending', '2025-02-16 11:51:52'),
(18, '13', 2880.00, NULL, '317618', NULL, 'Completed', '2025-02-16 11:51:59'),
(19, '13', 2880.00, NULL, '516967', NULL, 'Pending', '2025-02-16 11:56:11'),
(20, '13', 2880.00, NULL, '921394', NULL, 'Pending', '2025-02-16 11:57:36'),
(21, '13', 2880.00, NULL, '461889', NULL, 'Pending', '2025-02-16 12:01:31'),
(22, '13', 2880.00, NULL, '265956', NULL, 'Completed', '2025-02-16 12:03:02'),
(23, '13', 2880.00, NULL, '305738', NULL, 'Pending', '2025-02-16 12:06:18'),
(24, '13', 2880.00, NULL, '748509', NULL, 'Pending', '2025-02-16 12:07:40'),
(25, '13', 2880.00, NULL, '957566', NULL, 'Pending', '2025-02-16 12:08:36'),
(26, '13', 2880.00, NULL, '731216', NULL, 'Pending', '2025-02-16 12:11:10'),
(27, '13', 2880.00, NULL, '606105', NULL, 'Pending', '2025-02-16 12:13:50'),
(28, '13', 2880.00, NULL, '406976', NULL, 'Pending', '2025-02-16 12:14:28'),
(29, '13', 2880.00, NULL, '304768', NULL, 'Pending', '2025-02-16 12:15:03'),
(30, '13', 2880.00, NULL, '530870', NULL, 'Completed', '2025-02-16 12:15:24'),
(31, '13', 2880.00, NULL, '376146', NULL, 'Pending', '2025-02-16 12:18:24'),
(32, '13', 2880.00, NULL, '789211', NULL, 'Pending', '2025-02-16 12:19:24'),
(33, '13', 2880.00, NULL, '527254', NULL, 'Pending', '2025-02-16 12:20:13'),
(34, '13', 2880.00, NULL, '212942', NULL, 'Pending', '2025-02-16 12:20:47'),
(35, '13', 2880.00, NULL, '104577', NULL, 'Pending', '2025-02-16 12:23:10'),
(36, '13', 2880.00, NULL, '125488', NULL, 'Pending', '2025-02-16 12:23:34'),
(37, '13', 2880.00, NULL, '991240', NULL, 'Completed', '2025-02-16 12:24:24'),
(38, '13', 2880.00, NULL, '508622', NULL, 'Completed', '2025-02-16 12:26:15'),
(39, '13', 2880.00, NULL, '893812', NULL, 'Completed', '2025-02-16 12:28:35'),
(40, '13', 2880.00, NULL, '942217', NULL, 'Completed', '2025-02-16 12:30:41'),
(41, '13', 2880.00, NULL, '116621', NULL, 'Pending', '2025-02-16 12:41:17'),
(42, '13', 2880.00, NULL, '865952', NULL, 'Pending', '2025-02-16 12:42:25'),
(43, '13', 2880.00, NULL, '855494', NULL, 'Pending', '2025-02-16 12:43:56'),
(44, '13', 2880.00, NULL, '810435', NULL, 'Pending', '2025-02-16 12:46:10'),
(45, '13', 2880.00, NULL, '299531', NULL, 'Pending', '2025-02-16 12:47:48'),
(46, '13', 2880.00, NULL, '459285', NULL, 'Pending', '2025-02-16 12:48:17'),
(47, '13', 2880.00, NULL, '317458', NULL, 'Pending', '2025-02-16 12:49:31'),
(48, '13', 2880.00, NULL, '959427', NULL, 'Pending', '2025-02-16 12:49:40'),
(49, '13', 2880.00, NULL, '406885', NULL, 'Completed', '2025-02-16 12:52:12'),
(50, '13', 2880.00, NULL, '662056', NULL, 'Pending', '2025-02-16 12:52:36'),
(51, '13', 2880.00, NULL, '213882', NULL, 'Completed', '2025-02-16 12:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `assigned_for` varchar(50) NOT NULL DEFAULT 'Not Assigned',
  `assigned_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`id`, `firstname`, `middlename`, `lastname`, `email`, `phone`, `assigned_for`, `assigned_date`) VALUES
(1, 'Lamesa', 'Diriba', 'Bula', 'lamesa@gmail.com', '09178456521', 'Dabala', '2022-08-15'),
(2, 'Tura', 'Lami', 'Jara', 'tura@gmail.com', '0978451252', 'Not Assigned', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tempo_bill`
--

CREATE TABLE `tempo_bill` (
  `id` int(11) NOT NULL,
  `Prev` varchar(40) NOT NULL,
  `Client` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tempo_bill`
--

INSERT INTO `tempo_bill` (`id`, `Prev`, `Client`) VALUES
(1, '150', 'kimei'),
(2, '500', 'Harry'),
(3, '01', 'demo'),
(4, '168', 'Paul'),
(5, '230', 'Clark'),
(6, '300', 'Ava'),
(7, '106', 'Isabella'),
(8, '200', 'Emma'),
(9, '100', 'Liam'),
(10, '366', 'Logan'),
(11, '250', 'James'),
(12, '500', 'Jason'),
(13, '120', 'Tom'),
(14, '99', 'John'),
(15, '320', 'Henry'),
(16, '323', 'Samuel'),
(17, '11', 'sa'),
(18, '756', 'Tura'),
(19, '162', 'Gemechu'),
(20, '100', 'Bashanana'),
(21, '100', 'Nagasa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `user_role` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `user_role`) VALUES
(4, 'admin', 'admin', 'Nagasa Wako', 'Admin'),
(8, 'demo', 'demo', 'demo user', 'Bill Officer'),
(18, 'awate', '123456', 'Adola Wate', 'Technician'),
(12, 'tura', '12345678', 'Tura', 'Technician'),
(13, 'gemechu', '123456', 'Gemechu', 'Customer'),
(15, 'bashanana', '123456', 'Bashanana', 'Customer'),
(16, 'hirbo', '1234567', 'Hirbo Birke', 'Customer'),
(17, 'nagasaw', '123456', 'Nagasa', 'Customer'),
(19, 'wako', '123456', 'Wako getachew', 'Technician');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userlevel` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `username`, `password`, `userlevel`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'user2', 'user2', '2'),
(3, 'user3', 'user3', '3'),
(4, 'user4', 'user4', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_number`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tempo_bill`
--
ALTER TABLE `tempo_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
