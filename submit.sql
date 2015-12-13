-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2015 às 12:56
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
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Extraindo dados da tabela `envios`
--

INSERT INTO `envios` (`code`, `chave_usuario`, `chave_prova`, `chave_questao`, `envio`, `posicao`, `numero_envio`, `hora_envio`, `nota`) VALUES
(59, 1, 42, 38, 'marco costa', 1, 2, '00:56:14', 0),
(60, 1, 42, 38, 'adwdwa', 1, 2, '01:19:58', -1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`code`, `senha`, `qtd_questoes`, `data`, `hora_inicio`, `hora_fim`, `status`) VALUES
(35, 'abcd', 2, '2015-12-08', '00:00:00', '23:59:00', 1),
(36, 'root', 10, '2015-12-10', '00:00:00', '23:30:00', 1),
(37, 'Queme', 3, '2015-12-09', '00:00:09', '05:00:00', 1),
(39, 'bota', 3, '2015-12-09', '00:00:09', '05:00:00', 1),
(40, '3edc', 3, '2015-12-11', '10:47:00', '10:50:00', 1),
(41, '4rfv', 2, '2015-12-11', '10:54:00', '10:58:00', 1),
(42, '5tgb', 2, '2015-12-11', '13:00:00', '15:40:00', 1),
(43, 'costa', 3, '2015-12-12', '00:00:00', '22:50:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`code`, `chave_prova`, `enunciado`, `exemplo_entrada`, `exemplo_saida`) VALUES
(38, 42, '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '5236', '25'),
(39, 42, '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '12345', '15'),
(40, 43, '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '25', '15'),
(41, 43, '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '25', '15'),
(42, 43, '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '25', '15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`code`, `login`, `senha`, `nome_grupo`, `membros`, `permicao`) VALUES
(1, 'marcocosta', 'Natalia<3', '', '', 5),
(18, 'nataliasfranca', '123456789', '', '', 3),
(19, 'familiacosta', 'osmar', 'Buscape', 'matheus,nelza,osmar,maycon,marco costa', 1),
(20, 'natalia.franca', '1234', 'teste', 'natalia, joÃ£o, maria, tesla, matheus', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
