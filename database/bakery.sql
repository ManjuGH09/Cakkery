-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 10:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`username`, `password`) VALUES
('abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `product_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`product_name`, `email_id`, `quantity`) VALUES
('Chicken Roll', 'abc@gmail.com', 3),
('Chocolate Cake', 'abc@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_table`
--

CREATE TABLE `feedback_table` (
  `name` varchar(100) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_table`
--

INSERT INTO `feedback_table` (`name`, `mobile_number`, `email_id`, `message`) VALUES
('abc s', 9087654321, 'test@gmail.com', 'Good products');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(100) NOT NULL,
  `product_names` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `payment_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `product_names`, `total_price`, `user_email`, `payment_type`) VALUES
('PAY900', ' Chicken Roll Chocolate Cake', 550, 'abc@gmail.com', 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `image` blob NOT NULL,
  `stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`name`, `category`, `price`, `image`, `stock`) VALUES
('Chicken Roll', 'Rolls', 50, 0x5236323430353561643662643336643230303837613862363535653236653835342e6a666966, 'In Stock'),
('Chocolate Cake', 'Cakes', 400, 0x70322e706e67, 'In Stock'),
('Cream Bun', 'Breads', 15, 0x637265616d2062756e2e6a666966, 'In Stock'),
('Pineapple Cake', 'Cakes', 300, 0x70696e2d63616b652e6a666966, 'In Stock'),
('Plain Bun', 'Breads', 10, 0x706c61696e2062756e2e6a666966, 'In Stock'),
('Sweet Bread', 'Breads', 50, 0x73776565742062726561642e6a666966, 'In Stock'),
('Unibic', 'Cookies', 30, 0x5236383235396536306563313038386164336236306665626666616138393331352e6a666966, 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `sales_table`
--

CREATE TABLE `sales_table` (
  `order_id` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `total_price` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_table`
--

INSERT INTO `sales_table` (`order_id`, `product_name`, `email_id`, `total_price`, `address`, `date`) VALUES
('ORDS545', ' Chicken Roll Chocolate Cake', 'abc@gmail.com', 550, 'test address', '2021-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`first_name`, `last_name`, `email_id`, `mobile_number`, `address`, `password`) VALUES
('test', 's', 'abc@gmail.com', 9087654321, 'test address', 'e99a18c428cb38d5f260853678922e03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`product_name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `sales_table`
--
ALTER TABLE `sales_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`email_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
