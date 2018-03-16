<?php
include_once('modele/get_billets.php'); 
include_once('modele/count_commentaires.php');
include_once('modele/get_commentaires.php');

function billets_back_affichage_billets() {	
	$billets = get_billets(0,30);

	// Ici, on doit surtout sécuriser l'affichage 
	foreach($billets as $cle => $billet) 
	{ 
		$commentaires = get_commentaires(0,30, $billet['id']);
	    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']); 
	    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu'])); 
	    $billets[$cle]['nbcommentaires'] = count_commentaires($billet['id']);
	    // var_dump($billets[$cle]['nbcommentaires']);
	} 

	include_once('vue/billets_back.php'); 
}
