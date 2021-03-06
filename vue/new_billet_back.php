<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Billet simple pour l'Alaska </title>

    	<link href="assets/css/style.css" rel="stylesheet" /> 
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script >
            tinymce.init({
                selector : "#tinyMCEarea"
            });
        </script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    </head>

    <body>

        <a href="index.php?section=billets_back" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Retour à l'administration des billets</a>

        <p class="signal">
            {% if message is defined %}
                {{message}}
            {% endif %}      
        </p>

			<form action="index.php?section=enregistrer_nouveau_billet" method="post">
				<p><label> Titre :</label> <input class="input_large" type="text" name="titre_billet" value="" ></p>
				<p><label>Contenu de l'épisode :</label> <textarea id="tinyMCEarea" class="input_large" type="text" name="contenu_billet" rows="20" cols="90"></textarea></p>
				<p><input type="submit" class="btn btn-primary" value="Enregistrer l'épisode" ></p>
			</form>

    </body>
</html>