-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Dez-2015 às 01:12
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `submit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `envios`
--

CREATE TABLE IF NOT EXISTS `envios` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `chave_usuario` int(11) NOT NULL,
  `chave_prova` int(11) NOT NULL,
  `chave_questao` int(11) NOT NULL,
  `envio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `posicao` int(11) NOT NULL,
  `numero_envio` int(11) NOT NULL,
  `hora_envio` time NOT NULL,
  `nota` int(11) NOT NULL,
  `ultimo` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chave_usuario` int(11) NOT NULL,
  `chave_prova` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `tempo` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE IF NOT EXISTS `provas` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `senha` char(5) NOT NULL,
  `qtd_questoes` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `chave_prova` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `peso` int(11) NOT NULL,
  `exemplo_entrada` char(255) NOT NULL,
  `exemplo_saida` char(255) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome_grupo` varchar(50) NOT NULL,
  `membros` varchar(550) NOT NULL,
  `permicao` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`code`, `login`, `senha`, `nome_grupo`, `membros`, `permicao`) VALUES
(1, 'Submit_administrator', 'Sudo@Submit', '', '', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
