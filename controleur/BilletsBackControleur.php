<?php
namespace controleur;
use modele\Service\BilletManager;
use modele\Service\CommentaireManager;

class BilletsBackControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function __construct($billetManager, $commentaireManager) {
		$this->billetManager = $billetManager;
		$this->commentaireManager = $commentaireManager;
	}

	public function billets_back_affichage_billets() {	
		$billetManager = $this->billetManager;
		$billets = $billetManager->get_billets(0,30);

		// Ici, on doit surtout sécuriser l'affichage. Doit-on vraiment ?
		foreach($billets as $cle => $billet) 
		{ 
			$commentaireManager =  $this->commentaireManager;
			$commentaires = $commentaireManager->get_commentaires(0,30, $billet['id']);
		    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']); 
		    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu'])); 
		    $billets[$cle]['nbcommentaires'] = $commentaireManager->count_commentaires($billet['id']);
		} 

		include_once('vue/billets_back.php'); 
	}
}

