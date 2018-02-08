<?php

// On démarre la session AVANT d'écrire du code HTML
session_start();

// On crée les variables de session dans $_SESSION
$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
    	<link href="vue/style.css" rel="stylesheet" /> 
    </head>

    <body>
			<form action="" method="post">
				<p><label> Login</label> : <input type="text" name="login"></p>
				<p><label> Mot de passe</label> : <input type="password" name="password"></p>
				<input type ="hidden" name="" value="">
				<p><input type="submit" ></p>
			</form>	

	</body>
</html>