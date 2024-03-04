<?php 
// Code de connexion à la base de données
try {
    $utilisateur = "usercoursphp";
    $motDePasse = "password1234";
    $baseDeDonnees  = "coursphp";

    $db = new PDO(
        "mysql:host=localhost;dbname=".$baseDeDonnees.";charset=utf8",
        $utilisateur,
        $motDePasse,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Activer la gestion des erreurs
        ]
    );

} catch(Exception $e){
   echo "Connexion à la base de données refusée.";
   exit();
}
