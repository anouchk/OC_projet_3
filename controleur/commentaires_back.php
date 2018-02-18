<?php
session_start();
// var_dump($_SESSION);
include_once('modele/get_commentaires.php'); 
if (!empty($_POST)) {
	include_once('modele/post_commentaire.php');
	post_commentaire();
}
$idBillet=$_GET['billet'];
var_dump($idBillet);
// Exécuter la fonction get_billets(), avec les OFFSET et les LIMIT obligatoires en paramètres (à enlever d'ailleurs ?)
$commentaires = get_commentaires(0, 5, $idBillet);

// On effectue du traitement sur les données (contrôleur) 
// Ici, on doit surtout sécuriser l'affichage 
foreach($commentaires as $cle => $commentaire) 
{ 
    $bcommentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
    $bcommentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
} 
 
// On affiche la page (vue) 
include_once('vue/commentaires_back.php'); 