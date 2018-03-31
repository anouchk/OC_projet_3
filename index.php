<?php
session_start();
if(!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = "non";
}



// Autoloader
require_once "modele/Service/Autoloader.php";
\modele\Service\Autoloader::register();

$configuration = [];
require __DIR__.'/config/configuration.php';
$container = new \modele\Service\Container($configuration);

// Routeur
if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    #include_once('controleur/billets.php');
    $billetsControleur = new \controleur\BilletsControleur($container->getBilletManager());
    $billetsControleur->billets_front_affichage_billets();
} else if($_GET['section'] == 'commentaires') {
    #include_once('controleur/commentaires.php');
    $commentairesControleur = new \controleur\CommentairesControleur($container->getBilletManager(), $container->getCommentaireManager());
    $commentairesControleur->commentaires_front_affichage_commentaires();
} else if($_GET['section'] == 'login') {
    #include_once('controleur/login.php');
    $loginControleur = new \controleur\LoginControleur($container->getLoginManager());
    $loginControleur->login_completion_formulaire();
} else if($_GET['section'] == 'login_traitement_formulaire') {
    #include_once('controleur/login.php');
    $loginControleur = new \controleur\LoginControleur($container->getLoginManager());
    $bdd = $container->getLoginManager()->getBdd();
    $loginControleur->login_traitement_formulaire($bdd);
} else if($_GET['section'] == 'logout') {
    #include_once('controleur/login.php');
    $loginControleur = new \controleur\LoginControleur($container->getLoginManager());
    $loginControleur->logout();    
} else if($_GET['section'] == 'billets_back') {
    #include_once('controleur/billets_back.php');
    $billetsBackControleur = new \controleur\BilletsBackControleur($container->getBilletManager(), $container->getCommentaireManager());
    $billetsBackControleur->billets_back_affichage_billets();  
} else if ($_GET['section'] == 'commentaires_back') {
    #include_once('controleur/commentaires_back.php');
    $commentairesBackControleur = new \controleur\CommentairesBackControleur($container->getBilletManager(), $container->getCommentaireManager());
    $commentairesBackControleur->commentaires_back_affichage_commentaires();
} else if ($_GET['section'] == 'suppression_commentaire') {
    #include_once('controleur/commentaires_back.php');
    $commentairesBackControleur = new \controleur\CommentairesBackControleur($container->getBilletManager(), $container->getCommentaireManager());
    $commentairesBackControleur->commentaires_back_suppression_commentaire();
} else if ($_GET['section'] == 'signalement_commentaire') {
    #include_once('controleur/commentaires.php');
    $commentairesControleur = new \controleur\CommentairesControleur($container->getBilletManager(), $container->getCommentaireManager());
    $commentairesControleur->commentaires_front_signalement_commentaire();
} else if ($_GET['section'] == 'modification_commentaire') {
    #include_once('controleur/commentaire_back.php');
    $commentaireBackControleur = new \controleur\CommentaireBackControleur();
    $commentaireBackControleur->affichage_commentaire_a_modifier();
} else if ($_GET['section'] == 'enregistrer_modification_commentaire') {
    #include_once('controleur/commentaire_back.php');
    $commentaireBackControleur = new \controleur\CommentaireBackControleur();
    $commentaireBackControleur->enregistrement_modification_commentaire();
} else if ($_GET['section'] == 'modification_billet') {
    #include_once('controleur/billet_back.php');
    $billetBackControleur = new \controleur\BilletBackControleur($container->getBilletManager());
    $billetBackControleur->affichage_billet_a_modifier() ;
} else if ($_GET['section'] == 'enregistrer_modification_billet') {
    #include_once('controleur/billet_back.php');
    $billetBackControleur = new \controleur\BilletBackControleur($container->getBilletManager());
    $billetBackControleur->enregistrement_modification_billet();
} else if ($_GET['section'] == 'creation_billet') {
    #include_once('controleur/billet_back.php');
    $billetBackControleur = new \controleur\BilletBackControleur($container->getBilletManager());
    $billetBackControleur->affichage_billet_a_creer() ;
} else if ($_GET['section'] == 'enregistrer_nouveau_billet') {
    #include_once('controleur/billet_back.php');
    $billetBackControleur = new \controleur\BilletBackControleur($container->getBilletManager());
    $billetBackControleur->enregistrement_nouveau_billet();
} else if ($_GET['section'] == 'suppression_billet') {
    #include_once('controleur/billet_back.php');
    $billetBackControleur = new \controleur\BilletBackControleur($container->getBilletManager());
    $billetBackControleur->suppression_billet();
}