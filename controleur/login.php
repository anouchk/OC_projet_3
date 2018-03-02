<?php

function login_completion_formulaire()
{
    if (isset($_SESSION['connected'])="oui") {
        header('Location: blog.php?section=billets_back');
    } else {
        include_once('vue/login.php');
    }
    
}

function login_traitement_formulaire($bdd)
{
    include_once('modele/login.php');

    // etape 2 : comparer le pass du hash avec celui entré par le formulaire de connexion
    if (password_verify($_POST['pass'], $resultat['pass'])) {
        $_SESSION['connected'] = "oui";
        // si l'id ou le pass n'est pas le bon, on renvoie vers la page de connexion avec un message d'erreur
        header('Location: blog.php?section=billets_back');

    } else {
    	// si les identifiants sont les bons, on renvoie vers billets_back.php
        header('Location: blog.php?section=login&error=1');
    }
 }