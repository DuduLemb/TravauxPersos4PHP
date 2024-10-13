<?php
    session_start();
    $bd = new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
    if(!$_SESSION['mdp']){
        header('location: connexion.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher tous les articles</title>
</head>
<body>
    <?php
        $recupArticles =$bd->query('SELECT * FROM articles');
        while($article = $recupArticles->fetch()){
            ?>
            <div class="article" style="border: 1px solid black;">
                <h1><?= $article['titre'] ?></h1>
                <p><?= $article['description'] ?></p>
                <a href="supprimer-article.php?id=<?= $article['id']?>"><button style="color: white; background-color: red; padding: bottom 10px;">Supprimer l'article</button></a>
                <a href="modifier-article.php?id=<?= $article['id']?>"><button style="color: black; background-color: yellow; padding: bottom 10px;">Modifier l'article</button></a>
            </div>
            <br>
            <?php
        }
    ?>
</body>
</html>