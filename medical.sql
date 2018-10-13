-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 08:42 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockchain`
--

CREATE TABLE `blockchain` (
  `bill_no` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `dose` int(11) NOT NULL,
  `lot_number` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blockchain`
--

INSERT INTO `blockchain` (`bill_no`, `medicine_name`, `dose`, `lot_number`, `price`, `quantity`, `total_price`) VALUES
(141, 'hai', 2, 1, 1.8, 2, 3.6),
(2, 'hai', 2, 1, 1.8, 3, 5.4),
(2, 'hai', 2, 1, 1.8, 3, 5.4),
(12, 'hai', 2, 1, 1.8, 3, 5.4),
(99, 'hai', 2, 1, 1.8, 100, 180),
(99, 'hai', 2, 1, 1.8, 100, 180),
(123, 'hai', 2, 1, 1.8, 1, 1.8),
(123, 'hai', 2, 1, 1.8, 1, 1.8),
(99, 'hai', 2, 1, 1.8, 0, 0),
(35, 'Paracetamal', 1, 3, 1.35, 2, 2.7),
(35, 'Paracetamal', 1, 3, 1.35, 2, 2.7),
(35, 'hai', 2, 1, 1.8, 2, 3.6),
(912, 'Paracetamal', 1, 3, 1.35, 2, 2.7),
(44, 'ointment', 30, 4, 27, 1, 27),
(444444, 'betnowyte', 3, 5, 45, 1, 45),
(777, 'haemoglobin tablets', 20, 6, 9, 4, 36),
(9999, 'DECOLD', 40, 9, 18, 3, 54),
(9999, 'hai', 2, 1, 1.8, 3, 5.4),
(353, 'dollo', 650, 10, 9, 5, 45),
(353, '', 0, 7, 0, 5, 0),
(353, 'ointment', 30, 4, 27, 5, 135);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `roll_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bill_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`roll_no`, `name`, `bill_no`) VALUES
(45, 'abishek', 12),
(47, 'gowtham', 99),
(1212, 'qwqwq', 191),
(4444, 'hhhh', 444444),
(156171, 'haiiiii', 44),
(1111111, 'hd', 35),
(1601001, 'nilavan', 777),
(1601007, 'dh', 151),
(1601010, 'yeswa', 123),
(1601014, 'anish', 181),
(1601053, 'Hesen', 121),
(1601063, 'suvab', 9999),
(1601111, 'aakash', 912),
(16010353, 'Nivas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'nivas', 'nivas');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

CREATE TABLE `medicine_stock` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_stock`
--

INSERT INTO `medicine_stock` (`id`, `medicine_name`, `quantity`, `expiry_date`, `price`) VALUES
(2, 'e', 1, '2018-03-07', 1),
(3, 'e', 1, '2018-03-07', 1),
(4, 'e', 1, '2018-03-07', 1),
(5, 'e', 1, '2018-03-07', 1),
(6, 'Paracetamal', 20, '1998-09-12', 23),
(7, 'Paracetamal', 20, '1998-09-12', 23),
(8, 'Paracetamal', 20, '1998-09-12', 23),
(9, 'Paracetamal', 20, '1998-09-12', 23),
(10, 'Paracetamal', 20, '1998-09-12', 23),
(11, 'Paracetamal', NULL, '1998-09-12', 23),
(12, 'Paracetamal', NULL, '1998-09-12', 23),
(13, '1', 1, '0001-01-01', 1),
(14, '1', 1, '0001-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `lot_number` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `Dose` int(11) NOT NULL,
  `No_of_medicines` int(11) NOT NULL,
  `No_of_boxes` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`lot_number`, `medicine_name`, `Dose`, `No_of_medicines`, `No_of_boxes`, `Price`, `Expiry_date`) VALUES
(1, 'hai', 2, 2, 2, 2, '0002-02-02'),
(2, 'dhanu', 2, 0, 3, 3, '0003-03-03'),
(3, 'Paracetamal', 1, 39, 1, 1.5, '2018-03-31'),
(4, 'ointment', 30, 64, 4, 30, '2018-03-31'),
(5, 'betnowyte', 3, 89, 7, 50, '2018-08-25'),
(6, 'haemoglobin tablets', 20, 96, 50, 10, '2018-09-01'),
(9, 'DECOLD', 40, 85, 7, 20, '2018-09-29'),
(10, 'dollo', 650, 95, 4, 10, '2018-03-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`lot_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
