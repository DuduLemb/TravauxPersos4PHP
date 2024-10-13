<?php
    session_start();
    $bd = new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
    if(!$_SESSION['mdp']){
        header('location: connexion.php');
    }
    if(!empty($_POST['titre']) AND !empty($_POST['description'])){
        $titre = htmlspecialchars($_POST['titre']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $insererArticle = $bd->prepare('INSERT INTO articles(titre, description) VALUES(?, ?)');
        $insererArticle->execute(array($titre, $description));
        echo "l'article a bien ete envoye";
    }else{
        echo "Veuillez completer tous les champs...";
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un article</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="titre">
        <br>
        <textarea name="description"></textarea>
        <br>
        <input type="submit" name="envoi">
    </form>
    
</body>
</html>