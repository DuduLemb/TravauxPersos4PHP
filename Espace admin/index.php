<?php
    session_start();
    if(!$_SESSION['mdp']){
        header('location: connexion.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="membres.php"> Afficher tous les membres</a>
    <a href="publier-article.php"> Publier un nouvel article</a>
    <a href="article.php">Afficher tous les articles</a>
</body>
</html>