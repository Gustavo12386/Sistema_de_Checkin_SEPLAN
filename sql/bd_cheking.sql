-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/01/2024 às 13:59
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_cheking`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data` date DEFAULT NULL,
  `inicio` time DEFAULT NULL,
  `fim` time DEFAULT NULL,
  `obs` varchar(500) DEFAULT NULL,
  `keypass` varchar(100) DEFAULT NULL,
  `organizador` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `data`, `inicio`, `fim`, `obs`, `keypass`, `organizador`) VALUES
(6, 'Teste 2', '2023-11-30', '08:00:00', '12:00:00', 'jkhkjhk', 'c81e728d9d4c2f636f067f89cc14862c', 'Valnei'),
(9, 'Evento Fim de Ano', '2024-12-25', '14:00:00', '18:00:00', 'ffggfg', 'c9f0f895fb98ab9159f51fd0297e236d', 'Teste'),
(12, 'Evento Teste Final', '2024-03-04', '14:30:00', '16:00:00', 'Teste.\'dsfdsfsd\'dfd', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'APG SEPLAN');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orgao`
--

CREATE TABLE `orgao` (
  `id_orgao` int(20) NOT NULL,
  `nome_orgao` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `orgao`
--

INSERT INTO `orgao` (`id_orgao`, `nome_orgao`) VALUES
(1, 'CONDER'),
(2, 'PGE'),
(3, 'PRODEB'),
(4, 'SAEB'),
(5, 'SDE'),
(6, 'SDR'),
(7, 'SEADES'),
(8, 'SEAGRI'),
(9, 'SEAP'),
(10, 'SEDUR'),
(11, 'SEC'),
(12, 'SECOM'),
(13, 'SECTI'),
(14, 'SECULT'),
(15, 'SEFAZ'),
(16, 'SEINFRA'),
(17, 'SEMA'),
(18, 'SEPLAN'),
(19, 'SEPROMI'),
(20, 'SESAB'),
(21, 'SETRE'),
(22, 'SETUR'),
(23, 'SIHS'),
(24, 'SJDHDS'),
(25, 'SPM'),
(26, 'SERIN'),
(27, 'SSP'),
(28, 'SUDEC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `nome_evento` varchar(255) NOT NULL,
  `nome_participante` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `orgao` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `participantes`
--

INSERT INTO `participantes` (`id`, `id_participante`, `nome_evento`, `nome_participante`, `cpf`, `email`, `telefone`, `orgao`, `cargo`) VALUES
(9, 3, 'Evento Fim de Ano', 'Gustavo', '05905891567', 'email@email.com', '(71) 98139-5576', 'SEPLAN', 'Cargo'),
(9, 29, 'Evento Fim de Ano', 'kjjkj', '922.040.075-87', 'tes@t.com', '(89) 78987-8978', 'CONDER', 'hgfghf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(144) DEFAULT NULL,
  `email` varchar(144) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin@email.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `orgao`
--
ALTER TABLE `orgao`
  ADD PRIMARY KEY (`id_orgao`);

--
-- Índices de tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_participante`),
  ADD KEY `fk_evento` (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `orgao`
--
ALTER TABLE `orgao`
  MODIFY `id_orgao` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `fk_evento` FOREIGN KEY (`id`) REFERENCES `evento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
