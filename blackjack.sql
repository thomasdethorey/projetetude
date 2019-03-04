-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 03 Mars 2019 à 14:51
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blackjack`
--

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `idarticle` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `LIVREDOR`
--

CREATE TABLE `LIVREDOR` (
  `idlivredor` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `PORTEFEUILLE`
--

CREATE TABLE `PORTEFEUILLE` (
  `idportefeuille` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `bankroll` float NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `PORTEFEUILLE`
--

INSERT INTO `PORTEFEUILLE` (`idportefeuille`, `pseudo`, `bankroll`, `id`) VALUES
(1, 'nicotooo', 12, 99);

-- --------------------------------------------------------

--
-- Structure de la table `ROLE`
--

CREATE TABLE `ROLE` (
  `idrole` int(11) NOT NULL,
  `utilisateur` varchar(50) NOT NULL,
  `administrateur` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `SPONSOR`
--

CREATE TABLE `SPONSOR` (
  `idsponsor` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEURS`
--

CREATE TABLE `UTILISATEURS` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UTILISATEURS`
--

INSERT INTO `UTILISATEURS` (`id`, `pseudo`, `lastname`, `firstname`, `birthdate`, `mail`, `phone`, `password`) VALUES
(44, 'toto', 'thomas', 'price', '1995-01-15', 'toto@gmail.com', '0677888877', '$2y$10$xErogdWyG5GaLDx/9yCFQ..6zHPLGhdFBEexnOEwhrvB5uXmAFANW'),
(80, 'hawkers', 'dethorey', 'thomas', '1995-01-15', 'hawkers@gmail.com', '0677889999', '$2y$10$5c8CgYH4peUL/TAqVCu0aOCqFqtbrR4Kml7rY/9/XgALJ5wuN4DnS'),
(82, 'kimly', 'tea', 'tea', '1991-01-12', 'kimly@gmail.com', '0677889988', '$2y$10$9EDGWh8xKcvdz5D6XRqFLe.rEJCOHeZEXKQAhlED6FV3aZOpCPZUq'),
(99, 'thotho', 'dethorey', 'thomas', '1995-01-15', 'thomas.dethorey01@gmail.com', '0673091299', '$2y$10$ccZ4hurGbkRC.aKyjTUfh.Ep7DHeW/G4fbHae49OANL2BcHHDP6IO'),
(108, 'toto80000', 'Dethorey', 'Thomas', '1995-01-15', 'toto80000@gmail.com', '0655454567', '$2y$10$PW.aHJM9NgiyGE1I/pBzNePOYshPwc1pFBhrNfRytGh61/LvD.BHO');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`idarticle`),
  ADD KEY `ARTICLE_UTILISATEURS_FK` (`id`);

--
-- Index pour la table `LIVREDOR`
--
ALTER TABLE `LIVREDOR`
  ADD PRIMARY KEY (`idlivredor`),
  ADD KEY `LIVREDOR_UTILISATEURS_FK` (`id`);

--
-- Index pour la table `PORTEFEUILLE`
--
ALTER TABLE `PORTEFEUILLE`
  ADD PRIMARY KEY (`idportefeuille`),
  ADD UNIQUE KEY `PORTEFEUILLE_UTILISATEURS_AK` (`id`);

--
-- Index pour la table `ROLE`
--
ALTER TABLE `ROLE`
  ADD PRIMARY KEY (`idrole`),
  ADD KEY `ROLE_UTILISATEURS_FK` (`id`);

--
-- Index pour la table `SPONSOR`
--
ALTER TABLE `SPONSOR`
  ADD PRIMARY KEY (`idsponsor`);

--
-- Index pour la table `UTILISATEURS`
--
ALTER TABLE `UTILISATEURS`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `LIVREDOR`
--
ALTER TABLE `LIVREDOR`
  MODIFY `idlivredor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `PORTEFEUILLE`
--
ALTER TABLE `PORTEFEUILLE`
  MODIFY `idportefeuille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `ROLE`
--
ALTER TABLE `ROLE`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `UTILISATEURS`
--
ALTER TABLE `UTILISATEURS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `ARTICLE_UTILISATEURS_FK` FOREIGN KEY (`id`) REFERENCES `UTILISATEURS` (`id`);

--
-- Contraintes pour la table `LIVREDOR`
--
ALTER TABLE `LIVREDOR`
  ADD CONSTRAINT `LIVREDOR_UTILISATEURS_FK` FOREIGN KEY (`id`) REFERENCES `UTILISATEURS` (`id`);

--
-- Contraintes pour la table `PORTEFEUILLE`
--
ALTER TABLE `PORTEFEUILLE`
  ADD CONSTRAINT `PORTEFEUILLE_UTILISATEURS_FK` FOREIGN KEY (`id`) REFERENCES `UTILISATEURS` (`id`);

--
-- Contraintes pour la table `ROLE`
--
ALTER TABLE `ROLE`
  ADD CONSTRAINT `ROLE_UTILISATEURS_FK` FOREIGN KEY (`id`) REFERENCES `UTILISATEURS` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
