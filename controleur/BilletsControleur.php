<?php 
namespace controleur;
use modele\Service\BilletManager;

class BilletsControleur extends Controller {

	private $billetManager;

	public function __construct($billetManager) {
		$this->billetManager = $billetManager;
	}

	public function billets_front_affichage_billets() {	

    $billets = $billetManager->get_billets(0, 30);

    $tableau = [
    	'billets' => $billets,
    ];

	$this->render('vue/billets.php', $tableau); 
	}

}
