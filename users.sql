-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 mai 2021 à 00:53
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gest_employes`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hasha` varchar(250) NOT NULL,
  `rang` int(1) NOT NULL DEFAULT 2 COMMENT '1/admin  2/user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `hasha`, `rang`) VALUES
(15565, 'vincentdecock@outlook.fr', 'feez', '$2y$10$a9svsijEbdwYzTvcApU9hOW7r2h8X2PZvNePnVbl2Hu/RgIa3aQ6i', 2),
(15566, 'vincentdecock@outlook.fr', 'lala', '$2y$10$yNYekjOoJbPVEcSs7OEHuu18UB9ujAcid2qUbI37KfuGZSfKqJ1Ty', 2),
(15567, 'vincentdecock@outlook.fr', 'lala', '$2y$10$jAODvqaqDIZzPsESFpRUHuYMrSsJoq2pYSRVox8P8j8dcwUckfBgu', 2),
(15569, 'vincentdecock@outlook.fr', 'shinichimigi', '$2y$10$LvcEmNPPgUHTkE2ITpt9U..Pvgk3IfzD3SRwaXYIyVvQEB7Oz0bW2', 2),
(15570, 'vincentdecock@outlook.fr', 'Numero', '$2y$10$g9P/1sbbtF6cnT9OtEiYCu8e5zNRnxkoklD5UXmi5foUWHZzR90eC', 2),
(15573, 'Bison@live.fr', 'Bison', '$2y$10$KfFzZFPyNYJ4NWx4s3WByu1SF5AUevj3waLYLezQZmAdAdExp7tdu', 1),
(15574, 'vincentdecock@outlook.fr', 'Vincent', '$2y$10$tsQmYx84OkzBPKmS39rfnOBSoNLBLCnYOl2.Ua4djhp9kj5yIruS2', 1),
(15575, 'vincentdecock@outlook.fr', 'Vincent', '$2y$10$XDUGwP5OuBnHTXsxTsXlv.3WGjNUdLzsm/Z8bvuu33a4DbaUqzZWq', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15576;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
