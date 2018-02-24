<!DOCTYPE html>
    <head>

        <meta charset="utf-8" />

        <title>Billet simple pour l'Alaska </title>

    	<link href="vue/style.css" rel="stylesheet" /> 
    	<!-- <script type="text/javascript" src="XXXXX/tiny_mce/tiny_mce.js"></script>
    	<script type="text/javascript">
	        tinyMCE.init({
	            mode : "textareas",
	            theme : "simple"
	        });
     	</script> -->

    </head>

    <body>

        <a href="blog.php?section=index">Retour à l'administration des billets</a>

			<form name="" id="" method="post" action="billet_back.php">
				<p><label> Titre</label> : <input type="text" name="titre_billet" value=""></p>
				<p> <label>Contenu de l'épisode :</label> <textarea type="text" name="contenu_billet" value="" rows="20" cols="90"></textarea></p>
				<input type ="hidden" name="" value="">
				<p><input type="submit" ></p>
			</form>

    </body>
</html>

