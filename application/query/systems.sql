-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Fev-2022 às 14:32
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `order`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `systems`
--

CREATE TABLE `systems` (
  `systems_id` int(11) NOT NULL,
  `systems_company_name` varchar(145) DEFAULT NULL,
  `systems_trading_name` varchar(145) DEFAULT NULL,
  `systems_en` varchar(25) DEFAULT NULL,
  `systems_ie` varchar(25) DEFAULT NULL,
  `systems_phone_home` varchar(25) DEFAULT NULL,
  `systems_phone_mobile` varchar(25) NOT NULL,
  `systems_email` varchar(100) DEFAULT NULL,
  `systems_site_url` varchar(100) DEFAULT NULL,
  `systems_zip_code` varchar(25) DEFAULT NULL,
  `systems_address` varchar(145) DEFAULT NULL,
  `systems_number` varchar(25) DEFAULT NULL,
  `systems_city` varchar(45) DEFAULT NULL,
  `systems_state` varchar(2) DEFAULT NULL,
  `systems_txt_service_order` tinytext DEFAULT NULL,
  `systems_data_changed` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `systems`
--

INSERT INTO `systems` (`systems_id`, `systems_company_name`, `systems_trading_name`, `systems_en`, `systems_ie`, `systems_phone_home`, `systems_phone_mobile`, `systems_email`, `systems_site_url`, `systems_zip_code`, `systems_address`, `systems_number`, `systems_city`, `systems_state`, `systems_txt_service_order`, `systems_data_changed`) VALUES
(1, 'MX Target Corp', 'MX Target System Corporations ', '50.388.234/0001-40', NULL, NULL, '', 'mxtargetcorporations@order.com.br', 'http://localhost/order/', '80428000', 'Avenue of Programming ', '02', 'RJ', 'RJ', NULL, '2022-02-11 12:06:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`systems_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `systems`
--
ALTER TABLE `systems`
  MODIFY `systems_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
