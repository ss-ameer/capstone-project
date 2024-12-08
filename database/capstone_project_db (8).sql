-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 05:15 PM
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
  `client_id` int(11) DEFAULT NULL,
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
(29, 29, 'Cabanatuan', 'Valle Cruz', 'Okre', 'Block 10 Lot 17'),
(30, 30, 'Llanera', 'Victoria', 'Castillio', '313'),
(31, 31, 'Llanera', 'Plaridel', 'Villoria', '101'),
(34, 34, 'Cabanatuan', 'Bakero', 'Purok 1', '125'),
(35, 35, '', '', '', '');

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
(29, 'Apple Grace G. Oliveros'),
(30, 'Carissa Gonzales'),
(31, 'Alexander Antig'),
(33, 'John Doe'),
(34, 'Juan Delacruz'),
(35, '');

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
(31, 29, 'email', 'apple@gmail.com'),
(32, 30, 'phone', '09656304264'),
(33, 30, 'email', 'carissa.gonzales@gmail.com'),
(34, 31, 'phone', '099999999999'),
(35, 31, 'email', 'alexander@gmail.com'),
(38, 33, 'phone', '09123456789'),
(39, 33, 'email', 'jd.@gmail.com'),
(40, 34, 'phone', '09359960500'),
(41, 34, 'email', 'basco.jimel@gmail.com'),
(42, 35, 'phone', ''),
(43, 35, 'email', '');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `truck_id` int(11) DEFAULT NULL,
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
(69, 60, 14, 2, 44, '0000-00-00', '00:00:00', 'failed', '2024-11-12 03:08:01', '2024-11-12 03:09:43'),
(70, 114, 14, 4, 44, '0000-00-00', '00:00:00', 'failed', '2024-11-12 03:09:02', '2024-11-12 11:31:13'),
(73, 121, 15, 4, 44, '0000-00-00', '00:00:00', 'in-queue', '2024-11-12 03:49:32', '2024-12-07 04:47:40'),
(75, 118, 14, 3, 44, '0000-00-00', '00:00:00', 'in-queue', '2024-12-07 10:23:55', '2024-12-07 10:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_officers`
--

CREATE TABLE `dispatch_officers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'officer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispatch_officers`
--

INSERT INTO `dispatch_officers` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`, `role`) VALUES
(44, 'Syed Ameer Sibuma', 'ameer', '$2y$10$WIjBYL7g8VBPT6fMFZfm8.k40FxqisMQ3hC.fKTe.6aqwuZ4cpB2q', '2024-07-22 08:44:25', '2024-12-08 13:23:51', 'master'),
(52, 'Johny Ray', 'user52', '$2y$10$TKIu2jd0LeeARtNv9TXeD.dQN1hK4TUV15DFVnSNH5WRHA5kAUWfS', '2024-10-31 05:24:06', '2024-12-07 16:58:45', 'officer'),
(53, 'John Doe', 'user53', '$2y$10$WMwnB8Dv.wrQ2h.QTcJiGOu7wPjjUBgjBGCkgMu8yiO1FpEhfz2KW', '2024-11-14 14:53:05', '2024-12-07 16:58:45', 'officer'),
(54, 'Burnok', '@burnoks', '$2y$10$sdrU1PL24RfFqmefw5xjU.q2REKEalaeZ/cTMZMOHkJL3Wz7ffmJa', '2024-12-08 09:32:47', '2024-12-08 09:32:47', 'officer');

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
(2, 'Ferdinand Serame', 'N01-12-345678', '0917-123-4567', 'available', '2024-10-09 08:16:07', '2024-11-12 03:09:43'),
(3, 'Juan Dela Cruz', 'N01-18-123456', '0917-456-7890', 'available', '2024-10-09 08:23:36', '2024-10-20 02:49:14'),
(4, 'Eric Hans', 'BI-2616', '0917-356-8890', 'available', '2024-10-14 03:27:31', '2024-12-07 04:47:31');

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
(74, 'Apple-Size', 'Crushed stones around 120mm in size, commonly used for gabions, riprap, and slope protection. With a density of 2.8 t/m³, these durable boulders are ideal for construction projects requiring erosion control and strong, stable backfill.', 'Basalt', 2.8, 1800.00);

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
(9, 'dispatch', 62, 'update', 'Status updated to in-transit.', 44, '2024-10-20 02:46:04'),
(10, 'dispatch', 63, 'update', 'Status updated to in-queue.', 44, '2024-10-20 02:46:33'),
(11, 'dispatch', 63, 'update', 'Status updated to in-transit.', 44, '2024-10-20 02:46:48'),
(12, 'dispatch', 64, 'update', 'Status updated to successful.', 44, '2024-10-20 02:49:13'),
(13, 'dispatch', 64, 'update', 'Status updated to in-queue.', 44, '2024-10-20 02:49:18'),
(14, 'dispatch', 64, 'print', 'Dispatch slip printed.', 44, '2024-10-20 04:29:24'),
(15, 'dispatch', 64, 'print', 'Dispatch slip printed.', 44, '2024-10-20 06:48:22'),
(16, 'dispatch', 64, 'print', 'Dispatch slip printed.', 44, '2024-10-20 07:01:54'),
(17, 'dispatch', 60, 'create', 'Dispatch record created for Order 60.', 44, '2024-10-20 07:28:15'),
(18, 'dispatch', 65, 'print', 'Dispatch slip printed.', 44, '2024-10-20 07:29:00'),
(19, 'dispatch', 65, 'update', 'Status updated to in-transit.', 44, '2024-10-20 07:29:59'),
(20, 'client', 31, 'create', 'New client created: Alexander Antig', 44, '2024-10-20 16:44:50'),
(21, 'contact', 34, 'create', 'Phone contact created for new client: 099999999999', 44, '2024-10-20 16:44:50'),
(22, 'contact', 35, 'create', 'Email contact created for new client: alexander@gmail.com', 44, '2024-10-20 16:44:50'),
(23, 'address', 31, 'create', 'New address created for client.', 44, '2024-10-20 16:44:50'),
(24, 'order', 62, 'create', 'Order created for client.', 44, '2024-10-20 16:44:50'),
(25, 'order_item', 76, 'create', 'Order item inserted for order ID: 62', 44, '2024-10-20 16:44:50'),
(26, 'order_item', 77, 'create', 'Order item inserted for order ID: 62', 44, '2024-10-20 16:44:50'),
(27, 'order_item', 78, 'create', 'Order item inserted for order ID: 62', 44, '2024-10-20 16:44:50'),
(28, 'order_item', 79, 'create', 'Order item inserted for order ID: 62', 44, '2024-10-20 16:44:50'),
(29, 'client', 31, 'reuse', 'Client reused: Alexander Antig', 44, '2024-10-20 16:46:18'),
(30, 'address', 31, 'reuse', 'Address reused for client.', 44, '2024-10-20 16:46:18'),
(31, 'order', 63, 'create', 'Order created for client.', 44, '2024-10-20 16:46:18'),
(32, 'order_item', 80, 'create', 'Order item inserted for order ID: 63', 44, '2024-10-20 16:46:18'),
(33, 'item', 74, 'create', 'New item added: Apple-Size', 44, '2024-10-21 01:51:36'),
(34, 'truck', 10, 'create', 'Truck added: AGA-1023', 44, '2024-10-21 10:04:45'),
(35, 'truck_types', 12, 'create', 'New unit type added: GIGA-HD-20T', 44, '2024-10-21 10:23:34'),
(36, 'dispatch', 60, 'update', 'Status updated to remove.', 44, '2024-10-21 13:31:35'),
(37, 'dispatch', 64, 'update', 'Status updated to in-transit.', 44, '2024-10-23 10:14:22'),
(38, 'dispatch', 65, 'update', 'Status updated to failed.', 44, '2024-10-23 10:14:32'),
(39, 'dispatch', 63, 'update', 'Status updated to failed.', 44, '2024-10-23 10:14:35'),
(40, 'dispatch', 62, 'update', 'Status updated to failed.', 44, '2024-10-23 10:14:37'),
(41, 'dispatch', 64, 'update', 'Status updated to failed.', 44, '2024-10-23 10:14:39'),
(42, 'dispatch', 65, 'update', 'Status updated to remove.', 44, '2024-10-23 10:14:52'),
(43, 'dispatch', 64, 'update', 'Status updated to remove.', 44, '2024-10-23 10:14:55'),
(44, 'dispatch', 63, 'update', 'Status updated to remove.', 44, '2024-10-23 10:14:58'),
(45, 'dispatch', 62, 'update', 'Status updated to remove.', 44, '2024-10-23 10:15:01'),
(46, 'dispatch', 59, 'create', 'Dispatch record created for Order 59.', 44, '2024-10-23 10:15:36'),
(47, 'dispatch', 66, 'update', 'Status updated to in-transit.', 44, '2024-10-23 10:15:47'),
(48, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 11:56:39'),
(49, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 11:56:39'),
(50, 'order', 64, 'create', 'Order created for client.', 44, '2024-10-23 11:56:39'),
(51, 'order_item', 81, 'create', 'Order item inserted for order ID: 64', 44, '2024-10-23 11:56:39'),
(52, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:02:59'),
(53, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:02:59'),
(54, 'order', 65, 'create', 'Order created for client.', 44, '2024-10-23 12:02:59'),
(55, 'order_item', 82, 'create', 'Order item inserted for order ID: 65', 44, '2024-10-23 12:02:59'),
(56, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 12:13:21'),
(57, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:13:21'),
(58, 'order', 66, 'create', 'Order created for client.', 44, '2024-10-23 12:13:21'),
(59, 'order_item', 83, 'create', 'Order item inserted for order ID: 66', 44, '2024-10-23 12:13:21'),
(60, 'client', 28, 'reuse', 'Client reused: Jemuel Carlos Solidum', 44, '2024-10-23 12:15:34'),
(61, 'address', 28, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:15:34'),
(62, 'order', 67, 'create', 'Order created for client.', 44, '2024-10-23 12:15:34'),
(63, 'order_item', 84, 'create', 'Order item inserted for order ID: 67', 44, '2024-10-23 12:15:34'),
(64, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 12:16:05'),
(65, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:16:05'),
(66, 'order', 68, 'create', 'Order created for client.', 44, '2024-10-23 12:16:05'),
(67, 'order_item', 85, 'create', 'Order item inserted for order ID: 68', 44, '2024-10-23 12:16:06'),
(68, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 12:16:59'),
(69, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:16:59'),
(70, 'order', 69, 'create', 'Order created for client.', 44, '2024-10-23 12:16:59'),
(71, 'order_item', 86, 'create', 'Order item inserted for order ID: 69', 44, '2024-10-23 12:16:59'),
(72, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:17:57'),
(73, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:17:57'),
(74, 'order', 70, 'create', 'Order created for client.', 44, '2024-10-23 12:17:57'),
(75, 'order_item', 87, 'create', 'Order item inserted for order ID: 70', 44, '2024-10-23 12:17:57'),
(76, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 12:26:46'),
(77, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:26:46'),
(78, 'order', 71, 'create', 'Order created for client.', 44, '2024-10-23 12:26:46'),
(79, 'order_item', 88, 'create', 'Order item inserted for order ID: 71', 44, '2024-10-23 12:26:46'),
(80, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:30:45'),
(81, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:30:45'),
(82, 'order', 72, 'create', 'Order created for client.', 44, '2024-10-23 12:30:45'),
(83, 'order_item', 89, 'create', 'Order item inserted for order ID: 72', 44, '2024-10-23 12:30:45'),
(84, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 12:35:08'),
(85, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:35:08'),
(86, 'order', 73, 'create', 'Order created for client.', 44, '2024-10-23 12:35:08'),
(87, 'order_item', 90, 'create', 'Order item inserted for order ID: 73', 44, '2024-10-23 12:35:08'),
(88, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:43:36'),
(89, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:43:36'),
(90, 'order', 74, 'create', 'Order created for client.', 44, '2024-10-23 12:43:36'),
(91, 'order_item', 91, 'create', 'Order item inserted for order ID: 74', 44, '2024-10-23 12:43:36'),
(92, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 12:45:47'),
(93, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:45:47'),
(94, 'order', 75, 'create', 'Order created for client.', 44, '2024-10-23 12:45:48'),
(95, 'order_item', 92, 'create', 'Order item inserted for order ID: 75', 44, '2024-10-23 12:45:48'),
(96, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:47:07'),
(97, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:47:07'),
(98, 'order', 76, 'create', 'Order created for client.', 44, '2024-10-23 12:47:07'),
(99, 'order_item', 93, 'create', 'Order item inserted for order ID: 76', 44, '2024-10-23 12:47:07'),
(100, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 12:49:43'),
(101, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:49:43'),
(102, 'order', 77, 'create', 'Order created for client.', 44, '2024-10-23 12:49:43'),
(103, 'order_item', 94, 'create', 'Order item inserted for order ID: 77', 44, '2024-10-23 12:49:43'),
(104, 'order_item', 95, 'create', 'Order item inserted for order ID: 77', 44, '2024-10-23 12:49:43'),
(115, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:53:10'),
(116, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:53:10'),
(117, 'order', 80, 'create', 'Order created for client.', 44, '2024-10-23 12:53:10'),
(118, 'order_item', 100, 'create', 'Order item inserted for order ID: 80', 44, '2024-10-23 12:53:10'),
(119, 'order_item', 101, 'create', 'Order item inserted for order ID: 80', 44, '2024-10-23 12:53:10'),
(120, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:53:29'),
(121, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:53:29'),
(122, 'order', 81, 'create', 'Order created for client.', 44, '2024-10-23 12:53:29'),
(123, 'order_item', 102, 'create', 'Order item inserted for order ID: 81', 44, '2024-10-23 12:53:29'),
(124, 'order_item', 103, 'create', 'Order item inserted for order ID: 81', 44, '2024-10-23 12:53:29'),
(125, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:53:56'),
(126, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:53:56'),
(127, 'order', 82, 'create', 'Order created for client.', 44, '2024-10-23 12:53:56'),
(128, 'order_item', 104, 'create', 'Order item inserted for order ID: 82', 44, '2024-10-23 12:53:56'),
(129, 'order_item', 105, 'create', 'Order item inserted for order ID: 82', 44, '2024-10-23 12:53:56'),
(130, 'order_item', 106, 'create', 'Order item inserted for order ID: 82', 44, '2024-10-23 12:53:56'),
(131, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 12:54:08'),
(132, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 12:54:08'),
(133, 'order', 83, 'create', 'Order created for client.', 44, '2024-10-23 12:54:08'),
(134, 'order_item', 107, 'create', 'Order item inserted for order ID: 83', 44, '2024-10-23 12:54:08'),
(135, 'order_item', 108, 'create', 'Order item inserted for order ID: 83', 44, '2024-10-23 12:54:08'),
(136, 'order_item', 109, 'create', 'Order item inserted for order ID: 83', 44, '2024-10-23 12:54:08'),
(137, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 13:00:01'),
(138, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 13:00:01'),
(139, 'order', 84, 'create', 'Order created for client.', 44, '2024-10-23 13:00:01'),
(140, 'order_item', 110, 'create', 'Order item inserted for order ID: 84', 44, '2024-10-23 13:00:01'),
(141, 'order_item', 111, 'create', 'Order item inserted for order ID: 84', 44, '2024-10-23 13:00:01'),
(142, 'order_item', 112, 'create', 'Order item inserted for order ID: 84', 44, '2024-10-23 13:00:01'),
(143, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 13:20:10'),
(144, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 13:20:10'),
(145, 'order', 85, 'create', 'Order created for client.', 44, '2024-10-23 13:20:10'),
(146, 'order_item', 113, 'create', 'Order item inserted for order ID: 85', 44, '2024-10-23 13:20:10'),
(147, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 15:23:28'),
(148, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 15:23:28'),
(149, 'order', 86, 'create', 'Order created for client.', 44, '2024-10-23 15:23:28'),
(150, 'order_item', 114, 'create', 'Order item inserted for order ID: 86', 44, '2024-10-23 15:23:28'),
(151, 'client', 30, 'reuse', 'Client reused: Carissa Gonzales', 44, '2024-10-23 15:24:54'),
(152, 'address', 30, 'reuse', 'Address reused for client.', 44, '2024-10-23 15:24:54'),
(153, 'order', 87, 'create', 'Order created for client.', 44, '2024-10-23 15:24:54'),
(154, 'order_item', 115, 'create', 'Order item inserted for order ID: 87', 44, '2024-10-23 15:24:54'),
(155, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-10-23 15:26:16'),
(156, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-10-23 15:26:17'),
(157, 'order', 88, 'create', 'Order created for client.', 44, '2024-10-23 15:26:17'),
(158, 'order_item', 116, 'create', 'Order item inserted for order ID: 88', 44, '2024-10-23 15:26:17'),
(159, 'client', 32, 'create', 'New client created: ', 44, '2024-10-23 15:29:10'),
(160, 'contact', 36, 'create', 'Phone contact created for new client: ', 44, '2024-10-23 15:29:10'),
(161, 'contact', 37, 'create', 'Email contact created for new client: ', 44, '2024-10-23 15:29:10'),
(162, 'address', 32, 'create', 'New address created for client.', 44, '2024-10-23 15:29:10'),
(163, 'order', 89, 'create', 'Order created for client.', 44, '2024-10-23 15:29:10'),
(167, 'dispatch', 66, 'update', 'Status updated to successful.', 44, '2024-10-24 11:34:52'),
(168, 'dispatch', 85, 'create', 'Dispatch record created for Order 85.', 44, '2024-10-25 07:06:26'),
(169, 'truck', 11, 'create', 'Truck added: AGA-1023', 44, '2024-10-26 03:09:19'),
(170, 'truck', 12, 'create', 'Truck added: AGA-1023', 44, '2024-10-26 03:11:23'),
(171, 'truck', 13, 'create', 'Truck added: AGA-1023', 44, '2024-10-26 03:11:33'),
(172, 'dispatch_officers', 48, 'Delete', 'Deleted dispatch_officerswith ID 48', 44, '2024-10-26 08:45:11'),
(173, 'dispatch_officers', 49, 'Delete', 'Deleted dispatch_officerswith ID 49', 44, '2024-10-26 08:45:15'),
(174, 'dispatch_officers', 50, 'Delete', 'Deleted dispatch_officerswith ID 50', 44, '2024-10-26 08:45:17'),
(175, 'dispatch_officers', 51, 'Delete', 'Deleted dispatch_officerswith ID 51', 44, '2024-10-26 08:45:20'),
(176, 'trucks', 9, 'edit', 'Edited trucks with ID: edit.', 44, '2024-10-31 04:35:37'),
(177, 'trucks', 9, 'edit', 'Edited trucks with ID: 9.', 44, '2024-10-31 04:36:27'),
(178, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-10-31 05:24:31'),
(179, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-10-31 05:25:16'),
(180, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-10-31 05:25:24'),
(181, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-10-31 05:25:45'),
(182, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-10-31 05:25:52'),
(183, 'dispatch_officers', 52, 'edit', 'Edited dispatch_officers with ID: 52.', 44, '2024-10-31 05:49:11'),
(184, 'dispatch_officers', 52, 'edit', 'Edited dispatch_officers with ID: 52.', 44, '2024-10-31 05:49:20'),
(185, 'dispatch_officers', 52, 'edit', 'Edited dispatch_officers with ID: 52.', 44, '2024-10-31 05:49:38'),
(186, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-10-31 05:49:49'),
(187, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-10-31 05:50:01'),
(188, 'dispatch_officers', 52, 'edit', 'Edited dispatch_officers with ID: 52.', 44, '2024-10-31 05:50:16'),
(189, 'items', 73, 'edit', 'Edited items with ID: 73.', 44, '2024-10-31 08:28:48'),
(190, 'items', 73, 'edit', 'Edited items with ID: 73.', 44, '2024-10-31 09:41:13'),
(191, 'items', 73, 'edit', 'Edited items with ID: 73.', 44, '2024-10-31 09:41:35'),
(192, 'trucks', 9, 'edit', 'Edited trucks with ID: 9.', 44, '2024-10-31 09:48:33'),
(193, 'dispatch_officers', 52, 'edit', 'Edited dispatch_officers with ID: 52.', 44, '2024-10-31 09:50:19'),
(194, 'items', 73, 'edit', 'Edited items with ID: 73.', 44, '2024-11-02 01:57:10'),
(195, 'items', 73, 'Delete', 'Deleted itemswith ID 73', 44, '2024-11-02 03:45:47'),
(196, 'item', 75, 'create', 'Item added: test', 44, '2024-11-02 03:48:11'),
(197, 'items', 75, 'Delete', 'Deleted itemswith ID 75', 44, '2024-11-02 03:48:28'),
(198, 'item', 76, 'create', 'Item added: test', 44, '2024-11-02 04:46:59'),
(199, 'items', 76, 'Delete', 'Deleted itemswith ID 76', 44, '2024-11-02 04:47:14'),
(200, 'items', 72, 'edit', 'Edited items with ID: 72.', 44, '2024-11-02 04:47:33'),
(201, 'items', 72, 'edit', 'Edited items with ID: 72.', 44, '2024-11-02 04:47:46'),
(202, 'drivers', 2, 'edit', 'Edited drivers with ID: 2.', 44, '2024-11-02 07:39:27'),
(203, 'drivers', 2, 'edit', 'Edited drivers with ID: 2.', 44, '2024-11-02 07:43:13'),
(204, 'drivers', 2, 'edit', 'Edited drivers with ID: 2.', 44, '2024-11-02 07:43:22'),
(205, 'order_items', 104, 'Delete', 'Deleted order_itemswith ID 104', 44, '2024-11-03 00:17:41'),
(206, 'orders', 59, 'edit', 'Edited orders with ID: 59.', 44, '2024-11-03 04:05:19'),
(207, 'orders', 54, 'edit', 'Edited orders with ID: 54.', 44, '2024-11-03 04:05:41'),
(208, 'orders', 54, 'edit', 'Edited orders with ID: 54.', 44, '2024-11-03 04:05:59'),
(209, 'clients', 32, 'Delete', 'Deleted clientswith ID 32', 44, '2024-11-03 05:28:58'),
(210, 'addresses', 32, 'Delete', 'Deleted addresseswith ID 32', 44, '2024-11-03 06:09:20'),
(211, 'orders', 62, 'edit', 'Edited orders with ID: 62.', 44, '2024-11-04 13:21:41'),
(212, 'orders', 62, 'edit', 'Edited orders with ID: 62.', 44, '2024-11-04 13:24:24'),
(213, 'orders', 63, 'edit', 'Edited orders with ID: 63.', 44, '2024-11-04 14:30:29'),
(214, 'orders', 68, 'edit', 'Edited orders with ID: 68.', 44, '2024-11-04 15:17:28'),
(215, 'orders', 89, 'edit', 'Edited orders with ID: 89.', 44, '2024-11-04 15:18:01'),
(216, 'orders', 89, 'edit', 'Edited orders with ID: 89.', 44, '2024-11-04 15:18:30'),
(217, 'order_items', 116, 'Delete', 'Deleted order_itemswith ID 116', 44, '2024-11-04 16:11:51'),
(218, 'client', 33, 'create', 'New client created: John Doe', 44, '2024-11-04 19:08:36'),
(219, 'contact', 38, 'create', 'Phone contact created for new client: 09123456789', 44, '2024-11-04 19:08:36'),
(220, 'contact', 39, 'create', 'Email contact created for new client: jd.@gmail.com', 44, '2024-11-04 19:08:37'),
(221, 'address', 33, 'create', 'New address created for client.', 44, '2024-11-04 19:08:37'),
(222, 'order', 91, 'create', 'Order created for client.', 44, '2024-11-04 19:08:37'),
(223, 'order_item', 117, 'create', 'Order item inserted for order ID: 91', 44, '2024-11-04 19:08:37'),
(224, 'addresses', 33, 'Delete', 'Deleted addresseswith ID 33', 44, '2024-11-05 03:10:30'),
(225, 'clients', 25, 'edit', 'Edited clients with ID: 25.', 44, '2024-11-05 05:59:21'),
(226, 'clients', 25, 'edit', 'Edited clients with ID: 25.', 44, '2024-11-05 05:59:33'),
(227, 'client', 34, 'create', 'New client created: Juan Delacruz', 44, '2024-11-09 10:55:09'),
(228, 'contact', 40, 'create', 'Phone contact created for new client: 09359960500', 44, '2024-11-09 10:55:09'),
(229, 'contact', 41, 'create', 'Email contact created for new client: basco.jimel@gmail.com', 44, '2024-11-09 10:55:09'),
(230, 'address', 34, 'create', 'New address created for client.', 44, '2024-11-09 10:55:10'),
(231, 'order', 92, 'create', 'Order created for client.', 44, '2024-11-09 10:55:10'),
(232, 'order_item', 118, 'create', 'Order item inserted for order ID: 92', 44, '2024-11-09 10:55:10'),
(233, 'order_item', 119, 'create', 'Order item inserted for order ID: 92', 44, '2024-11-09 10:55:10'),
(234, 'truck', 14, 'create', 'Truck added: ABC-4567', 44, '2024-11-09 10:56:28'),
(235, 'dispatch', 60, 'create', 'Dispatch record created for Order 60.', 44, '2024-11-09 10:57:23'),
(236, 'dispatch', 68, 'update', 'Status updated to in-transit.', 44, '2024-11-09 10:57:42'),
(237, 'dispatch', 68, 'update', 'Status updated to failed.', 44, '2024-11-09 10:58:36'),
(238, 'dispatch', 68, 'update', 'Status updated to in-queue.', 44, '2024-11-09 10:59:25'),
(239, 'dispatch', 68, 'update', 'Status updated to in-transit.', 44, '2024-11-09 10:59:30'),
(240, 'dispatch', 68, 'update', 'Status updated to failed.', 44, '2024-11-09 10:59:44'),
(241, 'dispatch', 68, 'update', 'Status updated to in-queue.', 44, '2024-11-09 11:03:08'),
(242, 'drivers', 2, 'edit', 'Edited drivers with ID: 2.', 44, '2024-11-10 04:09:41'),
(243, 'addresses', 0, 'Delete', 'Deleted addresseswith ID 0', 44, '2024-11-10 04:16:14'),
(244, 'dispatch', 68, 'print', 'Dispatch slip printed.', 44, '2024-11-10 14:09:54'),
(245, 'order_items', 89, 'Delete', 'Deleted order_itemswith ID 89', 44, '2024-11-10 15:47:44'),
(246, 'order_items', 88, 'Delete', 'Deleted order_itemswith ID 88', 44, '2024-11-10 15:47:52'),
(247, 'orders', 88, 'Delete', 'Deleted orderswith ID 88', 44, '2024-11-10 15:48:20'),
(248, 'orders', 89, 'Delete', 'Deleted orderswith ID 89', 44, '2024-11-10 15:48:28'),
(249, 'dispatch', 68, 'update', 'Status updated to in-transit.', 44, '2024-11-10 15:51:44'),
(250, 'dispatch', 68, 'update', 'Status updated to failed.', 44, '2024-11-11 02:19:12'),
(251, 'dispatch', 68, 'update', 'Status updated to failed.', 44, '2024-11-11 02:19:13'),
(252, 'dispatch', 68, 'update', 'Status updated to in-queue.', 44, '2024-11-11 02:36:57'),
(253, 'dispatch', 68, 'update', 'Status updated to in-transit.', 44, '2024-11-11 03:51:19'),
(254, 'dispatch', 68, 'update', 'Status updated to failed. Vehicle Issues: Mechanical Breakdown', 44, '2024-11-11 03:51:32'),
(255, 'dispatch', 68, 'update', 'Status updated to in-queue.', 44, '2024-11-11 07:21:53'),
(256, 'dispatch', 68, 'update', 'Status updated to in-transit.', 44, '2024-11-11 07:22:02'),
(257, 'dispatch', 68, 'update', 'Status updated to failed. Client or Location Issues: Restricted Access', 44, '2024-11-11 07:22:13'),
(258, 'orders', 71, 'Delete', 'Deleted orderswith ID 71', 44, '2024-11-11 09:41:38'),
(259, 'orders', 72, 'Delete', 'Deleted orderswith ID 72', 44, '2024-11-11 09:41:43'),
(260, 'dispatch', 68, 'update', 'Status updated to in-queue.', 44, '2024-11-11 11:26:08'),
(261, 'dispatch', 68, 'update', 'Status updated to in-transit.', 44, '2024-11-11 11:29:21'),
(262, 'dispatch', 68, 'update', 'Status updated to successful.', 44, '2024-11-11 11:31:34'),
(263, 'dispatch', 68, 'update', 'Status updated to in-queue.', 44, '2024-11-11 11:31:57'),
(264, 'dispatch', 68, 'update', 'Status updated to in-transit.', 44, '2024-11-11 11:33:07'),
(265, 'dispatch', 68, 'update', 'Status updated to successful.', 44, '2024-11-11 11:35:02'),
(266, 'dispatch', 68, 'update', 'Status updated to in-queue.', 44, '2024-11-11 11:36:59'),
(267, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 13:43:06'),
(268, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 13:46:17'),
(269, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 13:46:32'),
(270, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-11 13:51:27'),
(271, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 13:51:36'),
(272, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-11 13:54:38'),
(273, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 13:55:17'),
(274, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-11 13:57:14'),
(275, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 13:57:32'),
(276, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-11 14:37:13'),
(277, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 14:37:23'),
(278, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-11 14:37:30'),
(279, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 14:37:41'),
(280, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-11 14:37:42'),
(281, 'dispatch', 68, 'update', 'Status updated to remove.', 44, '2024-11-12 03:07:46'),
(282, 'dispatch', 60, 'create', 'Dispatch record created for Order 60.', 44, '2024-11-12 03:08:01'),
(283, 'dispatch', 114, 'create', 'Dispatch record created for Order 114.', 44, '2024-11-12 03:09:03'),
(284, 'dispatch', 69, 'update', 'Status updated to failed. Vehicle Issues: Flat Tire', 44, '2024-11-12 03:09:43'),
(285, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-12 03:11:29'),
(286, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-12 03:11:42'),
(287, 'trucks', 9, 'Delete', 'Deleted truckswith ID 9', 44, '2024-11-12 03:12:12'),
(288, 'order_items', 59, 'Delete', 'Deleted order_itemswith ID 59', 44, '2024-11-12 03:12:42'),
(292, 'client', 35, 'create', 'New client created: ', 44, '2024-11-12 03:47:17'),
(293, 'contact', 42, 'create', 'Phone contact created for new client: ', 44, '2024-11-12 03:47:17'),
(294, 'contact', 43, 'create', 'Email contact created for new client: ', 44, '2024-11-12 03:47:17'),
(295, 'address', 35, 'create', 'New address created for client.', 44, '2024-11-12 03:47:17'),
(296, 'order', 94, 'create', 'Order created for client.', 44, '2024-11-12 03:47:17'),
(297, 'client', 28, 'reuse', 'Client reused: Jemuel Carlos Solidum', 44, '2024-11-12 03:48:15'),
(298, 'address', 28, 'reuse', 'Address reused for client.', 44, '2024-11-12 03:48:15'),
(299, 'order', 95, 'create', 'Order created for client.', 44, '2024-11-12 03:48:15'),
(300, 'order_item', 120, 'create', 'Order item inserted for order ID: 95', 44, '2024-11-12 03:48:15'),
(301, 'order_item', 121, 'create', 'Order item inserted for order ID: 95', 44, '2024-11-12 03:48:15'),
(302, 'order_item', 122, 'create', 'Order item inserted for order ID: 95', 44, '2024-11-12 03:48:15'),
(303, 'truck', 15, 'create', 'Truck added: Jemuel', 44, '2024-11-12 03:49:01'),
(304, 'dispatch', 121, 'create', 'Dispatch record created for Order 121.', 44, '2024-11-12 03:49:32'),
(305, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:49:45'),
(306, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:49:46'),
(307, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:49:47'),
(308, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:50:07'),
(309, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:50:09'),
(310, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:50:22'),
(311, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:50:23'),
(312, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:50:23'),
(313, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:50:23'),
(314, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:50:38'),
(315, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:51:16'),
(316, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 03:51:18'),
(317, 'dispatch', 70, 'update', 'Status updated to in-transit.', 44, '2024-11-12 11:30:30'),
(318, 'dispatch', 70, 'update', 'Status updated to failed. Vehicle Issues: Flat Tire', 44, '2024-11-12 11:31:13'),
(319, 'dispatch', 73, 'update', 'Status updated to in-transit.', 44, '2024-11-12 11:34:10'),
(320, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-12 11:36:34'),
(321, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-12 12:53:07'),
(322, 'orders', 94, 'Delete', 'Deleted orderswith ID 94', 44, '2024-11-12 14:15:05'),
(323, 'dispatch', 73, 'update', 'Status updated to successful.', 44, '2024-11-12 14:19:16'),
(324, 'dispatch', 73, 'update', 'Status updated to in-queue.', 44, '2024-11-12 14:19:20'),
(325, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-12 14:19:37'),
(326, 'dispatch', 73, 'print', 'Dispatch slip printed.', 44, '2024-11-13 14:22:38'),
(327, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-14 10:51:53'),
(328, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-14 10:52:13'),
(329, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-14 10:52:31'),
(330, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-14 10:57:20'),
(331, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-14 11:20:19'),
(332, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-11-14 11:25:57'),
(333, 'dispatch', 73, 'update', 'Status updated to in-transit.', 44, '2024-11-14 11:48:47'),
(334, 'client', 35, 'reuse', 'Client reused: ', 44, '2024-11-14 12:31:28'),
(335, 'address', 35, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:31:28'),
(336, 'order', 96, 'create', 'Order created for client.', 44, '2024-11-14 12:31:28'),
(337, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-11-14 12:31:52'),
(338, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:31:52'),
(339, 'order', 97, 'create', 'Order created for client.', 44, '2024-11-14 12:31:52'),
(349, 'client', 35, 'reuse', 'Client reused: ', 44, '2024-11-14 12:38:03'),
(350, 'address', 35, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:38:03'),
(351, 'order', 101, 'create', 'Order created for client.', 44, '2024-11-14 12:38:03'),
(361, 'client', 35, 'reuse', 'Client reused: ', 44, '2024-11-14 12:40:09'),
(362, 'address', 35, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:40:09'),
(363, 'order', 105, 'create', 'Order created for client.', 44, '2024-11-14 12:40:09'),
(364, 'order_item', 123, 'create', 'Order item inserted for order ID: 105', 44, '2024-11-14 12:40:09'),
(365, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-11-14 12:40:21'),
(366, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:40:21'),
(367, 'order', 106, 'create', 'Order created for client.', 44, '2024-11-14 12:40:21'),
(368, 'order_item', 124, 'create', 'Order item inserted for order ID: 106', 44, '2024-11-14 12:40:21'),
(372, 'client', 35, 'reuse', 'Client reused: ', 44, '2024-11-14 12:41:47'),
(373, 'address', 35, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:41:47'),
(374, 'order', 108, 'create', 'Order created for client.', 44, '2024-11-14 12:41:47'),
(375, 'order_item', 125, 'create', 'Order item inserted for order ID: 108', 44, '2024-11-14 12:41:47'),
(376, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-11-14 12:41:57'),
(377, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:41:57'),
(378, 'order', 109, 'create', 'Order created for client.', 44, '2024-11-14 12:41:57'),
(379, 'order_item', 126, 'create', 'Order item inserted for order ID: 109', 44, '2024-11-14 12:41:57'),
(386, 'client', 25, 'reuse', 'Client reused: Jimel Basco', 44, '2024-11-14 12:43:59'),
(387, 'address', 25, 'reuse', 'Address reused for client.', 44, '2024-11-14 12:43:59'),
(388, 'order', 112, 'create', 'Order created for client.', 44, '2024-11-14 12:43:59'),
(389, 'order_item', 127, 'create', 'Order item inserted for order ID: 112', 44, '2024-11-14 12:43:59'),
(390, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-11-14 14:53:18'),
(391, 'dispatch_officers', 53, 'Login', 'Logged in: John Doe', 53, '2024-11-14 14:53:30'),
(392, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-05 07:46:37'),
(393, 'orders', 101, 'Delete', 'Deleted orderswith ID 101', 44, '2024-12-07 02:52:12'),
(394, 'orders', 105, 'Delete', 'Deleted orderswith ID 105', 44, '2024-12-07 02:52:30'),
(395, 'orders', 108, 'Delete', 'Deleted orderswith ID 108', 44, '2024-12-07 02:52:47'),
(396, 'orders', 96, 'Delete', 'Deleted orderswith ID 96', 44, '2024-12-07 02:52:57'),
(397, 'dispatch', 73, 'update', 'Status updated to successful.', 44, '2024-12-07 04:47:31'),
(398, 'dispatch', 73, 'update', 'Status updated to in-queue.', 44, '2024-12-07 04:47:40'),
(399, 'orders', 97, 'Delete', 'Deleted orderswith ID 97', 44, '2024-12-07 05:11:42'),
(400, 'orders', 95, 'Delete', 'Deleted orderswith ID 95', 44, '2024-12-07 05:11:57'),
(401, 'dispatch', 118, 'create', 'Dispatch record created for Order 118.', 44, '2024-12-07 10:23:55'),
(402, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-12-07 11:13:26'),
(403, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-07 11:13:48'),
(404, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-12-07 18:47:31'),
(405, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-08 09:25:29'),
(406, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-12-08 09:34:25'),
(407, 'dispatch_officers', 54, 'Login', 'Logged in: Burnok', 54, '2024-12-08 09:34:36'),
(408, 'dispatch_officers', 54, 'Logout', 'Logged out: Burnok', 54, '2024-12-08 12:11:22'),
(409, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-08 12:11:32'),
(410, 'dispatch_officers', 44, 'edit', 'Edited dispatch_officers with ID: 44.', 44, '2024-12-08 13:23:51'),
(411, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-12-08 13:23:56'),
(412, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-08 13:24:06'),
(413, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-12-08 14:04:34'),
(414, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-08 14:13:45'),
(415, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-12-08 14:14:22'),
(416, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-08 14:14:31'),
(417, 'dispatch_officers', 44, 'Logout', 'Logged out: Syed Ameer Sibuma', 44, '2024-12-08 14:14:52'),
(418, 'dispatch_officers', 44, 'Login', 'Logged in: Syed Ameer Sibuma', 44, '2024-12-08 14:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `client_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
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
(58, '2024-10-16 04:49:52', 29, 29, 2, 14666.67, 'pending'),
(59, '2024-10-20 08:04:38', 29, 30, 1, 4666.67, 'pending'),
(60, '2024-10-20 08:04:45', 30, 30, 1, 4666.67, 'pending'),
(61, '2024-10-20 08:04:53', 30, 30, 2, 9333.33, 'pending'),
(62, '2024-10-20 16:44:50', 31, 31, 4, 18666.67, 'complete'),
(63, '2024-10-20 16:46:18', 31, 31, 1, 2200.00, 'pending'),
(64, '2024-10-23 11:56:39', 30, 30, 1, 14666.67, 'pending'),
(65, '2024-10-23 12:02:59', 30, 30, 1, 7333.33, 'pending'),
(66, '2024-10-23 12:13:21', 25, 25, 1, 312.50, 'pending'),
(67, '2024-10-23 12:15:34', 28, 28, 1, 6428.57, 'pending'),
(68, '2024-10-23 12:16:05', 25, 25, 1, 1100.00, 'complete'),
(69, '2024-10-23 12:16:59', 25, 25, 1, 1100.00, 'pending'),
(70, '2024-10-23 12:17:57', 30, 30, 1, 14666.67, 'pending'),
(73, '2024-10-23 12:35:08', 25, 25, 1, 1928.57, 'pending'),
(74, '2024-10-23 12:43:36', 30, 30, 1, 1400.00, 'pending'),
(75, '2024-10-23 12:45:48', 25, 25, 1, 2200.00, 'pending'),
(76, '2024-10-23 12:47:07', 30, 30, 1, 964.29, 'pending'),
(77, '2024-10-23 12:49:43', 25, 25, 2, 1928.57, 'pending'),
(80, '2024-10-23 12:53:10', 30, 30, 2, 1928.57, 'pending'),
(81, '2024-10-23 12:53:29', 30, 30, 2, 1928.57, 'pending'),
(82, '2024-10-23 12:53:56', 30, 30, 3, 3028.57, 'pending'),
(83, '2024-10-23 12:54:08', 30, 30, 3, 3028.57, 'pending'),
(84, '2024-10-23 13:00:01', 25, 25, 3, 4557.14, 'pending'),
(85, '2024-10-23 13:20:10', 30, 30, 1, 1100.00, 'pending'),
(86, '2024-10-23 15:23:28', 25, 25, 1, 1100.00, 'pending'),
(87, '2024-10-23 15:24:54', 30, 30, 1, 2200.00, 'pending'),
(92, '2024-11-09 10:55:10', 34, 34, 2, 1400.00, 'pending'),
(106, '2024-11-14 12:40:21', 25, 25, 1, 4666.67, 'pending'),
(109, '2024-11-14 12:41:57', 25, 25, 1, 4666.67, 'pending'),
(112, '2024-11-14 12:43:59', 25, 25, 1, 4666.67, 'pending');

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
(60, 54, 72, 1100.00, 1650.00, 10, 'failed'),
(61, 55, 71, 250.00, 750.00, 11, 'pending'),
(62, 55, 71, 250.00, 750.00, 11, 'pending'),
(63, 55, 71, 700.00, 1050.00, 10, 'completed'),
(64, 55, 71, 700.00, 2100.00, 11, 'pending'),
(65, 56, 71, 700.00, 7000.00, 9, 'pending'),
(66, 56, 71, 250.00, 750.00, 11, 'pending'),
(67, 56, 71, 250.00, 750.00, 11, 'pending'),
(68, 57, 71, 250.00, 375.00, 10, 'pending'),
(69, 57, 71, 250.00, 375.00, 10, 'pending'),
(70, 58, 72, 1100.00, 11000.00, 9, 'pending'),
(71, 58, 72, 1100.00, 11000.00, 9, 'pending'),
(72, 59, 71, 700.00, 7000.00, 9, 'pending'),
(73, 60, 71, 700.00, 7000.00, 9, 'pending'),
(74, 61, 71, 700.00, 7000.00, 9, 'pending'),
(75, 61, 71, 700.00, 7000.00, 9, 'pending'),
(76, 62, 71, 700.00, 7000.00, 9, 'pending'),
(77, 62, 71, 700.00, 7000.00, 9, 'pending'),
(78, 62, 71, 700.00, 7000.00, 9, 'pending'),
(79, 62, 71, 700.00, 7000.00, 9, 'pending'),
(80, 63, 72, 1100.00, 3300.00, 11, 'pending'),
(81, 64, 72, 1100.00, 22000.00, 12, 'pending'),
(82, 65, 72, 1100.00, 11000.00, 9, 'pending'),
(83, 66, 71, 250.00, 375.00, 10, 'pending'),
(84, 67, 74, 1800.00, 18000.00, 9, 'pending'),
(85, 68, 72, 1100.00, 1650.00, 10, 'in-queue'),
(86, 69, 72, 1100.00, 1650.00, 10, 'pending'),
(87, 70, 72, 1100.00, 22000.00, 12, 'pending'),
(90, 73, 74, 1800.00, 5400.00, 11, 'pending'),
(91, 74, 71, 700.00, 2100.00, 11, 'pending'),
(92, 75, 72, 1100.00, 3300.00, 11, 'pending'),
(93, 76, 74, 1800.00, 2700.00, 10, 'pending'),
(94, 77, 74, 1800.00, 2700.00, 10, 'pending'),
(95, 77, 74, 1800.00, 2700.00, 10, 'pending'),
(100, 80, 74, 1800.00, 2700.00, 10, 'pending'),
(101, 80, 74, 1800.00, 2700.00, 10, 'pending'),
(102, 81, 74, 1800.00, 2700.00, 10, 'pending'),
(103, 81, 74, 1800.00, 2700.00, 10, 'pending'),
(105, 82, 74, 1800.00, 2700.00, 10, 'pending'),
(106, 82, 72, 1100.00, 1650.00, 10, 'pending'),
(107, 83, 74, 1800.00, 2700.00, 10, 'pending'),
(108, 83, 74, 1800.00, 2700.00, 10, 'pending'),
(109, 83, 72, 1100.00, 1650.00, 10, 'pending'),
(110, 84, 74, 1800.00, 5400.00, 11, 'pending'),
(111, 84, 74, 1800.00, 5400.00, 11, 'pending'),
(112, 84, 71, 700.00, 1050.00, 10, 'pending'),
(113, 85, 72, 1100.00, 1650.00, 10, 'pending'),
(114, 86, 72, 1100.00, 1650.00, 10, 'failed'),
(115, 87, 72, 1100.00, 3300.00, 11, 'pending'),
(118, 92, 71, 700.00, 1050.00, 10, 'in-queue'),
(119, 92, 71, 700.00, 1050.00, 10, 'pending'),
(120, 112, 71, 700.00, 7000.00, 9, 'pending'),
(121, 112, 71, 700.00, 7000.00, 9, 'in-queue'),
(122, 112, 69, 250.00, 5000.00, 12, 'pending'),
(123, 112, 71, 700.00, 7000.00, 9, 'pending'),
(124, 106, 71, 700.00, 7000.00, 9, 'pending'),
(125, 112, 71, 700.00, 7000.00, 9, 'pending'),
(126, 109, 71, 700.00, 7000.00, 9, 'pending'),
(127, 112, 71, 700.00, 7000.00, 9, 'pending');

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
(14, 'ABC-4567', 10, 'available', '2024-11-09 10:56:28', '2024-11-12 11:31:13'),
(15, 'Jemuel', 9, 'available', '2024-11-12 03:49:01', '2024-12-07 04:47:31');

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
(11, 'FORWARD-MD-3T', 3.00),
(12, 'GIGA-HD-20T', 20.00);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `dispatch_officers`
--
ALTER TABLE `dispatch_officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `truck_types`
--
ALTER TABLE `truck_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
