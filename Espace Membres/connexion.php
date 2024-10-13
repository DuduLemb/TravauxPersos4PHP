<?php
    session_start();
    $bd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8;','root','');
    if(isset($_POST['envoi'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mdp = sha1($_POST['mdp']);
            $recupUser = $bd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
            $recupUser->execute(array($pseudo, $mdp));
            if($recupUser->rowCount() > 0){
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recupUser->fetch()['id'];
                header('location: index.php');
            }else{
                echo "Votre mot de passe ou pseudo est incorrecte";
            }    
        }else{
            echo "veuillez compléter tous les champs...";
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form method="post" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off" >
        <br>
        <input type="text" name="mdp" autocomplete="off">
        <br><br>
        <input type="submit" name="envoi">
    </form>
</body>
</html>