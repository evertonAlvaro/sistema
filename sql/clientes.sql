-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Fev-2016 às 02:32
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` int(1) NOT NULL DEFAULT '0',
  `dt_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `data_de_nascimento`, `cep`, `endereco`, `email`, `telefone`, `celular`, `matricula`, `login`, `senha`, `ativo`, `dt_cadastro`) VALUES
(2, 'Everton', '1992-10-21', '27460-000', 'Praça Fagundes Varela, Rio Claro - RJ', 'everton.alvaro@hotmail.com', '(24)33322-2111', '(24)99827-2737', '456789', 'everton', '200820e3227815ed1756a6b531e7e0d2', 1, '2016-02-21 14:39:18'),
(3, 'José da Silva', '1990-02-21', '91010-000', 'Passo D''Areia, Porto Alegre - RS', 'jose@hotmail.com', '(00)12345-678', '(00)98887-7777', '123456', 'jose', '200820e3227815ed1756a6b531e7e0d2', 1, '2016-02-21 16:46:10'),
(4, 'Arnaldo', '1988-02-15', '27460-000', 'Rio Claro - RJ', 'arnaldo@hotmail.com', '(00)33322-221', '(00)99888-7776', '321654', 'arnaldo', '200820e3227815ed1756a6b531e7e0d2', 1, '2016-02-21 17:56:36'),
(5, 'Fred', '1992-10-21', '27460-000', 'Praça Fagundes Varela, Rio Claro - RJ', 'everton.alvaro@hotmail.com', '(24)33322-2111', '(24)99827-2737', '987654', 'fred', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2016-02-21 21:31:00'),
(6, 'Pedro', '1994-05-02', '27475-000', 'Lídice - RJ', 'pedro@hotmail.com', '(24)33334-444', '(24)96666-5555', '654456', 'pedro', '200820e3227815ed1756a6b531e7e0d2', 1, '2016-02-21 22:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
