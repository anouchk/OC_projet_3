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
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
    </head>

    <body>
        <a href="index.php?section=commentaires_back&billet={{ billet.getId }}" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Retour à la modération des commentaires</a>
    	<h2>Commentaire du billet : {{ billet.getTitre }}</h2>

    	<!-- il va falloir voir comment récupérer l'id du billet -->
    	<!-- Pour modifier : je veux modifier le contenu du le commentaire dont l'id sera récupéré en POST-->
    	<form action="index.php?section=enregistrer_modification_commentaire&billet={{ billet.getId }}" method="post">
                <p>Posté le {{ commentaire.getDateComentaire }} par {{ commentaire.getAuteur }}</p>
			
				<p><label> Message</label> : <input class="input_large" type="text" name="message" value= "{{ commentaire.getCommentaire }}"</p>
                <input type="hidden" name="idCommentaireModified" value="{{ commentaire.getId }}"/>
				<input type ="hidden" name="id2_billet" value="{{ billet.getId }}">
				<p><input type="submit" class="btn btn-secondary" value="Enregistrer la modification du commentaire" ></p>
		</form>	

    </body>

</html>

