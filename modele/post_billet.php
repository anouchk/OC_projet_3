<?php
function post_commentaire () {
	// Récupération de la base de données
    global $bdd;

	// Effectuer ici la requête qui insère le message reçu avec $_POST dans la base de données 
	$requete = $bdd->prepare('INSERT INTO billets(id,titre,contenu, date_creation) VALUES(:id, :titre, :contenu, :date_creation)'); 
	$date = date('Y-m-d H:i:s');
	$requete->bindParam(':id', $_POST['id']);
	$requete->bindParam(':titre', $_POST['titre']);
	$requete->bindParam(':contenu', $_POST['contenu']);
	$requete->bindParam(':date_creation', $date);
	$requete->execute();
}