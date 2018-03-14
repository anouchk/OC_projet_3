<?php

// S'il est connecté en tant qu'admin, charger les données du billet récupérées par le modèle, si elles existent.
// Puis afficher la vue du formulaire d'insertion ou de modification d'article.
if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
	include_once('modele/get_billet.php'); 
} else {
    header('Location: blog.php?section=login&error=1');
}

include_once('modele/get_billet.php');  

function affichage_billet_a_modifier() {
	if (!empty($_POST['idBilletModified'])) {
		$idBillet = $_POST['idBilletModified'];
		var_dump($idBillet);
		$billet = get_billet($idBillet);
		var_dump($billet);
		include_once('vue/billet_back.php');
	}
}

function enregistrement_modification_billet() {
	if (!empty($_POST['idCommentaireModified'])) {
		include_once('modele/modify_commentaire.php');
		update_commentaire();
	}
	$idBillet=$_POST['id2_billet'];
	header('Location: blog.php?section=commentaires_back&billet='.$idBillet);
} 
