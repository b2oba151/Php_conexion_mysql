 <!--  creation_base-->
 <?php
          function creation_base(string $nom_de_la_base){
                try {
                  require 'config_bd.php';
                  $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
                  // mettre le mode d'erreur PDO en exception
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = "CREATE DATABASE " . $nom_de_la_base;
                  // utiliser exec() car aucun résultat n'est renvoyé
                  $conn->exec($sql);
                  echo "Base de donnée [" . $nom_de_la_base . "] crée avec succes<br>";
                } catch (PDOException $e) {
                  echo $sql . "<br>" . $e->getMessage();
                }

                $conn = null;
          }
      ?>
<!--  -->
