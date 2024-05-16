-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 04:59 AM
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
-- Database: `asthaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ad_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `ad_password`) VALUES
(1, 'asthaa1@gmail.com', 'asthaadmin1');

-- --------------------------------------------------------

--
-- Table structure for table `car_insurance_quotes`
--

CREATE TABLE `car_insurance_quotes` (
  `customer_id` int(11) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `cc_or_ton_or_seat` varchar(50) NOT NULL,
  `sum_insured` decimal(10,2) NOT NULL,
  `exclude_riot_strike` tinyint(1) NOT NULL DEFAULT 0,
  `exclude_earthquake` tinyint(1) NOT NULL DEFAULT 0,
  `exclude_flood_cyclone` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `vehicle_reg_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `reg_no` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`reg_no`, `company_name`, `address`, `email`, `phone_no`) VALUES
(1, 'Green Delta Insurance', 'Dhaka,Bangladesh', 'greendelta@gmail.com', '+4454321215'),
(2, 'Islami Insurance', 'Dhaka,Bangladesh', 'islami1@gmail.com', '+445878455'),
(3, 'Delta Insurance', 'Dhaka,Bangladesh', 'delta123@gmail.com', '+4584978745');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `Nid` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `customer_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `Nid`, `first_name`, `last_name`, `date_of_birth`, `address`, `email`, `phone_no`, `customer_password`) VALUES
(1, 1255694, 'khan', 'Israk Ahmed', '2001-09-01', NULL, 'israk.ahmed38@gmail.com', '01516183490', ' 892997695af41ae936df36df3df2468e '),
(2, 2147483647, 'Borshon', 'Dopho', '2002-07-09', NULL, 'dopho7979@gmail.com', '01766659547', '$2y$10$htgaNws8mk.bNZWbO2CoOOQl4/pqXbCA4THR59nwenzj4UN2u.1Lm'),
(3, 2147483647, 'Billal', 'kibria', '2021-08-09', NULL, 'billal09@gmail.com', '01736279334', '$2y$10$HZDQmDBaD4IYLr614mlWLegsyJGGI1MB58Du7EGQOn.0AhhkdDoOu'),
(4, 2147483647, 'Bodo', 'Kodo', '2214-01-02', NULL, 'astha123@gmail.com', '017357751248', '$2y$10$aF5PdQQNfNvBGuDf1BBVV.0InayflVgDiHWIreXsL2T84YTQRmJbO'),
(5, 1154644612, 'Hey', 'Day', '2024-05-14', NULL, 'hey123@gmail.com', '01983689545', '$2y$10$26ezjfp85bxodEE3eD4eNOWhHFQkJZfqQfB.g2v/6A5GVPt1k6kVS');

-- --------------------------------------------------------

--
-- Table structure for table `home_insurance_quotes`
--

CREATE TABLE `home_insurance_quotes` (
  `holding_number` varchar(255) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `property_type` varchar(255) NOT NULL,
  `house_name` varchar(255) DEFAULT NULL,
  `property_value` int(11) NOT NULL,
  `sum_insured` int(11) NOT NULL,
  `exclude_fire` tinyint(1) NOT NULL DEFAULT 0,
  `exclude_theft` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_insurance_quotes`
--

INSERT INTO `home_insurance_quotes` (`holding_number`, `customer_id`, `property_type`, `house_name`, `property_value`, `sum_insured`, `exclude_fire`, `exclude_theft`, `created_at`) VALUES
('1244', NULL, 'house', 'Ahsan Monjiil', 15000000, 50000, 1, 0, '2024-04-24 06:43:05'),
('1251', NULL, 'apartment', 'CCanp new', 15000000, 30000, 0, 1, '2024-04-24 06:49:38'),
('B/7', NULL, 'house', 'mOTEL', 2000000, 80000, 1, 1, '2024-05-07 05:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_id` int(11) NOT NULL,
  `policy_name` varchar(255) NOT NULL,
  `policy_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policy_id`, `policy_name`, `policy_price`) VALUES
(1, 'Car Policy', 20000),
(2, 'Home Policy', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `purchase_time` date NOT NULL,
  `purchase_value` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `sell_id` int(11) NOT NULL,
  `num_of_sells` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `car_insurance_quotes`
--
ALTER TABLE `car_insurance_quotes`
  ADD PRIMARY KEY (`customer_id`,`vehicle_model`,`created_at`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`,`Nid`);

--
-- Indexes for table `home_insurance_quotes`
--
ALTER TABLE `home_insurance_quotes`
  ADD PRIMARY KEY (`holding_number`,`created_at`),
  ADD KEY `fk_cust` (`customer_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD KEY `fk_policy_id` (`policy_id`),
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`sell_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_insurance_quotes`
--
ALTER TABLE `car_insurance_quotes`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `home_insurance_quotes`
--
ALTER TABLE `home_insurance_quotes`
  ADD CONSTRAINT `fk_cust` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `fk_policy_id` FOREIGN KEY (`policy_id`) REFERENCES `policy` (`policy_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
