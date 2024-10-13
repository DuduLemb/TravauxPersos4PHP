<?php
    session_start();
    $bd = new PDO('mysql:host=localhost;dbname=espace_admin;','root','');
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getid = $_GET['id'];
        $recupUser = $bd->prepare('SELECT * FROM membres WHERE id=?');
        $recupUser-> execute(array($getid));
        if($recupUser->rowCount() > 0){
            $bannirUser = $bd->prepare('DELETE FROM membres WHERE id=?');
            $bannirUser->execute(array($getid));
            header('Location:membres.php');
        }else{
            echo "Aucun membre n' a ete trouve";
        }
    }else{
        echo "L' identifiant n'a pas ete recupere";
    }
?>