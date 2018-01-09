-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2018 at 10:37 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'username', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `admin_history`
--

CREATE TABLE `admin_history` (
  `admin_history_id` int(11) NOT NULL,
  `admin_history_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `admin_message_id` int(11) NOT NULL,
  `admin_message_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `admin_notification_id` int(11) NOT NULL,
  `admin_notification_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(4, 'Stationery'),
(5, 'Games & Consoles'),
(6, 'Food & Beverages'),
(7, 'Fashion'),
(8, 'Others'),
(9, 'Transport'),
(10, 'Services'),
(11, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(70) NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `item_status` varchar(20) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `item_price` float NOT NULL,
  `item_location` varchar(150) NOT NULL,
  `item_publisher_id` int(11) NOT NULL,
  `item_post_date` date NOT NULL,
  `item_views` int(11) NOT NULL,
  `item_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

CREATE TABLE `item_images` (
  `item_image_id` int(11) NOT NULL,
  `image_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_sign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message_content` text NOT NULL,
  `message_send_date` date NOT NULL,
  `message_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_history`
--
ALTER TABLE `admin_history`
  ADD PRIMARY KEY (`admin_history_id`);

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`admin_message_id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`admin_notification_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `itemcaterr` (`item_category_id`),
  ADD KEY `itempublisherr` (`item_publisher_id`);

--
-- Indexes for table `item_images`
--
ALTER TABLE `item_images`
  ADD KEY `itemimgerr` (`item_image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `msgrecerr` (`receiver_id`),
  ADD KEY `msgsecderr` (`sender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_history`
--
ALTER TABLE `admin_history`
  MODIFY `admin_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `admin_message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `admin_notification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `itemcaterr` FOREIGN KEY (`item_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itempublisherr` FOREIGN KEY (`item_publisher_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_images`
--
ALTER TABLE `item_images`
  ADD CONSTRAINT `itemimgerr` FOREIGN KEY (`item_image_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD CONSTRAINT `msgrecerr` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `msgsecderr` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
