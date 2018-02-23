<?php

function delete_commentaire($id_commentaire, $id_billet) {
	global $bdd;

	if (isset($_POST['idCommentaire'])) {
	 $id_commentaire = $_POST['idCommentaire'];
	 $sql = "DELETE FROM commentaires WHERE id = :id_commentaire";
	 $q = array('id' => $id_commentaire);
	 $req = $bdd -> prepare($sql);
	 $req -> execute($q);
	 header('Location:controleur/commentaires_back.php&billet='.$id_billet);
	}
}
	
