<?php

function get_billet($idBillet) {
    // on récupère l'id du billet dont on veut afficher les commentaires
    $id_Billet=$idBillet;

    // Récupération de la base de données
    global $bdd;
    
    // Récupération du billet   
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
    $req->execute(array($id_Billet));
    $billet = $req->fetch(PDO::FETCH_ASSOC);
    return $billet ;
}