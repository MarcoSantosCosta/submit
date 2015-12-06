-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2015 às 03:30
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
  `numero_envio` int(11) NOT NULL,
  `hora_envio` time NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE IF NOT EXISTS `provas` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `senha` char(5) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`code`, `senha`, `data`, `hora_inicio`, `hora_fim`, `status`) VALUES
(23, 'ABCD', '2015-12-05', '22:00:00', '00:00:00', 1),
(24, 'BCD', '2015-12-06', '00:01:00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `chave_prova` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `exemplo_entrada` char(25) NOT NULL,
  `exemplo_saida` char(25) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`code`, `chave_prova`, `enunciado`, `exemplo_entrada`, `exemplo_saida`) VALUES
(4, 23, 'Enunciado1', '5', '20'),
(5, 23, 'Enunciado2', '20', '5'),
(10, 23, 'Enunciado3', '15', '20'),
(11, 24, 'Enunciado 1', '20', '25'),
(13, 24, 'Enunciado 1', '20', '25'),
(14, 24, 'Enunciado 1', '20', '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome_grupo` varchar(50) NOT NULL,
  `membros` varchar(550) NOT NULL,
  `permicao` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`code`, `login`, `senha`, `nome_grupo`, `membros`, `permicao`) VALUES
(1, 'marcocosta', 'Natalia<3', '', '', 2),
(3, '1', '', 'awdw', '', 1),
(4, 'Teste1', '123', 'TestÃ£o', '', 1),
(5, 'Teste1', '123', 'TestÃ£o', '', 1),
(6, 'Teste2', '123', 'TESTTTT', 'membro1,membro2', 1),
(7, 'marco', '123', 'joao', '', 1),
(8, 'Marco', '123', '', 'Membro1,membro2membros', 1),
(9, 'user1', '1', 'USB', 'membros,membros,membros e mais membros', 1),
(10, 'user1', '1', 'USB', 'membros,membros,membros e mais membros', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
