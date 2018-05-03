<?php
namespace controleur;

class BilletBackControleur extends Controller {

	private $BilletManager;

	public function __construct($billetManager) {
		$this->billetManager = $billetManager;
	}

	public function affichage_billet_a_modifier() {
		if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
			if (!empty($_POST['idBilletModified'])) {
				$idBillet = $_POST['idBilletModified'];
				$billetManager = $this->billetManager;
				$billet = $billetManager->get_billet($idBillet);
				$view_params = [
					'billet' => $billet,
				];
				$this->render('billet_back.php', $view_params); 
			}
		} else {
			$this->redirect('index.php?section=login');
		}
	}

	public function enregistrement_modification_billet() {
		if (!empty($_POST['idBilletModified'])) {
			$billetManager = $this->billetManager;		
			$billetManager->update_billet();
		}
		$this->redirect('index.php?section=billets_back');
	} 

	public function affichage_billet_a_creer() {
		if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
			$view_params = [];
			$this->render('new_billet_back.php', $view_params); 
		} else {
			$this->redirect('index.php?section=login');
		}
	}

	public function enregistrement_nouveau_billet() {
		if (!empty($_POST['titre_billet'])&& !empty($_POST['contenu_billet'])) {
			$billetManager = $this->billetManager;	
			$billetManager->add_billet();
			$this->redirect('index.php?section=billets_back');
		} else {
			$message = "Le contenu et/ou le titre sont vides. Veuillez remplir le formulaire.";
			$view_params = [
				$billet = $billetManager->get_billet($idBillet)
			];
			$this->render('new_billet_back.php', $view_params); 
		}
	}

	public function suppression_billet() {
		if (!empty($_POST['idBilletASupprimer'])) {
			$billetManager = $this->billetManager;	
			$billetManager->delete_billet($_POST['idBilletASupprimer']);
			$this->redirect('index.php?section=billets_back');
		}
	}
}


