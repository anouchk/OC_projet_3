<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska </title>
        <link type="text/css" href="assets/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>

    <body>
    	<h3><a href="index.php?section=logout">Deconnexion</a></h3>
    	<h3><a href="index.php?section=index">Retour à la page d'accueil du blog</a></h3>

    	<div class="adroite">
    	<a href="index.php?section=creation_billet"><button class="btn btn-lg btn-info">Nouvel Article</button></a>
    	</div>

    	<table class="table">
		  <thead>
		    <tr>
		      <th>id</th>
		      <th>Titre</th>
		      <th>Lien vers l'article</th>
		      <th>Actions</th>
		      <th>Commentaires</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
			//var_dump($billets);
			foreach($billets as $billet) :
			?>
		    <tr>
		      <td><?php echo $billet['id']; ?></td>
		      <td><?php echo $billet['titre']; ?></td>
		      <td><a href="index.php?section=commentaires&billet=<?php echo $billet['id']; ?>"><?php echo $billet['titre']; ?></a></td>
		      <td> 
		      	<!-- Pour modifier : je veux afficher dans un form dans billet_back le contenu du billet dont l'id sera récupéré en POST-->
		      	<form class="coteacote" method="post" action="index.php?section=modification_billet">
       				<input type="hidden" name="idBilletModified" value="<?php echo $billet['id']; ?>"/>
       				<p><input type="submit" class="btn btn-primary" value="Modifier"></p>
    			</form>
		      	
       			<!-- Button trigger modal -->
       			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alert_suppr<?php echo $billet['id']; ?>">		Supprimer
       			</button>

						<!-- Modal -->
						<div class="modal fade" id="alert_suppr<?php echo $billet['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-body">
						        Etes-vous sûr de vouloir supprimer le billet "<?php echo $billet['titre']; ?>" ?
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oups, non</button>
						        <!-- Pour supprimer : je veux lancer une requête DELETE sur le billet dont l'id sera récupéré en POST-->
						      	<form method="post" action="index.php?section=suppression_billet">
				       				<input type="hidden" name="idBilletASupprimer" value="<?php echo $billet['id']; ?>"/>
				       				<p><input type="submit" class="btn btn-secondary btn-secondary-slightly-descendu" value="Oui"></p>
						        </form>
						      </div>
						    </div>
						  </div>
						</div>    			
		      </td>
		      <td> <?php echo $billets[$cle]['nombre_commentaires']; ?> | <a href="index.php?section=commentaires_back&billet=<?php echo $billet['id']; ?>"><button class="btn btn-primary">Modérer</button></a> <td>
		    </tr>
		    <?php
			endforeach;
			?>
		  </tbody>
		</table>
	</body>
</html>
