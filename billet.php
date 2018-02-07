<?php
require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $billet = getBillet($_GET['id']);
    $commentaires = getCommentaires($_GET['id']);
    require('postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

