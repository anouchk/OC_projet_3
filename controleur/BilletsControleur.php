<?php 
namespace controleur;

class BilletsControleur extends Controller {

	private $billetManager;

	public function __construct($billetManager) {
		$this->billetManager = $billetManager;
	}

	public function billets_front_affichage_billets() {	

	$billetManager = $this->billetManager;

	$view_params = [
		'billets' => $billetManager->get_billets(0, 30);
	]		
    
    $this->render('vue/billets.php', $viewparams); 

}
