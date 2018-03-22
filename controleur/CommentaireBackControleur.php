<?php
namespace controleur;
use modele\Service\BilletManager;
use modele\Service\CommentaireManager;

class CommentaireBackControleur {

	public function affichage_commentaire_a_modifier() {
		if (!empty($_POST['idCommentaireModified'])) {
			$idCommentaire = $_POST['idCommentaireModified'];
			$commentaireManager =  new CommentaireManager();
			$commentaire = $commentaireManager->get_commentaire($idCommentaire);
			// sécurisons l'affichage 
			$commentaire['auteur'] = htmlspecialchars($commentaire['auteur']); 
		    $commentaire['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 

		    $idBillet = $_POST['id2_billet'];
		    $billetManager = new BilletManager();	
		    $billet = $billetManager->get_billet($idBillet);
			include_once('vue/commentaire_back.php');
		}
	}

	public function enregistrement_modification_commentaire() {
		if (!empty($_POST['idCommentaireModified'])) {	
			$commentaireManager =  new CommentaireManager();
			$commentaireManager->update_commentaire();
			$commentaireManager->unsignal_commentaire($_POST['idCommentaireModified']);
			$idBillet=$_POST['id2_billet'];
			header('Location: index.php?section=commentaires_back&billet='.$idBillet);
		}
	} 
}

