-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Mai 2017 à 13:57
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cystopia`
--

-- --------------------------------------------------------

--
-- Structure de la table `attaque_creature`
--

CREATE TABLE `attaque_creature` (
  `instant` datetime NOT NULL,
  `c_id_carte_tmp` int(11) NOT NULL,
  `c_id_carte_tmp_1` int(11) NOT NULL,
  `t_id_tour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attaque_hero`
--

CREATE TABLE `attaque_hero` (
  `instant` datetime NOT NULL,
  `c_id_carte_tmp` int(11) NOT NULL,
  `t_id_tour` int(11) NOT NULL,
  `h_id_hero_tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `c_id` int(11) NOT NULL,
  `c_nom` varchar(255) NOT NULL,
  `c_mana_cout` int(11) NOT NULL,
  `c_type` tinyint(1) DEFAULT NULL COMMENT '0 = creature 1 = sort',
  `c_attaque` int(11) DEFAULT NULL,
  `c_vie` int(11) DEFAULT NULL,
  `c_bouclier` tinyint(1) DEFAULT NULL,
  `c_legendaire` tinyint(1) DEFAULT NULL,
  `c_visuel` varchar(255) NOT NULL,
  `c_citation` varchar(255) DEFAULT NULL,
  `f_id_faction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `carte_tmp`
--

CREATE TABLE `carte_tmp` (
  `c_id` int(11) NOT NULL,
  `c_mana_cout` int(11) NOT NULL,
  `c_attaque` int(11) DEFAULT NULL,
  `c_vie` int(11) DEFAULT NULL,
  `c_bouclier` tinyint(1) DEFAULT NULL,
  `c_id_carte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `deck`
--

CREATE TABLE `deck` (
  `d_id` int(11) NOT NULL,
  `d_libelle` varchar(255) NOT NULL,
  `u_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faction`
--

CREATE TABLE `faction` (
  `f_id` int(11) NOT NULL,
  `f_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `faction`
--

INSERT INTO `faction` (`f_id`, `f_nom`) VALUES
(1, 'Manga'),
(2, 'Cyberpunk');

-- --------------------------------------------------------

--
-- Structure de la table `hero`
--

CREATE TABLE `hero` (
  `h_id` int(11) NOT NULL,
  `h_nom` varchar(255) NOT NULL,
  `h_vie` int(11) NOT NULL,
  `h_visuel` varchar(255) NOT NULL,
  `f_id_faction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hero_tmp`
--

CREATE TABLE `hero_tmp` (
  `h_id` int(11) NOT NULL,
  `h_vie` int(11) NOT NULL,
  `h_id_hero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `invoque`
--

CREATE TABLE `invoque` (
  `instant` datetime NOT NULL,
  `c_id_carte_tmp` int(11) NOT NULL,
  `t_id_tour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `j_id` int(11) NOT NULL,
  `u_id_user` int(11) NOT NULL,
  `d_id_deck` int(11) NOT NULL,
  `h_id_hero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `p_id` int(11) NOT NULL,
  `p_date_debut` datetime NOT NULL,
  `p_date_fin` datetime NOT NULL,
  `u_id_user` int(11) NOT NULL,
  `j_id_joueur` int(11) NOT NULL,
  `j_id_joueur_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pioche`
--

CREATE TABLE `pioche` (
  `instant` datetime NOT NULL,
  `c_id_carte_tmp` int(11) NOT NULL,
  `t_id_tour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `r_id` int(11) NOT NULL,
  `r_lbl` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`r_id`, `r_lbl`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'invite');

-- --------------------------------------------------------

--
-- Structure de la table `se_compose_de`
--

CREATE TABLE `se_compose_de` (
  `d_id_deck` int(11) NOT NULL,
  `c_id_carte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tour`
--

CREATE TABLE `tour` (
  `t_id` int(11) NOT NULL,
  `t_mana_disponible` int(11) NOT NULL,
  `p_id_partie` int(11) NOT NULL,
  `h_id_hero_tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_login` varchar(250) NOT NULL,
  `u_nom` varchar(250) NOT NULL,
  `u_prenom` varchar(250) NOT NULL,
  `u_mail` varchar(250) NOT NULL,
  `u_password` varchar(250) NOT NULL,
  `u_actif` tinyint(1) NOT NULL COMMENT '0= inactif 1=actif ',
  `r_id_role` int(11) NOT NULL COMMENT '1=superadmin 2=admin 3=invite'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`u_id`, `u_login`, `u_nom`, `u_prenom`, `u_mail`, `u_password`, `u_actif`, `r_id_role`) VALUES
(1, '111', 'Lannister', 'Cersei', '111@gmail.com', '1111', 1, 1),
(2, '222', 'White', 'Skiller', '222@gmail.com', '2222', 1, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attaque_creature`
--
ALTER TABLE `attaque_creature`
  ADD PRIMARY KEY (`c_id_carte_tmp`,`c_id_carte_tmp_1`,`t_id_tour`),
  ADD KEY `FK_attaque_creature_c_id_carte_tmp_1` (`c_id_carte_tmp_1`),
  ADD KEY `FK_attaque_creature_t_id_tour` (`t_id_tour`);

--
-- Index pour la table `attaque_hero`
--
ALTER TABLE `attaque_hero`
  ADD PRIMARY KEY (`c_id_carte_tmp`,`t_id_tour`,`h_id_hero_tmp`),
  ADD KEY `FK_attaque_hero_t_id_tour` (`t_id_tour`),
  ADD KEY `FK_attaque_hero_h_id_hero_tmp` (`h_id_hero_tmp`);

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `FK_carte_f_id_faction` (`f_id_faction`);

--
-- Index pour la table `carte_tmp`
--
ALTER TABLE `carte_tmp`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `FK_carte_tmp_c_id_carte` (`c_id_carte`);

--
-- Index pour la table `deck`
--
ALTER TABLE `deck`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `FK_deck_u_id_user` (`u_id_user`);

--
-- Index pour la table `faction`
--
ALTER TABLE `faction`
  ADD PRIMARY KEY (`f_id`);

--
-- Index pour la table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `FK_hero_f_id_faction` (`f_id_faction`);

--
-- Index pour la table `hero_tmp`
--
ALTER TABLE `hero_tmp`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `FK_hero_tmp_h_id_hero` (`h_id_hero`);

--
-- Index pour la table `invoque`
--
ALTER TABLE `invoque`
  ADD PRIMARY KEY (`c_id_carte_tmp`,`t_id_tour`),
  ADD KEY `FK_invoque_t_id_tour` (`t_id_tour`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`j_id`),
  ADD KEY `FK_joueur_u_id_user` (`u_id_user`),
  ADD KEY `FK_joueur_d_id_deck` (`d_id_deck`),
  ADD KEY `FK_joueur_h_id_hero` (`h_id_hero`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `FK_partie_u_id_user` (`u_id_user`),
  ADD KEY `FK_partie_j_id_joueur` (`j_id_joueur`),
  ADD KEY `FK_partie_j_id_joueur_1` (`j_id_joueur_1`);

--
-- Index pour la table `pioche`
--
ALTER TABLE `pioche`
  ADD PRIMARY KEY (`c_id_carte_tmp`,`t_id_tour`),
  ADD KEY `FK_pioche_t_id_tour` (`t_id_tour`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Index pour la table `se_compose_de`
--
ALTER TABLE `se_compose_de`
  ADD PRIMARY KEY (`d_id_deck`,`c_id_carte`),
  ADD KEY `FK_se_compose_de_c_id_carte` (`c_id_carte`);

--
-- Index pour la table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `FK_tour_p_id_partie` (`p_id_partie`),
  ADD KEY `FK_tour_h_id_hero_tmp` (`h_id_hero_tmp`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `FK_user_r_id_role` (`r_id_role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `carte_tmp`
--
ALTER TABLE `carte_tmp`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `deck`
--
ALTER TABLE `deck`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `faction`
--
ALTER TABLE `faction`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `hero`
--
ALTER TABLE `hero`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `hero_tmp`
--
ALTER TABLE `hero_tmp`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tour`
--
ALTER TABLE `tour`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attaque_creature`
--
ALTER TABLE `attaque_creature`
  ADD CONSTRAINT `FK_attaque_creature_c_id_carte_tmp` FOREIGN KEY (`c_id_carte_tmp`) REFERENCES `carte_tmp` (`c_id`),
  ADD CONSTRAINT `FK_attaque_creature_c_id_carte_tmp_1` FOREIGN KEY (`c_id_carte_tmp_1`) REFERENCES `carte_tmp` (`c_id`),
  ADD CONSTRAINT `FK_attaque_creature_t_id_tour` FOREIGN KEY (`t_id_tour`) REFERENCES `tour` (`t_id`);

--
-- Contraintes pour la table `attaque_hero`
--
ALTER TABLE `attaque_hero`
  ADD CONSTRAINT `FK_attaque_hero_c_id_carte_tmp` FOREIGN KEY (`c_id_carte_tmp`) REFERENCES `carte_tmp` (`c_id`),
  ADD CONSTRAINT `FK_attaque_hero_h_id_hero_tmp` FOREIGN KEY (`h_id_hero_tmp`) REFERENCES `hero_tmp` (`h_id`),
  ADD CONSTRAINT `FK_attaque_hero_t_id_tour` FOREIGN KEY (`t_id_tour`) REFERENCES `tour` (`t_id`);

--
-- Contraintes pour la table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `FK_carte_f_id_faction` FOREIGN KEY (`f_id_faction`) REFERENCES `faction` (`f_id`);

--
-- Contraintes pour la table `carte_tmp`
--
ALTER TABLE `carte_tmp`
  ADD CONSTRAINT `FK_carte_tmp_c_id_carte` FOREIGN KEY (`c_id_carte`) REFERENCES `carte` (`c_id`);

--
-- Contraintes pour la table `deck`
--
ALTER TABLE `deck`
  ADD CONSTRAINT `FK_deck_u_id_user` FOREIGN KEY (`u_id_user`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `hero`
--
ALTER TABLE `hero`
  ADD CONSTRAINT `FK_hero_f_id_faction` FOREIGN KEY (`f_id_faction`) REFERENCES `faction` (`f_id`);

--
-- Contraintes pour la table `hero_tmp`
--
ALTER TABLE `hero_tmp`
  ADD CONSTRAINT `FK_hero_tmp_h_id_hero` FOREIGN KEY (`h_id_hero`) REFERENCES `hero` (`h_id`);

--
-- Contraintes pour la table `invoque`
--
ALTER TABLE `invoque`
  ADD CONSTRAINT `FK_invoque_c_id_carte_tmp` FOREIGN KEY (`c_id_carte_tmp`) REFERENCES `carte_tmp` (`c_id`),
  ADD CONSTRAINT `FK_invoque_t_id_tour` FOREIGN KEY (`t_id_tour`) REFERENCES `tour` (`t_id`);

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `FK_joueur_d_id_deck` FOREIGN KEY (`d_id_deck`) REFERENCES `deck` (`d_id`),
  ADD CONSTRAINT `FK_joueur_h_id_hero` FOREIGN KEY (`h_id_hero`) REFERENCES `hero` (`h_id`),
  ADD CONSTRAINT `FK_joueur_u_id_user` FOREIGN KEY (`u_id_user`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `FK_partie_j_id_joueur` FOREIGN KEY (`j_id_joueur`) REFERENCES `joueur` (`j_id`),
  ADD CONSTRAINT `FK_partie_j_id_joueur_1` FOREIGN KEY (`j_id_joueur_1`) REFERENCES `joueur` (`j_id`),
  ADD CONSTRAINT `FK_partie_u_id_user` FOREIGN KEY (`u_id_user`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `pioche`
--
ALTER TABLE `pioche`
  ADD CONSTRAINT `FK_pioche_c_id_carte_tmp` FOREIGN KEY (`c_id_carte_tmp`) REFERENCES `carte_tmp` (`c_id`),
  ADD CONSTRAINT `FK_pioche_t_id_tour` FOREIGN KEY (`t_id_tour`) REFERENCES `tour` (`t_id`);

--
-- Contraintes pour la table `se_compose_de`
--
ALTER TABLE `se_compose_de`
  ADD CONSTRAINT `FK_se_compose_de_c_id_carte` FOREIGN KEY (`c_id_carte`) REFERENCES `carte` (`c_id`),
  ADD CONSTRAINT `FK_se_compose_de_d_id_deck` FOREIGN KEY (`d_id_deck`) REFERENCES `deck` (`d_id`);

--
-- Contraintes pour la table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `FK_tour_h_id_hero_tmp` FOREIGN KEY (`h_id_hero_tmp`) REFERENCES `hero_tmp` (`h_id`),
  ADD CONSTRAINT `FK_tour_p_id_partie` FOREIGN KEY (`p_id_partie`) REFERENCES `partie` (`p_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_r_id_role` FOREIGN KEY (`r_id_role`) REFERENCES `role` (`r_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
