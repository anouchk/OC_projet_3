<?php
include_once('modele/get_commentaires.php');
include_once('modele/delete_commentaire.php'); 
include_once('modele/get_billet.php');

function commentaires_back_affichage_commentaires()
{
    $idBillet = $_GET['billet'];
    $commentaires = recuperation_commentaires_du_billet($idBillet)[0];
    $billet = recuperation_commentaires_du_billet($idBillet)[1];
    include_once('vue/commentaires_back.php');
}

function commentaires_back_suppression_commentaire()
{
    $idBillet = $_POST['idBillet'];
    $commentaires = recuperation_commentaires_du_billet($idBillet);
    header('Location: index.php?section=commentaires_back&billet='.$idBillet);
}

function recuperation_commentaires_du_billet($idBillet) {
	$commentaires = get_commentaires(0, 30, $idBillet);
	// on sécurise l'affichage des commentaires
	foreach($commentaires as $cle => $commentaire) 
	{ 
	    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
	    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
	} 

	// lancer la requête de récupération des données du billet pour pouvoir afficher le titre du billet en haut de la liste des commentaires
	get_billet($idBillet);
	$billet = get_billet($idBillet);
	
	// lancer la requête de suppression du commentaire
	if (!empty($_POST['idCommentaire'])) {
		delete_commentaire($_POST['idCommentaire'], $idBillet);
		header('Location: index.php?section=commentaires_back&billet='.$idBillet);
	}

	return [$commentaires, $billet];
}
