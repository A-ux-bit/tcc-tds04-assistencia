-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Ago-2021 às 02:45
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pomodoro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL,
  `nome` varchar(85) NOT NULL,
  `previsto` int(55) NOT NULL,
  `data` datetime NOT NULL,
  `Atividade` time(6) NOT NULL,
  `intervalo` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `nome`, `previsto`, `data`, `Atividade`, `intervalo`) VALUES
(23, 'intervalo', 8, '2022-06-22 00:00:00', '00:00:00.000000', '00:00:00.000000'),
(29, 'da', 6, '2021-07-31 00:00:00', '00:00:00.000000', '00:00:00.000000'),
(33, 'sas', 4, '2021-08-31 00:00:00', '00:00:00.000000', '00:00:00.000000'),
(34, 'trabalho', 5, '2021-07-31 00:00:00', '00:00:00.000000', '00:00:00.000000'),
(35, '', 0, '0000-00-00 00:00:00', '00:00:00.000000', '00:00:00.000000'),
(36, 'as', 5, '2021-09-02 00:00:00', '00:00:00.000000', '00:00:00.000000'),
(37, 'aula', 7, '2021-08-31 00:00:00', '00:00:00.000000', '00:00:00.000000'),
(39, 'as', 2, '2021-08-30 00:00:00', '21:36:00.000000', '01:38:00.000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(85) NOT NULL,
  `login` varchar(85) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(85) NOT NULL,
  `tipo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `email`, `tipo`) VALUES
(1, 'joao gabriel', 'teste', 'teste', 'teste@gmail.com', 'admin'),
(6, 'sda', 'es', 'asa', 'sada@email.com', 'normal'),
(7, 'Fernando', 'se', 'se', 'fernando@gmail.com', 'normal'),
(8, 'sa', 'sa', 'sa', 'sa@email.com', 'normal'),
(9, 'as', 'as', 'as', 'as@gamil.com', 'normal'),
(10, 'a', 'aa', 'a', 'a@a.com', 'normal'),
(11, 'leonarod', 'leonardo', 'leonardo', 'leonardo@gmail.com', 'admin'),
(12, 'alex', 'alex', 'alex', 'alex@email.com', 'admin'),
(13, 'de', 'de', 'de', 'de@de.com', 'normal'),
(14, 'da', 'sa', 'sa', 'sa@gmail.com', 'normal'),
(15, 'kleber', 'aooa', 'kleber', 'kleber@gmail.com', 'admin'),
(16, 'Cabo Daciolo', 'ursal', 'ursal', 'pe@email.com', 'normal'),
(17, 'alex', 'arisen', '21', 'al@gmail.com', ''),
(18, 'al', 'al', 'al', 'al@gmail.com', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
