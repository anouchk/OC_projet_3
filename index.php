<?php
session_start();
if(!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = "non";
}

// Autoloader
require_once "modele/Service/Autoloader.php";
\modele\Service\Autoloader::load();

// Routeur
include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    $billetsControleur = new \controleur\BilletsControleur();
    $billetsControleur->billets_front_affichage_billets();
} else if($_GET['section'] == 'commentaires') {
    $commentairesControleur = new \controleur\CommentairesControleur();
    $commentairesControleur->commentaires_front_affichage_commentaires();
} else if($_GET['section'] == 'login') {
    $loginControleur = new \controleur\LoginControleur();
    $loginControleur->login_completion_formulaire();
} else if($_GET['section'] == 'login_traitement_formulaire') {
	$loginControleur = new \controleur\LoginControleur();
    $loginControleur->login_traitement_formulaire($bdd);
} else if($_GET['section'] == 'logout') {
    $loginControleur = new \controleur\LoginControleur();
    $loginControleur->logout();    
} else if($_GET['section'] == 'billets_back') {
    $billetsBackControleur = new \controleur\BilletsBackControleur();
    $billetsBackControleur->billets_back_affichage_billets();  
} else if ($_GET['section'] == 'commentaires_back') {
    $commentairesBackControleur = new \controleur\CommmentairesBackControleur();
    $commentairesBackControleur->commentaires_back_affichage_commentaires();
} else if ($_GET['section'] == 'suppression_commentaire') {
    $commentairesBackControleur = new \controleur\CommmentairesBackControleur();
    $commentairesBackControleur->commentaires_back_suppression_commentaire();
} else if ($_GET['section'] == 'signalement_commentaire') {
    $commentairesControleur = new \controleur\CommentairesControleur();
    $commentairesControleur->commentaires_front_signalement_commentaire();
} else if ($_GET['section'] == 'modification_commentaire') {
    $commentaireBackControleur = new \controleur\CommentaireBackControleur();
    $commentaireBackControleur->affichage_commentaire_a_modifier();
} else if ($_GET['section'] == 'enregistrer_modification_commentaire') {
    $commentaireBackControleur = new \controleur\CommentaireBackControleur();
    $commentaireBackControleur->enregistrement_modification_commentaire();
} else if ($_GET['section'] == 'modification_billet') {
    $billetBackControleur = new \controleur\BilletBackControleur();
    $billetBackControleur->affichage_billet_a_modifier() ;
} else if ($_GET['section'] == 'enregistrer_modification_billet') {
    $billetBackControleur = new \controleur\BilletBackControleur();
    $billetBackControleur->enregistrement_modification_billet();
} else if ($_GET['section'] == 'creation_billet') {
    $billetBackControleur = new \controleur\BilletBackControleur();
    $billetBackControleur->affichage_billet_a_creer() ;
} else if ($_GET['section'] == 'enregistrer_nouveau_billet') {
    $billetBackControleur = new \controleur\BilletBackControleur();
    $billetBackControleur->enregistrement_nouveau_billet();
} else if ($_GET['section'] == 'suppression_billet') {
    $billetBackControleur = new \controleur\BilletBackControleur();
    $billetBackControleur->suppression_billet();
}
