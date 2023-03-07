<?php  require 'fonctions.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulaire d'inscription</title> 
    <link rel="stylesheet" href="bts5/bootstrap.css">
    <script src="bts5/bootstrap.js" defer></script>

</head>

<body>
<div class="container mt-3 col-md-4">
  <h2>Formulaire</h2>
  <form action="traitement_pdo.php" method="post">
    <div class="mb-3 mt-3">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="nom" placeholder="Entrez nom" name="nom">
    </div>
    <div class="mb-3 mt-3">
      <label for="prenom">Prenom:</label>
      <input type="text" class="form-control" id="prenom" placeholder="Entrez prenom" name="prenom">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Entrez email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Mot de passe:</label>
      <input type="password" class="form-control" id="motdepasse" placeholder="Entrez motdepasse" name="motdepasse">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Se souvenir de moi
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>

</body>
</html>