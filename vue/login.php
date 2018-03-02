<?php
var_dump($_SESSION);
die;
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
			echo "<div>Identifiants erronés. Veuillez à nouveau saisir votre pseudo et votre mot de passe :</div>";
		} 
		// comment ajouter le 2ème message d'erreur suivant pour toutes les pages back :
		//echo "Vous n'êtes pas administrateur, vous ne pouvez accéder à cette page";
		?>

		<form action="blog.php?section=login_traitement_formulaire" method="post">
			<p><label for "pseudo"> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value=""></p>
			<p><label for "pass"> Mot de passe</label> : <input type="password" name="pass"></p>
			<p><input type="submit" ></p>
		</form>	
	</body>
</html>