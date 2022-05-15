-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Maio-2022 às 01:11
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_aula_tai`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '0',
  `data_inicio` varchar(15) NOT NULL DEFAULT '0',
  `hora_inicio` varchar(15) NOT NULL DEFAULT '0',
  `data_fim` varchar(15) NOT NULL,
  `hora_fim` varchar(15) NOT NULL DEFAULT '0',
  `localidade` varchar(80) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `titulo`, `data_inicio`, `hora_inicio`, `data_fim`, `hora_fim`, `localidade`, `descricao`) VALUES
(3, 'Festa Maluca', '2022-05-11', '19:30', '2022-05-15', '15:30', 'Itagiba', 'Festa muito legal'),
(5, 'Formatura Fulano', '2022-05-12', '14:00', '2022-05-23', '23:59', 'Faxinal dos Guedes', 'Loucuragem');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
