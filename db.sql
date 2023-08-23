-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 08:41 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourntravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `details`
-- (See below for the actual view)
--
CREATE TABLE `details` (
);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `usermail` varchar(50) NOT NULL,
  `book_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_of_ppl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pid`, `tid`, `usermail`, `book_date`, `no_of_ppl`) VALUES
(11, 1, 'munish@gmail.com', '2019-05-11 18:30:00', 1),
(14, 6, 'anthony@gmail.com', '2017-07-19 18:30:00', 2),
(15, 4, 'anthony@gmail.com', '2018-03-25 18:30:00', 2),
(16, 5, 'munish@gmail.com', '2019-02-10 18:30:00', 6),
(17, 3, 'anthony@gmail.com', '2019-02-10 18:30:00', 6),
(19, 6, 'anthony@gmail.com', '2019-05-10 18:30:00', 4),
(20, 1, 'munish@gmail.com', '2019-08-19 18:30:00', 5),
(21, 3, 'anthony@gmail.com', '2019-08-19 18:30:00', 15),
(26, 6, 'anthony@gmail.com', '2019-08-19 18:30:00', 2),
(27, 4, 'munish@gmail.com', '2019-08-09 18:30:00', 5),
(36, 7, 'munish@gmail.com', '2019-09-01 18:30:00', 4),
(37, 5, 'munish@gmail.com', '2019-09-02 18:30:00', 4),
(38, 6, 'nitant@gmail.com', '2019-09-27 10:25:21', 2),
(39, 4, 'rahil@gmail.com', '2019-09-27 12:31:39', 2);

--
-- Triggers `package`
--
DELIMITER $$
CREATE TRIGGER `t1` AFTER INSERT ON `package` FOR EACH ROW update tourdetails set total_capacity=total_capacity - new.no_of_ppl where tid=new.tid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tour`
-- (See below for the actual view)
--
CREATE TABLE `tour` (
);

-- --------------------------------------------------------

--
-- Table structure for table `tourdetails`
--

CREATE TABLE `tourdetails` (
  `tid` int(11) NOT NULL,
  `place` char(50) NOT NULL,
  `hotel` varchar(50) NOT NULL,
  `features` varchar(300) NOT NULL,
  `food` char(50) NOT NULL,
  `type` char(50) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_capacity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourdetails`
--

INSERT INTO `tourdetails` (`tid`, `place`, `hotel`, `features`, `food`, `type`, `cost`, `from_date`, `to_date`, `total_capacity`, `image`) VALUES
(1, 'KERELA', 'coconut lagoon', 'Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer', 'veg/non veg', 'monsoon', 20000, '2019-04-01', '2019-04-10', 45, 'coorg-hill-station1.jpg'),
(3, 'himachal pradesh', 'mahindra', 'Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer', 'veg', 'summer', 20000, '2019-09-01', '2019-09-11', 35, 'IMG-20190118-WA0002.jpg'),
(4, 'ladakh', 'holiday inn', 'Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer', 'veg/non veg', 'spring', 25000, '2019-08-01', '2019-08-12', 43, 'coorg-hill-station1.jpg'),
(5, 'manali', 'grand', 'Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer', 'veg', 'summer', 20000, '2019-07-08', '2019-07-15', 46, 'images.jpg'),
(6, 'rishikesh', 'serenity', 'Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer', 'veg/non veg', 'spring', 14000, '2019-06-10', '2019-06-21', 44, 'IMG-20190118-WA0002.jpg'),
(7, 'karnataka', 'peninsula', 'Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer', 'veg', 'monsoon', 12500, '2019-05-19', '2019-05-28', 46, 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` char(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `name`, `phone`, `password`) VALUES
(3, 'nitant@gmail.com', 'nitant', 8974562178, 'world'),
(4, 'anthony@gmail.com', 'anthony', 8169181377, 'root'),
(5, 'munish@gmail.com', 'munish', 8691011931, 'admin'),
(7, 'rahil@gmail.com', 'rahil', 8169181377, 'rahil');

-- --------------------------------------------------------

--
-- Structure for view `details`
--
DROP TABLE IF EXISTS `details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `details`  AS  select `package`.`pid` AS `pid`,`package`.`tid` AS `tid`,`package`.`uid` AS `uid`,`package`.`book_date` AS `book_date`,`package`.`no_of_ppl` AS `no_of_ppl`,`package`.`cost` AS `cost` from `package` ;

-- --------------------------------------------------------

--
-- Structure for view `tour`
--
DROP TABLE IF EXISTS `tour`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tour`  AS  select `package`.`pid` AS `pid`,`package`.`tid` AS `tid`,`tourdetails`.`place` AS `place`,`package`.`book_date` AS `book_date`,`package`.`cost` AS `cost` from (`tourdetails` join `package`) where `package`.`tid` = `tourdetails`.`tid` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `tourdetails`
--
ALTER TABLE `tourdetails`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tourdetails`
--
ALTER TABLE `tourdetails`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tourdetails` (`tid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
