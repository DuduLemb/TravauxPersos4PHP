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
    <title>Afficher les membres</title>
</head>
<body>
    <!--Afficher tous les membres -->
    <?php
         $recupUsers = $bd->query('SELECT * FROM membres');
         while($user = $recupUsers->fetch()){
            ?>
            <p><?=$user['pseudo'];?><a href="bannir.php?id=<?= $user['id'];?>" style="color:red; text-decoration:none;">Bannir le membre</a></p>
            <?php
         }   
    ?>
    <!--Fin d'afficher tous les membres -->
    
</body>
</html>