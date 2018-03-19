<?php
include_once('modele/get_commentaires.php');
include_once('modele/delete_commentaire.php'); 
include_once('modele/get_billet.php');

function commentaires_back_affichage_commentaires()
{
	if (!empty($_GET['billet'])) {
		$idBillet = $_GET['billet'];
	    $commentaires = get_commentaires(0, 30, $idBillet);
		// on sécurise l'affichage des commentaires
		foreach($commentaires as $cle => $commentaire) 
		{ 
		    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
		    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
		} 
		// lancer la requête de récupération des données du billet pour pouvoir afficher le titre du billet en haut de la liste des commentaires
		$billet = get_billet($idBillet);
	    include_once('vue/commentaires_back.php');
	}   
}

function commentaires_back_suppression_commentaire()
{	if (!empty($_POST['idCommentaire'])) {
		$idBillet = $_POST['idBillet'];
		$idCommentaire = $_POST['idCommentaire'];
		delete_commentaire($idCommentaire);
		header('Location: index.php?section=commentaires_back&billet='.$idBillet);
	}    
}