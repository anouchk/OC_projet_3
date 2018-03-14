<?php

function update_billet () {
	// Récupération de la base de données
    global $bdd;

    //Effectuer ici la requête qui met à jour le commentaire avec $_POST dans la base de données 
	$requete = $bdd->prepare('
		UPDATE billets
		SET 
		contenu = :contenu,
		titre = :titre
		WHERE id= :id
	') ;
	$requete->bindParam(':contenu', $_POST['contenu_billet']);
	$requete->bindParam(':titre', $_POST['titre_billet']);
	$requete->bindParam(':id', $_POST['idBilletModified']);
	$requete->execute();
}