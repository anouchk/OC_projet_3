<?php
include_once('modele/Service/BilletManager.php'); 
include_once('modele/Service/CommentaireManager.php'); 

class CommmentairesBackControleur {

	public function commentaires_back_affichage_commentaires()
	{
		if (!empty($_GET['billet'])) {
			$idBillet = $_GET['billet'];
			$commentaireManager =  new CommentaireManager;
		    $commentaires = $commentaireManager->get_commentaires(0, 30, $idBillet);
			// on sécurise l'affichage des commentaires
			foreach($commentaires as $cle => $commentaire) 
			{ 
			    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
			    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
			} 
			// lancer la requête de récupération des données du billet pour pouvoir afficher le titre du billet en haut de la liste des commentaires
			$billetManager = new BilletManager;
			$billet = $billetManager->get_billet($idBillet);
		    include_once('vue/commentaires_back.php');
		}   
	}

	public function commentaires_back_suppression_commentaire()
	{	if (!empty($_POST['idCommentaire'])) {
			$idBillet = $_POST['idBillet'];
			$idCommentaire = $_POST['idCommentaire'];
			$commentaireManager =  new CommentaireManager;
			$commentaireManager->delete_commentaire($idCommentaire);
			header('Location: index.php?section=commentaires_back&billet='.$idBillet);
		}    
	}

}
