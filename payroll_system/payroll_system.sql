-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 08:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gaji_pokok` decimal(10,2) NOT NULL,
  `bonus_kinerja` decimal(10,2) NOT NULL,
  `uang_makan` decimal(10,2) NOT NULL,
  `tunjangan` decimal(10,2) NOT NULL,
  `pulsa` decimal(10,2) NOT NULL,
  `bensin` decimal(10,2) NOT NULL,
  `operasi` decimal(10,2) NOT NULL,
  `grooming` decimal(10,2) NOT NULL,
  `jaga_malam` decimal(10,2) NOT NULL,
  `pet_taxi` decimal(10,2) NOT NULL,
  `asisten` decimal(10,2) NOT NULL,
  `emergency` decimal(10,2) NOT NULL,
  `lain_lain` decimal(10,2) NOT NULL,
  `cash_bond` decimal(10,2) NOT NULL,
  `potongan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nama`, `gaji_pokok`, `bonus_kinerja`, `uang_makan`, `tunjangan`, `pulsa`, `bensin`, `operasi`, `grooming`, `jaga_malam`, `pet_taxi`, `asisten`, `emergency`, `lain_lain`, `cash_bond`, `potongan`) VALUES
(1, 'Danang', 6750000.00, 600000.00, 500000.00, 400000.00, 150000.00, 150000.00, 0.00, 0.00, 0.00, 0.00, 450000.00, 75000.00, 0.00, 100000.00, 0.00),
(2, 'Sari', 6750000.00, 600000.00, 500000.00, 400000.00, 150000.00, 200000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 150000.00, 700000.00, 226500.00, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
