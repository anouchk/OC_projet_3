<!-- <?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

// On crée les variables de session dans $_SESSION
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];
?>
 -->

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska </title>
        <link type="text/css" href="vue/style.css" rel="stylesheet" /> 
    </head>

    <body>
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
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>Otto</td>
		      <td>@mdo</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Jacob</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>Larry</td>
		      <td>the Bird</td>
		      <td>@twitter</td>
		    </tr>
		  </tbody>
		</table>
	</body>
</html>
