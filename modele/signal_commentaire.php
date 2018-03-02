<?php

// il faudra insérer l'id du commentaire voire l'id du Billet et faire global $bdd
function signal_commentaire() {
	global $bdd;
	if (isset($_POST['idCommentaireSignaled'])) {
	 $id = $_POST['idCommentaireSignaled'];
	 $sql = "UPDATE commentaires SET signalement = 1 WHERE id = :id"; 
	 $q = array('id' => $id);
	 $req = $bdd -> prepare($sql);
	 $req -> execute($q);
	}
}