<?php
session_start();
// Deux protections :
    // Est-ce que l'utilisateur est connecté ?
    // Est-ce que l'id est présent dans l'url ?
// Si l'utilisateur n'est PAS connecté, on le dégage sur la page de connexion
if(empty($_COOKIE["isLoggedIn"]) && empty($_SESSION["isLoggedIn"])){
    header("location: connexion.php");
}
if(empty($_GET["id"])){
    header("location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice</title>
</head>
<body>
    <h1>Détail exercice</h1>
    <?php 
        /*
            On fait appel à la base de données
            On cherche l'exercice dont l'id est égal à ce qui est transmis dans l'url
            Si l'exercice existe, on l'affiche
        */
    
    ?>
</body>
</html>