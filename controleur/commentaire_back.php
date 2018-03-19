<?php
include_once('modele/get_commentaire.php'); 
include_once('modele/get_billet.php');  
include_once('modele/signal_commentaire.php');  
include_once('modele/modify_commentaire.php');

class CommentaireBackControleur {

	function affichage_commentaire_a_modifier() {
		if (!empty($_POST['idCommentaireModified'])) {
			$idCommentaire = $_POST['idCommentaireModified'];
			$commentaire = get_commentaire($idCommentaire);
			// sécurisons l'affichage 
			$commentaire['auteur'] = htmlspecialchars($commentaire['auteur']); 
		    $commentaire['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 

		    $idBillet = $_POST['id2_billet'];
		    $billet = get_billet($idBillet);
			include_once('vue/commentaire_back.php');
		}
	}

	function enregistrement_modification_commentaire() {
		if (!empty($_POST['idCommentaireModified'])) {	
			update_commentaire();
			unsignal_commentaire($_POST['idCommentaireModified']);
			$idBillet=$_POST['id2_billet'];
			header('Location: index.php?section=commentaires_back&billet='.$idBillet);
		}
	} 
}

