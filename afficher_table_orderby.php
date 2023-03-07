<?php require_once 'header_html.php' ?>

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
                        
                        parcourir_table_order_by('utilisateurs',['id','nom','prenom','email','motdepasse'],"'prenom'");
                        
            ?>
<!--  -->
