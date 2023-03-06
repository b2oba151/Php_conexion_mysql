<?php 
function creation_base(string $nom_de_la_base){
    try {
        require 'config_bd.php';
      $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
  // mettre le mode d'erreur PDO en exception
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE " .$nom_de_la_base;
  // utiliser exec() car aucun résultat n'est renvoyé
        $conn->exec($sql);
      echo "Base de donnée [". $nom_de_la_base."] crée avec succes<br>";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}
?>


<?php

function cree_table(string $nom_de_la_table){
try {
  require 'config_bd.php';
  $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
  // mettre le mode d'erreur PDO en exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql pour créer table
  $sql = "CREATE TABLE " .$nom_de_la_table.  "(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  prenom VARCHAR(30) NOT NULL,
  nom VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // utiliser exec() car aucun résultat n'est renvoyé
  $conn->exec($sql);
  echo "Table [" .$nom_de_la_table."]  crée avec succès";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;}
?>



?>