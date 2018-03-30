<?php
namespace controleur;
use modele\Service\BilletManager;

class BilletBackControleur extends Controller {

	private $BilletManager;

	public function __construct($billetManager) {
		$this->billetManager = $billetManager;
	}

	public function affichage_billet_a_modifier() {
		if (!empty($_POST['idBilletModified'])) {
			$idBillet = $_POST['idBilletModified'];
			$billetManager = $this->billetManager;
			$billet = $billetManager->get_billet($idBillet);
			include_once('vue/billet_back.php');
		}
	}

	public function enregistrement_modification_billet() {
		if (!empty($_POST['idBilletModified'])) {
			$billetManager = $this->billetManager;		
			$billetManager->update_billet();
		}
		header('Location: index.php?section=billets_back');
	} 

	public function affichage_billet_a_creer() {
		include_once('vue/new_billet_back.php');
	}

	public function enregistrement_nouveau_billet() {
		if (!empty($_POST['titre_billet'])&& !empty($_POST['contenu_billet'])) {
			$billetManager = $this->billetManager;	
			$billetManager->add_billet();
			header('Location: index.php?section=billets_back');
		} else {
			$message = "Le contenu et/ou le titre sont vides. Veuillez remplir le formulaire.";
			include_once('vue/new_billet_back.php');
		}
	}

	public function suppression_billet() {
		if (!empty($_POST['idBilletASupprimer'])) {
			$billetManager = $this->billetManager;	
			$billetManager->delete_billet($_POST['idBilletASupprimer']);
			header('Location: index.php?section=billets_back');
		}
	}

}


