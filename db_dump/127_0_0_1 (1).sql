-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Mar-2023 às 05:07
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
-- Banco de dados: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Uncategorized', 'This is the description for uncategorized category'),
(2, 'Music', 'This is the description for the music category'),
(3, 'Science and Technology', 'This is the description for the Science and Techonoly category'),
(4, 'Travel', 'This is the description for the travel category'),
(5, 'Art', 'This is the description for the art category'),
(6, 'Wild Life', 'This is the description for the wild life category'),
(7, 'Food', 'This is the description for the food category');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(8, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679082753blog3.jpg', '2023-03-17 19:52:33', 6, 2, 1),
(9, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679082787blog56.jpg', '2023-03-17 19:53:07', 6, 2, 0),
(10, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679082905blog89.jpg', '2023-03-17 19:55:05', 6, 3, 0),
(11, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679082931blog2.jpg', '2023-03-17 19:55:31', 3, 3, 0),
(12, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679082974blog79.jpg', '2023-03-17 19:56:14', 7, 6, 0),
(13, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679083044blog38.jpg', '2023-03-17 19:57:24', 2, 7, 0),
(14, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679083205blog17.jpg', '2023-03-17 20:00:05', 3, 5, 0),
(15, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679083926blog40.jpg', '2023-03-17 20:12:06', 5, 19, 0),
(16, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, ratione.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta eveniet modi commodi aperiam quisquam vitae nihil neque. Vel voluptates reiciendis delectus. Ex ullam reiciendis culpa doloremque assumenda cupiditate ab recusandae officia eius fugit dolor vero laborum, beatae libero obcaecati.', '1679083953blog85.jpg', '2023-03-17 20:12:33', 5, 19, 0),
(24, 'Example', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque minima modi, repudiandae, ipsum earum amet cupiditate ducimus, natus velit quaerat aut quia. Assumenda ea, dolorem quis similique doloremque consectetur fugit aliquid dolor, commodi eveniet inventore sapiente perspiciatis unde qui illo libero rerum facere. \r\n\r\nCum laboriosam sint ipsum! Dolorum inventore neque ad rerum? Optio impedit vero suscipit molestias totam dicta distinctio magnam nostrum velit placeat. Quisquam omnis ad similique illo quae illum deserunt, neque iusto. Tempore, iure? Voluptatem possimus minus quod facilis, repellendus consectetur nulla! Molestiae doloremque commodi illo quibusdam libero iure, quas, aperiam voluptatum beatae odit, sapiente vero officia voluptatibus reiciendis nam! Repellat quas deleniti rem corrupti sapiente odio tempora ullam natus ea quos, aliquid suscipit deserunt placeat consequatur libero illum? Animi quam asperiores labore tempora.\r\n\r\n Labore maiores provident fuga minus accusamus pariatur! Dolores ea impedit expedita doloribus non quae inventore ducimus est perferendis vel officia quos repudiandae architecto ex eius quasi nam quam voluptate deleniti, suscipit libero enim voluptas minima similique! At, quibusdam eos? Sunt esse quia impedit quasi possimus eaque! Sint, optio at. Laborum laboriosam nemo ad quod consequatur quasi nostrum at adipisci, reiciendis officia sint ratione nesciunt corrupti aspernatur architecto est minus id modi minima beatae incidunt?', '1679111971blog102.jpg', '2023-03-18 03:59:31', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Alan', 'Tomaz', 'Kill0w', 'alan4tomaz8@gmail.com', '$2y$10$OLqLG/cHSZQRjU6v/Z9Cfu3ms5u4lNLzhmFizv6A6Trxntcao8QCS', '1678475817-dog-puppy-on-garden-royalty-free-image-1586966191_.jpg', 0),
(2, 'Janeth', 'Smith', 'janeth', 'janethsmith@gmail.com', '$2y$10$5pMO.ifNGI5I6c2Xe.gUjuDtBqU6AKlTCx8bn..YZVTzebGpSxxTS', '1678507765-avatar9.jpg', 1),
(3, 'John ', 'Mills', 'john', 'johnmills@gmail.com', '$2y$10$pmfRpnRkmlW.cbTOlBYn5udl2sLMxmpZ1CofJRA2OITltoO2wk7pW', '1678643054-avatar8.jpg', 0),
(5, 'Miles ', 'Holyday', 'miles', 'milesholyday@gmail.com', '$2y$10$5o7/K4NvBpWHa95mrveTbeTQEhbw4tmPoyfjLK9ZiyCNCc7cw1puW', '1678643270-avatar3.jpg', 1),
(6, 'Rose', 'Carter', 'rose', 'rosecarter@gmail.com', '$2y$10$L/qN9ESAxLECUtb08.QLsOLrrHsN.WkAJzVvgYWr5A2I2zyyEM3LO', '1678643446-avatar5.jpg', 0),
(7, 'Roger', 'Bill', 'roger', 'rogerbill@gmail.com', '$2y$10$xRoKvCBHRK/8uEKTpJ6HhuRzZdWTKObcekJfv9lNVTFVjhEsEXAJC', '1678643483-avatar11.jpg', 0),
(19, 'Allan', 'Wells', 'allan', 'allanwells@gmail.com', '$2y$10$ws3OeIz0Nttc5aQKLTnO5uMTvtbYL6R..vI1D/7AEceR1jFz.Hcse', '1679083704-1678643094-avatar2.jpg', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
