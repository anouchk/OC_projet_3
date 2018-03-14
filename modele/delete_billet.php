<?php

function delete_billet($id_billet) {
	global $bdd;

	if (isset($_POST['idBilletASupprimer'])) {
	 $id_billet = $_POST['idBilletASupprimer'];
	 $sql = "DELETE FROM billets WHERE id = :id_billet";
	 $q = array('id' => $id);
	 $req = $bdd -> prepare($sql);
	 $req -> execute($q);
	 header('Location: blog.php?section=billets_back');
	}
}
	
