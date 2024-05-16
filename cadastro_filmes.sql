-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2024 às 00:28
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro_filmes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `filme` int(30) NOT NULL,
  `genero` int(3) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `ano` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`filme`, `genero`, `titulo`, `ano`) VALUES
(3, 1, '1312', 1331),
(4, 1, 'asddas', 1231);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `genero` int(3) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`genero`, `descricao`, `status`) VALUES
(1, 'comédia', 1),
(2, 'romance', 1),
(3, 'terror', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cpf`, `nome`, `senha`) VALUES
('123', 'Flávio', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`filme`),
  ADD KEY `genero` (`genero`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `filme` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `genero` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `filmes`
--
ALTER TABLE `filmes`
  ADD CONSTRAINT `filmes_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `generos` (`genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
