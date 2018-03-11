<?php

// S'il est connecté en tant qu'admin, charger les données du billet récupérées par le modèle, si elles existent.
// Puis afficher la vue du formulaire d'insertion ou de modification d'article.
if (isset($_SESSION['connected']=="oui")) {
	include_once('modele/get_billet.php'); 
} else {
    header('Location: blog.php?section=login&error=1');
}

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

	    $idBillet = $_POST['id2_billet'];
	    $billet = get_billet($idBillet);

		include_once('vue/commentaire_back.php');
	}
}

function enregistrement_modification_commentaire() {
	if (!empty($_POST['idCommentaireModified'])) {
		include_once('modele/modify_commentaire.php');
		update_commentaire();
	}
	$idBillet=$_POST['id2_billet'];
	header('Location: blog.php?section=commentaires_back&billet='.$idBillet);
} 
