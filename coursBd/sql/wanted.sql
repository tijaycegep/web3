-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 31 Août 2023 à 21:18
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `identifiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `wanted`
--

CREATE TABLE `wanted` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `password` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL,
  `image` varchar(1000) COLLATE utf16_bin NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(255) COLLATE utf16_bin NOT NULL,
  `transport` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Contenu de la table `wanted`
--

INSERT INTO `wanted` (`id`, `name`, `password`, `email`, `image`, `birthday`, `sex`, `transport`) VALUES
(1, 'Pedro calors pepito', 'racist', 'pedrocalorspepito.amidelaforet@gmail.com', 'https://th.bing.com/th/id/OIP.VKxFhi0ER35rRfckPaMP2gAAAA?pid=ImgDet&rs=1', '2022-10-01', 'Homme', 'Marche'),
(2, 'Eti poisson frappier', 'stanne', 'etipoisson.frappier.amidelaforet@gmail.com', 'https://www.bedetheque.com/media/Photos/Photo_63626.jpg', '2023-08-04', 'Homme', 'Vélo'),
(3, 'tijay el cooking master', 'letmecook', 'tijay.amidelaforet@gmail.com', 'https://media.pitchfork.com/photos/5d9cdb532faa0c0009edd234/4:3/w_2432,h_1824,c_limit/Lil-Tjay.jpg', '2023-08-03', 'Homme', 'Auto'),
(4, 'isaac papa pasteur', 'adamn', 'isaac.projetevangelisation@gmail.com', 'https://th.bing.com/th/id/OIP.4QHAJirtAJzNH-QhOCsblwHaLp?pid=ImgDet&rs=1', '2023-08-09', 'Fleur', 'Autobus'),
(5, 'woman', 'woman', 'woman.getmethemanager@gmail.com', 'https://filmdaily.co/wp-content/uploads/2020/07/karenhaircut-01-1300x1284.jpg', '2023-08-04', 'Femme', 'Marche'),
(6, 'arthur marmotte', 'mdr', 'barackobama.amidelaforet@gmail.com', 'https://th.bing.com/th/id/OIP.gM4n5itaF89OxLAmUIDWYgHaE8?pid=ImgDet&amp;rs=1', '2023-08-13', 'Other', 'Marche'),
(7, 'jassy', 'popo', 'maximelavoler.amidelaforet@gmail.com', 'https://th.bing.com/th/id/OIP.Lx-bKx3w2eKXeCjBK8w0fgHaHa?pid=ImgDet&amp;rs=1', '2023-08-04', 'Man', 'Autobus');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `wanted`
--
ALTER TABLE `wanted`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `wanted`
--
ALTER TABLE `wanted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
