<!-- <?php

// On démarre la session AVANT d'écrire du code HTML
session_start();

// On crée les variables de session dans $_SESSION
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];
?> -->
<?php
include_once('modele/login.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Billet simple pour l'Alaska</title>
	</head>
	<body>
		<form action="cible_connexion.php" method="post">
			<p><label for "pseudo"> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value=""></p>
			<p><label for "pass"> Mot de passe</label> : <input type="password" name="pass"></p>
			<p><input type="submit" ></p>
		</form>	
	</body>
</html>