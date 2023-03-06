<?php 
function update_entre_where(string $table, string $champ_update, $update_valeur, string $champ, $condition, $valeur) {
    require 'config_bd.php';
    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
        $sql = $conn->prepare("UPDATE $table SET $champ_update = :update_valeur WHERE $champ $condition :valeur");
        $sql->bindParam(':update_valeur', $update_valeur);
        $sql->bindParam(':valeur', $valeur);
        $sql->execute();
  
        echo "Enregistrement mis à jour avec succès";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
  
// update_entre_where('utilisateurs', 'nom', 'nnn', 'id', '=', '23');
?>