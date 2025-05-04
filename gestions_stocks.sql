-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 04 mai 2025 à 12:33
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestions_stocks`
--

-- --------------------------------------------------------

--
-- Structure de la table `camion`
--

CREATE TABLE `camion` (
  `id_camion` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `camion`
--

INSERT INTO `camion` (`id_camion`, `nom`, `immatriculation`, `etat`) VALUES
(1, 'grand model', 'LT35546677', 'en cours'),
(2, 'petit model', 'LT3445678', 'en cours'),
(3, 'toyota', 'LT678', 'arret');

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id_chauffeur` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chauffeur`
--

INSERT INTO `chauffeur` (`id_chauffeur`, `nom`, `telephone`, `adresse`, `email`, `etat`) VALUES
(1, 'angelo', '675544365', 'MAKEP', 'angelo@gmail.com', 'en cours'),
(2, 'christian', '655899023', 'bonamoussadi', 'christian@gmail.com', 'en cours'),
(3, 'maykeur', '637825647', 'MAKEPE', 'maykeur@gmail.com', 'arret');

-- --------------------------------------------------------

--
-- Structure de la table `commande_achat`
--

CREATE TABLE `commande_achat` (
  `id_achat` int(255) NOT NULL,
  `id_fournisseur` int(255) NOT NULL,
  `id_chauffeur` int(255) NOT NULL,
  `id_camion` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_jour` int(255) NOT NULL,
  `montantAchat` int(255) NOT NULL,
  `dateAchat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_achat`
--

INSERT INTO `commande_achat` (`id_achat`, `id_fournisseur`, `id_chauffeur`, `id_camion`, `id_user`, `id_jour`, `montantAchat`, `dateAchat`) VALUES
(1, 1, 1, 1, 1, 1, 0, '2024-04-02'),
(2, 1, 2, 2, 1, 2, 0, '2024-04-02'),
(3, 1, 1, 1, 1, 3, 0, '2024-04-02'),
(4, 1, 1, 1, 1, 3, 0, '2024-04-02'),
(5, 1, 1, 1, 1, 4, 0, '2024-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `commande_sortie`
--

CREATE TABLE `commande_sortie` (
  `id_sortie` int(255) NOT NULL,
  `id_chauffeur` int(255) NOT NULL,
  `id_jour` int(255) NOT NULL,
  `id_camion` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_vendeur` int(255) NOT NULL,
  `date_sortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_sortie`
--

INSERT INTO `commande_sortie` (`id_sortie`, `id_chauffeur`, `id_jour`, `id_camion`, `id_user`, `id_vendeur`, `date_sortie`) VALUES
(1, 1, 1, 1, 1, 1, '2024-04-02'),
(2, 1, 2, 1, 1, 1, '2024-04-02'),
(3, 1, 3, 1, 1, 1, '2024-04-02'),
(4, 1, 3, 1, 1, 1, '2024-04-02'),
(5, 1, 4, 1, 1, 1, '2024-04-02');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom`, `telephone`, `adresse`, `email`, `etat`) VALUES
(1, 'JUlio', '637829101', 'MAKEPE', 'ryan@christgmail.com', 'en cours'),
(2, 'EMILIE', '675079004', 'Yasa', 'EMILIE@gmail.com', 'arret'),
(3, 'Fotsos', '637829101', 'MAKEPE', 'fotso@gmail.com', 'arret'),
(4, 'Jordan', '673839239', 'MAKEPE', 'jordan@gmail.com', 'arret'),
(5, 'Brice', '654437745', 'MAKEPE', 'Brice@gmail.com', 'arret'),
(7, 'roberto', '67888999', 'MAKEPE', 'jorda@gmail.com', 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `id_jour` int(255) NOT NULL,
  `nom_jour` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`id_jour`, `nom_jour`, `date`, `etat`) VALUES
(1, 'Mardi 2024-04-02', '2024-04-02', 'termine'),
(2, 'Mardi 2024-04-02', '2024-04-02', 'termine'),
(3, 'Mardi 2024-04-02', '2024-04-02', 'termine'),
(4, 'Mardi 2024-04-02', '2024-04-02', 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `ligneachat`
--

CREATE TABLE `ligneachat` (
  `id_produit` int(255) NOT NULL,
  `id_achat` int(255) NOT NULL,
  `quantite` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ligneachat`
--

INSERT INTO `ligneachat` (`id_produit`, `id_achat`, `quantite`) VALUES
(1, 1, 233),
(1, 2, 143),
(1, 3, 50),
(2, 1, 233),
(3, 4, 80),
(12, 5, 80);

-- --------------------------------------------------------

--
-- Structure de la table `ligneperte_magasin`
--

CREATE TABLE `ligneperte_magasin` (
  `id_stock` int(255) NOT NULL,
  `id_produit` int(255) NOT NULL,
  `quantite` int(255) NOT NULL,
  `justification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignesortie`
--

CREATE TABLE `lignesortie` (
  `id_produit` int(255) NOT NULL,
  `id_sortie` int(255) NOT NULL,
  `quantiteSortie` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignesortie`
--

INSERT INTO `lignesortie` (`id_produit`, `id_sortie`, `quantiteSortie`) VALUES
(1, 1, 20),
(1, 2, 23),
(1, 3, 12),
(2, 1, 23),
(3, 4, 40),
(12, 5, 20);

-- --------------------------------------------------------

--
-- Structure de la table `lignestock`
--

CREATE TABLE `lignestock` (
  `id_produit` int(255) NOT NULL,
  `id_jour` int(11) NOT NULL,
  `quantite` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignestock`
--

INSERT INTO `lignestock` (`id_produit`, `id_jour`, `quantite`) VALUES
(1, 1, 215),
(1, 2, 339),
(1, 3, 377),
(2, 1, 211),
(2, 2, 211),
(2, 3, 211),
(3, 1, 0),
(3, 2, 0),
(3, 3, 46),
(12, 1, 0),
(12, 2, 0),
(12, 3, 0),
(14, 1, 0),
(14, 2, 0),
(14, 3, 0),
(15, 1, 0),
(15, 2, 0),
(15, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_pertevendeur`
--

CREATE TABLE `ligne_pertevendeur` (
  `id_produit` int(255) NOT NULL,
  `id_sortie` int(11) NOT NULL,
  `quantite` int(255) NOT NULL,
  `justification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_retour`
--

CREATE TABLE `ligne_retour` (
  `id_produit` int(11) NOT NULL,
  `id_sortie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ligne_retour`
--

INSERT INTO `ligne_retour` (`id_produit`, `id_sortie`, `quantite`) VALUES
(1, 1, 2),
(1, 2, 4),
(2, 1, 1),
(3, 4, 6),
(12, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `quantite` int(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `fournisseur` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `quantite`, `categorie`, `fournisseur`, `etat`) VALUES
(1, '33 EXPORT', 0, 'BRASSERIES', '0', 'en cours'),
(2, 'GUI-PT', 0, 'GUINESS', '0', 'en cours'),
(3, 'MUTZIG', 0, 'BRASSERIES', '0', 'en cours'),
(8, 'BOOSTER', 0, 'BRASSERIES', '0', 'arret'),
(12, 'KADJI', 0, 'BRASSERIES', '0', 'en cours'),
(14, 'CASTEL', 0, 'BRASSERIES', '0', 'en cours'),
(15, 'CASTLE', 0, 'BRASSERIES', '0', 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(255) NOT NULL,
  `id_jour` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `usernames` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `usernames`, `email`, `passwords`, `roles`) VALUES
(1, 'roberto', 'roberto@gmail.com', 'cedignokr', 'ADMINISTRATEUR'),
(7, 'ange', 'anges@gmail.com', 'anges1234', 'MAGASINER');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id_vendeur` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id_vendeur`, `nom`, `telephone`, `adresse`, `email`, `etat`) VALUES
(1, 'Ricardo', '65342892023', 'makepe', 'Ricardo@gmail.com', 'en cours'),
(2, 'Harold', '678543291', 'MAKEPE', 'Harold@gmail.com', 'en cours');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`id_camion`);

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`id_chauffeur`);

--
-- Index pour la table `commande_achat`
--
ALTER TABLE `commande_achat`
  ADD PRIMARY KEY (`id_achat`),
  ADD KEY `id_camion` (`id_camion`),
  ADD KEY `id_chauffeur` (`id_chauffeur`),
  ADD KEY `id_fournisseur` (`id_fournisseur`),
  ADD KEY `id_jour` (`id_jour`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `commande_sortie`
--
ALTER TABLE `commande_sortie`
  ADD PRIMARY KEY (`id_sortie`),
  ADD KEY `id_camion` (`id_camion`),
  ADD KEY `id_chauffeur` (`id_chauffeur`),
  ADD KEY `id_jour` (`id_jour`),
  ADD KEY `id_vendeur` (`id_vendeur`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`),
  ADD UNIQUE KEY `const_uniq` (`email`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`id_jour`);

--
-- Index pour la table `ligneachat`
--
ALTER TABLE `ligneachat`
  ADD PRIMARY KEY (`id_produit`,`id_achat`),
  ADD KEY `cf1` (`id_achat`);

--
-- Index pour la table `ligneperte_magasin`
--
ALTER TABLE `ligneperte_magasin`
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_stock` (`id_stock`);

--
-- Index pour la table `lignesortie`
--
ALTER TABLE `lignesortie`
  ADD PRIMARY KEY (`id_produit`,`id_sortie`),
  ADD KEY `id_sortie` (`id_sortie`);

--
-- Index pour la table `lignestock`
--
ALTER TABLE `lignestock`
  ADD PRIMARY KEY (`id_produit`,`id_jour`),
  ADD KEY `lignestock_ibfk_1` (`id_jour`);

--
-- Index pour la table `ligne_pertevendeur`
--
ALTER TABLE `ligne_pertevendeur`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_sortie` (`id_sortie`);

--
-- Index pour la table `ligne_retour`
--
ALTER TABLE `ligne_retour`
  ADD PRIMARY KEY (`id_produit`,`id_sortie`),
  ADD KEY `id_sortie` (`id_sortie`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_jour` (`id_jour`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id_vendeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `camion`
--
ALTER TABLE `camion`
  MODIFY `id_camion` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id_chauffeur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande_achat`
--
ALTER TABLE `commande_achat`
  MODIFY `id_achat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande_sortie`
--
ALTER TABLE `commande_sortie`
  MODIFY `id_sortie` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `id_jour` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id_vendeur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande_achat`
--
ALTER TABLE `commande_achat`
  ADD CONSTRAINT `commande_achat_ibfk_2` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeur` (`id_chauffeur`),
  ADD CONSTRAINT `commande_achat_ibfk_3` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `commande_achat_ibfk_4` FOREIGN KEY (`id_jour`) REFERENCES `jour` (`id_jour`),
  ADD CONSTRAINT `commande_achat_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `commande_sortie`
--
ALTER TABLE `commande_sortie`
  ADD CONSTRAINT `commande_sortie_ibfk_1` FOREIGN KEY (`id_camion`) REFERENCES `camion` (`id_camion`),
  ADD CONSTRAINT `commande_sortie_ibfk_2` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeur` (`id_chauffeur`),
  ADD CONSTRAINT `commande_sortie_ibfk_3` FOREIGN KEY (`id_jour`) REFERENCES `jour` (`id_jour`),
  ADD CONSTRAINT `commande_sortie_ibfk_4` FOREIGN KEY (`id_vendeur`) REFERENCES `vendeur` (`id_vendeur`);

--
-- Contraintes pour la table `ligneachat`
--
ALTER TABLE `ligneachat`
  ADD CONSTRAINT `cf1` FOREIGN KEY (`id_achat`) REFERENCES `commande_achat` (`id_achat`),
  ADD CONSTRAINT `cf2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `ligneachat_ibfk_1` FOREIGN KEY (`id_achat`) REFERENCES `commande_achat` (`id_achat`),
  ADD CONSTRAINT `ligneachat_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `ligneperte_magasin`
--
ALTER TABLE `ligneperte_magasin`
  ADD CONSTRAINT `ligneperte_magasin_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `ligneperte_magasin_ibfk_2` FOREIGN KEY (`id_stock`) REFERENCES `stock` (`id_stock`);

--
-- Contraintes pour la table `lignesortie`
--
ALTER TABLE `lignesortie`
  ADD CONSTRAINT `lignesortie_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `lignesortie_ibfk_2` FOREIGN KEY (`id_sortie`) REFERENCES `commande_sortie` (`id_sortie`);

--
-- Contraintes pour la table `lignestock`
--
ALTER TABLE `lignestock`
  ADD CONSTRAINT `lignestock_ibfk_1` FOREIGN KEY (`id_jour`) REFERENCES `jour` (`id_jour`);

--
-- Contraintes pour la table `ligne_pertevendeur`
--
ALTER TABLE `ligne_pertevendeur`
  ADD CONSTRAINT `ligne_pertevendeur_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `ligne_pertevendeur_ibfk_3` FOREIGN KEY (`id_sortie`) REFERENCES `commande_sortie` (`id_sortie`);

--
-- Contraintes pour la table `ligne_retour`
--
ALTER TABLE `ligne_retour`
  ADD CONSTRAINT `ligne_retour_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `ligne_retour_ibfk_2` FOREIGN KEY (`id_sortie`) REFERENCES `commande_sortie` (`id_sortie`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_jour`) REFERENCES `jour` (`id_jour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
