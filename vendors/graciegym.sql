-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `graciegym`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletas`
--

CREATE TABLE IF NOT EXISTS `atletas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` timestamp NULL DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `atestado_medico` tinyint(1) DEFAULT '0',
  `ocupacao` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faixas`
--

CREATE TABLE IF NOT EXISTS `faixas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(45) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao`
--

CREATE TABLE IF NOT EXISTS `graduacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` date DEFAULT NULL,
  `atletas_id` int(11) NOT NULL,
  `faixas_id` int(11) NOT NULL,
  `fim` date DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `graus` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`faixas_id`),
  KEY `fk_graduar_atletas1_idx` (`atletas_id`),
  KEY `fk_graduar_faixas1_idx` (`faixas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vencimento` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` timestamp NULL DEFAULT NULL,
  `valor` decimal(15,2) DEFAULT NULL,
  `atletas_id` int(11) NOT NULL,
  `modalidades_id` int(11) NOT NULL,
  `Horarios` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`atletas_id`),
  KEY `fk_matriculas_atletas1_idx` (`atletas_id`),
  KEY `fk_matriculas_modalidades1_idx` (`modalidades_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidades`
--

CREATE TABLE IF NOT EXISTS `mensalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '0',
  `matriculas_id` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `valor_pago` decimal(15,2) DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `atletas_id` int(11) NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  PRIMARY KEY (`id`,`matriculas_id`,`atletas_id`),
  KEY `fk_mensalidades_matriculas1_idx` (`matriculas_id`),
  KEY `fk_mensalidades_atletas1_idx` (`atletas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

CREATE TABLE IF NOT EXISTS `modalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`perfil_id`),
  KEY `fk_usuarios_perfil_idx` (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `graduacao`
--
ALTER TABLE `graduacao`
  ADD CONSTRAINT `fk_graduar_atletas1` FOREIGN KEY (`atletas_id`) REFERENCES `atletas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_graduar_faixas1` FOREIGN KEY (`faixas_id`) REFERENCES `faixas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_matriculas_atletas1` FOREIGN KEY (`atletas_id`) REFERENCES `atletas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matriculas_modalidades1` FOREIGN KEY (`modalidades_id`) REFERENCES `modalidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  ADD CONSTRAINT `fk_mensalidades_atletas1` FOREIGN KEY (`atletas_id`) REFERENCES `atletas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensalidades_matriculas1` FOREIGN KEY (`matriculas_id`) REFERENCES `matriculas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
