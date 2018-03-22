<?php

function get_commentaire($idCommentaire) {
	// on récupère l'id du billet dont on veut afficher les commentaires
    $id_Commentaire=$idCommentaire;

    // Récupération de la base de données
    global $bdd;
    
    // Récupération du billet   
    $req = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id=?');
    $req->execute(array($id_Commentaire));
    $commentaire = $req->fetch(PDO::FETCH_ASSOC);
    return $commentaire ;
 }