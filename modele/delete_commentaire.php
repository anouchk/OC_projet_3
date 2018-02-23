<?php

function delete_commentaire($id, $id_billet) {
	global $bdd;

	if (isset($_POST['idCommentaire'])) {
	 $id = $_POST['idCommentaire'];
	 $sql = "DELETE FROM commentaires WHERE id = :id";
	 $q = array('id' => $id);
	 $req = $bdd -> prepare($sql);
	 $req -> execute($q);
	 header('Location:controleur/commentaires_back.php&billet='.$id_billet);
	}
}
	
