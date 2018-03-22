<?php
function count_commentaires($idBillet) {
	// on récupère l'id du billet dont on veut compter les commentaires
    $id_Billet=$idBillet;

    // Récupération de la base de données
    global $bdd;
    
    // Récupération du billet   
    $req = $bdd->prepare('SELECT count(*) FROM commentaires WHERE id_billet=?');
    $req->execute(array($id_Billet));
    $nombre_commentaires = $req->fetch(PDO::FETCH_NUM);
    return $nombre_commentaires ;
}
