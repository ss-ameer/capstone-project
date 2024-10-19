-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 09:04 AM
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
-- Database: `capstone_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `client_id`, `city`, `barangay`, `street`, `house_number`) VALUES
(25, 25, 'Cabanatuan', 'Bakero', 'Purok 1', '125'),
(26, 26, 'Cabanatuan', 'Camp Tinio', 'Coke Float', '150'),
(27, 27, 'Talavera', 'Mabuhay', 'Uno', '003'),
(28, 28, 'Cabanatuan', 'Daan Sarile', 'Missing', '420'),
(29, 29, 'Cabanatuan', 'Valle Cruz', 'Okre', 'Block 10 Lot 17');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `name`) VALUES
(25, 'Jimel Basco'),
(26, 'Emerlyn Joy Lucas'),
(27, 'Vincent Santos'),
(28, 'Jemuel Carlos Solidum'),
(29, 'Apple Grace G. Oliveros');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `contact_type` enum('phone','email') NOT NULL,
  `contact_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `client_id`, `contact_type`, `contact_value`) VALUES
(22, 25, 'phone', '09359960500'),
(23, 25, 'email', 'basco.jimel@gmail.com'),
(24, 26, 'phone', '09999999999'),
(25, 26, 'email', 'ej.lucas@yahoo.com'),
(26, 27, 'phone', '09899291923'),
(27, 27, 'email', 'vincent.santos@gmail.com'),
(28, 28, 'phone', '09552314569'),
(29, 28, 'email', 'solidum.jc@gmail.com'),
(30, 29, 'phone', '09201080060'),
(31, 29, 'email', 'apple@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `truck_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `dispatch_officer_id` int(11) NOT NULL,
  `dispatch_date` date NOT NULL,
  `dispatch_time` time NOT NULL,
  `status` enum('in-queue','in-transit','successful','failed') DEFAULT 'in-queue',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`id`, `order_item_id`, `truck_id`, `driver_id`, `dispatch_officer_id`, `dispatch_date`, `dispatch_time`, `status`, `created_at`, `updated_at`) VALUES
(59, 63, 9, 3, 44, '0000-00-00', '00:00:00', 'successful', '2024-10-13 14:21:18', '2024-10-15 06:57:27'),
(60, 66, 8, 3, 44, '0000-00-00', '00:00:00', 'in-queue', '2024-10-14 03:15:02', '2024-10-18 07:47:38'),
(62, 68, 9, 3, 44, '0000-00-00', '00:00:00', 'in-queue', '2024-10-16 04:52:42', '2024-10-16 13:32:30'),
(63, 69, 9, 2, 44, '0000-00-00', '00:00:00', 'successful', '2024-10-18 03:40:38', '2024-10-19 06:01:10'),
(64, 59, 9, 3, 44, '0000-00-00', '00:00:00', 'in-queue', '2024-10-19 06:49:01', '2024-10-19 06:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_officers`
--

CREATE TABLE `dispatch_officers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'officer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispatch_officers`
--

INSERT INTO `dispatch_officers` (`id`, `name`, `password`, `created_at`, `updated_at`, `role`) VALUES
(44, 'Syed Ameer Sibuma', '$2y$10$WIjBYL7g8VBPT6fMFZfm8.k40FxqisMQ3hC.fKTe.6aqwuZ4cpB2q', '2024-07-22 08:44:25', '2024-07-22 08:44:25', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `license_number` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `status` enum('available','on_trip','unavailable') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `license_number`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ferdinand Serame', 'N01-12-345678', '0917-123-4567', 'available', '2024-10-09 08:16:07', '2024-10-19 06:01:11'),
(3, 'Juan Dela Cruz', 'N01-18-123456', '0917-456-7890', 'available', '2024-10-09 08:23:36', '2024-10-16 13:32:27'),
(4, 'Eric Hans', 'BI-2616', '0917-356-8890', 'available', '2024-10-14 03:27:31', '2024-10-16 04:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `density` decimal(10,1) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `description`, `category`, `density`, `price`) VALUES
(69, 'Garden Soil Standard', 'Basic, all-purpose garden soil composed of natural loam, sand, and organic matter.', 'Soil', 1.2, 250.00),
(71, 'S-1', 'Finely crushed rock used as structural bedding, pavement seal coat, fairways sand cap and a very vital ingredient in all concrete and asphalt mixes.', 'Sand', 1.5, 700.00),
(72, 'G-1', 'Coarsely crushed rock used in concrete pavements, massive foundations, granular bedding/filler, and for asphalt concrete mix with coarser design specifications.', 'Gravel', 1.5, 1100.00),
(73, 'G-2', 'This is type 2 gravel.', 'Gravel', 1.5, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `entity_type` varchar(50) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_description` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `entity_type`, `entity_id`, `event_type`, `event_description`, `user_id`, `timestamp`) VALUES
(1, 'test', 1, 'testing', 'This is just a test log.', NULL, '2024-10-19 01:04:07'),
(2, 'dispatch', 59, 'create', 'Dispatch record created for Order: 59', 44, '2024-10-19 06:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `client_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','complete','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `client_id`, `address_id`, `total_qty`, `total_amount`, `status`) VALUES
(54, '2024-10-12 03:53:32', 25, 25, 2, 2200.00, 'pending'),
(55, '2024-10-12 04:00:22', 26, 26, 4, 3350.00, 'pending'),
(56, '2024-10-14 03:14:29', 27, 27, 3, 5916.67, 'pending'),
(57, '2024-10-15 07:52:28', 28, 28, 2, 625.00, 'pending'),
(58, '2024-10-16 04:49:52', 29, 29, 2, 14666.67, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `item_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `truck_type_id` int(11) NOT NULL,
  `status` enum('pending','in-queue','in-progress','failed','completed','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `price`, `item_total`, `truck_type_id`, `status`) VALUES
(59, 54, 72, 1100.00, 1650.00, 10, 'in-queue'),
(60, 54, 72, 1100.00, 1650.00, 10, 'pending'),
(61, 55, 69, 250.00, 750.00, 11, 'pending'),
(62, 55, 69, 250.00, 750.00, 11, 'pending'),
(63, 55, 71, 700.00, 1050.00, 10, 'completed'),
(64, 55, 71, 700.00, 2100.00, 11, 'pending'),
(65, 56, 71, 700.00, 7000.00, 9, 'pending'),
(66, 56, 69, 250.00, 750.00, 11, 'in-queue'),
(67, 56, 69, 250.00, 750.00, 11, 'pending'),
(68, 57, 69, 250.00, 375.00, 10, 'in-queue'),
(69, 57, 69, 250.00, 375.00, 10, 'completed'),
(70, 58, 72, 1100.00, 11000.00, 9, 'pending'),
(71, 58, 72, 1100.00, 11000.00, 9, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` int(11) NOT NULL,
  `truck_number` varchar(50) NOT NULL,
  `truck_type_id` int(11) DEFAULT NULL,
  `status` enum('available','in_use','maintenance','out_of_service') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `truck_number`, `truck_type_id`, `status`, `created_at`, `updated_at`) VALUES
(8, 'ABC-4567', 11, 'available', '2024-10-12 03:38:09', '2024-10-16 04:54:28'),
(9, 'NBC-1234', 10, 'available', '2024-10-12 03:39:11', '2024-10-19 06:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `truck_types`
--

CREATE TABLE `truck_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `capacity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `truck_types`
--

INSERT INTO `truck_types` (`id`, `type_name`, `capacity`) VALUES
(9, 'GIGA-HD-10T', 10.00),
(10, 'ELF-LT-1.5T', 1.50),
(11, 'FORWARD-MD-3T', 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `truck_number` varchar(50) NOT NULL,
  `model` varchar(100) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT 0,
  `available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `truck_id` (`truck_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `dispatch_officer_id` (`dispatch_officer_id`);

--
-- Indexes for table `dispatch_officers`
--
ALTER TABLE `dispatch_officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `fk_item_id` (`item_id`),
  ADD KEY `order_items_fk_truck_type` (`truck_type_id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_truck_type` (`truck_type_id`);

--
-- Indexes for table `truck_types`
--
ALTER TABLE `truck_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `truck_number` (`truck_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `dispatch_officers`
--
ALTER TABLE `dispatch_officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `truck_types`
--
ALTER TABLE `truck_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE;

--
-- Constraints for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD CONSTRAINT `dispatch_ibfk_1` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`),
  ADD CONSTRAINT `dispatch_ibfk_2` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`),
  ADD CONSTRAINT `dispatch_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `dispatch_ibfk_4` FOREIGN KEY (`dispatch_officer_id`) REFERENCES `dispatch_officers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_fk_truck_type` FOREIGN KEY (`truck_type_id`) REFERENCES `truck_types` (`id`),
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trucks`
--
ALTER TABLE `trucks`
  ADD CONSTRAINT `fk_truck_type` FOREIGN KEY (`truck_type_id`) REFERENCES `truck_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
