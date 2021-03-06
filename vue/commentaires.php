<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Billet simple pour l'Alaska</title>

    	<link href="assets/css/style.css" rel="stylesheet" /> 
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    </head>

    <body>
    	{%  if connected=="oui"  %}
            <h3><a href='index.php?section=logout'>Deconnexion</a></h3>
        {% endif %}
         <h3><a href='index.php?section=login'>Admin</a></h3>

        <h1>Billet simple pour l'Alaska</h1>
        <a href="index.php?section=index" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Retour à la liste des billets</a>

			<div class="news">		
				<h3> 
					{{ billet.getTitre }}
					<em>le {{ billet.getDateCreation }}</em>
				</h3>

				<p> 
					{{ billet.getContenu | raw }}
				</p>
			 </div>

			<h2> Commentaires </h2>

			<form action="index.php?section=commentaires&billet={{ billet.getId }}" method="post">
				<p><label> Pseudo</label> : <input type="text" name="pseudo"></p>
				<p><label> Message</label> : <input type="text" name="message"></p>
				<input type ="hidden" name="id2_billet" value="{{ idBillet }}">
				<p><input class="btn btn-secondary" type="submit" ></p>
			</form>	


		    {% for commentaire in commentaires %} 
				
					<strong>{{ commentaire.getAuteur }}</strong>
					Le {{ commentaire.getDateCommentaire }}
				
				<div>{{ commentaire.getCommentaire }}</div>
				

					{%  if commentaire.getSignalement == 1 %}
						<button id=" {{ commentaire.getId }}"
						class="btn btn-danger">Commentaire signalé</button><br><br>						
					{%  else  %}
					    <form method="post" action="index.php?section=signalement_commentaire&billet={{ billet.getId }} ">
			       			<input type="hidden" name="idCommentaireSignaled" value="{{ commentaire.getId }}"/>
			       			<input type ="hidden" name="id2_billet" value="{{ billet.getId }}">
			       			<p><input type="submit" class="btn btn-secondary" value="Signaler ce commentaire">
			    		</form>
			    	{% endif %}
			    			
				{% endfor %}
						
    </body>
</html>