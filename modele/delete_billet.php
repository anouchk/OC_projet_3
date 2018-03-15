<?php

function delete_billet($id_billet) {
	global $bdd;

	$sql = "DELETE FROM billets WHERE id = :id_billet";
	$req = $bdd -> prepare($sql);
	$req -> execute(array('id_billet' => $id_billet));
}
	
