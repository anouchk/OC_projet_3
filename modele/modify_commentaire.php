<?php

function update_commentaire () {
	// Récupération de la base de données
    global $bdd;

    //Effectuer ici la requête qui met à jour le commentaire avec $_POST dans la base de données 
	$requete = $bdd->prepare('
		UPDATE commentaires
		SET 
		commentaire = :commentaire
		WHERE id= :id
	') ;
	$requete->bindParam(':commentaire', $_POST['message']);
	$requete->bindParam(':id', $_POST['idCommentaireModified']);
	$requete->execute();
}