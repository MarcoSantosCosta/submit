-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2015 às 17:58
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
  `numero_envio` int(11) NOT NULL,
  `hora_envio` time NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `envios`
--

INSERT INTO `envios` (`code`, `chave_usuario`, `chave_prova`, `chave_questao`, `envio`, `numero_envio`, `hora_envio`, `nota`) VALUES
(17, 1, 25, 15, 'Teste:1\r\nEnvio:1 \r\nQuestÃ£o:1', 1, '03:36:01', 2),
(18, 1, 25, 16, 'Teste:1\r\nEnvio:1 \r\nQuestÃ£o:2', 1, '03:36:10', 1),
(19, 1, 25, 17, 'Teste:1\r\nEnvio:1 \r\nQuestÃ£o:3', 1, '03:36:19', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`code`, `senha`, `data`, `hora_inicio`, `hora_fim`, `status`) VALUES
(25, 'ABCD', '2015-12-06', '00:01:00', '00:00:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`code`, `chave_prova`, `enunciado`, `exemplo_entrada`, `exemplo_saida`) VALUES
(15, 25, 'Enunciado 1', '1', '2'),
(16, 25, 'Enunciado 2', '2', '3'),
(17, 25, 'Enunciado 3', '3', '4');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`code`, `login`, `senha`, `nome_grupo`, `membros`, `permicao`) VALUES
(1, 'marcocosta', 'Natalia<3', '', '', 5),
(11, 'Sudo', 'root', 'Grupo Teste 1', 'Membro 1, Membro 2 e Membro 3', 3),
(12, 'UserComum', 'user', 'GrupoComum', 'Membro1,Membro2 e Membro 3', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
