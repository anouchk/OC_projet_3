<?php
// var_dump($_SESSION);
include_once('modele/get_billets.php'); 

// Exécuter la fonction get_billets(), avec les OFFSET et les LIMIT obligatoires en paramètres (à enlever d'ailleurs ?)
$billets = get_billets(0,5);

// On effectue du traitement sur les données (contrôleur) 
// Ici, on doit surtout sécuriser l'affichage 
foreach($billets as $cle => $billet) 
{ 
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']); 
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu'])); 
} 
 
// On affiche la page (vue) 
include_once('vue/billets_back.php'); 