-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 04:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_data`
--

CREATE TABLE `booking_data` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `datepickup_car` date NOT NULL,
  `num_date` int(4) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_data`
--

INSERT INTO `booking_data` (`id_booking`, `id_user`, `id_car`, `datepickup_car`, `num_date`, `status`) VALUES
(4, 1, 3, '2022-10-31', 6, 'Expired'),
(8, 1, 10, '2022-11-03', 10, 'Expired'),
(9, 1, 10, '2022-11-04', 10, 'Expired'),
(10, 1, 11, '2022-11-02', 10, 'Expired'),
(11, 1, 2, '2022-11-11', 10, 'Expired'),
(12, 2, 10, '2022-11-05', 12, 'Expired');

-- --------------------------------------------------------

--
-- Table structure for table `car_rental`
--

CREATE TABLE `car_rental` (
  `id_car` int(11) NOT NULL,
  `name_model` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `car_gear` varchar(10) NOT NULL,
  `count_unit` varchar(10) NOT NULL,
  `year_of_production` int(5) NOT NULL,
  `number_of_passengers` int(3) NOT NULL,
  `price_per_day` int(8) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_rental`
--

INSERT INTO `car_rental` (`id_car`, `name_model`, `brand`, `car_gear`, `count_unit`, `year_of_production`, `number_of_passengers`, `price_per_day`, `status`) VALUES
(2, 'CR-V DT-EL 4WD', 'Honda', 'auto', 'กพ2567', 2020, 5, 700, 'rent'),
(3, 'VS Hybrid', 'MG', 'auto', 'บบ1652', 2022, 4, 650, 'rent'),
(10, 'Corolla AE86', 'Toyota', 'manual', 'ชล1168', 1983, 2, 500, 'rent'),
(11, 'Yaris ATIV Sport', 'Toyota', 'auto', 'กม1662', 2022, 5, 600, 'rent'),
(9997, 'dummy', 'xxxx', 'xxx', 'xxxx', 1000, 0, 1000, 'active'),
(9998, 'xxxx', 'xxxx', 'xxx', 'sw1235', 1000, 20, 1000, 'repair'),
(9999, 'xxxxxx', 'xxx', 'xxxx', 'xxxx', 1000, 0, 0, 'not for rent'),
(10000, 'E36', 'BMW', 'mannal', 'FG1462', 1990, 4, 600, 'rent'),
(10001, 'ada da65', 'BMW', 'mannal', 'FG1777', 1990, 4, 620, 'rent');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `name_of_user` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_identification_card` varchar(13) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `name_of_user`, `user_name`, `user_password`, `user_email`, `user_address`, `user_identification_card`, `status`) VALUES
(1, 'jax xxxx', 'Jax', '81dc9bdb52d04dc20036dbd8313ed055', 'jax11@gmail.com', '39/4', '1234567890123', 'Customer'),
(2, 'Aphiwat Donyuenyong', 'Aphiwat47', '81dc9bdb52d04dc20036dbd8313ed055', 'dadawda@gmail.com', 'BUU', '1111111111', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `data_pick_up_the_car`
--

CREATE TABLE `data_pick_up_the_car` (
  `id_pick_up_car` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `time_pick_up_car` time NOT NULL,
  `date_pick_up_car` date NOT NULL,
  `car_kilometer` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pick_up_the_car`
--

INSERT INTO `data_pick_up_the_car` (`id_pick_up_car`, `id_booking`, `time_pick_up_car`, `date_pick_up_car`, `car_kilometer`) VALUES
(1, 4, '00:18:00', '2022-11-02', 1235),
(4, 8, '14:39:00', '2022-11-03', 1234),
(5, 9, '17:11:00', '2022-11-06', 1345),
(6, 10, '19:21:00', '2022-11-04', 34348343),
(7, 11, '21:53:00', '2022-11-12', 5555),
(8, 12, '20:51:00', '2022-11-03', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `data_return_the_car`
--

CREATE TABLE `data_return_the_car` (
  `id_return_car` int(12) NOT NULL,
  `id_car` int(11) NOT NULL,
  `date_return_car` date NOT NULL,
  `time_return_car` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_return_the_car`
--

INSERT INTO `data_return_the_car` (`id_return_car`, `id_car`, `date_return_car`, `time_return_car`) VALUES
(1, 3, '2022-11-02', '13:55:00'),
(2, 10, '2022-11-04', '14:40:00'),
(3, 10, '2022-11-12', '17:14:00'),
(4, 11, '2022-11-18', '19:21:00'),
(5, 2, '2022-11-18', '20:51:00'),
(6, 10, '2022-11-23', '20:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `manager department`
--

CREATE TABLE `manager department` (
  `id_manager` int(11) NOT NULL,
  `user_manager` varchar(50) NOT NULL,
  `password_manager` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager department`
--

INSERT INTO `manager department` (`id_manager`, `user_manager`, `password_manager`, `status`) VALUES
(1, 'Anna', '81dc9bdb52d04dc20036dbd8313ed055', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `sales department`
--

CREATE TABLE `sales department` (
  `id_sales` int(11) NOT NULL,
  `user_sales` varchar(50) NOT NULL,
  `password_sales` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales department`
--

INSERT INTO `sales department` (`id_sales`, `user_sales`, `password_sales`, `status`) VALUES
(1, 'John', '81dc9bdb52d04dc20036dbd8313ed055', 'Sales');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_car` (`id_car`);

--
-- Indexes for table `car_rental`
--
ALTER TABLE `car_rental`
  ADD PRIMARY KEY (`id_car`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_ identification_card` (`user_identification_card`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `data_pick_up_the_car`
--
ALTER TABLE `data_pick_up_the_car`
  ADD PRIMARY KEY (`id_pick_up_car`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Indexes for table `data_return_the_car`
--
ALTER TABLE `data_return_the_car`
  ADD PRIMARY KEY (`id_return_car`),
  ADD KEY `id_car` (`id_car`);

--
-- Indexes for table `manager department`
--
ALTER TABLE `manager department`
  ADD PRIMARY KEY (`id_manager`),
  ADD UNIQUE KEY `user_manager` (`user_manager`);

--
-- Indexes for table `sales department`
--
ALTER TABLE `sales department`
  ADD PRIMARY KEY (`id_sales`),
  ADD UNIQUE KEY `user_sales` (`user_sales`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_data`
--
ALTER TABLE `booking_data`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_rental`
--
ALTER TABLE `car_rental`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_pick_up_the_car`
--
ALTER TABLE `data_pick_up_the_car`
  MODIFY `id_pick_up_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_return_the_car`
--
ALTER TABLE `data_return_the_car`
  MODIFY `id_return_car` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manager department`
--
ALTER TABLE `manager department`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales department`
--
ALTER TABLE `sales department`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD CONSTRAINT `booking_data_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `customer` (`user_id`),
  ADD CONSTRAINT `booking_data_ibfk_2` FOREIGN KEY (`id_car`) REFERENCES `car_rental` (`id_car`);

--
-- Constraints for table `data_pick_up_the_car`
--
ALTER TABLE `data_pick_up_the_car`
  ADD CONSTRAINT `data_pick_up_the_car_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking_data` (`id_booking`);

--
-- Constraints for table `data_return_the_car`
--
ALTER TABLE `data_return_the_car`
  ADD CONSTRAINT `data_return_the_car_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `car_rental` (`id_car`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
