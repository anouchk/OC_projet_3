<?php
session_start();
if(!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = "non";
}

// Routeur
include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    include_once('controleur/billets.php');
    billets_front_affichage_billets();
} else if($_GET['section'] == 'commentaires') {
    include_once('controleur/commentaires.php');
    commentaires_front_affichage_commentaires();
} else if($_GET['section'] == 'login') {
    include_once('controleur/login.php');
    login_completion_formulaire();
} else if($_GET['section'] == 'login_traitement_formulaire') {
	include_once('controleur/login.php');
	login_traitement_formulaire($bdd);
} else if($_GET['section'] == 'logout') {
    include_once('controleur/login.php');
    logout();    
} else if($_GET['section'] == 'billets_back') {
    include_once('controleur/billets_back.php');
    billets_back_affichage_billets();
} else if ($_GET['section'] == 'commentaires_back') {
    include_once('controleur/commentaires_back.php');
    commentaires_back_affichage_commentaires();
} else if ($_GET['section'] == 'suppression_commentaire') {
    include_once('controleur/commentaires_back.php');
    commentaires_back_suppression_commentaire();
} else if ($_GET['section'] == 'signalement_commentaire') {
    include_once('controleur/commentaires.php');
    commentaires_front_signalement_commentaire();
} else if ($_GET['section'] == 'modification_commentaire') {
    include_once('controleur/commentaire_back.php');
    affichage_commentaire_a_modifier();
} else if ($_GET['section'] == 'enregistrer_modification_commentaire') {
    include_once('controleur/commentaire_back.php');
    enregistrement_modification_commentaire();
} else if ($_GET['section'] == 'modification_billet') {
    include_once('controleur/billet_back.php');
    affichage_billet_a_modifier() ;
} else if ($_GET['section'] == 'enregistrer_modification_billet') {
    include_once('controleur/billet_back.php');
    enregistrement_modification_billet();
} else if ($_GET['section'] == 'creation_billet') {
    include_once('controleur/billet_back.php');
    affichage_billet_a_creer() ;
} else if ($_GET['section'] == 'enregistrer_nouveau_billet') {
    include_once('controleur/billet_back.php');
    enregistrement_nouveau_billet();
} else if ($_GET['section'] == 'suppression_billet') {
    include_once('controleur/billet_back.php');
    suppression_billet();
}