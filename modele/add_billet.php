<?php
function add_billet() {
	// Récupération de la base de données
    global $bdd;

	// Effectuer ici la requête qui insère le billet rédigé avec $_POST dans la base de données 
	$requete = $bdd->prepare('INSERT INTO billets(titre,contenu, date_creation) VALUES(:titre, :contenu, :date_creation)'); 
	$date = date('Y-m-d H:i:s');
	$requete->bindParam(':titre', $_POST['titre_billet']);
	$requete->bindParam(':contenu', $_POST['contenu_billet']);
	$requete->bindParam(':date_creation', $date);
	$requete->execute();
}