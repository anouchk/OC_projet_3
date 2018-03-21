<?php 
include_once('modele/Service/BilletManager.php'); 

class BilletsControleur {

	public function billets_front_affichage_billets() {	

	$billetManager = new BilletManager;
    $billets = $billetManager->get_billets(0, 30);

	include_once('vue/billets.php'); 
	}

}
