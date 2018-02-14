<?php
if (!isset($_POST['pseudo']) && !isset($_POST['pass'])) {
	include_once('vue/login.php'); 
} else {
	include_once('modele/login.php');
		// etape 2 : comparer le pass du hash avec celui entré par le formulaire de connexion
	if (password_verify($_POST['pass'], $resultat['pass'])) {
	    session_start();
	    $_SESSION['id'] = $resultat['id'];
	    $_SESSION['pseudo'] = $pseudo;
	    echo 'Vous êtes connecté !';
	} else {
	    echo 'Mauvais identifiant ou mot de passe !';
	}

	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
	    echo '<br><br>Bonjour ' . $_SESSION['pseudo'];
	}
}
