<!--fonction_prepare  -->
<?php
        function fonction_prepare(){
                  try {
                    require 'config_bd.php';
                    $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
                    // mettre le mode d'erreur PDO en exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  // préparer le sql et lier les paramètres
                  $stmt = $conn->prepare('INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES (:nom, :prenom, :email, :motdepasse)');
                  $stmt->bindParam(':nom', $firstname);
                  $stmt->bindParam(':prenom', $lastname);
                  $stmt->bindParam(':email', $email);
                  $stmt->bindParam(':motdepasse', $motdepasse);

                  // insérer une ligne
                  $firstname = "John";
                  $lastname = "Doe";
                  $email = "john@example.com";
                  $motdepasse = "john@example.com";
                  $stmt->execute();

                  // insérer une autre ligne
                  $firstname = "Mary";
                  $lastname = "Moe";
                  $email = "mary@example.com";
                  $motdepasse = "john@example.com";
                  $stmt->execute();

                  // insérer une autre ligne
                  $firstname = "Julie";
                  $lastname = "Dooley";
                  $email = "julie@example.com";
                  $motdepasse = "john@example.com";
                  $stmt->execute();

                  echo "Nouveaux enregistrements créés avec succès";
                } catch(PDOException $e) {
                  echo "Error: " . $e->getMessage();
                }
                $conn = null;
          }
      fonction_prepare()
    ?>
<!--  -->
