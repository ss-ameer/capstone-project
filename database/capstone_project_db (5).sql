-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 10:09 AM
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
(19, 19, 'Llanera', 'Victoria', 'Castilio', '313'),
(20, 20, 'Llanera', 'Plaridel', 'Sibuma', '420'),
(21, 21, '', '', '', ''),
(22, 22, 'Quezon City', 'Batasan Hills', 'Legislative', '055'),
(23, 23, 'Kinshasa', 'Gombe', 'Senegalais', '7224'),
(24, 24, 'Cabanatuan', 'Kapitan Pepe', 'Burgos', '025');

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
(19, 'Carissa Gonzales'),
(20, 'Syed Ameer Sibuma'),
(21, ''),
(22, 'Revh Salas'),
(23, 'Dikembe Mutombo Mpolondo Mukamba Jean-Jacques'),
(24, 'Princess Navarro');

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
(10, 19, 'phone', '09656304264'),
(11, 19, 'email', 'carissa.gonzales@gmail.com'),
(12, 20, 'phone', '09656304264'),
(13, 20, 'email', 'sibuma.syedameer@gmail.com'),
(14, 21, 'phone', ''),
(15, 21, 'email', ''),
(16, 22, 'phone', '09055577095'),
(17, 22, 'email', 'revh.salas@gmail.con'),
(18, 23, 'phone', '999929787'),
(19, 23, 'email', 'mutombo.dikembe@nba.com'),
(20, 24, 'phone', '09268446304'),
(21, 24, 'email', '');

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
(41, 56, 1, 1, 44, '0000-00-00', '00:00:00', 'in-queue', '2024-10-03 11:06:59', '2024-10-05 12:30:48'),
(42, 57, 1, 1, 44, '0000-00-00', '00:00:00', 'in-transit', '2024-10-03 11:07:33', '2024-10-05 12:30:57'),
(43, 58, 2, 1, 44, '0000-00-00', '00:00:00', 'in-queue', '2024-10-06 13:04:37', '2024-10-06 13:04:37');

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
(1, 'Syed Ameer Sibuma', 'D06-11-009385', '09656304264', 'on_trip', '2024-09-10 06:49:42', '2024-10-05 12:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `unit_of_measure` varchar(50) DEFAULT NULL,
  `quantity_in_stock` int(11) DEFAULT 0,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `description`, `category`, `unit_of_measure`, `quantity_in_stock`, `price`) VALUES
(37, 'Testing again', 'testing for another time', 'test', 'test', 0, 100.00),
(40, 'wut', '10101', 'Choose', 'Choose', 0, 100.00),
(41, 'Jasmin', 'ano ba', 'test', 'test', 0, 1000.00),
(56, 'Shoe', '', 'Choose', 'Choose', 0, 7000.00);

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
(52, '2024-10-02 09:29:31', 24, 24, 2, 6000.00, 'pending'),
(53, '2024-10-03 10:47:11', 20, 20, 1, 84000.00, 'pending');

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
(56, 52, 41, 1000.00, 3000.00, 1, 'in-queue'),
(57, 52, 41, 1000.00, 3000.00, 1, 'in-progress'),
(58, 53, 56, 7000.00, 84000.00, 4, 'in-queue');

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
(1, '123-456', 1, 'in_use', '2024-09-09 15:44:47', '2024-10-05 12:30:57'),
(2, 'AGA-1023', 4, 'in_use', '2024-09-23 12:18:06', '2024-10-02 08:44:08');

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
(1, 'Elf', 3.00),
(2, 'Howler', 20.00),
(4, 'Elf 4x4', 12.00);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `dispatch_officers`
--
ALTER TABLE `dispatch_officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `truck_types`
--
ALTER TABLE `truck_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
