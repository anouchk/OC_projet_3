<?php
include_once('modele/get_commentaire.php'); 
include_once('modele/get_billet.php');  

function affichage_commentaire_a_modifier() {
	if (!empty($_POST['idCommentaireModified'])) {
		get_commentaire($_POST['idCommentaireModified'])
		include_once('vue/commentaire_back.php');
	}
}

function modification_commentaire() {
	if (!empty($_POST['idCommentaireModified'])) {
		include_once('modele/modify_commentaire.php');
		modify_commentaire();
	}
	$idBillet=$_POST['id2_billet'];
	header('Location: blog.php?section=commentaires_back&billet='.$idBillet);
} 