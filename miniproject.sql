-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2018 at 11:43 AM
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
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(2, 'admin@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `area_id`, `fname`, `lname`, `password`, `gender`, `dob`, `address`, `qualification`, `mobile`) VALUES
(1028, 14, 'Eric', 'Samuel', '776bc9cb3baa951c6df563631183150e', 'Male', '1995-07-11', 'Eric villa,\r\nKottarakkara', 'Plus Two', '7558977737'),
(1029, 15, 'Manu', 'Prabhakar', 'e44b063f85f1aaea80ba93690a743232', 'Male', '1993-08-09', 'Manu Villa,\r\nAdoor', 'Graduate', '9786543210'),
(1030, 17, 'Nithin', 'Prakash', '9b8fa4eebedd09cdbb5a3dfa17cf8f85', 'Male', '1995-06-12', 'Mannoor House,\r\nKattanam', 'Graduate', '7556890327'),
(1031, 18, 'Megha', 'Manoj', 'eed91b6878df5485d82c17b3a3d9a834', 'Female', '1990-01-24', 'Manoj Villa,\r\nKumarapuram', 'SSLC', '8089196698'),
(1037, 18, 'Elsa', 'Paulson', 'd00df59b84b1c6c8a87099adef9628ec', 'Female', '1997-07-22', 'Paulson villa,\r\nHarippad', 'Plus Two', '7558977727'),
(1036, 14, 'Eric', 'Samuel', '63a9f0ea7bb98050796b649e85481845', 'Male', '1999-09-26', 'qwerty', 'SSLC', '9847441214'),
(1038, 15, 'vvv', 'dd', '96e79218965eb72c92a549dd5a330112', 'Male', '2000-01-13', 'fff', 'SSLC', '9900998877');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `description`, `pin`) VALUES
(14, 'Kottarakkara', 'Suitable for Cultivation Of crops!!', 691531),
(15, 'Adoor', 'Ideal place for cashcrops!!!', 690523),
(17, 'Kayamkulam', 'Climatic conditions ideal for cultivation...', 690503),
(18, 'Haripad', 'Peaceful environment.', 693452),
(20, 'TEST', 'TEST', 112233);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
(11, 'Fruits', 'Different variety Fruit Seeds and Saplings!!!'),
(12, 'Vegetables', 'Vegetable seeds and saplings!!!'),
(13, 'CashCrops', 'Cashcrop saplings!!!'),
(14, 'Flowers', 'Wide variety Flower seeds and Saplings!!!'),
(16, 'add test', 'now ');

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE `seeds` (
  `seed_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time_period` varchar(255) NOT NULL,
  `hybrid` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`seed_id`, `category_id`, `name`, `time_period`, `hybrid`, `description`, `stock`, `unit`, `price`, `deleted`) VALUES
(17, 11, 'Rambuttan', '1 year', 'N', 'Rambuttan Sapling that Grows in all Climatic conditions...', 38, 2, 100, 1),
(18, 11, 'Rambuttan Hybrid', '2 weeks', 'Y', 'Hybrid Rambuttans that produce fruits quickly', 15, 2, 12, 0),
(19, 11, 'Malgova Mango', '1 year', 'N', 'Pulpy Malgova Mangoes...', 42, 1, 30, 0),
(20, 11, 'Malgova Hybrid', '6 months', 'Y', 'Hybrid variety malgovas!!!', 15, 1, 50, 0),
(21, 12, 'Tomato', '3 weeks', 'N', 'Healthy tomatoes that grow quickly.', 8, 1, 200, 0),
(22, 11, 'Lychee', '2 years', 'N', 'Fleshy fruit with  protective covering outside...', 13, 1, 45, 0),
(23, 12, 'Lady\'s Finger', '3 months', 'N', 'Healthy vegetable that provides lots of fibre needed for the human body.', 5, 1, 5, 0),
(24, 12, 'Lady\'s Finger Hybrid', '3 weeks', 'Y', 'Hybrid variety Lady\'s finger.', 9, 1, 10, 0),
(25, 11, 'Alphonso mango', '1 year', 'N', 'Alphonso...the king of fruits... pulpy..', 3, 1, 25, 0),
(26, 11, 'Banana', '2 months', 'N', 'Banana saplings..', 50, 1, 15, 0),
(27, 11, 'TissueCulture Banana', '3 months', 'Y', 'Tissue cultured variety banana', 15, 1, 20, 0),
(28, 11, 'Pink Banana', '6 months', 'Y', 'Pink in colour...good for health..', 10, 1, 35, 0),
(29, 11, 'Chenkathali Banana', '6 months', 'N', 'Attracting red colour enclosing the delicious fruit', 19, 1, 30, 0),
(30, 11, 'Banana Poovan', '1 year', 'N', 'Yellow goldish fruits that supports lots of energy for the body..', 44, 1, 12, 0),
(31, 12, 'Brinjal', '3 weeks', 'N', 'Brinjal..the vegetable that supplies nourishing contents .', 25, 1, 5, 0),
(32, 12, 'Brinjal Hybrid', '2 weeks', 'Y', 'hybrid brinjal', 12, 1, 10, 0),
(33, 12, 'White Brinjal', '1 month', 'Y', ' Hybrid White Brinjal', 5, 1, 9, 0),
(34, 12, 'Long Brinjal', '1 month', 'N', 'The Fruit resembles to long noses', 12, 1, 12, 0),
(35, 12, 'Violet Brinjal', '3 months', 'Y', 'Hybrid bulb brinjals', 5, 1, 15, 0),
(36, 12, 'Pineapple', '6 months', 'N', 'Pineapple that yields fruits quickly', 25, 1, 30, 0),
(37, 12, 'Chilly', '1 month', 'N', 'Spicy Chilly', 35, 1, 5, 1),
(38, 13, 'test', '1 month', 'N', 'test', 12, 2, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `seeds`
--
ALTER TABLE `seeds`
  ADD PRIMARY KEY (`seed_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1039;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `seed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
