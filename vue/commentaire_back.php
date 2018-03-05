<?php echo "ceci est la vue de commentaire_back"; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link type="text/css" href="vue/style.css" rel="stylesheet" /> 
    </head>

    <body>

    	<h2>Commentaire du billet : <?php echo $billet['titre']; ?></h2>

    	<!-- il va falloir voir comment récupérer l'id du billet -->
    	<!-- Pour modifier : je veux modifier le contenu du le commentaire dont l'id sera récupéré en POST-->
    	<form action="blog.php?section=enregistrer_modification_commentaire&billet=<?php echo $billet['id']; ?>" method="post">
				<p><label> Pseudo</label> : <input type="text" name="pseudo" value= "<?php echo $commentaire['auteur'] ?>"</p>
				<p>Le <?php echo $commentaire['date_commentaire_fr'] ; ?></p>
				<p><label> Message</label> : <input type="text" name="message" value= "<?php echo $commentaire['commentaire'] ?>"</p>
				<input type ="hidden" name="id2_billet" value="<?php echo $_GET['billet']?>">
				<p><input type="submit" value="Enregistrer la modification du commentaire" ></p>
		</form>	

    </body>
</html>

