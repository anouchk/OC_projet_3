<?php
function post_commentaire () {
	// Récupération de la base de données
    global $bdd;

	// Effectuer ici la requête qui insère le message reçu avec $_POST dans la base de données 
	$requete = $bdd->prepare('INSERT INTO commentaires(id_billet,auteur,commentaire, date_commentaire) VALUES(:id_billet, :auteur, :commentaire, :date_commentaire)'); 
	$date = date('Y-m-d H:i:s');
	$requete->bindParam(':id_billet', $_POST['id2_billet']);
	$requete->bindParam(':auteur', $_POST['pseudo']);
	$requete->bindParam(':commentaire', $_POST['message']);
	$requete->bindParam(':date_commentaire', $date);
	$requete->execute();
}

function update_commentaire () {
	// Récupération de la base de données
    global $bdd;

    // Effectuer ici la requête qui met à jour le commentaire avec $_POST dans la base de données 
//     $requete = $bdd->prepare('UPDATE commentaires
//     SET column1 = value1, column2 = value2, ...
//     WHERE condition'); 
// }

function delete_commentaire () {
	// Récupération de la base de données
    global $bdd;

    // Effectuer ici la requête qui supprime le commentaire dans la base de données 
}