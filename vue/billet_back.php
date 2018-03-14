<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Billet simple pour l'Alaska </title>

    	<link href="vue/style.css" rel="stylesheet" /> 
    	<!-- <script type="text/javascript" src="XXXXX/tiny_mce/tiny_mce.js"></script>
    	<script type="text/javascript">
	        tinyMCE.init({
	            mode : "textareas",
	            theme : "simple"
	        });
     	</script> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    </head>

    <body>

        <a href="blog.php?section=index">Retour à l'administration des billets</a>

			<form action="controleur/blog.php?section=enregistrer_modification_billet" method="post">
				<p><label> Titre :</label> <input type="text" name="titre_billet" value="<?php echo $billet['titre'] ?>"></p>
				<p><label>Contenu de l'épisode :</label> <textarea type="text" name="contenu_billet" value="<?php echo $billet['contenu'] ?>" rows="20" cols="90"></textarea></p>
				<input type ="hidden" name="idBilletModified" value="$billet['id']">
				<p><input type="submit" value="Enregistrer l'épisode" ></p>
			</form>

    </body>
</html>

