<?php

// il faudra insérer l'id du commentaire voire l'id du Billet et faire global $bdd
function signal_commentaire() {
	if (isset($_POST['idCommentaire'])) {
	 $id = $_POST['idCommentaire'];
	 $sql = "UPDATE commentaires SET signalement = 1 WHERE id = :id"; 
	 $q = array('id' => $id);
	 $req = $bdd -> prepare($sql);
	 $req -> execute($q);
	 header('Location:controleur/commentaires.php');
	}
}