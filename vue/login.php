<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Billet simple pour l'Alaska</title>
	</head>
	<body>


		{% if error %}
			<div>Identifiants erronés. Veuillez à nouveau saisir votre pseudo et votre mot de passe :</div>
		{% endif %}

		<form action="index.php?section=login_traitement_formulaire" method="post">
			<p><label for "pseudo"> Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value=""></p>
			<p><label for "pass"> Mot de passe</label> : <input type="password" name="pass"></p>
			<p><input type="submit" ></p>
		</form>	
	</body>
</html>