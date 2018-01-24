-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 12:47 AM
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
  `item_details` varchar(255) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `item_price` varchar(25) NOT NULL,
  `item_location` varchar(150) NOT NULL,
  `item_publisher_id` int(11) NOT NULL,
  `item_img` varchar(50) NOT NULL,
  `item_price_term` varchar(50) NOT NULL,
  `item_approval_status` int(1) NOT NULL DEFAULT '0',
  `item_post_date` date NOT NULL,
  `item_views` int(11) NOT NULL,
  `item_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_details`, `item_category_id`, `item_price`, `item_location`, `item_publisher_id`, `item_img`, `item_price_term`, `item_approval_status`, `item_post_date`, `item_views`, `item_likes`) VALUES
(6, 'Keyboard', 'Brand new keyboard', 1, '1200', 'Accra', 10, 'User_10_1516117082.jpg', 'fixed', 0, '2018-01-16', 0, 0),
(7, 'Mug', 'Tea mug', 6, '50', 'Accra', 10, 'User_10_1516117139.png', 'fixed', 0, '2018-01-16', 0, 0),
(8, 'watch', 'A brand new wall clock', 1, '100', 'Kumasi', 10, 'User_10_1518849403.gif', 'negotiable', 0, '2018-02-17', 0, 0),
(9, 'Art', 'A new art collection', 8, '2000', 'Accra', 10, 'User_10_1521238375.jpg', 'fixed', 0, '2018-03-16', 0, 0),
(10, 'Keyboard', 'New Keyboard', 1, '200', 'Accra', 14, 'User_14_1521242149.jpg', 'negotiable', 0, '2018-03-17', 0, 0);

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_password`, `user_sign_date`) VALUES
(10, 'enochMarley', 'mail@mail.com', '029187897189', '$2y$10$fZNYPdwMEVmGLAML8EGLEeI5o0d3IUcCkfLMTN6Jwi2AaO35Hh0dK', '2018-01-12'),
(11, 'fullName', 'mail1@mail.com', '949432', '$2y$10$yE9BlPnBLL6G8zt5SfYsPOJsQiAA/IVsrZa7DmzZBAUndsMjN9oau', '2018-01-15'),
(12, 'jdsklfjdk', 'kdjflkd@jflkd.dkfldjfk', 'kjf990900', '$2y$10$COxHeYU8OZo.Q/RPCCdKLOqOD26dNqvah.maXkJA80V6sAAFBDO1K', '2018-02-02'),
(13, 'dfdfd', 'fsdf@dfd.dfds', 'dfdfd', '$2y$10$6GHghYKkkbJgqaBzxdEVOeteaVYKUpYMnagu2yNpU.xVA0B/u00IW', '2018-02-13'),
(14, 'John Doe', 'mail1@mail1.com', '0271728188', '$2y$10$Jv8sDPBZ7A2aLxFmgTqyROaBBP6EWAKMpTaMdwUw6xwD5DfxuVrbq', '2018-03-01');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `itemcaterr` FOREIGN KEY (`item_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itempublisherr` FOREIGN KEY (`item_publisher_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
