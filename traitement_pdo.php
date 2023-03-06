 <?php
// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "ckSpient152$";
$base = "test";

// Connexion à la base de données MySQL
try {
    $bdd = new PDO("mysql:host=$serveur;dbname=$base", $utilisateur, $motdepasse);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Préparation de la requête SQL
$req = $bdd->prepare('INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES (:nom, :prenom, :email, :motdepasse)');

// Exécution de la requête SQL avec les valeurs des champs du formulaire
$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'motdepasse' => $_POST['motdepasse']
));

// Message de confirmation d'inscription réussie
echo "Inscription réussie !";

?>
