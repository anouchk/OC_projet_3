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
    	<h3><a href="index.php?section=logout">Deconnexion</a></h3>
    	<h3><a href="index.php?section=index">Retour à la page d'accueil du blog</a></h3>

    	<a href="index.php?section=billets_back" class="btn btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Retour à l'administration des billets</a>

    	<h2>Commentaires du billet : {{ billet.getTitre }}</h2>

    	<table class="table">
		  <thead>
		    <tr>
		      <th>id</th>
		      <th>Auteur</th>
		      <th>Commentaire</th>
		      <th>Signalé</th>
		      <th>Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	
		  	{% for commentaire in commentaires %} 

		    <tr>
		      <td>{{ commentaire.getId }}</td>
		      <td>{{ commentaire.getAuteur}}</td>
		      <td>{{ commentaire.getCommentaire }}></td>
		      <td>
		      	{% if commentaire.getSignalement == 1 %}
			      		<span class='signal'> OUI </span>
			    {% elseif commentaire.getSignalement == 0 %}
			      		<span class='non_signal'> NON </span>
			    {% endif %}

		      </td>
		      <td> 
		      	<!-- Pour modifier : je veux afficher dans un form dans commentaire_back le contenu du commentaire dont l'id sera récupéré en POST-->
		      	<form class="coteacote" method="post" action="index.php?section=modification_commentaire">
       				<input type="hidden" name="idCommentaireModified" value="{{ commentaire.getId }}"/>
       				<input type ="hidden" name="id2_billet" value="{{ idBillet }}">
       				<p><input type="submit" class="btn btn-primary" value="Modifier"></p>
    			</form>
		      	
       			<!-- Button trigger modal -->
       			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alert_suppr{{ commentaire.getId }}">		Supprimer
       			</button>

						<!-- Modal -->
						<div class="modal fade" id="alert_suppr{{ commentaire.getId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-body">
						        Etes-vous sûr de vouloir supprimer le commentaire "{{ commentaire.getCommentaire }}" de {{ commentaire.getAuteur }} ?
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oups, non</button>
						        <!-- Pour supprimer : je veux lancer une requête DELETE sur le commentaire dont l'id sera récupéré en POST-->
						      	<form method="post" action="index.php?section=suppression_commentaire">
				       				<input type="hidden" name="idCommentaire" value="{{ commentaire.getId }}"/>
				       				<input type="hidden" name="idBillet" value="{{ billet.getId }}"/>
				       				<p><input type="submit" class="btn btn-secondary btn-secondary-descendu" value="Oui"></p>
						        </form>
						      </div>
						    </div>
						  </div>
						</div>    			
		      </td>
		    </tr>
		    {% endfor %}
		  </tbody>
		</table>

    </body>
</html>
