<?php
// C'est ici qu'on va traiter les données reçues par le formulaire
if(!empty($_POST["submit"])){
    // C'est ici qu'on arrive SI et seulement SI le formulaire a été envoyé
    require_once "connect.php";

    // Possibilité du barbare : on enregistre directement sans contrôle
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    // On fait la requête pour ajouter l'utilisateur
    $requete = "INSERT INTO users(mail_user, pass_user) VALUES(:mail, :pass)";

    $data = $db->prepare($requete);

    $data->execute(array(
        "mail" => $_POST["mail"],
        "pass" => $pass
    ));

}

