-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 22 mars 2018 à 16:46
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `OC_projet_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `pseudo`, `pass`, `date_inscription`) VALUES
(1, 'JeanForteroche', '$2y$10$HGYGdry24xATPV5tFlWWauWe.LgOyVJcmuYW.iCcvNBE65xnmOQoO', '2018-02-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`, `image`) VALUES
(1, 'Épisode 1 - En avant ', 'Jason transpirait. Ses amis venaient de lui offrir, dans une enveloppe décorée au feutre bleu, un billet d\'avion pour une destination dépassant de loin ses points de repère habituels. Interrogateur, il souleva le rectangle de papier : \"Et le retour ?\"', '2018-02-13 05:32:46', ''),
(2, 'Episode 2 - Dans l\'avion', 'Jason étira ses jambes, l\'air satisfait. Il venait de commander un jus de tomate et regardait le sel au céleri se mêler lentement à la masse rouge, reflétée dans le hublot à sa gauche. La moquette exhalait un parfum neuf dans l\'habitacle. ', '2018-02-14 15:26:42', ''),
(3, 'Episode 3 - Atterrissage forcé ', 'La bicoque qui emmenait Jason depuis New York vers Anchorage hoquetait, dégringolant d\'un trou d\'air à l\'autre, laissant entrevoir entre chaque nuage un paysage d\'un bleu acier. Jason n\'en menait pas large, mais n\'en perdait pas une miette, l’œil rivé à la carlingue.', '2018-03-14 18:06:15', ''),
(4, 'Episode 4 - Comité d\'accueil', 'Hellen souriait, le bras fatigué de soulever l\'écriteau \"Bievenue Jason\", dans la langue de Molière. Elle scrutait chaque passager, imaginant qu\'il s\'agissait de son Frenchie, avant que le crissement des roulettes de la valise s\'éloignant devant elle ne lui indiquent que ce n\'était pas encore le bon.', '2018-03-14 18:13:28', ''),
(5, 'Episode 5 - Ceci est un épisode destiné à être effacé', '<p>Supprimez-moi. </p>', '2018-03-14 18:33:44', ''),
(7, 'Episode 6 - Aurore boréale', '<p>Les rideaux clignaient entre deux rayons. Jason tardait &agrave; s\'&eacute;tirer.</p>', '2018-03-16 10:34:02', '');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `auteur` text NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `signalement` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`, `signalement`) VALUES
(1, 1, 'Lecteur assidu', 'Voilà un premier épisode qui nous laisse sur notre faim ! Hâte de découvrir les aventures de Jason', '2018-02-14 16:14:11', 0),
(2, 1, 'Jean Forteroche', 'Merci pour votre enthousiasme. La suite arrive bientôt. ', '2018-02-14 16:14:47', 0),
(3, 1, 'Fan de l\'Alaska', 'Bonjour, le billet d\'avion a-t-il pour destination l\'Alaska ?', '2018-02-14 16:15:28', 0),
(4, 1, 'Lectrice assidue', 'Vous êtes perspicace.', '2018-02-14 16:16:07', 0),
(5, 2, 'Lecteur assidu', 'Je me doutais qu\'il allait prendre l\'avion !', '2018-02-14 16:16:39', 0),
(6, 2, 'Lecteur moins assidu', 'Moi aussi !', '2018-02-23 21:23:37', 0),
(9, 2, 'Madame chaussure', 'En êtes-vous sûre ?', '2018-02-24 17:58:16', 0),
(10, 2, 'Madame piment', 'Evidemment.', '2018-02-24 17:58:27', 0),
(12, 2, 'Monsieur clairon', 'Quel fan', '2018-03-01 16:06:13', 1),
(14, 2, 'Dame clarinette', 'Quelle drôle de tête. Mazette. ', '2018-03-02 14:43:32', 0),
(18, 5, 'Et si on essayait', '[Commentaire modéré] un commentaire comme ça.', '2018-03-16 10:10:00', 0),
(19, 7, 'Lecteur interrogatif', 'Je n\'ai pas compris cet épisode', '2018-03-16 11:10:48', 1),
(20, 7, 'Lecteur d\'accord', 'Moi non plus.', '2018-03-16 11:11:14', 1),
(22, 7, 'Lecteur d\'accord', 'Moi non plus. [Vous vous répétez]', '2018-03-16 11:14:06', 0),
(24, 7, 'Lecteur ahuri', 'J\'hallucine !', '2018-03-16 14:16:29', 1),
(26, 3, 'Lectrice assidue', 'Quel suspense !', '2018-03-16 19:54:21', 0),
(27, 4, 'Agent littéraire', 'Mais qui est cette mystérieuse Hellen ?', '2018-03-16 19:54:48', 1),
(28, 7, 'Association des aurores boréales', 'Bonjour, nous aimerions vous proposer des photos pour illustrer votre épisode.', '2018-03-21 14:29:34', 0),
(30, 5, 'Lecteur interrogatif', 'Quel drôle d\'épisode, je trouve', '2018-03-21 14:36:32', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
