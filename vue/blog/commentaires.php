<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Mon blog</title>

    	<link href="vue/blog/style.css" rel="stylesheet" /> 

    </head>

        

    <body>

        <h1>Mon super blog !</h1>

        <a href="blog.php?section=index">Retour à la liste des billets</a>

			<div class="news">		
				<h3> 
					<?php echo $billet['titre'] ; ?>
					<em><?php echo $billet['date_creation_fr'] ; ?></em>
				</h3>

				<p> 
					<?php echo $billet['contenu'] ; ?> 
				</p>
			 </div>

			<h2> Commentaires </h2>

			<form action="blog.php?section=commentaires&billet=<?php echo $billet['id']; ?>" method="post">
				<p><label> Pseudo</label> : <input type="text" name="pseudo"></p>
				<p><label> Message</label> : <input type="text" name="message"></p>
				<input type ="hidden" name="id2_billet" value="<?php echo $_GET['billet']?>">
				<p><input type="submit" ></p>
			</form>	


		     <?php
				foreach ($commentaires as $commentaire)	{
			?>
				<p>
					<strong><?php echo $commentaire['auteur'] ; ?></strong>
					Le <?php echo $commentaire['date_commentaire_fr'] ; ?>
				</p>
				<div><?php echo $commentaire['commentaire'] ; ?></div>
			<?php	
			} // fin de la boucle des commentaires 
			?>
    </body>
</html>