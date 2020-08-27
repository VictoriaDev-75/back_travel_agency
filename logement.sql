-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 juil. 2020 à 15:19
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(3) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `surface` varchar(15) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'test1', 'test1', 'test1', '11111', '80', '50', '', 'location', 'bla bla'),
(2, 'test2', '40, 40', 'paris', '75007', '80', '45', '', 'location', 'bla bla'),
(3, 'test3', '40, 40', 'paris', '75007', '80', '50', '', 'location', ''),
(4, 'test1', '40, 40', 'paris', '75007', '80', '50', '', 'location', 'bbbbbb'),
(5, 'test1', '40, 40', 'paris', '75007', '80', '50', '', 'location', 'ndbdhdns'),
(6, 'bvabj', 'test1', 'test1', '11111', '50', '50', '', 'vente', 'gdajqs'),
(7, 'test1', '40, 40', 'paris', '75007', '80', '50', '', 'vente', 'qdkxslw'),
(8, 'test1', '40, 40', 'paris', '75007', '80', '50', '', 'location', 'fzhknd'),
(9, 'test1', '40, 40', 'paris', '75007', '80', '50', '', 'location', 'kned'),
(10, 'test1', '40, 40', 'paris', '75007', '80', '50', '', 'location', 'aked'),
(11, 'nnnnnajejejnnnnnnnnn', 'nznnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', '11111', '155825182129252', '6814525822', '', 'location', 'jkfzdsmcn,bqzihJBIHIML /KNHILJBkpnm,b mk:jnjn;m,!'),
(12, 'test1', 'test4', 'test4', '11111', '80', '45', 'http://localhost/PhPCours/examen_php/photo/Victoria-Chaour.jpgtest1_1594988338', 'location', ''),
(13, 'test1', 'nznnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', '11111', '70', '45', 'http://localhost/PhPCours/examen_php/photo/Victoria-Chaour.jpgtest1_1594988463', 'location', 'HYHJ?'),
(14, 'bvabj', 'test2', 'test2', '11111', '80', '45', 'http://localhost/PhPCours/examen_php/photo/Victoria-Chaour.jpgbvabj_1594989590', 'location', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
