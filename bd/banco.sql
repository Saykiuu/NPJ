-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jan-2021 às 20:22
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cpf` varchar(11) CHARACTER SET latin1 NOT NULL,
  `rg` varchar(15) CHARACTER SET latin1 NOT NULL,
  `ssp` varchar(50) CHARACTER SET latin1 NOT NULL,
  `dtnasc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `telefone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `estado_civil` varchar(50) CHARACTER SET latin1 NOT NULL,
  `profissao` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratario`
--

CREATE TABLE `contratario` (
  `id_contratario` int(11) NOT NULL,
  `ra_social` varchar(200) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cpf_cnpj` varchar(20) CHARACTER SET latin1 NOT NULL,
  `rg` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `ssp` varchar(20) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dprocessuais`
--

CREATE TABLE `dprocessuais` (
  `id_dprocessuais` int(11) NOT NULL,
  `v_causa` double NOT NULL,
  `dt_entrada` timestamp NOT NULL DEFAULT current_timestamp(),
  `link` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `obs` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `ass_primario` varchar(300) CHARACTER SET latin1 NOT NULL,
  `ass_secundario` varchar(500) CHARACTER SET latin1 NOT NULL,
  `relato` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `id_processo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_dprocessuais` int(11) NOT NULL,
  `id_contratario` int(11) NOT NULL,
  `cor` varchar(200) NOT NULL,
  `id_representante` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `representante`
--

CREATE TABLE `representante` (
  `id_representante` int(11) NOT NULL,
  `nome` varchar(200) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cpf` int(11) NOT NULL,
  `rg` varchar(15) CHARACTER SET latin1 NOT NULL,
  `ssp` varchar(50) CHARACTER SET latin1 NOT NULL,
  `dtnasc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `telefone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `estado_civil` varchar(20) CHARACTER SET latin1 NOT NULL,
  `profissao` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) CHARACTER SET latin1 NOT NULL,
  `gra` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `login` varchar(20) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(20) CHARACTER SET latin1 NOT NULL,
  `master` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `contratario`
--
ALTER TABLE `contratario`
  ADD PRIMARY KEY (`id_contratario`);

--
-- Índices para tabela `dprocessuais`
--
ALTER TABLE `dprocessuais`
  ADD PRIMARY KEY (`id_dprocessuais`);

--
-- Índices para tabela `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`id_processo`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_dprocessuais` (`id_dprocessuais`),
  ADD KEY `id_contratario` (`id_contratario`),
  ADD KEY `id_representante` (`id_representante`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_representante`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contratario`
--
ALTER TABLE `contratario`
  MODIFY `id_contratario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dprocessuais`
--
ALTER TABLE `dprocessuais`
  MODIFY `id_dprocessuais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `processo`
--
ALTER TABLE `processo`
  MODIFY `id_processo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `representante`
--
ALTER TABLE `representante`
  MODIFY `id_representante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_contratario` FOREIGN KEY (`id_contratario`) REFERENCES `contratario` (`id_contratario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_dprocessuais` FOREIGN KEY (`id_dprocessuais`) REFERENCES `dprocessuais` (`id_dprocessuais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_representante` FOREIGN KEY (`id_representante`) REFERENCES `representante` (`id_representante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
