<?php
var_dump($_SESSION);
die;
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska </title>
        <link type="text/css" href="vue/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>

    <body>
    	<h3><a href="blog.php?section=logout">Deconnexion</a></h3>
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
