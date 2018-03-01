<?php
session_start();

// Routeur
include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    include_once('controleur/index.php');
} else if($_GET['section'] == 'commentaires') {
    include_once('controleur/commentaires.php');
    affichage_commentaires();
} else if($_GET['section'] == 'login') {
    include_once('controleur/login.php');
    login_completion_formulaire();
} else if($_GET['section'] == 'login_traitement_formulaire') {
	include_once('controleur/login.php');
	login_traitement_formulaire($bdd);
} else if($_GET['section'] == 'billets_back') {
    include_once('controleur/billets_back.php');
} else if ($_GET['section'] == 'billet_back') {
	include_once('controleur/billet_back.php');
} else if ($_GET['section'] == 'commentaires_back') {
    include_once('controleur/commentaires_back.php');
    commentaires_back_affichage_commentaires();
} else if ($_GET['section'] == 'suppression_commentaire') {
    include_once('controleur/commentaires_back.php');
    commentaires_back_suppression_commentaire();
} else if ($_GET['section'] == 'signalement_commentaire') {
    include_once('controleur/commentaires.php');
    signalement_commentaire();
}


