<!-- insertion_multiple2 -->
<?php
        function insertion_multiple2($donnees){
          try {
            require 'config_bd.php';
            $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
            // mettre le mode d'erreur PDO en exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // commencer la transaction
            $conn->beginTransaction();

            // boucle sur les données pour générer les requêtes d'insertion
            foreach ($donnees as $d) {
              $nom = $d['nom'];
              $prenom = $d['prenom'];
              $email = $d['email'];
              $motdepasse = $d['motdepasse'];

              $sql = "INSERT INTO utilisateurs (nom, prenom, email, motdepasse) 
                      VALUES ('$nom', '$prenom', '$email', '$motdepasse')";
              
              $conn->exec($sql);
            }
          
            // valider la transaction
            $conn->commit();
            echo "Les nouveaux enregistrements ont été créés avec succès";
          } catch(PDOException $e) {
            // annuler la transaction si quelque chose a échoué
            $conn->rollback();
            echo "Error: " . $e->getMessage();
          }

          $conn = null;
        }

            $donnees = [
                [
                  'nom' => 'John', 
                  'prenom' => 'Doe', 
                  'email' => 'john@example.com', 
                  'motdepasse' => 'mdp1',
                ],
                [
                  'nom' => 'Mary', 
                  'prenom' => 'Moe', 
                  'email' => 'mary@example.com', 
                  'motdepasse' => 'mdp2',
                ],
                [
                  'nom' => 'Julie', 
                  'prenom' => 'Dooley', 
                  'email' => 'julie@example.com', 
                  'motdepasse' => 'mdp3',
                ],
            ];

        insertion_multiple2($donnees);
    ?>
<!--  -->
