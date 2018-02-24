<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska </title>
        <link type="text/css" href="vue/style.css" rel="stylesheet" /> 
    </head>

    <body>

    	<div>
    		<button><a href="blog.php?section=billet_back">Nouvel Article</a></button>
    	</div>

    	<table class="table">
		  <thead>
		    <tr>
		      <th>id</th>
		      <th>Titre</th>
		      <th>lien</th>
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
		      <td><a href="blog.php?section=commentaires&billet=<?php echo $billet['id']; ?>">#</a></td>
		      <td> Modifier | Supprimer </td>
		      <td> Nombre | <a href="blog.php?section=commentaires_back&billet=<?php echo $billet['id']; ?>">Modérer</a> <td>
		    </tr>
		    <?php
			endforeach;
			?>
		  </tbody>
		</table>
	</body>
</html>
