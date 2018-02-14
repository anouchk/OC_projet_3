<?php
include_once('modele/get_billets.php'); 

// On effectue du traitement sur les données (contrôleur) 
// Ici, on doit surtout sécuriser l'affichage 
foreach($billets as $cle => $billet) 
{ 
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']); 
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu'])); 
} 
 
// On affiche la page (vue) 
include_once('vue/billets_back.php'); 