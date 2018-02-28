<?php
// var_dump($_SESSION);
include_once('modele/get_commentaires.php');
include_once('modele/delete_commentaire.php'); 
include_once('modele/get_billet.php');

function commentaires_back_affichage_commentaires()
{
    $idBillet = $_GET['billet'];
    var_dump($idBillet);
    // var_dump(affichage_securise($idBillet));
    $commentaires = affichage_securise($idBillet)[0];
    $billet = affichage_securise($idBillet)[1];

    // On affiche la page (vue)
    include_once('vue/commentaires_back.php');
}

function commentaires_back_suppression_commentaire()
{
    $idBillet = $_POST['idBillet'];
    // var_dump($idBillet);
    $commentaires = affichage_securise($idBillet);

    // On redirige 
    header('Location: blog.php?section=commentaires_back&billet='.$idBillet);
}

function affichage_securise($idBillet) {
	// Exécuter la fonction get_commentaires(), avec les OFFSET et les LIMIT obligatoires en paramètres (à enlever d'ailleurs ?)
	$commentaires = get_commentaires(0, 15, $idBillet);

	// On effectue du traitement sur les données (contrôleur) 
	// Ici, on doit surtout sécuriser l'affichage 
	foreach($commentaires as $cle => $commentaire) 
	{ 
	    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
	    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
	} 

	// lancer la requête de récupération des données du billet pour pouvoir afficher le titre du billet en haut de la liste des commentaires
	get_billet($idBillet);
	$billet = get_billet($idBillet);
	
	// lancer la requête de suppression du commentaire
	if (!empty($_POST['idCommentaire'])) {
		delete_commentaire($_POST['idCommentaire'], $idBillet);
		echo "l'id du commentaire est stocké et la function delete_commentaire est intégrée";
		var_dump($_POST['idCommentaire']);
		var_dump($idBillet);
	}

	return [$commentaires, $billet];
}
