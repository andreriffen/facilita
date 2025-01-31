-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29/01/2025 às 14:11
-- Versão do servidor: 10.11.10-MariaDB
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u459310553_facilita_leads`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `email`, `telefone`, `data_cadastro`) VALUES
(1, 'João Silva', 'joao.silva@example.com', '1199999999', '2025-01-01 10:00:00'),
(2, 'Maria Oliveira', 'maria.oliveira@example.com', '11999990002', '2025-01-01 10:10:00'),
(3, 'Pedro Santos', 'pedro.santos@example.com', '11999990003', '2025-01-01 10:20:00'),
(4, 'Ana Costa', 'ana.costa@example.com', '11999990004', '2025-01-01 10:30:00'),
(5, 'Lucas Almeida', 'lucas.almeida@example.com', '11999990005', '2025-01-01 10:40:00'),
(6, 'Fernanda Ribeiro', 'fernanda.ribeiro@example.com', '11999990006', '2025-01-01 10:50:00'),
(7, 'Carlos Pereira', 'carlos.pereira@example.com', '11999990007', '2025-01-01 11:00:00'),
(8, 'Juliana Cardoso', 'juliana.cardoso@example.com', '11999990008', '2025-01-01 11:10:00'),
(9, 'Rafael Sousa', 'rafael.sousa@example.com', '11999990009', '2025-01-01 11:20:00'),
(10, 'Patrícia Mendes', 'patricia.mendes@example.com', '11999990010', '2025-01-01 11:30:00'),
(11, 'Bruno Lima', 'bruno.lima@example.com', '11999990011', '2025-01-01 11:40:00'),
(12, 'Larissa Nascimento', 'larissa.nascimento@example.com', '11999990012', '2025-01-01 11:50:00'),
(13, 'Thiago Martins', 'thiago.martins@example.com', '11999990013', '2025-01-01 12:00:00'),
(14, 'Aline Fernandes', 'aline.fernandes@example.com', '11999990014', '2025-01-01 12:10:00'),
(15, 'Gabriel Rocha', 'gabriel.rocha@example.com', '11999990015', '2025-01-01 12:20:00'),
(16, 'Camila Barbosa', 'camila.barbosa@example.com', '11999990016', '2025-01-01 12:30:00'),
(17, 'Leonardo Souza', 'leonardo.souza@example.com', '11999990017', '2025-01-01 12:40:00'),
(18, 'Vanessa Teixeira', 'vanessa.teixeira@example.com', '11999990018', '2025-01-01 12:50:00'),
(19, 'Felipe Araújo', 'felipe.araujo@example.com', '11999990019', '2025-01-01 13:00:00'),
(20, 'Renata Campos', 'renata.campos@example.com', '11999990020', '2025-01-01 13:10:00'),
(21, 'Ricardo Moraes', 'ricardo.moraes@example.com', '11999990021', '2025-01-01 13:20:00'),
(22, 'Carolina Batista', 'carolina.batista@example.com', '11999990022', '2025-01-01 13:30:00'),
(23, 'Eduardo Farias', 'eduardo.farias@example.com', '11999990023', '2025-01-01 13:40:00'),
(24, 'Isabela Moreira', 'isabela.moreira@example.com', '11999990024', '2025-01-01 13:50:00'),
(25, 'André Silva', 'andre.silva@example.com', '11999990025', '2025-01-01 14:00:00'),
(26, 'Beatriz Gomes', 'beatriz.gomes@example.com', '11999990026', '2025-01-01 14:10:00'),
(27, 'Fábio Vieira', 'fabio.vieira@example.com', '11999990027', '2025-01-01 14:20:00'),
(28, 'Natália Monteiro', 'natalia.monteiro@example.com', '11999990028', '2025-01-01 14:30:00'),
(29, 'Henrique Barros', 'henrique.barros@example.com', '11999990029', '2025-01-01 14:40:00'),
(30, 'Mariana Duarte', 'mariana.duarte@example.com', '11999990030', '2025-01-01 14:50:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `financiamentos`
--

CREATE TABLE `financiamentos` (
  `id_financiamento` char(36) NOT NULL DEFAULT uuid(),
  `id_cliente` int(11) NOT NULL,
  `id_veiculo` int(11) DEFAULT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `parcelas_totais` int(11) NOT NULL,
  `parcelas_restantes` int(11) NOT NULL,
  `valor_parcela` decimal(10,2) NOT NULL,
  `status` enum('ativo','quitado','renegociado') DEFAULT 'ativo',
  `data_inicio` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `email`, `senha`, `data_cadastro`, `admin`) VALUES
(1, 'Andre', 'andre@andre.com', '$2y$10$PgSXBdHjn98EIKRbGGY7lOmHAoK1h/TI5zR0QgvWCMNuf2.FMMsFO', '2025-01-12 02:09:35', 1),
(2, 'João', 'joao@joao.com', '$2y$10$WtxkTsW6pV/H8L1D7Vz0QOHlwD6X5NkVJkwKe5XMdCQFImgAvP./S', '2025-01-12 05:32:33', 0),
(3, 'Maria', 'maria@maria.com', '$2y$10$rlIRhzUA4yW2qC.8JOfwAuzWQjsF1uG2p4bRkSW8qluonrfo2btX.', '2025-01-12 05:33:07', 0),
(11, 'Jesus', 'jesus@jesus.com', '$2y$10$SqL5IvF.TmFqBZ24OeLEXuFip1mM4akZRbFzSESTmUA.D6icaQi9i', '2025-01-12 06:12:06', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_veiculo` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id_veiculo`, `marca`, `modelo`, `ano`, `placa`) VALUES
(1, 'Ford', 'Fiesta', 2018, 'ABC1234'),
(2, 'Chevrolet', 'Onix', 2020, 'XYZ5678'),
(3, 'Volkswagen', 'Gol', 2019, 'LMN2345'),
(4, 'Fiat', 'Palio', 2017, 'QWE6789'),
(5, 'Honda', 'Civic', 2021, 'RTY3456'),
(6, 'Hyundai', 'HB20', 2020, 'JKL1234'),
(7, 'Toyota', 'Corolla', 2021, 'ASD9876'),
(8, 'Renault', 'Sandero', 2018, 'FTR4567'),
(9, 'Nissan', 'Kicks', 2021, 'GHI7890'),
(10, 'Peugeot', '208', 2020, 'UIO1122'),
(11, 'BMW', '320i', 2022, 'BKM1234'),
(12, 'Mercedes-Benz', 'A200', 2021, 'MBR5678'),
(13, 'Audi', 'A3', 2020, 'AUD8901'),
(14, 'Jeep', 'Renegade', 2021, 'JPR2345'),
(15, 'Kia', 'Seltos', 2021, 'KSL6789'),
(16, 'Volkswagen', 'T-Cross', 2022, 'VWT9876'),
(17, 'Ford', 'EcoSport', 2021, 'FDE1234'),
(18, 'Chevrolet', 'Tracker', 2022, 'CHT5678'),
(19, 'Honda', 'HR-V', 2021, 'HRV7890'),
(20, 'Hyundai', 'Creta', 2022, 'CRH2345'),
(21, 'Toyota', 'Hilux', 2021, 'HLX4567'),
(22, 'Mitsubishi', 'L200 Triton', 2020, 'MIT1122'),
(23, 'Mazda', 'CX-5', 2021, 'MZD2345'),
(24, 'Land Rover', 'Defender', 2021, 'LRD6789'),
(25, 'Jaguar', 'F-Pace', 2020, 'JAG1234'),
(26, 'Peugeot', '3008', 2021, 'PEU2345'),
(27, 'Citroën', 'C3', 2019, 'CTR6789'),
(28, 'Fiat', 'Strada', 2021, 'STR4567'),
(29, 'Nissan', 'Versa', 2020, 'VRS1122'),
(30, 'Renault', 'Kwid', 2019, 'KWK7890'),
(31, 'Chevrolet', 'Spin', 2020, 'SPN3456'),
(32, 'Ford', 'Ranger', 2021, 'RGR6789'),
(33, 'Chery', 'Tiggo 5X', 2021, 'CHT2345'),
(34, 'Honda', 'City', 2020, 'CTY5678'),
(35, 'Volkswagen', 'Passat', 2021, 'PSS7890');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `financiamentos`
--
ALTER TABLE `financiamentos`
  ADD PRIMARY KEY (`id_financiamento`),
  ADD KEY `id_veiculo` (`id_veiculo`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `financiamentos`
--
ALTER TABLE `financiamentos`
  ADD CONSTRAINT `financiamentos_ibfk_1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
