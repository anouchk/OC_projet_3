<?php

function update_commentaire () {
	// Récupération de la base de données
    global $bdd;

    //Effectuer ici la requête qui met à jour le commentaire avec $_POST dans la base de données 
	$requete = $bdd->prepare('
		UPDATE commentaires
		SET auteur = ':auteur', commentaire = ':commentaire'
		WHERE id=?');
	')
	$requete->bindParam(':auteur', $_POST['pseudo']);
	$requete->bindParam(':commentaire', $_POST['message']);
	$req->execute(array($_POST['idCommentaireModified']));
}