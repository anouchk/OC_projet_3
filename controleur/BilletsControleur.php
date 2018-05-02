<?php 
namespace controleur;

class BilletsControleur extends Controller {

	private $connected;
	private $billetManager;

	public function __construct($billetManager) {
		$this->billetManager = $billetManager;
	}

	public function billets_front_affichage_billets() {	

		$billetManager = $this->billetManager;

		if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
			$connected = "oui";
	 	} elseif (isset($_SESSION) && ($_SESSION['connected']=="non")) {
	    	$connected = "non";
	    } 

		$view_params = [
			'billets' => $billetManager->get_billets(0, 30),
			'connected' => $connected
		];		
	    
	    $this->render('billets.php', $view_params); 

	}

}
