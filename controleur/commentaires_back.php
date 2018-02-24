<?php
session_start();
// var_dump($_SESSION);
include_once('modele/get_commentaires.php');
include_once('modele/delete_commentaire.php'); 

function commentaires_back_affichage_commentaires()
{
    $idBillet = $_GET['billet'];
    var_dump($idBillet);
    $commentaires = affichage_securise($idBillet);

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
	// Exécuter la fonction get_billets(), avec les OFFSET et les LIMIT obligatoires en paramètres (à enlever d'ailleurs ?)
	$commentaires = get_commentaires(0, 15, $idBillet);

	// On effectue du traitement sur les données (contrôleur) 
	// Ici, on doit surtout sécuriser l'affichage 
	foreach($commentaires as $cle => $commentaire) 
	{ 
	    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
	    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
	} 
	 
	if (!empty($_POST['idCommentaire'])) {
		delete_commentaire($_POST['idCommentaire'], $idBillet);
		echo "l'id du commentaire est stocké et la function delete_commentaire est intégrée";
		var_dump($_POST['idCommentaire']);
		var_dump($idBillet);
	}

	return $commentaires;
}
