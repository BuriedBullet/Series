-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Jun-2019 às 05:27
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `series_time`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Comedia'),
(2, 'Drama'),
(3, 'LGBT'),
(4, 'AÃ§Ã£o'),
(5, 'Romance'),
(6, 'Aventura'),
(7, 'Anime'),
(8, 'Fantasia'),
(9, 'Terror'),
(10, 'Suspense');

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle_assistido`
--

CREATE TABLE `controle_assistido` (
  `id` int(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_series` int(11) NOT NULL,
  `id_episodio` int(11) NOT NULL,
  `assistido` int(3) NOT NULL,
  `data_assistido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `controle_assistido`
--

INSERT INTO `controle_assistido` (`id`, `id_user`, `id_series`, `id_episodio`, `assistido`, `data_assistido`) VALUES
(2, 1, 4, 13, 1, '2019-06-16 17:18:00'),
(3, 1, 4, 15, 1, '2019-06-16 17:20:00'),
(4, 1, 4, 22, 1, '2019-06-16 22:20:34'),
(5, 1, 4, 20, 1, '2019-06-16 22:44:28'),
(6, 1, 4, 23, 1, '2019-06-16 23:15:10'),
(7, 1, 3, 3, 1, '2019-06-17 04:02:56'),
(8, 1, 3, 6, 1, '2019-06-17 04:02:58'),
(9, 1, 3, 8, 1, '2019-06-17 04:03:01'),
(10, 1, 3, 10, 1, '2019-06-17 04:03:03'),
(11, 1, 3, 9, 1, '2019-06-17 04:03:05'),
(12, 1, 3, 7, 1, '2019-06-17 04:03:07'),
(13, 1, 3, 5, 1, '2019-06-17 04:03:09'),
(14, 1, 3, 4, 1, '2019-06-17 04:03:11'),
(15, 1, 1, 1, 1, '2019-06-17 04:28:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `episodio`
--

CREATE TABLE `episodio` (
  `id` int(20) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `temporada` int(5) NOT NULL,
  `episodio` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `episodio`
--

INSERT INTO `episodio` (`id`, `id_serie`, `temporada`, `episodio`, `nome`) VALUES
(1, 1, 1, 1, 'A Garota Escrava'),
(2, 1, 1, 2, 'CanÃ§Ã£o de Ninar'),
(3, 3, 1, 1, 'Bem-vindos'),
(4, 3, 1, 2, 'Desejo'),
(5, 3, 1, 3, 'SÃ¡bado Ã  Noite'),
(6, 3, 1, 4, 'O amor Ã© uma droga'),
(7, 3, 1, 5, 'Todo mundo mente'),
(8, 3, 1, 6, 'Tudo vai ficar bem'),
(9, 3, 1, 7, 'Tudo explode'),
(10, 3, 1, 8, 'Arzila'),
(11, 4, 1, 1, 'Uma garota chamada Yumeko'),
(12, 4, 1, 2, 'Um garota chata'),
(13, 4, 1, 3, 'A garota de olhos puxados'),
(14, 4, 1, 4, 'A garota que virou bicho'),
(15, 4, 1, 5, 'A garota que virou gente'),
(16, 4, 1, 6, 'A garota que convida'),
(17, 4, 1, 7, 'As garotas que se recusa'),
(18, 4, 1, 8, 'A garota que danÃ§a'),
(19, 4, 1, 9, 'A garota sonhadora'),
(20, 4, 1, 10, 'A garota que escolhe'),
(21, 4, 1, 11, 'A garota que arriscaria a vida'),
(22, 4, 1, 12, 'A mulher que jogava competitivamente'),
(23, 4, 2, 14, 'As garotas que jogam comp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `produtora` varchar(120) NOT NULL,
  `ano_lancamento` varchar(5) NOT NULL,
  `img` varchar(200) NOT NULL,
  `img_fund` varchar(200) NOT NULL,
  `descricao` blob NOT NULL,
  `qtd_temp` int(3) NOT NULL,
  `id_status` int(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `nome`, `produtora`, `ano_lancamento`, `img`, `img_fund`, `descricao`, `qtd_temp`, `id_status`, `id_user`, `date`) VALUES
(1, 'Tate no Yuusha no Nariagari', 'Anime', '2013', 'https://img1.ak.crunchyroll.com/i/spire4/25627becf63b169d19af7efee6122e791555537428_full.jpg', 'https://metagalaxia.com.br/wp-content/uploads/2019/01/tate-no-yuusha-00.jpg', 0x416e696d6520736f627265204865726f6973, 1, 1, 1, '2019-06-16 10:05:04'),
(2, 'Agentes da S.H.I.E.L.D.', 'ABC', '2013', 'https://upload.wikimedia.org/wikipedia/pt/thumb/5/5b/Agents_of_S.H.I.E.L.D_-_Terceira_temporada.jpg/280px-Agents_of_S.H.I.E.L.D_-_Terceira_temporada.jpg', 'https://occ-0-990-987.1.nflxso.net/art/7db9c/8a48f9af44fdded2cff21fa38719216a7957db9c.jpg', 0x436f6e7461206120686973746f72696120652061636f6e746563696d656e746f7320646f206167656e74657320646120534849454c44, 6, 1, 1, '2019-06-16 10:05:04'),
(3, 'Elite', 'Netflix', '2018', 'https://i.pinimg.com/originals/5f/e2/e0/5fe2e09f9b3f616200ffe31de9caceb6.jpg', 'https://interprete.me/wp-content/uploads/2018/10/elite-netflix-serie-thriller-adolescente-capa-700x361.jpg', 0x4d6172696e61206f6665726563652061204e616e6f20756d61204368616e63652064652070616761722061206469766964612e204c7520726576656c6120756d207365677265646f2070726f706f736974616c6d656e74652e204f6d617220646573636f6272652071756520416e64657220616f7320616d69676f7320736f62726520656c65732e, 1, 2, 1, '2019-06-16 10:04:01'),
(4, 'Kakegurui', 'Netflix', '2017', 'https://metagalaxia.com.br/wp-content/uploads/2017/10/kakegurui-poster.jpg', 'https://www.torredevigilancia.com/wp-content/uploads/2017/09/836145-e1506392008546-810x326.png', 0x59756d656b6f204a6162616d692061706f73746120616c746f206520717565722067616e68617220746f646173206e612041636164656d6961204879616b6b616f752c20756d61206573636f6c61206f6e6465206f7320616c756e6f732073c3a36f206176616c6961646f732073c3b320706f72207375617320686162696c696461646573206e6f206a6f676f2e, 2, 1, 1, '2019-06-16 11:22:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie_categoria`
--

CREATE TABLE `serie_categoria` (
  `id` int(11) NOT NULL,
  `id_cat` int(3) NOT NULL,
  `id_serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `serie_categoria`
--

INSERT INTO `serie_categoria` (`id`, `id_cat`, `id_serie`) VALUES
(1, 8, 1),
(2, 1, 2),
(3, 4, 2),
(4, 8, 2),
(5, 2, 3),
(6, 3, 3),
(7, 5, 3),
(8, 2, 4),
(9, 7, 4),
(10, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_serie`
--

CREATE TABLE `status_serie` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_serie`
--

INSERT INTO `status_serie` (`id`, `nome`) VALUES
(1, 'No ar'),
(2, 'Pausada'),
(3, 'Finalizada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `apelido`, `email`, `senha`, `img`) VALUES
(1, 'Rubens', 'BuriedBullet', 'Rubensherculano@hotmail.com', '25d55ad283aa400af464c76d713c07ad', 'https://avatarfiles.alphacoders.com/948/94826.jpg'),
(2, 'Patricia', 'PatyGamer', 'Patricia.herculano@hotmail.com', '25d55ad283aa400af464c76d713c07ad', 'https://ichef.bbci.co.uk/news/660/cpsprodpb/BF0D/production/_106090984_2e39b218-c369-452e-b5be-d2476f9d8728.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `controle_assistido`
--
ALTER TABLE `controle_assistido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodio`
--
ALTER TABLE `episodio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serie_categoria`
--
ALTER TABLE `serie_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_serie`
--
ALTER TABLE `status_serie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `controle_assistido`
--
ALTER TABLE `controle_assistido`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `episodio`
--
ALTER TABLE `episodio`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `serie_categoria`
--
ALTER TABLE `serie_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_serie`
--
ALTER TABLE `status_serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
