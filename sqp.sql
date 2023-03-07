 
-- Suppression de la base de données si elle existe déjà
DROP DATABASE IF EXISTS nom_de_la_base_de_donnees;

-- Création de la base de données avec l'utilisateur spécifié
CREATE DATABASE nom_de_la_base_de_donnees CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Sélection de la base de données
USE nom_de_la_base_de_donnees;

-- Vérification si l'utilisateur existe
SELECT COUNT(*) AS user_count FROM mysql.user WHERE user = 'nom_utilisateur';

-- Si l'utilisateur n'existe pas, il est créé avec des privilèges pour la base de données
IF user_count = 0 THEN
  CREATE USER 'nom_utilisateur'@'localhost' IDENTIFIED BY 'mot_de_passe';
  GRANT ALL PRIVILEGES ON nom_de_la_base_de_donnees.* TO 'nom_utilisateur'@'localhost';
END IF;

-- Création de la table "utilisateurs"
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--nonnnfghgyh