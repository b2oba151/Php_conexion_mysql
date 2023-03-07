<!--insertion_multiple  -->
<?php
        function insertion_multiple(){
          try {
            require 'config_bd.php';
            $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
            // mettre le mode d'erreur PDO en exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // commencer la transaction
            $conn->beginTransaction();
            // nos déclarations SQL
            function element(string $Nom, string $Prenom, string $Email, string $Motdepasse){
              $sql = "INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES ('$Nom', '$Prenom', '$Email', '$Motdepasse')";
              return $sql;
            };
            // exécuter les requêtes SQL
            $conn->exec(element('John', 'Doe', 'john@example.com', 'mdp1'));
            $conn->exec(element('Mary', 'Moe', 'mary@example.com', 'mdp2'));
            $conn->exec(element('Julie', 'Dooley', 'julie@example.com', 'mdp3'));
            // valider la transaction
            $conn->commit();
            echo "Nouveaux enregistrements créés avec succès";
          } catch(PDOException $e) {
            // annuler la transaction si quelque chose a échoué
            $conn->rollback();
            echo "Erreur : " . $e->getMessage();
          }
          $conn = null;
          }

        insertion_multiple();
    ?>
<!--  -->
