<?php 
include_once('modele/get_commentaires.php'); 
include_once('modele/get_billet.php');
include_once('modele/signal_commentaire.php');  
include_once('modele/post_commentaire.php');

function affichage_commentaires() {
	if (!empty($_POST)) {
		post_commentaire();
	}
	$idBillet=$_GET['billet'];
	$billet = get_billet($idBillet);
	$commentaires = get_commentaires(0, 10, $idBillet);
	
	// Ici, on doit surtout sécuriser l'affichage 
	foreach($commentaires as $cle => $commentaire) 
	{ 
	    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
	    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
	} 
	include_once('vue/commentaires.php'); 
}

function signalement_commentaire() {
	if (!empty($_POST['idCommentaireSignaled'])) {
		$idCommentaire = $_POST['idCommentaireSignaled'];
		signal_commentaire($idCommentaire);
	}
	$idBillet=$_POST['id2_billet'];
	header('Location: blog.php?section=commentaires&billet='.$idBillet);
} 
