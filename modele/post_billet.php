<?php
function post_billet () {
	// Récupération de la base de données
    global $bdd;

	// Effectuer ici la requête qui insère le billet rédigé avec $_POST dans la base de données 
	$requete = $bdd->prepare('INSERT INTO billets(id,titre,contenu, date_creation) VALUES(:id, :titre, :contenu, :date_creation)'); 
	$date = date('Y-m-d H:i:s');
	$requete->bindParam(':id', $_POST['id']);
	$requete->bindParam(':titre', $_POST['titre']);
	$requete->bindParam(':contenu', $_POST['contenu']);
	$requete->bindParam(':date_creation', $date);
	$requete->execute();
}

function update_billet () {
	// Récupération de la base de données
    global $bdd;

    // Effectuer ici la requête qui met à jour le billet avec $_POST dans la base de données 
    // $requete = $bdd->prepare('UPDATE billets
    // SET column1 = value1, column2 = value2, ...
    // WHERE condition'); 
}

function delete_billet () {
	// Récupération de la base de données
    global $bdd;

    // Effectuer ici la requête qui supprime le billet dans la base de données 


}