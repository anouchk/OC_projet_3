<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Billet simple pour l'Alaska </title>

    	<link href="vue/style.css" rel="stylesheet" /> 

    </head>

    <body>

        <a href="blog.php?section=index">Retour à la liste des billets</a>

			<form method="post" action="cible.php">
				<p><label> Titre</label> : <input type="text" name="pseudo"></p>
				<p><label> Contenu de l'épisode</label> : <input type="text" name="message"></p>
				<input type ="hidden" name="id2_billet" value="<?php echo $_GET['billet']?>">
				<p><input type="submit" ></p>
			</form>

    </body>
</html>



