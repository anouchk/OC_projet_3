<?php
session_start();
// var_dump($_SESSION);
include_once('modele/get_commentaires.php'); 
$idBillet=$_GET['billet'];
var_dump($idBillet);
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
	include_once('modele/delete_commentaire.php');
	// delete_commentaire();
	var_dump($_POST['idCommentaire']);
}

// On affiche la page (vue) 
include_once('vue/commentaires_back.php'); 