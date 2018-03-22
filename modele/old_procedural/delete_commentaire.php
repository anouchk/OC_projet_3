<?php

function delete_commentaire($idCommentaire) {
	global $bdd;

	$sql = "DELETE FROM commentaires WHERE id = :id";
	$q = array('id' => $idCommentaire);
	$req = $bdd -> prepare($sql);
	$req -> execute($q);
}
	
