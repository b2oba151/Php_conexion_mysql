<?php require 'header_html.php' ;?>
<?php require 'fonctions.php' ;?>

<?php parcourir_table_order_by('utilisateurs',['id','nom','prenom','email','motdepasse'],"'prenom'"); ?>

<!-- <?php update_entre_where('utilisateurs', 'nom', 'nnn', 'id', '=', '26'); ?> -->