<?php

function signal_commentaire() {
	if (isset($_POST['idCommentaire'])) {
	 $id = $_POST['idCommentaire'];
	 $sql = "UPDATE commentaires SET signalement = TRUE WHERE id = :id"; // pas sûre si c'est TRUE/FALSE ou 0/1
	 $q = array('id' => $id);
	 $req = $bdd -> prepare($sql);
	 $req -> execute($q);
	 header('Location:controleur/commentaires.php');
	}
}