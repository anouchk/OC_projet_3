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

		<?php
		if(isset($_GET['error'])) {
			echo "<div>Identifiants erronés</div>";
		}
		?>

		<form action="blog.php?section=login_traitement_formulaire" method="post">
			<p><label for "pseudo"> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value=""></p>
			<p><label for "pass"> Mot de passe</label> : <input type="password" name="pass"></p>
			<p><input type="submit" ></p>
		</form>	
	</body>
</html>