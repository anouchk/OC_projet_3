<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link type="text/css" href="assets/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>

    <body>

    	<h2>Commentaire du billet : <?php echo $billet['titre']; ?></h2>

    	<!-- il va falloir voir comment récupérer l'id du billet -->
    	<!-- Pour modifier : je veux modifier le contenu du le commentaire dont l'id sera récupéré en POST-->
    	<form action="index.php?section=enregistrer_modification_commentaire&billet=<?php echo $billet['id']; ?>" method="post">
                <p>Posté le <?php echo $commentaire['date_commentaire_fr'] ; ?> par <?php echo $commentaire['auteur'] ?></p>
			
				<p><label> Message</label> : <input class="input_large" type="text" name="message" value= "<?php echo $commentaire['commentaire'] ?>"</p>
                <input type="hidden" name="idCommentaireModified" value="<?php echo $commentaire['id']; ?>"/>
				<input type ="hidden" name="id2_billet" value="<?php echo $idBillet?>">
				<p><input type="submit" value="Enregistrer la modification du commentaire" ></p>
		</form>	

    </body>

</html>

