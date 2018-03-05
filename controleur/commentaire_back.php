<?php
include_once('modele/get_commentaire.php'); 
include_once('modele/get_billet.php');  

function affichage_commentaire_a_modifier() {
	if (!empty($_POST['idCommentaireModified'])) {
		$idCommentaire = $_POST['idCommentaireModified'];
		// var_dump($idCommentaire);
		$commentaire = get_commentaire($idCommentaire);
		// var_dump($commentaire);
		// sécurisons l'affichage : inutile puisque pas d'injection possible ?
		$commentaire['auteur'] = htmlspecialchars($commentaire['auteur']); 
	    $commentaire['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
	    // var_dump($commentaire);
	    // return $commentaire;

	    $idBillet = $_POST['id2_billet'];
	    $billet = get_billet($idBillet);
	    // return $billet;

		include_once('vue/commentaire_back.php');
	}
}

// function modification_commentaire() {
// 	if (!empty($_POST['idCommentaireModified'])) {
// 		include_once('modele/modify_commentaire.php');
// 		modify_commentaire();
// 	}
// 	$idBillet=$_POST['id2_billet'];
// 	header('Location: blog.php?section=commentaires_back&billet='.$idBillet);
// } 
