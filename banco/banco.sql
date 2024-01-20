-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Jan-2024 às 22:29
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

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
-- Estrutura da tabela `homenagem`
--

DROP TABLE IF EXISTS `homenagem`;
CREATE TABLE IF NOT EXISTS `homenagem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(100) NOT NULL,
  `idanimal` int NOT NULL,
  `descricao` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomeanimal` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nomeanimal` (`nomeanimal`(250))
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `homenagem`
--

INSERT INTO `homenagem` (`id`, `arquivo`, `idanimal`, `descricao`, `nomeanimal`) VALUES
(18, 'upload/65ac46de5668a', 0, 'aaaa', 'Alecrin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `idpet` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `nomepet` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data` varchar(15) NOT NULL,
  `ativo` char(3) DEFAULT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  PRIMARY KEY (`idpet`),
  KEY `id_usuario` (`id_usuario`),
  KEY `nomepet` (`nomepet`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`idpet`, `id_usuario`, `nomepet`, `data`, `ativo`, `latitude`, `longitude`) VALUES
(1, 6, 'Alecrin', '13/04/2023', 'sim', '-22.9942', '-47.5185'),
(5, 1, 'Toninho', '13/02/2023', 'nao', '-22.99415', '-47.5185'),
(3, 2, 'Tobby', '19/10/2023', 'sim', '-22.99425', '-47.5185'),
(4, 1, 'Joaquin', '07/11/2023', 'nao', '-22.99430', '-47.5185'),
(9, 8, 'Thor', '08/11/2023', 'sim', '-22.9943', '-47.5180');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitar`
--

DROP TABLE IF EXISTS `solicitar`;
CREATE TABLE IF NOT EXISTS `solicitar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nascimento` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `solicitar`
--

INSERT INTO `solicitar` (`id`, `nome`, `email`, `senha`, `nascimento`, `cpf`) VALUES
(1, '', '', '', '', ''),
(2, 'João de Amaral', 'aaa', 'aaa', 'aa', 'aa'),
(8, 'Antonio', 'antonio@gmail.com', '13112001', '18/02/1976', '898.797.792.02'),
(6, 'judas', 'tuninlin', '44', '13112001', '454.470.238-07'),
(7, 'Pedro', 'pedro@gmail.com', '13112001', '13112001', '185.258.858-40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(5, 'oi', 'aaa', '13112001'),
(6, 'a', 'a', 'a'),
(7, 'aa', 'aa', 'aaa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
