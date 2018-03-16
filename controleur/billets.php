<?php 
include_once('modele/get_billets.php'); 

function billets_front_affichage_billets() {	
	$billets = get_billets(0, 30);  
	// Ici, on doit surtout sécuriser l'affichage 
	// foreach($billets as $cle => $billet) 
	// { 
	//     $billets[$cle]['titre'] = htmlspecialchars($billet['titre']); 
	//     $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu'])); 
	// } 
	include_once('vue/billets.php'); 
}
