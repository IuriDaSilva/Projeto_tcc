-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2020 às 02:31
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
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `title`, `details`, `start`, `end`, `id_sala`, `id_usuario`) VALUES
(1, 'Reunião 1', 'Reunião dos professores', '2020-11-23 16:00:00', '2020-11-23 18:00:00', 1, 0),
(2, 'Reunião 2', 'Reunião dos responsáveis', '2020-11-24 15:00:00', '2020-11-24 18:00:00', 1, 0),
(11, 'Reunião 4', 'Reunião dos professores', '2020-12-09 10:00:00', '2020-12-09 12:00:00', 6, 0),
(17, 'Reunião 6 ', 'Reunião dos responsáveis', '2020-12-14 10:00:00', '2020-12-18 12:00:00', 6, 0),
(22, 'Aula 3', 'Aula adicional de informática', '2020-12-14 11:00:00', '2020-12-17 12:00:00', 3, 0),
(23, 'Reunião 7', 'Reunião dos responsáveis', '2020-12-21 09:00:00', '2020-12-21 11:00:00', 2, 0),
(25, 'Reunião 9', 'Reunião dos responsáveis', '2020-12-28 10:00:00', '2020-12-29 11:00:00', 2, 0),
(27, 'Reunião 8', 'Aula adicional de informática', '2020-12-28 12:00:00', '2020-12-28 13:00:00', 3, 0),
(29, 'Aula 1', 'Aula adicional de informática', '2020-11-16 10:00:00', '2020-11-20 12:00:00', 3, 0),
(31, 'Conferência 1', 'Conferência de alunos e professores', '2020-11-02 10:00:00', '2020-11-06 14:00:00', 1, 0),
(32, 'Conferência 2', 'Conferência de alunos e professores', '2020-11-09 09:00:00', '2020-11-13 13:00:00', 2, 0);

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
(1, 1001, 'Audi 01', 'Auditório', 'Auditório com 20 lugares'),
(2, 1002, 'Audi 02', 'Auditório', 'Auditório com 30 lugares'),
(3, 1003, 'Lab 01', 'Laboratório', 'Auditório com 30 lugares'),
(4, 1004, 'Lab 02', 'Laboratório', 'Laboratório com 40 lugares'),
(6, 1006, 'Lab 03', 'Laboratório', 'Laboratório com 40 lugares'),
(7, 1005, 'Audi 03', 'Auditório', 'Auditório com 40 lugares'),
(12, 1006, 'Lab 03', 'Laboratório', 'Laboratório com 40 vagas');

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
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `matricula`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `cargo`, `nome_usuario`, `senha`) VALUES
(2, 1002, 'Iuri da Silva Nascimento', '163.722.83-60', '27992955', 'iuri481@gmail.com', 'Rua Tulipa, 103', 'Coordenador', 'iuriSilva', '123456'),
(5, 1005, 'Eduardo Santos', '777.999.333-11', '5555-9999', 'eduardo@email.com', 'Rua Dalmacio Duarte Neves, 59', 'Coordenador', 'edaurdoSantos', ''),
(8, 1006, 'Samantha Macedo', '555.999.111-77', '9999-7777', 'samantha@email.com', 'Estrada da Palhada nº 3114', 'Coordenador', 'samantaMacedo', ''),
(22, 2001, 'Aurelio Martins', '852.963.741-45', '85297456', 'aurelio@email.com', 'Rua Fortunato nº 264', 'Professor', 'aurelioMartins', ''),
(33, 2020, 'Pedro Oliveira', '865.942.764-82', '85239658', 'pedro@email.com', 'Rua Palmira nº 40 e 50', 'Professor', 'pedroOliveira', ''),
(34, 2002, 'Abner Silva ', '605.869.413-20', '3256-4487', 'abner@email.com', 'Rua Coronel Monteiro de\r\nBarros, 534', 'Professor', 'abnerSilva', '000000'),
(35, 2003, 'Danielle Mendonça ', '447.293.458-27', '2660-3705', 'danielle@email.com', 'Rua Paulo Oliveira de\r\nCarvalho, 25', 'Professor', 'danilleMendonça', '123456'),
(36, 2004, 'Fabrício Rodrigues', '456.155.878-06', '3768-9316', 'fabricio@email.com', 'Rua Carlos Frahia nº 131', 'Professor', 'fabricioRodrigues', '123456'),
(37, 2005, 'Clara de Souza', '509.626.998-10', '2657-4009', 'clara@email.com', 'Rua Campista nº 01', 'Professor', 'claraSouza', '123456'),
(38, 1007, 'Flávia Dantas', '471.732.008-57', '3794-1391', 'falvia@email.com', 'Praça Sebastião Felipe nº 21', 'Coordenador', 'flaviaDantas', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservas_ibfk_2` (`id_sala`);

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
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
