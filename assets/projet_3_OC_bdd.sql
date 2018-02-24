-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 24 fév. 2018 à 19:27
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
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`, `image`) VALUES
(1, 'Épisode 1 - En avant ', 'Jason transpirait. Ses amis venaient de lui offrir, dans une enveloppe décorée au feutre bleu, un billet d\'avion pour une destination dépassant de loin ses points de repère habituels. Interrogateur, il souleva le rectangle de papier : \"Et le retour ?\"', '2018-02-13 05:32:46', ''),
(2, 'Episode 2 - Dans l\'avion', 'Jason étira ses jambes, l\'air satisfait. Il venait de commander un jus de tomate et regardait le sel au céleri se mêler lentement à la masse rouge, reflétée dans le hublot à sa gauche. ', '2018-02-14 15:26:42', '');

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
(11, 2, 'Monsieur clairon', 'Quel fanfaron', '2018-02-24 17:58:38', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
