-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 05:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neopro`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `horasfabrica` int(11) NOT NULL,
  `horasteste` int(11) NOT NULL,
  `servicosemcampo` int(11) NOT NULL,
  `servicosemgarantia` int(11) NOT NULL,
  `projetoeletrico` int(11) NOT NULL,
  `projetomecanico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `horasfabrica`, `horasteste`, `servicosemcampo`, `servicosemgarantia`, `projetoeletrico`, `projetomecanico`) VALUES
(1, 10, 10, 1, 1, 2, 5),
(2, 1, 1, 1, 1, 1, 2),
(3, 2, 3, 4, 5, 6, 7),
(4, 2, 3, 4, 5, 6, 7),
(5, 2, 3, 5, 4, 12, 9),
(6, 2, 3, 1, 46, 5, 4),
(7, 2, 3, 1, 46, 5, 4),
(8, 2, 3, 4, 5, 68, 7),
(9, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0),
(11, 2, 3, 4, 5, 68, 7),
(12, 2, 3, 1, 46, 5, 4),
(13, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `nome`, `funcao`, `valor`) VALUES
(3, 'marcos', 'marceneiro', '150');

-- --------------------------------------------------------

--
-- Table structure for table `projetos`
--

CREATE TABLE `projetos` (
  `id` int(6) UNSIGNED NOT NULL,
  `item` varchar(30) NOT NULL,
  `bu` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `statusp` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `engenheirochefe` varchar(30) NOT NULL,
  `gerentedeprojeto` varchar(30) NOT NULL,
  `cpm` varchar(30) NOT NULL,
  `projeto` varchar(30) NOT NULL,
  `os` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projetos`
--

INSERT INTO `projetos` (`id`, `item`, `bu`, `tipo`, `statusp`, `cliente`, `descricao`, `engenheirochefe`, `gerentedeprojeto`, `cpm`, `projeto`, `os`) VALUES
(1, '563', 'MC', 'PF', '0', 'SIEMENSCO', 'SiemensELETROMECANICO', 'JUCIO COSTA', 'KARA GOMES', 'DE OLIVEIRA, JULIA', 'P', '0');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `administrador`) VALUES
(1, 'jucio', '123', 0),
(2, 'leandro', 'leandro@123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
