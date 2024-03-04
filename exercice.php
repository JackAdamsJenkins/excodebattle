<?php
session_start(); 
// Si l'utilisateur n'est PAS connecté, on le dégage sur la page de connexion
if(empty($_COOKIE["isLoggedIn"]) && empty($_SESSION["isLoggedIn"])){
    header("location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page exercice</title>
</head>
<body>
    <h1>Page exercice</h1>
    <ul>
    <?php 
        // se connecter à la base de données
        require_once "connect.php";
        // Faire une requête pour récupérer TOUS les exercices
        $requete = "SELECT id_exercice, langue_exercice, titre_exercice FROM exercices";
        $datas = $db->prepare($requete);
        $datas->execute();
        $datas = $datas->fetchAll();
        // Afficher une liste d'exercices
        foreach($datas as $data){
            echo "<li><a href='detailexercice.php?id=". $data["id_exercice"] ."'>". $data["titre_exercice"] ." - ". $data["langue_exercice"] ."</a></li>";
        }
        // exercices(id_exercice, titre_exercice, enonce_exercice, solution_exercice, langue_exercice)

    ?>
    </ul>
</body>
</html>