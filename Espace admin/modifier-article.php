<?php
    $bd = new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getid = $_GET['id'];
        $recupArticle = $bd->prepare('SELECT * FROM articles WHERE id = ?');
        $recupArticle->execute(array($getid));
        if($recupArticle->rowCount() > 0){
            $articleInfos = $recupArticle->fetch();
            $titre = $articleInfos['titre'];
            $description = $articleInfos['description'];
            if(isset($_POST['valider'])){
                $titre_saisi = htmlspecialchars($_POST['titre']);
                $description_saisi = htmlspecialchars($_POST['description']);
                $updatearticle = $bd->prepare('UPDATE articles SET titre=?, description = ? WHERE id = ?');
                $updatearticle->execute(array($titre_saisi, $description_saisi, $getid));
                header('Location: article.php');
            }
            
        }else{
            echo " Aucun article trouve";
        }
    }else{
        echo "Aucun identifiant trouve";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="titre" value="<?= $titre;?>">
        <br>
        <textarea name="description"
            <?= $description;?>
        </textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>