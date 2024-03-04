<?php 
$message = null;
if(!empty($_POST["submit"])){
    require_once "connect.php";

    // AVANT d'enregistrer un cookie ou une session
    // On vérifie les données utilisateur

    // On test si l'utilisateur a renseigné les bonnes informations
    // On vérifie si l'utilsateur a renseigner des données
    if(!empty($_POST["mail"]) && !empty($_POST["pass"])){
        // On prépare et execute la requête
        $requete = "SELECT id_user, mail_user, pass_user FROM users WHERE mail_user = :mail";
        $data = $db->prepare($requete);

        $data->execute(array(
            "mail" => $_POST["mail"]
        ));

        // On récupère une donnée
        $donnee = $data->fetch();
        // $donnee["id_user"]
        // $donnee["mail_user"]
        // $donnee["pass_user"]

        // Si l'utilisateur existe
        if(!empty($donnee["mail_user"]) && password_verify($_POST["pass"], $donnee["pass_user"])){
            // Si on arrive ici, ça signifie que le compte existe et que les mots de passe correspondent
            // En fonction de la checkbox on stock dans les cookies ou dans les sessions
            if(!empty($_POST["remember"])){
                // Elle a été cochée, on stock dans les cookies
                setcookie("isLoggedIn", true, time() + 3600 * 24 * 30);
            } else {
                // Elle n'a pas été cochée, on stock dans les sessions
                $_SESSION["isLoggedIn"] = true;
            }
            // On redirige vers une page
            header("location: exercice.php");
            
        } else {
            $message = "Mail et/ou mot de passe incorrect.";
        }


    } else {
        $message = "Vous devez renseigner un mail et un mot de passe";
    }
    
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?=$message;?>
    <form action="#" method="post">
        <input type="email" name="mail" placeholder="Email">
        <input type="password" name="pass" placeholder="Mot de passe">
        <input type="checkbox" name="remember">Se souvenir de moi
        <input type="submit" value="Connexion" name="submit">
    </form>
</body>
</html>