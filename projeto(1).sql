-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jan-2019 às 20:33
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao_grupos`
--

CREATE TABLE `permissao_grupos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao_grupos`
--

INSERT INTO `permissao_grupos` (`id`, `nome`) VALUES
(1, 'Super Administrador'),
(2, 'Diretoria'),
(5, 'Funcionários Engenharia'),
(8, 'Funcionários Administrativos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao_itens`
--

CREATE TABLE `permissao_itens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao_itens`
--

INSERT INTO `permissao_itens` (`id`, `nome`, `slug`) VALUES
(1, 'Criar Cadastro Login', 'criar_cadastro_login'),
(2, 'Ver Permissões', 'ver_permissoes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao_links`
--

CREATE TABLE `permissao_links` (
  `id` int(11) NOT NULL,
  `id_permissao_grupo` int(11) NOT NULL,
  `id_permissao_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao_links`
--

INSERT INTO `permissao_links` (`id`, `id_permissao_grupo`, `id_permissao_item`) VALUES
(23, 1, 1),
(24, 1, 2),
(25, 2, 1),
(26, 2, 2),
(28, 8, 2),
(54, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_permissao` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `id_permissao`, `email`, `senha`, `nome`, `admin`, `token`) VALUES
(1, 1, 'lucas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lucas Passos', 1, 'ec79cb7bfab8de39fc2a8691803dd7a9'),
(3, 5, 'teste@teste', '', '', 0, NULL),
(4, 1, 'adm@adm.com', 'a6de001ef62a2a46ce3e3156df37937d', 'Administrador', 1, '49b5e7be2d0bb2350d5465420e011f54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissao_grupos`
--
ALTER TABLE `permissao_grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissao_itens`
--
ALTER TABLE `permissao_itens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissao_links`
--
ALTER TABLE `permissao_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissao_grupos`
--
ALTER TABLE `permissao_grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissao_itens`
--
ALTER TABLE `permissao_itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissao_links`
--
ALTER TABLE `permissao_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
