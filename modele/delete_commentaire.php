<?php

function delete_commentaire($id, $id_billet) {
	global $bdd;

	if (isset($_POST['idCommentaire'])) {
	 $id_commentaire = $_POST['idCommentaire'];
	 $sql = "DELETE FROM commentaires WHERE id = :id";
	 $q = array('id' => $id);
	 $req = $bdd -> prepare($sql);
	 $req -> execute($q);
	}
}
	
