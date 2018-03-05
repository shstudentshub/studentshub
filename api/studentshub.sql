-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 07:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `guest_emails`
--

CREATE TABLE `guest_emails` (
  `email_id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_emails`
--

INSERT INTO `guest_emails` (`email_id`, `email_address`, `date_added`) VALUES
(1, 'mail@mail.com', '2018-03-04 19:19:13'),
(2, 'mail2@mail.com', '2018-03-04 19:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `itemimages`
--

CREATE TABLE `itemimages` (
  `image_id` int(11) NOT NULL,
  `image_names` varchar(1000) DEFAULT NULL,
  `item_image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemimages`
--

INSERT INTO `itemimages` (`image_id`, `image_names`, `item_image_id`) VALUES
(19, 'a:5:{i:0;s:32:\"User_18_63fa81697e2de94c41f.jpeg\";i:1;s:31:\"User_18_c9f38d34005a8314e6e.jpg\";i:2;s:31:\"User_18_361f3f4bab1ee97cb8a.png\";i:3;s:31:\"User_18_4de884eb55fb6282127.png\";i:4;s:28:\"User_18_35f0cf657a27e43f.png\";}', 13),
(20, 'a:4:{i:0;s:31:\"User_18_82d0cf8658d2c83865a.png\";i:1;s:31:\"User_18_8de434bab1383edd806.jpg\";i:2;s:29:\"User_18_648a7512d4ab5dcd3.png\";i:3;s:26:\"User_18_8ecfc9f29e6d54.png\";}', 14),
(22, 'a:4:{i:0;s:31:\"User_18_b475284eab175757119.png\";i:1;s:31:\"User_18_4aa5b177228be9c77d6.png\";i:2;s:31:\"User_18_94f8afa8d2c3070fabf.png\";i:3;s:30:\"User_18_c580f6607945186b96.png\";}', 16),
(23, 'a:2:{i:0;s:31:\"User_18_44bd6863785844d85f6.png\";i:1;s:31:\"User_18_46237f8a3408439cc4c.jpg\";}', 17),
(24, 'a:3:{i:0;s:23:\"User_18_d132ac548c2.png\";i:1;s:30:\"User_18_a82b61a1d7f71296d2.png\";i:2;s:31:\"User_18_159e7f9124fc8f5d225.jpg\";}', 18),
(25, 'a:5:{i:0;s:31:\"User_10_93703c6418bfe5037b0.jpg\";i:1;s:31:\"User_10_07dcb5d0b9414e95dee.jpg\";i:2;s:31:\"User_10_ea8b952e2fefc46da1d.jpg\";i:3;s:31:\"User_10_71a7e51eaa62d6ecbb5.jpg\";i:4;s:28:\"User_10_0b0a14dca253d10c.jpg\";}', 19),
(26, 'a:3:{i:0;s:31:\"User_10_cf4e29a16381d21d855.jpg\";i:1;s:31:\"User_10_3514cd1164d92116052.jpg\";i:2;s:19:\"User_10_4578d74.jpg\";}', 20);

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
  `item_currency` varchar(50) NOT NULL,
  `item_location` varchar(150) NOT NULL,
  `item_publisher_id` int(11) NOT NULL,
  `item_tracking_id` varchar(255) NOT NULL,
  `item_price_term` varchar(50) NOT NULL,
  `item_condition` varchar(10) NOT NULL DEFAULT 'n/a',
  `item_approval_status` int(1) NOT NULL DEFAULT '0',
  `item_post_date` date NOT NULL,
  `item_views` int(11) DEFAULT NULL,
  `item_likes` int(11) DEFAULT NULL,
  `item_calls` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_details`, `item_category_id`, `item_price`, `item_currency`, `item_location`, `item_publisher_id`, `item_tracking_id`, `item_price_term`, `item_condition`, `item_approval_status`, `item_post_date`, `item_views`, `item_likes`, `item_calls`) VALUES
(13, 'Shirt', 'askldjfasf lkasdjfalsk asf aslkja skl kja sfkj', 7, '900', 'â‚¦', 'Nigera', 18, '3e1884f82d7d525197659abeac5cb1f1', 'fixed', '', 1, '2018-02-22', 122, NULL, 0),
(14, 'Movies', 'Movie Box', 10, '800', 'â‚µ', 'Ghana', 18, 'e4e3fb258b12a87dd3e31d14a2926484', 'fixed', '', 0, '2018-02-22', 1, NULL, 0),
(16, 'Watches', 'aksjdfkalsjdf', 1, '900', 'â‚µ', 'Ucc', 18, '3773a7a3d8882d4ca1173c5bfc566a9e', 'negotiable', '', 1, '2018-02-22', 8, NULL, 1),
(17, 'Phone', 'Phones in cart', 1, '800', 'â‚¦', 'Nigeria (Yibora state)', 18, '20d81d46913a38e10dfda66bda3d9ac0', 'fixed', '', 1, '2018-02-22', 15, NULL, 2),
(18, 'News Apps', 'asdjlfkasdjf askdljf aslkdfja ksdljf aksldjf klj', 7, '10', 'â‚¦', 'Indo State', 18, '12e1e46ef88bc83a728b00a8f25c05af', 'fixed', '', 1, '2018-02-22', 5, NULL, 1),
(19, 'Rooms', 'These are nice apartment suites', 1, '30', 'â‚¦', 'Cape Coast', 10, 'ce65a386a814eb80d57b8636961b5301', 'fixed', 'new', 1, '2018-02-23', 10, NULL, 0),
(20, 'A watch', 'This is a new item', 1, '90', 'â‚µ', 'Accra', 10, '73360d77fe47037a134757b225098b4b', 'fixed', 'used', 1, '2018-03-05', 3, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `multi`
--

CREATE TABLE `multi` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi`
--

INSERT INTO `multi` (`image_id`, `image_name`) VALUES
(7, 'Array'),
(9, 'a:4:{i:0;s:20:\"User_658902448c_.png\";i:1;s:20:\"User_704d4ab893_.png\";i:2;s:20:\"User_f57949b305_.jpg\";i:3;s:20:\"User_12511458bf_.png\";}'),
(10, 'a:3:{i:0;s:20:\"User_4cbe5c0c1f_.png\";i:1;s:20:\"User_bf54289b03_.png\";i:2;s:20:\"User_9f782c3a32_.png\";}'),
(11, 'a:2:{i:0;s:20:\"User_e8cfd6571d_.png\";i:1;s:20:\"User_a0ff0bb417_.jpg\";}'),
(12, 'a:5:{i:0;s:20:\"User_13316ee048_.png\";i:1;s:20:\"User_9af46547d5_.png\";i:2;s:20:\"User_4de362fdb9_.png\";i:3;s:20:\"User_3a03b8cf95_.jpg\";i:4;s:20:\"User_0abe629b4b_.png\";}'),
(13, 'a:4:{i:0;s:20:\"User_51e0cd65a1_.png\";i:1;s:20:\"User_5e77283f41_.png\";i:2;s:20:\"User_7bc0839de7_.png\";i:3;s:20:\"User_daa3ecaebb_.jpg\";}'),
(14, 'a:4:{i:0;s:20:\"User_83ab63f0c6_.jpg\";i:1;s:20:\"User_9b9053a55a_.png\";i:2;s:20:\"User_4fec23e453_.png\";i:3;s:18:\"User_93800dc2_.png\";}'),
(15, 'a:6:{i:0;s:20:\"User_b256a2fdab_.png\";i:1;s:20:\"User_925e9ae28b_.png\";i:2;s:20:\"User_9fb00f64e7_.png\";i:3;s:20:\"User_b097916606_.png\";i:4;s:20:\"User_453a02582d_.jpg\";i:5;s:20:\"User_6b3c2d2a96_.png\";}'),
(16, 'a:4:{i:0;s:19:\"User_08fa9e533_.jpg\";i:1;s:20:\"User_2f347e8d76_.png\";i:2;s:20:\"User_0d9eff6194_.png\";i:3;s:20:\"User_8b568117bc_.png\";}');

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
  `user_sign_date` date NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_password`, `user_sign_date`, `user_city`, `user_country`) VALUES
(10, 'enochMarley', 'mail@mail.com', '029187897189', '$2y$10$fZNYPdwMEVmGLAML8EGLEeI5o0d3IUcCkfLMTN6Jwi2AaO35Hh0dK', '2018-03-14', 'Accra', ''),
(14, 'John Doe', 'mail1@mail1.com', '0271728188', '$2y$10$Jv8sDPBZ7A2aLxFmgTqyROaBBP6EWAKMpTaMdwUw6xwD5DfxuVrbq', '2018-03-01', '', ''),
(17, 'kelvin', 'john@gmail.com', '094929', '$2y$10$O15.2mbvB.QE3fjK1ExIxea0fE.vrivDDxjbVut9JpqMAT66ws94u', '2018-01-27', '', ''),
(18, 'kelvin', 'kelvinclin4u@inboxbear.com', '0000000000', '$2y$10$Hr0rLNAMRZb4/Lgb91MJ7OwbTxrWSqlZd8vkiY8V5.P.KcowAkwou', '2018-02-21', 'Accra', 'Ghana');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact_messages`
--

CREATE TABLE `user_contact_messages` (
  `message_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact_messages`
--

INSERT INTO `user_contact_messages` (`message_id`, `sender_name`, `sender_email`, `sender_message`) VALUES
(1, 'myName', 'mail@mail.com', 'this is my message. it is very short');

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
-- Indexes for table `guest_emails`
--
ALTER TABLE `guest_emails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `itemimages`
--
ALTER TABLE `itemimages`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `item_image_id` (`item_image_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `itemcaterr` (`item_category_id`),
  ADD KEY `itempublisherr` (`item_publisher_id`);

--
-- Indexes for table `multi`
--
ALTER TABLE `multi`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_contact_messages`
--
ALTER TABLE `user_contact_messages`
  ADD PRIMARY KEY (`message_id`);

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
-- AUTO_INCREMENT for table `guest_emails`
--
ALTER TABLE `guest_emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itemimages`
--
ALTER TABLE `itemimages`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `multi`
--
ALTER TABLE `multi`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_contact_messages`
--
ALTER TABLE `user_contact_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemimages`
--
ALTER TABLE `itemimages`
  ADD CONSTRAINT `item_image_id` FOREIGN KEY (`item_image_id`) REFERENCES `items` (`item_id`);

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
