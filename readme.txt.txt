Bienvenue sur notre Mini Facebook nommé My Face !

Pour le bon fonctionnement du site je vais vous préciser les différentes tables et columnes de la Base de donnée
il y a 4 tables :

la table 'user' qui contient les colonnes : id, login, mdp, email, remember et avatar.
la table 'lien' qui contient les colonnes : id, idUtilisateur1, idUtilisateur2 et etat.
la table 'ecrit' qui contient les colonnes : id, titre, conteny, dateEcrit, image, idAuteur et idAmi.
la table 'aime' qui contient les colonnes : id, idEcrit et idUtilisateur.

Voici le sql permettant d'avoir ces tables :
------------------------
CREATE TABLE `user` (
  id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(100) NOT NULL,
  mdp varchar(255) NOT NULL,
  email varchar(255), 
  remember varchar(255),
  avatar varchar(255),
  
  PRIMARY KEY (id),
  UNIQUE KEY login (login)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO user VALUES(1, 'gilles', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'gilles@toto.fr', '', '');


--
-- Structure de la table `ecrit`
--


CREATE TABLE `ecrit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text,
  `dateEcrit` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idAuteur` int(11) NOT NULL,
  `idAmi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Structure de la table `lien`
--

CREATE TABLE `lien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur1` int(11) NOT NULL,
  `idUtilisateur2` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE aime (
  id int(11) NOT NULL AUTO_INCREMENT,
  idEcrit int(11) NOT NULL,
  idUtilisateur int(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- une donnée dans la table ecrit

INSERT INTO `ecrit` (`id`, `titre`, `contenu`, `dateEcrit`, `image`, `idAuteur`, `idAmi`) VALUES
(1, 'test', 'alors comment ca va', '2017-10-10 16:57:14', '', 1, 1);


-----------------
Myface n'utilise pas de bibliotèque tierce et n'est pas mis en ligne.

Bonne visite sur notre site !

Valentine Ghesquiere et Manon Ghesquière