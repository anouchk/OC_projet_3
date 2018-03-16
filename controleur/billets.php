<?php 
include_once('modele/get_billets.php'); 

class BilletsControleur {

	public function billets_front_affichage_billets() {	
	$billets = get_billets(0, 30);  
	include_once('vue/billets.php'); 
	}

}
