<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska </title>
        <link type="text/css" href="assets/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>

    <body>
        
        <?php if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
            echo "<h3><a href='index.php?section=logout'>Deconnexion</a></h3>";
            echo "<h3><a href='index.php?section=login'>Admin</a></h3>";
        } elseif (isset($_SESSION) && ($_SESSION['connected']=="non")) {
            echo "<h3><a href='index.php?section=login'>Admin</a></h3>";
        } ?>
        
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

    <div>
        <?php echo $billet['contenu']; ?>
        <br />
        <em><a href="index.php?section=commentaires&billet=<?php echo $billet['id']; ?>">Commentaires</a></em>
    </div>
</div>

<?php

}
?>

</body>
</html>