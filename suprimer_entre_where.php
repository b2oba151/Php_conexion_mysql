<?php 
function supprimer_entre_where(string $table, string $champ, mixed $condition, mixed $valeur) {
    try {
      require 'config_bd.php';
      $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      $sql = $conn->prepare("DELETE FROM $table WHERE $champ $condition :valeur");
      $sql->bindParam(':valeur', $valeur);
      $sql->execute();
  
      echo "Enregistrement supprimé avec succès";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
  }
  
  supprimer_entre_where('utilisateurs', 'id', '>', '18');
  
?>