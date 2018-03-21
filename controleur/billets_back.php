<?php
include_once('modele/Service/BilletManager.php'); 
include_once('modele/Service/CommentaireManager.php'); 

class BilletsBackControleur {

	public function billets_back_affichage_billets() {	
		$billetManager = new BilletManager;
		$billets = $billetManager->get_billets(0,30);

		// Ici, on doit surtout sécuriser l'affichage. Doit-on vraiment ?
		foreach($billets as $cle => $billet) 
		{ 
			$commentaireManager =  new CommentaireManager;
			$commentaires = $commentaireManager->get_commentaires(0,30, $billet['id']);
		    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']); 
		    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu'])); 
		    $billets[$cle]['nbcommentaires'] = $commentaireManager->count_commentaires($billet['id']);
		} 

		include_once('vue/billets_back.php'); 
	}
}

