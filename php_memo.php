<!DOCTYPE html>
<html>
<body>

<?php
echo "<h2>PHP is Fun!</h2>";
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



<?php echo strlen("Hello world!"); // sorite 12

echo str_word_count("Hello world!"); // sorite 2

echo strrev("Hello world!"); // sorite !dlrow olleH

echo strpos("Hello world!", "world"); // sorite 6

echo str_replace("world", "Dolly", "Hello world!"); // sorite Hello Dolly!  ?>


<?php $x = 5985;
var_dump(is_int($x)); //bool(true) 
$x = 1.9e411;
var_dump(is_infinite($x));?>

<?php
// Vérifier si la variable est numérique   
$x = 5985;
var_dump(is_numeric($x));
?>  

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


<?php
//math
echo(rand(10, 100));
echo(rand());
echo(round(0.60));  //  1
echo(round(0.49));  //  0
echo(abs(-6.7));  //  6.7

?>

<?php
define("CONSTANTE", "ceci est une constante");
echo CONSTANTE;// ceci est une constante

// nom de la constante insensible à la casse
//define("CONSTANT", "ceci est une constante",true);  deprecier
//echo constant;// ceci est une constante


?>

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

<?php  
$colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $value) {
  echo "$value <br>";
}
?>  

<?php
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age);

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
?>


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


<!DOCTYPE html>
<html>
        <body>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Name: <input type="text" name="fname">
        <input type="submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $name = htmlspecialchars($_REQUEST['fname']);
            if (empty($name)) {
                echo "Name is empty";
            } else {
                echo $name;
            }
        }
        ?>

        </body>
</html>

<!DOCTYPE HTML>  
<html>
        <head>
        </head>
        <body>  

        <?php
        // define variables and set to empty values
        $name = $email = $gender = $comment = $website = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        ?>

        <h2>PHP Form Validation Example</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Name: <input type="text" name="name">
        <br><br>
        E-mail: <input type="text" name="email">
        <br><br>
        Website: <input type="text" name="website">
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <br><br>
        <input type="submit" name="submit" value="Submit">  
        </form>

        <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
        ?>




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
