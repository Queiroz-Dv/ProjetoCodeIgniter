-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2020 às 22:06
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
-- Database: `outros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `clients_id` int(11) NOT NULL,
  `clients_register_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `clients_type` tinyint(1) DEFAULT NULL,
  `clients_first_name` varchar(45) NOT NULL,
  `clients_last_name` varchar(150) NOT NULL,
  `clients_birthday` date NOT NULL,
  `clients_cpf_cnpj` varchar(20) NOT NULL,
  `clients_rg_ie` varchar(20) NOT NULL,
  `clients_email` varchar(50) NOT NULL,
  `clients_telephone` varchar(20) NOT NULL,
  `clients_phone` varchar(20) NOT NULL,
  `clients_zip_code` varchar(10) NOT NULL,
  `clients_address` varchar(155) NOT NULL,
  `clients_number` varchar(20) NOT NULL,
  `clients_district` varchar(45) NOT NULL,
  `clients_complement` varchar(145) NOT NULL,
  `clients_city` varchar(105) NOT NULL,
  `clients_state` varchar(2) NOT NULL,
  `clients_father_name` varchar(45) NOT NULL,
  `clients_mother_name` varchar(45) NOT NULL,
  `clients_active` tinyint(1) NOT NULL,
  `clients_obs` tinytext,
  `clients_change_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clients_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clients`
  MODIFY `clients_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
