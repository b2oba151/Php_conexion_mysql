 
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


<!-- cree_table -->
    <?php
      function cree_table(string $nom_de_la_table){
          try {
            require 'config_bd.php';
            $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
            // mettre le mode d'erreur PDO en exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql pour créer table
            $sql = "CREATE TABLE " . $nom_de_la_table .  "(
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          prenom VARCHAR(30) NOT NULL,
          nom VARCHAR(30) NOT NULL,
          email VARCHAR(50),
          date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          )";

            // utiliser exec() car aucun résultat n'est renvoyé
            $conn->exec($sql);
            echo "Table [" . $nom_de_la_table . "]  crée avec succès";
          } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }

          $conn = null;
        }
    ?>
<!--  -->

<!--  recuper_dernier_id-->
    <?php
         function recuper_dernier_id(string $Nom, string $Prenom, string $Email, string $Motdepasse){
            try {
              require 'config_bd.php';
              $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
              // mettre le mode d'erreur PDO en exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sql = "INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES ('$Nom', '$Prenom', '$Email', '$Motdepasse')";
              // utiliser exec() car aucun résultat n'est renvoyé
              $conn->exec($sql);
              $last_id = $conn->lastInsertId();
              echo "Le nouvel enregistrement a été créé avec succès. Le dernier ID inséré est : " . $last_id;
            } catch (PDOException $e) {
              echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
          }
    // recuper_dernier_id('bouu', 'diarr', 'jdfhvf@gh.gh', 'dgfgfg');
    ?>
<!--  -->

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
            // $conn->exec(element('John', 'Doe', 'john@example.com', 'mdp1'));
            // $conn->exec(element('Mary', 'Moe', 'mary@example.com', 'mdp2'));
            // $conn->exec(element('Julie', 'Dooley', 'julie@example.com', 'mdp3'));
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

        // insertion_multiple();
    ?>
<!--  -->



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

            // $donnees = [
              //   [
              //     'nom' => 'John', 
              //     'prenom' => 'Doe', 
              //     'email' => 'john@example.com', 
              //     'motdepasse' => 'mdp1',
              //   ],
              //   [
              //     'nom' => 'Mary', 
              //     'prenom' => 'Moe', 
              //     'email' => 'mary@example.com', 
              //     'motdepasse' => 'mdp2',
              //   ],
              //   [
              //     'nom' => 'Julie', 
              //     'prenom' => 'Dooley', 
              //     'email' => 'julie@example.com', 
              //     'motdepasse' => 'mdp3',
              //   ],
            // ];

        // insertion_multiple2($donnees);
    ?>
<!--  -->


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
      //fonction_prepare()
    ?>
<!--  -->


<!-- parcourir_table -->
           <?php require 'header_html.php' ?>
      
          <?php 
              function parcourir_table(string $table, array $champs){

                    afficherDebutTableau();
                    
                    foreach($champs as $champ) {
                      echo "<th>$champ</th>";
                    }
                        echo "</tr>";
                  echo" </thead>";

                  
                    class TableRows extends RecursiveIteratorIterator {
                      function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                      }

                      function current() {
                        return "<td >" . parent::current(). "</td>";
                      }

                      function beginChildren() {
                        echo "<tr>";
                      }

                      function endChildren() {
                        echo "</tr>" . "\n";
                      }
                    }

                    try {
                      require 'config_bd.php';
                      $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      $champs_str = implode(",", $champs);
                      $stmt = $conn->prepare("SELECT $champs_str FROM $table");
                      $stmt->execute();

                      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                      foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                      }
                    } catch(PDOException $e) {
                      echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                  //   echo "</table>";
                    echo <<<HTML
                                  </div>
                                  </table >
                                  HTML;
                  }

                  parcourir_table('utilisateurs',['id','nom','prenom','email','motdepasse'])
          ?>
<!--  -->


<!--  parcourir_table_where-->
    <?php
         function parcourir_table_where(string $table, array $champs,$chanp,mixed $condition, mixed $valeur){
                afficherDebutTableau();
            foreach($champs as $champ) {
                echo "<th>$champ</th>";
            }
            echo "</tr>";
            echo" </thead>";

            class TableRows extends RecursiveIteratorIterator {
                function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
                }

                function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                }

                function beginChildren() {
                echo "<tr>";
                }

                function endChildren() {
                echo "</tr>" . "\n";
                }
            }

            try {
                require 'config_bd.php';
                $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $champs_str = implode(",", $champs);
                $stmt = $conn->prepare("SELECT $champs_str FROM $table  WHERE  ".$chanp."".$condition."".$valeur. "");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            echo "</table>";
            }


            //parcourir_table_where('utilisateurs',['id','nom','prenom','email','motdepasse'],'id','>',"'18'")
    ?>
<!--  -->


<!-- supprimer_entre_where -->
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
          
        // supprimer_entre_where('utilisateurs', 'id', '>', '18');
          
    ?>
<!--  -->


<!-- parcourir_table_order_by-->
  <?php
              function parcourir_table_order_by(string $table, array $champs, $champ){
                            afficherDebutTableau();
                            foreach($champs as $champ) {
                            echo "<th>$champ</th>";
                            }
                            echo "</tr>";
                            echo" </thead>";
                        
                            class TableRows extends RecursiveIteratorIterator {
                            function __construct($it) {
                                parent::__construct($it, self::LEAVES_ONLY);
                            }
                        
                            function current() {
                                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                            }
                        
                            function beginChildren() {
                                echo "<tr>";
                            }
                        
                            function endChildren() {
                                echo "</tr>" . "\n";
                            }
                            }
                        
                            try {
                            require 'config_bd.php';
                            $conn = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                            $champs_str = implode(",", $champs);
                            // $stmt = $conn->prepare("SELECT ".$champs_str." FROM  ".$table." ORDER BY ". $champ);
                        
                            $stmt = $conn->prepare(<<<SQL
                            SELECT $champs_str FROM $table
                            ORDER BY $champ
                            SQL);
                        
                            $stmt->execute();
                        
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                            } catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                            }
                            $conn = null;
                            echo "</table>";
                        }
                        
                        // parcourir_table_order_by('utilisateurs',['id','nom','prenom','email','motdepasse'],"'prenom'");
                        
            ?>
<!--  -->


<!-- update_entre_where -->
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
<!--  -->
