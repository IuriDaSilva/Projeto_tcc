-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2020 às 22:42
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
-- Banco de dados: `bd_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descricao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id_sala`, `codigo`, `nome`, `tipo`, `descricao`) VALUES
(1, 1001, 'Audi 01', 'Auditório', 'AAAAAAAA'),
(2, 1002, 'Audi 02', 'Auditório', 'AAAAAAAAAA'),
(3, 1003, 'Lab 01', 'Laboratório', 'BBBBBBBBb'),
(4, 1004, 'Lab 02', 'Laboratório', 'BBBBBBBBB');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `matricula`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `cargo`, `nome_usuario`, `senha`) VALUES
(2, 1002, 'Iuri da Silva Nascimento', '111.222.333-44', '27992955', 'iuri481@gmail.com', 'Rua Tulipa, 103', '0', 'iuriSilva', '123456'),
(5, 1005, 'Eduardo Santos', '777.999.333-11', '5555-9999', 'eduardo@email.com', 'Rua ABC, 205', '1', 'edaurdoSantos', '745896'),
(8, 1006, 'Samanta Macedo', '555.999.111-77', '9999-7777', 'samanta@email.com', 'Rua xyz, 1005', '0', 'samantaMacedo', '147852'),
(16, 3333, 'CCCCCCC', '333.666.999-77', '3333-5555', 'cccc@cccc.com', 'Rua Trq, 2020', 'Coordenador', 'CCCC', '123'),
(17, 1012, 'Aurelio Martins', '741.852.963-99', '+5585297456', 'aurelio@email.com', 'Rua Trq, 2020', 'Professor', 'aurelioMartins', '123456'),
(18, 1022, 'Carol Amaral', '852.741.963-33', '36985214', 'carol@email.com', 'Rua JK, 2000', 'Professor', 'carolAmaral', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
