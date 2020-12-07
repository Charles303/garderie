-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 07 déc. 2020 à 16:22
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `garderie`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `lire_commentaire` (IN `con` CHAR(20))  BEGIN
  SELECT texte FROM commentaires
  WHERE garderie_id = 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `backups_commentaires`
--

CREATE TABLE `backups_commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `backups_commentaires`
--

INSERT INTO `backups_commentaires` (`id`, `commentaire`) VALUES
(1, 'test trigger'),
(2, 'C\'est parfait'),
(3, 'test trigger note'),
(11, 'test average'),
(12, 'test average'),
(13, 'test average');

-- --------------------------------------------------------

--
-- Structure de la table `cadeaux`
--

CREATE TABLE `cadeaux` (
  `id` int(11) NOT NULL,
  `cadeau` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `enfant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cadeaux`
--

INSERT INTO `cadeaux` (`id`, `cadeau`, `enfant_id`) VALUES
(1, 'Robot', 6);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `texte` text COLLATE utf8mb4_general_ci NOT NULL,
  `note` int(11) DEFAULT NULL,
  `garderie_id` int(11) DEFAULT NULL,
  `gardienne_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `texte`, `note`, `garderie_id`, `gardienne_id`) VALUES
(7, '\r\n                af', NULL, NULL, 2),
(9, '\r\n                bon établissement', NULL, 3, NULL),
(10, '\r\n                déçu', NULL, NULL, 1),
(15, 'test trigger', NULL, 1, 1),
(16, 'C\'est parfait', 5, NULL, 1),
(17, 'test trigger note', 4, NULL, 1),
(25, 'test average', 1, NULL, 1),
(26, 'test average', 1, NULL, 1),
(27, 'test average', 1, NULL, 1);

--
-- Déclencheurs `commentaires`
--
DELIMITER $$
CREATE TRIGGER `backup` BEFORE INSERT ON `commentaires` FOR EACH ROW BEGIN
INSERT INTO backups_commentaires VALUES (NEW.id,NEW.texte);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `note_gardienne` AFTER INSERT ON `commentaires` FOR EACH ROW BEGIN
update gardiennes set note = NEW.note where id = NEW.gardienne_id;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

CREATE TABLE `enfants` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `datenaissance` date NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `garderies`
--

CREATE TABLE `garderies` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `garderies`
--

INSERT INTO `garderies` (`id`, `nom`, `ville`, `adresse`) VALUES
(1, 'Garderie Victoriaville', 'Victoriaville', '123 rue sapin'),
(2, 'Garderie Plessisville', 'Plessisville', '321 rue bois'),
(3, 'Garderie Warwick', 'Warwick', '456 rue bozo');

-- --------------------------------------------------------

--
-- Structure de la table `gardiennes`
--

CREATE TABLE `gardiennes` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `note` int(11) DEFAULT NULL,
  `garderie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gardiennes`
--

INSERT INTO `gardiennes` (`id`, `prenom`, `nom`, `note`, `garderie_id`) VALUES
(1, 'Natasha', 'Goodyear', 1, 1),
(2, 'Lucie', 'Paul', NULL, 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `lire_commentaire`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `lire_commentaire` (
);

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `session` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `annee` int(11) NOT NULL,
  `gardienne_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `niveau`, `session`, `annee`, `gardienne_id`) VALUES
(1, 1, 'Autonme', 2020, 1),
(2, 2, 'Autonme', 2020, 2);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `validation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parents`
--

INSERT INTO `parents` (`id`, `prenom`, `nom`, `email`, `password`, `token`, `validation`) VALUES
(12, 'Charles', 'Lavoie', 'charlou190@gmail.com', '$2y$10$n/Y9kkxNvpf2FgfoUXdv8eTaVCENht5uxF7vG.EmgkoAsWkPk3rxa', 'ldB9bOCgwwbDT5WtdupK', 1);

-- --------------------------------------------------------

--
-- Structure de la vue `lire_commentaire`
--
DROP TABLE IF EXISTS `lire_commentaire`;
-- Erreur de lecture de structure pour la table garderie.lire_commentaire : #1066 - Table/alias: 'commentaires' non unique

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `backups_commentaires`
--
ALTER TABLE `backups_commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cadeaux`
--
ALTER TABLE `cadeaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enfant_id` (`enfant_id`) USING BTREE;

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garderie_id` (`garderie_id`),
  ADD KEY `gardienne_id` (`gardienne_id`);

--
-- Index pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveau_id` (`niveau_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Index pour la table `garderies`
--
ALTER TABLE `garderies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gardiennes`
--
ALTER TABLE `gardiennes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garderie_id` (`garderie_id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gardienne_id` (`gardienne_id`);

--
-- Index pour la table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `backups_commentaires`
--
ALTER TABLE `backups_commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `enfants`
--
ALTER TABLE `enfants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `garderie_id` FOREIGN KEY (`garderie_id`) REFERENCES `garderies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `gardiennes_id` FOREIGN KEY (`gardienne_id`) REFERENCES `gardiennes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `enfants_niveau_1` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `enfants_parents_id` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`);

--
-- Contraintes pour la table `gardiennes`
--
ALTER TABLE `gardiennes`
  ADD CONSTRAINT `gardiennes_ibfk_1` FOREIGN KEY (`garderie_id`) REFERENCES `garderies` (`id`);

--
-- Contraintes pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD CONSTRAINT `gardienne_id` FOREIGN KEY (`gardienne_id`) REFERENCES `gardiennes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
