 
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
CREATE TABLE utilisateurs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('candidat', 'recruteur') NOT NULL
);
--nonnnfghgyh