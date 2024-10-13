<?php
    $bd = new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getid = $_GET['id'];
        $recupArticle = $bd->prepare('SELECT * FROM articles WHERE id = ?');
        $recupArticle->execute(array($getid));
        if($recupArticle->rowCount() > 0){
            $deleteArticle = $bd->prepare('DELETE FROM articles WHERE id = ?');
            $deleteArticle->execute(array($getid));
            header('location: article.php');
        }else{
            echo " Aucun article trouve";
        }
    }else{
        echo "Aucun identifiant trouve";
    }

?>