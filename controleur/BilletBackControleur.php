<?php
namespace Controleur;
use modele\Service\BilletManager;

class BilletBackControleur {

	// S'il est connecté en tant qu'admin, faire des trucs (charger les données du billet récupérées par le modèle, si elles existent. Afficher la vue du formulaire d'insertion ou de modification d'article...
	// if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
	// 	// faire des trucs
	// } else {
	//     header('Location: index.php?section=login&error=1');
	// }

	public function affichage_billet_a_modifier() {
		if (!empty($_POST['idBilletModified'])) {
			$idBillet = $_POST['idBilletModified'];
			$billetManager = new BilletManager();
			$billet = $billetManager->get_billet($idBillet);
			include_once('vue/billet_back.php');
		}
	}

	public function enregistrement_modification_billet() {
		if (!empty($_POST['idBilletModified'])) {
			$billetManager = new BilletManager();		
			$billetManager->update_billet();
		}
		header('Location: index.php?section=billets_back');
	} 

	public function affichage_billet_a_creer() {
		include_once('vue/new_billet_back.php');
	}

	public function enregistrement_nouveau_billet() {
		if (!empty($_POST['titre_billet'])&& !empty($_POST['contenu_billet'])) {
			$billetManager = new BilletManager();	
			$billetManager->add_billet();
			header('Location: index.php?section=billets_back');
		} else {
			$message = "Le contenu et/ou le titre sont vides. Veuillez remplir le formulaire.";
			include_once('vue/new_billet_back.php');
		}
	}

	public function suppression_billet() {
		if (!empty($_POST['idBilletASupprimer'])) {
			$billetManager = new BilletManager();	
			$billetManager->delete_billet($_POST['idBilletASupprimer']);
			header('Location: index.php?section=billets_back');
		}
	}

}


