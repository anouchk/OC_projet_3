<?php
session_start();
var_dump($_SESSION);
include_once('modele/get_commentaires.php'); 

$idBillet=$_GET['billet'];
// Exécuter la fonction get_billets(), avec les OFFSET et les LIMIT obligatoires en paramètres (à enlever d'ailleurs ?)
$commentaires = get_commentaires(0,5, $idBillet);

// On effectue du traitement sur les données (contrôleur) 
// Ici, on doit surtout sécuriser l'affichage 
foreach($commentaires as $cle => $commentaire) 
{ 
    $bcommentaires[$cle]['pseudo'] = htmlspecialchars($commentaires['titre']); 
    $bcommentaires[$cle]['contenu'] = nl2br(htmlspecialchars($commentaires['contenu'])); 
} 
 
// On affiche la page (vue) 
include_once('vue/commentaires_back.php'); 