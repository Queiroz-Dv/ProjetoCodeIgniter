-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Feb-2022 às 07:52
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Definition of table `system`
--

CREATE TABLE `system` (
  `system_id` int(11) NOT NULL,
  `system_social_reason` varchar(145) DEFAULT NULL,
  `system_fantasy_name` varchar(145) DEFAULT NULL,
  `system_cnpj` varchar(25) DEFAULT NULL,
  `system_ie` varchar(25) DEFAULT NULL,
  `system_phone_home` varchar(25) DEFAULT NULL,
  `system_phone_mobile` varchar(25) NOT NULL,
  `system_email` varchar(100) DEFAULT NULL,
  `system_site_url` varchar(100) DEFAULT NULL,
  `system_cep` varchar(25) DEFAULT NULL,
  `system_address` varchar(145) DEFAULT NULL,
  `system_number` varchar(25) DEFAULT NULL,
  `system_city` varchar(45) DEFAULT NULL,
  `system_state` varchar(2) DEFAULT NULL,
  `system_txt_service_order` tinytext,
  `system_data_changed` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`system_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `system_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
