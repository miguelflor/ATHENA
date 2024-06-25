-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 11-Jul-2022 às 15:10
-- Versão do servidor: 8.0.29-0ubuntu0.20.04.3
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `athena`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Alarms`
--

CREATE TABLE `Alarms` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `alarme` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Contacts`
--

CREATE TABLE `Contacts` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Contacts`
--

INSERT INTO `Contacts` (`id`, `id_user`, `name`, `number`) VALUES
(18, 1, 'jack', '912482741'),
(25, 1, 'henry', '123123123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `intents`
--

CREATE TABLE `intents` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `intents`
--

INSERT INTO `intents` (`id`, `id_user`, `tag`, `priority`, `question`) VALUES
(13, 1, 'goodbyes', 4, '0'),
(14, 1, 'greet', 4, '0'),
(15, 1, 'new_note', 9, '0'),
(16, 1, 'new_cont', 8, '0'),
(17, 1, 'read_note', 1, '0'),
(18, 1, 'questions', 1, '1'),
(19, 1, 'call_me', 1, '0'),
(20, 1, 'set_alarm', 1, '0'),
(21, 1, 'tell_time', 7, '0'),
(22, 1, 'defi', 9, '1'),
(25, 1, 'get_number', 9, '1'),
(26, 1, 'number', 6, '0'),
(27, 1, 'contacts', 7, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Notes`
--

CREATE TABLE `Notes` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `notas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `Notes`
--

INSERT INTO `Notes` (`id`, `id_user`, `notas`) VALUES
(58, 1, 'i have to do my tasks'),
(59, 1, 'I need walk the dog'),
(61, 1, 'i have to go to the groceries'),
(63, 1, 'i have to go shopping');

-- --------------------------------------------------------

--
-- Estrutura da tabela `patterns_intent`
--

CREATE TABLE `patterns_intent` (
  `id` int NOT NULL,
  `id_intent` int DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `add` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `patterns_intent`
--

INSERT INTO `patterns_intent` (`id`, `id_intent`, `pattern`, `add`) VALUES
(48, 13, 'goodbye', 0),
(49, 13, 'bye', 0),
(50, 13, 'farewell', 0),
(51, 13, 'bye bye', 0),
(52, 13, 'see you', 0),
(53, 13, 'see you later', 0),
(54, 13, 'go away', 0),
(55, 14, 'hello', 0),
(56, 14, 'hi', 0),
(57, 14, 'good morning', 0),
(58, 14, 'good evening', 0),
(59, 14, 'good afternoon', 0),
(60, 15, 'new note', 0),
(61, 15, 'write a note', 0),
(62, 15, 'add a note', 0),
(63, 15, 'write me', 0),
(64, 16, 'add a contact', 0),
(65, 16, 'new contact', 0),
(66, 16, 'add a new contact', 0),
(67, 17, 'read note', 0),
(68, 17, 'read a note', 0),
(69, 18, 'what is', 0),
(70, 18, 'what\'s', 0),
(71, 18, 'who is', 0),
(72, 18, 'who are', 0),
(73, 18, 'what are', 0),
(74, 18, 'who whare', 0),
(75, 19, 'call me', 0),
(76, 19, 'my name is', 0),
(77, 19, 'name me', 0),
(78, 20, 'set a alarm', 0),
(79, 20, 'create a alarm', 0),
(80, 20, 'alarm', 0),
(81, 21, 'what time is it', 0),
(82, 21, 'what\'s the time', 0),
(83, 21, 'tell time', 0),
(84, 22, 'meaning of', 0),
(85, 22, 'meaning of', 0),
(86, 22, 'definition of', 0),
(87, 22, 'the definition of', 0),
(88, 22, 'definition of the word', 0),
(89, 22, 'the defenition of the word', 0),
(100, 25, 'What\'s the phone number of', 0),
(101, 25, 'What is the number of', 0),
(102, 25, 'What\'s the number of', 0),
(103, 25, 'What is the phone number of', 0),
(104, 26, 'phone number of', 0),
(105, 26, 'the number of', 0),
(106, 26, 'number of', 0),
(107, 27, 'the contact of', 0),
(108, 27, 'contact of', 0),
(172, 18, 'teach me abou', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resp_intent`
--

CREATE TABLE `resp_intent` (
  `id` int NOT NULL,
  `id_intent` int DEFAULT NULL,
  `resp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `resp_intent`
--

INSERT INTO `resp_intent` (`id`, `id_intent`, `resp`) VALUES
(15, 13, 'I will go back to Olympus'),
(16, 13, 'bye'),
(17, 13, 'goodbye'),
(18, 13, 'see you later'),
(19, 14, ''),
(20, 15, 'What\'s your note?'),
(21, 16, ''),
(22, 17, ''),
(23, 18, ''),
(24, 19, ''),
(25, 20, ''),
(26, 21, ''),
(27, 22, ''),
(30, 25, ''),
(31, 26, ''),
(32, 27, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `real_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `real_name`) VALUES
(1, 'user1', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Jack');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Alarms`
--
ALTER TABLE `Alarms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `intents`
--
ALTER TABLE `intents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `patterns_intent`
--
ALTER TABLE `patterns_intent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patterns_intent_ibfk_1` (`id_intent`);

--
-- Índices para tabela `resp_intent`
--
ALTER TABLE `resp_intent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resp_intent_ibfk_1` (`id_intent`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Alarms`
--
ALTER TABLE `Alarms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `Contacts`
--
ALTER TABLE `Contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `intents`
--
ALTER TABLE `intents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `Notes`
--
ALTER TABLE `Notes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `patterns_intent`
--
ALTER TABLE `patterns_intent`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT de tabela `resp_intent`
--
ALTER TABLE `resp_intent`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Alarms`
--
ALTER TABLE `Alarms`
  ADD CONSTRAINT `Alarms_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `Contacts`
--
ALTER TABLE `Contacts`
  ADD CONSTRAINT `Contacts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `intents`
--
ALTER TABLE `intents`
  ADD CONSTRAINT `intents_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `Notes`
--
ALTER TABLE `Notes`
  ADD CONSTRAINT `Notes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `patterns_intent`
--
ALTER TABLE `patterns_intent`
  ADD CONSTRAINT `patterns_intent_ibfk_1` FOREIGN KEY (`id_intent`) REFERENCES `intents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `resp_intent`
--
ALTER TABLE `resp_intent`
  ADD CONSTRAINT `resp_intent_ibfk_1` FOREIGN KEY (`id_intent`) REFERENCES `intents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
