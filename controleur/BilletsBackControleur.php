<?php
namespace controleur;

class BilletsBackControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function __construct($billetManager, $commentaireManager) {
		$this->billetManager = $billetManager;
		$this->commentaireManager = $commentaireManager;
	}

	/**
     * Affiche les billets à modérer dans le back, ainsi que le nombre de commentaires associés
     */
	public function billets_back_affichage_billets() {	
		$billetManager = $this->billetManager;
		$billets = $billetManager->get_billets(0,30);

		if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {

			// Ici, on doit surtout sécuriser l'affichage. A considérer que l'écrivain puisse être malveillant envers son propre blog. Et on compte le nombre de commentaires pour chaque billet.
			foreach($billets as $cle => $billet) 
			{ 
				$commentaireManager =  $this->commentaireManager;
				$commentaires = $commentaireManager->get_commentaires(0,30, $billet->getId());
			    $billet->setTitre(htmlspecialchars($billet->getTitre())); 
			    $billet->setContenu(htmlspecialchars($billet->getContenu()));
			    $billet->setNbCommentaires($commentaireManager->count_commentaires($billet->getId()));
			} 

			$view_params = [
	    		'billets' => $billets,
	    	];

	    	$this->render('billets_back.php', $view_params); 

		} elseif (isset($_SESSION) && ($_SESSION['connected']=="non")) {

			$this->redirect('index.php?section=login');
		}
		
	}
}

