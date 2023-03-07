<!DOCTYPE html>
<html>
<body>

<?php
echo "<h2>PHP </h2>";
echo "Hello world!<br>";
echo "Je suis sur le point d'apprendre le PHP !<br>";
echo "Ce ", "chaîne de caractères ", "est ", "fait ", "avec plusieurs paramètres.";
?> 


<!-- utlisation classe -->

      <?php
      class Car {
        public $color;
        public $model;
        public function __construct($color, $model) {
          $this->color = $color;
          $this->model = $model;
        }
        public function message() {
          return "Ma voiture est une " . $this->model . " " . $this->color . "!";
        }
      }

      $myCar = new Car("blanche", "Volvo");
      echo $myCar -> message();
      echo "<br>";
      $myCar = new Car("noir", "Toyota");
      echo $myCar -> message();
      ?>
<!--  -->

<!-- fonction chaine de caract -->
  <?php echo strlen("Hello world!"); // sorite 12

  echo str_word_count("Hello world!"); // sorite 2

  echo strrev("Hello world!"); // sorite !dlrow olleH

  echo strpos("Hello world!", "world"); // sorite 6

  echo str_replace("world", "Dolly", "Hello world!"); // sorite Hello Dolly!  ?>
<!--  -->


<!-- date -->

      <!-- H - Format 24 heures d'une heure (00 à 23)
      h - format 12 heures d'une heure avec des zéros non significatifs (01 à 12)
      i - Minutes avec des zéros non significatifs (00 à 59)
      s - Secondes avec des zéros non significatifs (00 à 59)
      a - Minuscule Ante meridiem et Post meridiem (am ou pm) 
      d - Représente le jour du mois (01 à 31)
      m - Représente un mois (01 à 12)
      Y - Représente une année (en quatre chiffres)
      l (minuscule 'L') - Représente le jour de la semaine-->
      <?php
            echo "L'heure est " . date("H:i:s");//22:16:12
            ?>

            <?php
            date_default_timezone_set("America/New_York");//fuseau horaire usa/ny
            echo "L'heure est " . date("h:i:sa");//01:25:36 pm
            ?>

            <?php
            echo "Aujourd'hui, c'est" . date("Y/m/d") . "<br>";//Aujourd'hui, c'est2023/03/06
            echo "L'heure est " . date("Y.m.d") . "<br>";
            echo "L'heure est " . date("Y---m-d") . "<br>";//L'heure est 2023---03-06
            echo "L'heure est " . date("l");//L'heure est Monday
            ?>

            <?php
            $d=mktime(11, 14, 54, 8, 12, 2014);
            echo "La date de création est " . date("Y-m-d h:i:s a", $d)." = ".$d." secondes depuis 1er janvier 1970 00:00:00 GMT";//La date de création est 2014-08-12 11:14:54 am = 1407842094 secondes depuis 1er janvier 1970 00:00:00 GMT
      ?>
<!--  -->

<?php $x = 5985;
var_dump(is_int($x)); //bool(true) 
$x = 1.9e411;
var_dump(is_infinite($x));?>

<?php
// Vérifier si la variable est numérique   
$x = 5985;
var_dump(is_numeric($x));
?>  


<!-- cast valeur -->
    <?php
    // Transformation d'un float en int
    $x = 23465.768;
    $int_cast = (int)$x;
    echo $int_cast;
      
    echo "<br>";

    // Transformez une chaîne de caractères en int
    $x = "23465.768";
    $int_cast = (int)$x;
    echo $int_cast;
    ?>  
<!--  -->

<!-- aleatoire -->
    <?php
    //math
    echo(rand(10, 100));
    echo(rand());
    echo(round(0.60));  //  1
    echo(round(0.49));  //  0
    echo(abs(-6.7));  //  6.7

    ?>
<!--  -->


<!-- constante -->
  <?php
  define("CONSTANTE", "ceci est une constante");
  echo CONSTANTE;// ceci est une constante

  // nom de la constante insensible à la casse
  //define("CONSTANT", "ceci est une constante",true);  deprecier
  //echo constant;// ceci est une constante


  ?>
<!--  -->


<!-- ternaires -->
    <?php
      // si empty($user) = TRUE, mettre $status = "annonyme"
      echo $status = (empty($user)) ? "anonymous" : "logged in";
      echo("<br>");

      $user = "John Doe";
      // si empty($user) = FALSE, set $status = "bienvenue + nom"
      echo $status = (empty($user)) ? "anonymous" : "bienvenue ".$user;


    // la variable $user est la valeur de $_GET['user']
      // et 'anonymous' s'il n'existe pas
      echo $user = $_GET["user"] ?? "anonymous";
      echo("<br>");
      
      // La variable $color est "red" si $color n'existe pas ou est nulle.
      echo $color = $color ?? "red";
      ?>  
<!--  -->


<!-- foreach -->
    <?php  
    $colors = array("red", "green", "blue", "yellow"); 

    foreach ($colors as $value) {
      echo "$value <br>";
    }

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    asort($age);

    foreach($age as $x => $x_value) {
      echo "Key=" . $x . ", Value=" . $x_value;
      echo "<br>";
    }
    ?>
<!--  -->


<!-- variable globls -->
  <?php
      echo $_SERVER['PHP_SELF'];
      echo "<br>";
      echo $_SERVER['SERVER_NAME'];
      echo "<br>";
      echo $_SERVER['HTTP_HOST'];
      echo "<br>";
      echo $_SERVER['HTTP_REFERER'];
      echo "<br>";
      echo $_SERVER['HTTP_USER_AGENT'];
      echo "<br>";
      echo $_SERVER['SCRIPT_NAME'];

  ?>

    /*
        $_SERVER['PHP_SELF'] Retourne le nom de fichier du script en cours d'exécution.
        $_SERVER['GATEWAY_INTERFACE'] Retourne la version de l'interface de passerelle commune (CGI) que le serveur utilise.
        $_SERVER['SERVER_ADDR'] Retourne l'adresse IP du serveur hôte.
        $_SERVER['SERVER_NAME'] Retourne le nom du serveur hôte (tel que www.w3schools.com).
        $_SERVER['SERVER_SOFTWARE'] Retourne la chaîne d'identification du serveur (telle que Apache/2.2.24).
        $_SERVER['SERVER_PROTOCOL'] Retourne le nom et la révision du protocole d'information (tel que HTTP/1.1).
        $_SERVER['REQUEST_METHOD'] Retourne la méthode de demande utilisée pour accéder à la page (telle que POST).
        $_SERVER['REQUEST_TIME'] Retourne l'horodatage du début de la demande (tel que 1377687496).
        $_SERVER['QUERY_STRING'] Retourne la chaîne de requête si la page est accédée via une chaîne de requête.
        $_SERVER['HTTP_ACCEPT'] Retourne l'en-tête Accept de la demande en cours.
        $_SERVER['HTTP_ACCEPT_CHARSET'] Retourne l'en-tête Accept_Charset de la demande en cours (tel que utf-8,ISO-8859-1).
        $_SERVER['HTTP_HOST'] Retourne l'en-tête Host de la demande en cours.
        $_SERVER['HTTP_REFERER'] Retourne l'URL complète de la page actuelle (pas fiable car tous les agents utilisateur ne le prennent pas en charge).
        $_SERVER['HTTPS'] Indique si le script est interrogé via un protocole HTTP sécurisé.
        $_SERVER['REMOTE_ADDR'] Retourne l'adresse IP à partir de laquelle l'utilisateur visualise la page actuelle.
        $_SERVER['REMOTE_HOST'] Retourne le nom d'hôte à partir duquel l'utilisateur visualise la page actuelle.
        $_SERVER['REMOTE_PORT'] Retourne le port utilisé sur la machine de l'utilisateur pour communiquer avec le serveur web.
        $_SERVER['SCRIPT_FILENAME'] Retourne le chemin absolu du script en cours d'exécution.
        $_SERVER['SERVER_ADMIN'] Retourne la valeur donnée à la directive SERVER_ADMIN dans le fichier de configuration du serveur web (si votre script s'exécute sur un hôte virtuel, ce sera la valeur définie pour cet hôte virtuel) (telle que someone@w3schools.com).
        $_SERVER['SERVER_PORT'] Retourne le port sur la machine du serveur utilisé par le serveur web pour la communication (tel que 80).
        $_SERVER['SERVER_SIGNATURE'] Retourne la version du serveur et le nom de l'hôte virtuel qui sont ajoutés aux pages générées par le serveur.
        $_SERVER['PATH_TRANSLATED'] Retourne le chemin basé sur le système de fichiers vers le script actuel.
        $_SERVER['SCRIPT_NAME'] Retourne le chemin du script actuel.
        $_SERVER['SCRIPT_URI'] Retourne l'URI de la page actuelle.


    */
<!--  -->

<!-- expression reguliere -->
      <!--  
      "/\b(?:(?:https?|ftp)://|www.)[-a-z0-9+&@#/%?=_|!:,.;]*[-a-z0-9+&@#/%=_|]/i"  expression régulière qui est utilisée pour identifier les URL dans une chaîne de caractères.

      Le "\b" au début de l'expression signifie une limite de mot. Ensuite, l'expression "(?:(?:https?|ftp)://|www.)" permet de rechercher des chaînes commençant soit par "http://", "https://", "ftp://", ou "www.".

      Le reste de l'expression régulière est utilisé pour identifier les parties restantes de l'URL, qui peuvent contenir des lettres minuscules et majuscules de l'alphabet anglais, des chiffres, des signes de ponctuation tels que -, +, &, @, #, %, /, =, ~, _, |, !, :, ,, ;, ainsi que des caractères de contrôle.

      Le "/i" à la fin de l'expression signifie que la recherche est insensible à la casse, ce qui signifie que la recherche sera effectuée sur les lettres minuscules et majuscules de l'alphabet anglais.
      ---------------------------------------------------------------------------------------------------------
      "/^[a-zA-Z-' ]*$/"  expression régulière qui est utilisée pour vérifier si une chaîne de caractères ne contient que des lettres de l'alphabet anglais (majuscules et minuscules), des tirets, des apostrophes et des espaces.

      Le signe ^ au début de l'expression signifie que la chaîne doit commencer par les caractères spécifiés, tandis que le signe $ à la fin signifie que la chaîne doit se terminer par ces mêmes caractères.

      Le groupe de caractères entre les crochets [] spécifie les caractères autorisés dans la chaîne. Dans ce cas, les lettres majuscules et minuscules de l'alphabet anglais (a à z et A à Z), ainsi que les tirets, apostrophes et espaces sont autorisés.

      -->
<!--  -->

<!-- verification email  et et lien -->
  <!DOCTYPE HTML>  
  <html>
  <head>
  <style>
  .error {color: #FF0000;}
  </style>
  </head>
  <body>  

  <?php
  // définir les variables et les mettre à des valeurs vides
  $nomErr = $emailErr = $genreErr = $websiteErr = "";
  $nom = $email = $genre = $commentaire = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nom"])) {
      $nomErr = "Le nom est obligatoire";
    } else {
      $nom = test_input($_POST["nom"]);
      // vérifier si le nom ne contient que des lettres et des espaces.
      if (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) {
        $nomErr = "Seules les lettres et les espaces blancs sont autorisés";
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "L'adresse électronique est obligatoire";
    } else {
      $email = test_input($_POST["email"]);
      // vérifier si l'adresse e-mail est bien formée
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
      
    if (empty($_POST["website"])) {
      $website = "";
    } else {
      $website = test_input($_POST["website"]);
      // vérifier si la syntaxe de l'adresse URL est valide (cette expression régulière autorise également les tirets dans l'URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteErr = "Invalid URL";
      }
    }

    if (empty($_POST["commentaire"])) {
      $commentaire = "";
    } else {
      $commentaire = test_input($_POST["commentaire"]);
    }

    if (empty($_POST["genre"])) {
      $genreErr = "Le sexe est requis";
    } else {
      $genre = test_input($_POST["genre"]);
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <h2>Exemple de validation de formulaire en PHP</h2>
  <p><span class="error">* champ obligatoire</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="nom" value="<?php echo $nom;?>">
    <span class="error">* <?php echo $nomErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Site web: <input type="text" name="website" value="<?php echo $website;?>">
    <span class="error"><?php echo $websiteErr;?></span>
    <br><br>
    Commentaire: <textarea name="commentaire" rows="5" cols="40"><?php echo $commentaire;?></textarea>
    <br><br>
    Genre:
    <input type="radio" name="genre" <?php if (isset($genre) && $genre=="femme") echo "checked";?> value="femme">Femme
    <input type="radio" name="genre" <?php if (isset($genre) && $genre=="mal") echo "checked";?> value="mal">Homme
    <input type="radio" name="genre" <?php if (isset($genre) && $genre=="autres") echo "checked";?> value="autres">Autre  
    <span class="error">* <?php echo $genreErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
  </form>

  <?php
  echo "<h2>Votre contribution :</h2>";
  echo $nom;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $website;
  echo "<br>";
  echo $commentaire;
  echo "<br>";
  echo $genre;
  ?>

  </body>
  </html>
<!--  -->


<?php 

$pers = array( "prenom"=>"Jonh", "nom"=>'Doe' );
$pers = [ 'prenom'=>'Jonh', 'nom'=>'Doe' ];
/*
Le tableau $jours est con¢u comme ceci
| ---cle---|-valeur- |
| prenom | John |
| nom | Doe |

// Affiche John
echo $pers['prenom']; 
*/?>




























        </body>
</html>


































































</body>
</html>
