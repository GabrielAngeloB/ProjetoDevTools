-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2024 às 22:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_projeto`
--
CREATE DATABASE IF NOT EXISTS `db_projeto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_projeto`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ferramentas`
--

CREATE TABLE `ferramentas` (
  `id_ferramenta` int(11) NOT NULL,
  `nome_ferramenta` varchar(255) NOT NULL,
  `desc_ferramenta` text NOT NULL,
  `img_ferramenta` varchar(255) DEFAULT NULL,
  `link_ferramenta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `ferramentas`
--

INSERT INTO `ferramentas` (`id_ferramenta`, `nome_ferramenta`, `desc_ferramenta`, `img_ferramenta`, `link_ferramenta`) VALUES
(3, 'Somar', 'Uma ferramenta usada para fazer a soma entre dois números.', 'https://s1.static.brasilescola.uol.com.br/be/conteudo/images/adicao-soma-dois-ou-mais-numeros-592414c758995.jpg', 'somar.php'),
(4, 'Subtração', 'Uma ferramenta utilizada para subtrair dois números se possível.', 'https://img.freepik.com/vetores-premium/simbolo-de-menos-sinal-de-simbolo-matematico-basico-icone-de-botao-de-calculadora-conceito-de-financas-de-negocios-em-ve_949349-55.jpg', 'subtracao.php'),
(5, 'Divisão', 'Uma ferramenta utilizada para fazer a divisão entre dois números.', 'https://cdn-icons-png.flaticon.com/512/7005/7005557.png', 'divisao.php'),
(6, 'Multiplicação', 'Uma ferramenta que faz a multiplicação entre dois números de forma rápida.', 'https://cdn-icons-png.flaticon.com/512/43/43165.png', 'multiplicar.php'),
(7, 'Potencia', 'Uma ferramenta capaz de calcular a potência especificada de um numero.', 'https://thumbs.dreamstime.com/b/s%C3%ADmbolo-matem%C3%A1tico-quadrado-isolado-em-fundo-branco-224246344.jpg', 'potencia.php'),
(8, 'Raiz quadrada', 'Uma ferramenta capaz de fazer a raiz quadrada de um número especificado.', 'https://static.vecteezy.com/ti/vetor-gratis/p3/567853-icone-de-raiz-quadrada-gratis-vetor.jpg', 'raiz_quadrada.php');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(90) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `horario_criado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `horario_criado`) VALUES
(2, 'balalal', 'asdasd123@hotmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', '2024-05-23 12:35:37'),
(3, 'asdasd123', 'asdasd@hotmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', '2024-05-23 12:36:19'),
(4, 'Gabriel Angelo', 'gabridestiny@hotmail.com', '5e1b0b4ab670d8a29a97f000589e0ebd', '2024-06-05 01:40:15');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ferramentas`
--
ALTER TABLE `ferramentas`
  ADD PRIMARY KEY (`id_ferramenta`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ferramentas`
--
ALTER TABLE `ferramentas`
  MODIFY `id_ferramenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
