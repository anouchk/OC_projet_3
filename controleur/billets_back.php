<?php
function billets_back_affichage_billets() {
	include_once('modele/get_billets.php'); 
	$billets = get_billets(0,5);

	// Ici, on doit surtout sécuriser l'affichage 
	foreach($billets as $cle => $billet) 
	{ 
	    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']); 
	    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu'])); 
	} 
	include_once('vue/billets_back.php'); 
}
