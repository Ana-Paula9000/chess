-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2016 às 06:22
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chessmaster`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `id_branco` varchar(255) NOT NULL,
  `id_preto` varchar(255) NOT NULL,
  `minutos` int(11) NOT NULL,
  `segundos` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `rating_branco` int(11) NOT NULL,
  `rating_preto` int(11) NOT NULL,
  `rating_resultado_branco` int(11) NOT NULL,
  `rating_resultado_preto` int(11) NOT NULL,
  `resultado` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `id_branco`, `id_preto`, `minutos`, `segundos`, `tipo`, `data`, `rating_branco`, `rating_preto`, `rating_resultado_branco`, `rating_resultado_preto`, `resultado`) VALUES
(1, '2', '1', 10, 0, 'Pontos', '2016-10-29 19:33:13', 1200, 1200, 50, 50, '0-1'),
(2, '1', '2', 10, 0, 'Pontos', '2016-10-29 20:22:41', 1200, 1200, 50, 50, '0-1'),
(3, '1', '2', 10, 0, 'Pontos', '2016-10-29 20:26:38', 1200, 1200, 50, 50, '0-1'),
(4, '2', '1', 10, 0, 'Pontos', '2016-10-29 20:27:45', 1200, 1200, 50, 50, '0-1'),
(5, '1', '2', 10, 0, 'Pontos', '2016-10-29 20:30:26', 1205, 1195, -5, 5, '0-1'),
(6, '2', '1', 3, 0, 'Pontos', '2016-10-29 20:33:40', 1200, 1200, -5, 5, '0-1'),
(8, '1', '2', 3, 0, 'Pontos', '2016-10-29 20:34:47', 1205, 650, -10, 10, '0-1'),
(9, '1', '2', 10, 0, 'Pontos', '2016-11-06 03:16:36', 1200, 0, 0, 0, ''),
(10, '1', '', 10, 0, 'Pontos', '2016-11-06 03:25:51', 1200, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo_movimentos`
--

CREATE TABLE `jogo_movimentos` (
  `id` int(11) NOT NULL,
  `id_jogo` varchar(255) NOT NULL,
  `movimento` varchar(255) NOT NULL,
  `branco` varchar(1) NOT NULL,
  `preto` varchar(1) NOT NULL,
  `fen` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `rapid` int(11) NOT NULL,
  `blitz` int(11) NOT NULL,
  `bullet` int(11) NOT NULL,
  `correspondence` int(11) NOT NULL,
  `data_ins` date NOT NULL,
  `url` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `rapid`, `blitz`, `bullet`, `correspondence`, `data_ins`, `url`, `foto`) VALUES
(1, 'Icaro Roberto', 'icaroroberto@me.com', '123456', 1200, 1195, 1200, 1200, '2016-10-29', 'Icaro-Roberto', ''),
(2, 'Click Convert', 'contato@clickconvert.com.br', '123456', 1200, 660, 1200, 1200, '2016-10-29', 'Click-Convert', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jogo_movimentos`
--
ALTER TABLE `jogo_movimentos`
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
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jogo_movimentos`
--
ALTER TABLE `jogo_movimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
