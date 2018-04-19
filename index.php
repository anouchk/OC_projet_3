<?php
session_start();
if(!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = "non";
}

// Autoloader
require_once "modele/Service/Autoloader.php";
\modele\Service\Autoloader::register();
require_once "vendor/autoload.php";

$configuration = [];
require __DIR__.'/config/configuration.php';
$container = new \modele\Service\Container($configuration);

$router = new \modele\Service\Router($_SERVER['REQUEST_URI']);
$resolve = $router->resolve();

$controllerCaller = $resolve['controllerCaller'];
$action = $resolve['action'];

// var_dump($controllerCaller);
$controller = $container->$controllerCaller();
call_user_func_array([$controller, $action], $resolve['params']);

die;


// Routeur
// if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
//     #include_once('controleur/billets.php');
//     $billetsControleur = $container->getBilletsController();
//     $billetsControleur->billets_front_affichage_billets();
// } else if($_GET['section'] == 'commentaires') {
//     #include_once('controleur/commentaires.php');
//     $commentairesControleur = new \controleur\CommentairesControleur($container->get('billetManager'), $container->get('commentaireManager'));
//     $commentairesControleur->commentaires_front_affichage_commentaires();
// } else if($_GET['section'] == 'login') {
//     #include_once('controleur/login.php');
//     $loginControleur = $container->getLoginController();
//     $loginControleur->login_completion_formulaire();
// } else if($_GET['section'] == 'login_traitement_formulaire') {
//     #include_once('controleur/login.php');
//     $loginControleur = $container->getLoginController();
//     $bdd = $container->getLoginManager()->getBdd();
//     $loginControleur->login_traitement_formulaire($bdd);
// } else if($_GET['section'] == 'logout') {
//     #include_once('controleur/login.php');
//     $loginControleur = $container->getLoginController();
//     $loginControleur->logout();    
// } else if($_GET['section'] == 'billets_back') {
//     #include_once('controleur/billets_back.php');
//     $billetsBackControleur = new \controleur\BilletsBackControleur($container->get('billetManager'), $container->get('commentaireManager'));
//     $billetsBackControleur->billets_back_affichage_billets();  
// } else if ($_GET['section'] == 'commentaires_back') {
//     #include_once('controleur/commentaires_back.php');
//     $commentairesBackControleur = new \controleur\CommentairesBackControleur($container->get('billetManager'), $container->get('commentaireManager'));
//     $commentairesBackControleur->commentaires_back_affichage_commentaires();
// } else if ($_GET['section'] == 'suppression_commentaire') {
//     #include_once('controleur/commentaires_back.php');
//     $commentairesBackControleur = new \controleur\CommentairesBackControleur($container->get('billetManager'), $container->get('commentaireManager'));
//     $commentairesBackControleur->commentaires_back_suppression_commentaire();
// } else if ($_GET['section'] == 'signalement_commentaire') {
//     #include_once('controleur/commentaires.php');
//     $commentairesControleur = new \controleur\CommentairesControleur($container->get('billetManager'), $container->get('commentaireManager'));
//     $commentairesControleur->commentaires_front_signalement_commentaire();
// } else if ($_GET['section'] == 'modification_commentaire') {
//     #include_once('controleur/commentaire_back.php');
//     $commentaireBackControleur = new \controleur\CommentaireBackControleur($container->get('billetManager'), $container->get('commentaireManager'));
//     $commentaireBackControleur->affichage_commentaire_a_modifier();
// } else if ($_GET['section'] == 'enregistrer_modification_commentaire') {
//     #include_once('controleur/commentaire_back.php');
//     $commentaireBackControleur = new \controleur\CommentaireBackControleur($container->get('billetManager'), $container->get('commentaireManager'));
//     $commentaireBackControleur->enregistrement_modification_commentaire();
// } else if ($_GET['section'] == 'modification_billet') {
//     #include_once('controleur/billet_back.php');
//     $billetBackControleur = new \controleur\BilletBackControleur($container->get('billetManager'));
//     $billetBackControleur->affichage_billet_a_modifier() ;
// } else if ($_GET['section'] == 'enregistrer_modification_billet') {
//     #include_once('controleur/billet_back.php');
//     $billetBackControleur = new \controleur\BilletBackControleur($container->get('billetManager'));
//     $billetBackControleur->enregistrement_modification_billet();
// } else if ($_GET['section'] == 'creation_billet') {
//     #include_once('controleur/billet_back.php');
//     $billetBackControleur = new \controleur\BilletBackControleur($container->get('billetManager'));
//     $billetBackControleur->affichage_billet_a_creer() ;
// } else if ($_GET['section'] == 'enregistrer_nouveau_billet') {
//     #include_once('controleur/billet_back.php');
//     $billetBackControleur = new \controleur\BilletBackControleur($container->get('billetManager'));
//     $billetBackControleur->enregistrement_nouveau_billet();
// } else if ($_GET['section'] == 'suppression_billet') {
//     #include_once('controleur/billet_back.php');
//     $billetBackControleur = new \controleur\BilletBackControleur($container->get('billetManager'));
//     $billetBackControleur->suppression_billet();
// }