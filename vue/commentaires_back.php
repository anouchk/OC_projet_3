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
    	<h3><a href="blog.php?section=logout">Deconnexion</a></h3>
    	<h3><a href="blog.php?section=index">Retour à la page d'accueil du blog</a></h3>
    	<p><a href="blog.php?section=billets_back">Retour à la liste des billets</a></p>

    	<h2>Commentaires du billet : <?php echo $billet['titre']; ?></h2>

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
		  	<?php
			//var_dump($billets);

			foreach($commentaires as $commentaire) :
			?>
		    <tr>
		      <td><?php echo $commentaire['id']; ?></td>
		      <td><?php echo $commentaire['auteur']; ?></td>
		      <td><?php echo $commentaire['commentaire']; ?></td>
		      <td>
		      	<?php 
			      	if ($commentaire['signalement'] == 1) {
			      		echo "<span class='signal'> OUI </span>"; 
			      	} elseif ($commentaire['signalement'] == 0) {
			      		echo "<span class='non_signal'> NON </span>";
			      	}
		      	?>
		      </td>
		      <td> 
		      	<!-- Pour modifier : je veux afficher dans un form dans commentaire_back le contenu du commentaire dont l'id sera récupéré en POST-->
		      	<form class="coteacote" method="post" action="blog.php?section=modification_commentaire">
       				<input type="hidden" name="idCommentaireModified" value="<?php echo $commentaire['id']; ?>"/>
       				<input type ="hidden" name="id2_billet" value="<?php echo $_GET['billet']?>">
       				<p><input type="submit" class="btn btn-primary" value="Modifier"></p>
    			</form>
		      	
       			<!-- Button trigger modal -->
       			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alert_suppr<?php echo $commentaire['id']; ?>">		Supprimer
       			</button>

						<!-- Modal -->
						<div class="modal fade" id="alert_suppr<?php echo $commentaire['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-body">
						        Etes-vous sûr de vouloir supprimer le commentaire "<?php echo $commentaire['commentaire']; ?>" de <?php echo $commentaire['auteur']; ?> ?
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oups, non</button>
						        <!-- Pour supprimer : je veux lancer une requête DELETE sur le commentaire dont l'id sera récupéré en POST-->
						      	<form method="post" action="blog.php?section=suppression_commentaire&billet=<?php echo $idBillet; ?>">
				       				<input type="hidden" name="idCommentaire" value="<?php echo $commentaire['id']; ?>"/>
				       				<input type="hidden" name="idBillet" value="<?php echo $idBillet; ?>"/>
				       				<p><input type="submit" class="btn btn-secondary btn-secondary-descendu" value="Oui"></p>
						        </form>
						      </div>
						    </div>
						  </div>
						</div>    			
		      </td>
		    </tr>
		    <?php
			endforeach;
			?>
		  </tbody>
		</table>

    </body>
</html>
