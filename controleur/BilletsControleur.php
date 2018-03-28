<?php 
namespace controleur;

class BilletsControleur {

	private $billetManager;

	public function __construct($billetManager) {
		$this->billetManager = $billetManager;
	}

	public function billets_front_affichage_billets() {	

	$billetManager = $this->billetManager;	
		
    $billets = $billetManager->get_billets(0, 30);

    include_once('vue/billets.php'); 

}
