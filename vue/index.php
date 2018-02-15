<!-- <?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
?> -->

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska </title>
        <link type="text/css" href="vue/style.css" rel="stylesheet" /> 
    </head>

    <body>
        <h3><a href="blog.php?section=login">Admin</a></h3>
        <h1>Billet simple pour l'Alaska</h1>
        <p> Découvrez le nouveau roman de l'acteur et écrivain Jean Forteroche, à mesure qu'il se construit.</p>
        <p>Derniers épisodes :</p>

<?php
//var_dump($billets);
foreach($billets as $billet) {
?>

<div class="news">
    <h3>
        <?php echo $billet['titre']; ?>
        <em>le <?php echo $billet['date_creation_fr']; ?></em>
    </h3>

    <p>
        <?php echo $billet['contenu']; ?>
        <br />
        <em><a href="blog.php?section=commentaires&billet=<?php echo $billet['id']; ?>">Commentaires</a></em>
    </p>
</div>

<?php

}
?>

</body>
</html>