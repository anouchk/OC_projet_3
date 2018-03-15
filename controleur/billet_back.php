<?php
include_once('modele/get_billet.php'); 
include_once('modele/delete_billet.php'); 

// S'il est connecté en tant qu'admin, faire des trucs (charger les données du billet récupérées par le modèle, si elles existent. Afficher la vue du formulaire d'insertion ou de modification d'article...
// if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
// 	// faire des trucs
// } else {
//     header('Location: blog.php?section=login&error=1');
// }

function affichage_billet_a_modifier() {
	if (!empty($_POST['idBilletModified'])) {
		$idBillet = $_POST['idBilletModified'];
		// var_dump($idBillet);
		$billet = get_billet($idBillet);
		// var_dump($billet);
		include_once('vue/billet_back.php');
	}
}

function enregistrement_modification_billet() {
	if (!empty($_POST['idBilletModified'])) {
		include_once('modele/modify_billet.php');
		// var_dump($_POST['idBilletModified']);
		update_billet();
	}
	header('Location: blog.php?section=billets_back');
} 

function affichage_billet_a_creer() {
	include_once('vue/new_billet_back.php');
}

function enregistrement_nouveau_billet() {
	if (!empty($_POST)) {
		include_once('modele/add_billet.php');
		add_billet();
		header('Location: blog.php?section=billets_back');
	} else {
		echo "Aucune donnée à enregistrer. Veuillez remplir le formulaire.";
	}

}

function suppression_billet() {
	// lancer la requête de suppression du billet
	if (!empty($_POST['idBilletASupprimer'])) {
		delete_billet($_POST['idBilletASupprimer']);
		// echo "l'id du billet est stocké et la function delete_billet est intégrée";
		// var_dump($_POST['idBilletASupprimer']);
	}
}

