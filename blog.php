

<?php
//phpinfo();
// Routeur
include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    include_once('controleur/index.php');
} else if($_GET['section'] == 'commentaires') {
    include_once('controleur/commentaires.php');
} else if($_GET['section'] == 'admin') {
    include_once('controleur/admin.php');

// // On démarre la session AVANT d'écrire du code HTML
// session_start();

// // On crée les variables de session dans $_SESSION
// $_SESSION['login'] = $_POST['login'];
// $_SESSION['password'] = $_POST['password'];

