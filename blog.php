<?php
//phpinfo();
// Routeur
include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    include_once('controleur/blog/index.php');
} else if($_GET['section'] == 'commentaires') {
    include_once('controleur/blog/commentaires.php');
}