<?php 
// On demande les 10 derniers commentaires (modèle) 
include_once('modele/get_commentaires.php'); 
include_once('modele/get_billet.php');  

function affichage_commentaires($idBillet) {
		if (!empty($_POST)) {
		include_once('modele/post_commentaire.php');
		post_commentaire();
	}
	$idBillet=$_GET['billet'];
	$billet = get_billet();
	$commentaires = get_commentaires(0, 10, $idBillet);
	 
	// On effectue du traitement sur les données (contrôleur) 
	// Ici, on doit surtout sécuriser l'affichage 
	// echo "<pre>";
	// var_dump($commentaires);
	foreach($commentaires as $cle => $commentaire) 
	{ 
		// var_dump($commentaire);
	    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
	    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
	} 
	// var_dump($commentaires);	
	// On affiche la page (vue) 
	include_once('vue/commentaires.php'); 

}

function signalement_commentaire() {
	include_once('modele/signal_commentaire.php');
	signal_commentaire();
}
