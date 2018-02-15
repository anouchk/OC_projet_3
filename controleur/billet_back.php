<?php

// S'il est connecté en tant qu'admin, charger les données du billet récupérées par le modèle, si elles existent.
// Puis afficher la vue du formulaire d'insertion ou de modification d'article.
if (isset($_SESSION)) {
	include_once('modele/get_billet.php'); 
} else {
	echo "Vous n'êtes pas administrateur, vous ne pouvez accéder à cette page";
}

