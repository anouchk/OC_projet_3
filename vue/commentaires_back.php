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
		      <td><?php echo $commentaire['contenu']; ?></td>
		      <td>OUI ou NON (vert ou rouge)</td>
		      <td> Modifier | Supprimer </td>
		    </tr>
		    <?php
			endforeach;
			?>
		  </tbody>
		</table>

    </body>
</html>
