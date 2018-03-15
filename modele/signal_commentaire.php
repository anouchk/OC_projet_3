<?php
function signal_commentaire($id_commentaire) {
	global $bdd;

	$sql = "UPDATE commentaires SET signalement = 1 WHERE id = :id_commentaire"; 
	$req = $bdd -> prepare($sql);
	$req -> execute(array('id_commentaire' => $id);
}