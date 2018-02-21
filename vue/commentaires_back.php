<?php
var_dump($_GET['billet']);
?>

<!-- <?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
?> -->


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link type="text/css" href="vue/style.css" rel="stylesheet" /> 
    </head>

    <body>

    	<h2>Commentaires du billet : </h2>

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
		      <td>OUI ou NON (vert ou rouge)</td>
		      <td> Modifier | 
		      	<!-- Pour supprimer : je veux lancer une requête DELETE sur le commentaire dont l'id sera récupéré en POST-->
		      	<form method="post" action="blog.php?section=suppression_commentaire">
       				<input type="hidden" name="idCommentaire" value="<?php echo $commentaire['id']; ?>"/>
       				<p><input type="submit" value="Supprimer"></p>
    			</form>
		      </td>
		    </tr>
		    <?php
			endforeach;
			?>
		  </tbody>
		</table>

    </body>
</html>
