<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link type="text/css" href="vue/style.css" rel="stylesheet" /> 
    </head>

    <body>

    	

    	<form action="blog.php?section=commentaires_back&billet=<?php echo $billet['id']; ?>" method="post">
				<p><label> Pseudo</label> : <input type="text" name="pseudo" value=></p>
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

			
			
			<!-- Pour signaler : je veux modifier le boléen sur le commentaire dont l'id sera récupéré en POST-->
		      	<form method="post" action="blog.php?section=signalement_commentaire&billet=<?php echo $billet['id']; ?>">
       				<input type="hidden" name="idCommentaireSignaled" value="<?php echo $commentaire['id']; ?>"/>
       				<input type ="hidden" name="id2_billet" value="<?php echo $_GET['billet']?>">
       				<p><input type="submit" value="Signaler ce commentaire"></p>
    			</form>
			<?php	
			} // fin de la boucle des commentaires 
			?>
			


    </body>
</html>

