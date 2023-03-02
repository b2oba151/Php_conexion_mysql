 <?php
$serveur = "localhost"; // adresse du serveur MySQL
$utilisateur = "root"; // nom d'utilisateur MySQL
$motdepasse = "ckSpient152$"; // mot de passe MySQL
$base = "test"; // nom de la base de données MySQL

// Connexion à la base de données MySQL
$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $base);

// Vérification de la connexion
if (!$connexion) {
    die("Connexion à la base de données impossible: " . mysqli_connect_error());
}



    // Vérifiez si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Récupérer les valeurs des champs du formulaire
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $prenom = $_POST["prenom"];
        $motdepasse = $_POST["motdepasse"];
        // et ainsi de suite pour tous les autres champs
        
        // Insérez les données dans la base de données MySQL
        $requete = "INSERT INTO `utilisateur` (nom, prenom, email, motdepasse) VALUES ('$nom','$prenom', '$email', '$motdepasse')";
        
        if (mysqli_query($connexion, $requete)) {
            echo "Inscription réussie.";
        } else {
            echo "Erreur: " . mysqli_error($connexion);
        }
    }
?>


<?php
    // Fermer la connexion à la base de données
    mysqli_close($connexion);
?>
