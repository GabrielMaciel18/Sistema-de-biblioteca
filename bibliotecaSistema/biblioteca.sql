-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2022 às 17:46
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `curso` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeAluno` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `tituloLivro` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataDevolucao` date NOT NULL,
  `status` enum('P','D') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `curso`, `nomeAluno`, `dataEmprestimo`, `tituloLivro`, `dataDevolucao`, `status`) VALUES
(13, '1 - Enf', 'Joao Fabio Araujo', '2022-06-28', 'Harry Potter e a Pedra Filosofal', '2022-07-07', 'P'),
(12, '1 - Info', 'Silveira Costa Neto', '2022-06-27', 'O Sistema Windows 10', '2022-07-01', 'P'),
(11, '2 - Hosp', 'Rebeca Lima Castro', '2022-06-28', 'Os Bananas de Pijamas', '2022-06-29', 'D'),
(10, '3 - Enf', 'Guilherme Araujo Gomes Batista', '2022-06-27', 'Tecnologia da Informacao IV', '2022-06-30', 'P'),
(14, '3 - Model', 'Jorge Costa Silva', '2022-06-28', 'The Godfather', '2022-07-04', 'D'),
(15, '1 - Info', 'Juliana Julia Lima', '2022-06-29', 'O Lorax', '2022-07-30', 'P'),
(19, '1 - Enf', 'dfgdfgdfst', '2022-05-31', 'gsdfyrthb', '2022-07-07', 'P');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
