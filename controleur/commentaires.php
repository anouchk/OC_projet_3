<?php 
include_once('modele/get_commentaires.php'); 
include_once('modele/get_billet.php');
include_once('modele/signal_commentaire.php');  
include_once('modele/add_commentaire.php');

function commentaires_front_affichage_commentaires() {
	if (!empty($_POST)) {
		add_commentaire();
	}
	$idBillet=$_GET['billet'];
	$billet = get_billet($idBillet);
	$commentaires = get_commentaires(0, 30, $idBillet);
	
	// Ici, on doit surtout sécuriser l'affichage 
	foreach($commentaires as $cle => $commentaire) 
	{ 
	    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
	    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
	} 
	include_once('vue/commentaires.php'); 
}

function commentaires_front_signalement_commentaire() {
	if (!empty($_POST['idCommentaireSignaled'])) {
		$idCommentaire = $_POST['idCommentaireSignaled'];
		signal_commentaire($idCommentaire);
		$idBillet=$_POST['id2_billet'];
		header('Location: index.php?section=commentaires&billet='.$idBillet);
	}
} 