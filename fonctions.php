<?php 
function creation_base(string $nom_de_la_base){
    try {
        require 'config_bd.php';
      $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE DATABASE $nom_de_la_base";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "Base de donnée crée avec succes<br>";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}
