-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 01:01 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `bill_amount` int(11) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `customer_id`, `bill_amount`, `payment_method`, `orders_id`) VALUES
(8, 5, 175, 'Cash on Delivery', 15),
(9, 5, 125, 'Cash on Delivery', 16),
(10, 5, 175, 'Cash on Delivery', 17),
(11, 5, 255, 'UPI', 18),
(12, 5, 100, 'Cash on Delivery', 19),
(13, 5, 150, 'Cash on Delivery', 20),
(14, 5, 150, 'Cash on Delivery', 21),
(15, 5, 300, 'Credit/Debit Card', 22);

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `cuisine_id` int(20) NOT NULL,
  `cuisine_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`cuisine_id`, `cuisine_name`) VALUES
(1, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `email`, `phone_no`) VALUES
(1, 'Username', 'mumbai', 'username@gmail.com', 1234567890),
(3, 'Aditya Desai', 'Thane', 'adityadesai72@gmail.com', 1820597107),
(4, 'Omkar Kumbhar', 'Dombivli', 'omkarkumbhar@gmail.com', 1234567890),
(5, 'Vaibhav Kharaje', 'Airoli', 'vaibhavkharaje@gmail.com', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_desc` varchar(255) DEFAULT NULL,
  `cuisine` text NOT NULL,
  `item_price` int(10) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_desc`, `cuisine`, `item_price`, `image`) VALUES
(5, 'Latte', 'Hot and Sizzling', 'Brunch', 75, 'latte.jpg'),
(6, 'Croissant', 'Buttery and Flaky!', 'Brunch', 75, 'croissant.jpg'),
(7, 'Donut', 'Fresh and Chochlaty', 'Brunch', 85, 'donut.jpg'),
(8, 'Muffin', 'Delicious and Yummy', 'Brunch', 50, 'muffin.jpg'),
(9, 'Fries', 'Thin and Crispy', 'American', 70, 'fries.jpg'),
(11, 'Hamburger', 'Grilled option available', 'American', 150, 'hamburger.jpg'),
(12, 'Nuggets', 'The way you like it !', 'American', 130, 'nuggets.jpg'),
(13, 'Hot dog', 'Fresh and Tasty', 'American', 135, 'hotdog.jpg'),
(14, 'Taco', 'Tortilla with filling', 'Mexican', 150, 'taco.jpg'),
(15, 'Burrito', 'Grilled option available', 'Mexican', 150, 'burrito.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `item_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `order_type`, `customer_id`, `item_count`) VALUES
(1, 'Online', 1, 2),
(2, 'Reservation', 1, 1),
(5, 'online', 5, 2),
(6, 'reservation', 4, 2),
(7, 'Takeaway', 5, 3),
(8, 'Dine in', 5, 3),
(9, 'Delivery', 5, 3),
(10, 'Takeaway', 5, 2),
(11, 'Delivery', 5, 2),
(12, 'Delivery', 5, 2),
(13, 'Delivery', 5, 1),
(14, 'Takeaway', 5, 2),
(15, 'Delivery', 5, 2),
(16, 'Delivery', 5, 2),
(17, 'Delivery', 5, 2),
(18, 'Takeaway', 5, 1),
(19, 'Delivery', 5, 1),
(20, 'Delivery', 5, 1),
(21, 'Delivery', 5, 1),
(22, 'Dine in', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `orders_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`orders_id`, `item_id`, `quantity`, `price`) VALUES
(8, 5, 1, 75),
(8, 6, 1, 75),
(8, 9, 2, 70),
(9, 5, 1, 75),
(9, 8, 1, 50),
(9, 12, 3, 130),
(10, 12, 2, 130),
(10, 13, 1, 135),
(11, 11, 1, 150),
(11, 13, 1, 135),
(12, 11, 1, 150),
(12, 13, 1, 135),
(13, 7, 3, 85),
(14, 9, 1, 70),
(14, 12, 2, 130),
(15, 6, 1, 75),
(15, 8, 2, 50),
(16, 5, 1, 75),
(16, 8, 1, 50),
(17, 5, 1, 75),
(17, 8, 2, 50),
(18, 7, 3, 85),
(19, 8, 2, 50),
(20, 5, 2, 75),
(21, 5, 2, 75),
(22, 14, 1, 150),
(22, 15, 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservations_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `member_count` int(11) DEFAULT NULL,
  `arrival_time` varchar(10) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservations_id`, `customer_id`, `member_count`, `arrival_time`, `date`) VALUES
(3, 5, 3, '11:00 AM', '11/11/2020'),
(4, 5, 3, '11:00 AM', '11/11/2020'),
(5, 5, 3, '11:00 AM', '11/11/2020'),
(6, 5, 3, '11:00 AM', '11/11/2020'),
(7, 5, 3, '11:00 AM', '11/11/2020'),
(8, 5, 3, '11:00 AM', '11/11/2020'),
(9, 5, 3, '06:30 PM', '11/09/2020'),
(13, 5, 1, '11:00 AM', '11/11/2020'),
(14, 5, 3, '08:30 PM', '11/09/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bill_ibfk_1` (`customer_id`),
  ADD KEY `bill_ibfk_2` (`orders_id`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`cuisine_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_name` (`item_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `order_ibfk_1` (`customer_id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`orders_id`,`item_id`),
  ADD KEY `orderitem_ibfk_4` (`item_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservations_id`),
  ADD KEY `reservation_ibfk_1` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cuisine`
--
ALTER TABLE `cuisine`
  MODIFY `cuisine_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD CONSTRAINT `	orderitem_ibfk_3` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitem_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
