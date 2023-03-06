<?php  require 'fonctions.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulaire d'inscription</title> 
    <style>
        td{text-align: right;}
        .main{border: 1px solid black;width: 400px}
    </style>
</head>

<body>
    <div class="main">
    <h1>Formulaire d'inscription</h1>
    <form action="traitement_pdo.php" method="post">

        <table>

            <tr>
                <td><label for="nom">Nom :</label>
                <td><input type="text" id="nom" name="nom" required>
            <tr>
                <td><label for="prenom">Prénom :</label>
                <td><input type="text" id="prenom" name="prenom" required><br>

            <tr>
                <td><label for="email">E-mail :</label>
                <td><input type="email" id="email" name="email" required><br>
            <tr>
                <td><label for="motdepasse">Mot de passe :</label>
                <td><input type="password" id="motdepasse" name="motdepasse" required><br>

                <tr>
                    <td  style="text-align: right;"><input type="submit" value="S'inscrire">
                    <td style="text-align: left;"><input type="reset" value="Effacer">
        </table>


        
    </form>
</div>
</body>

</html>