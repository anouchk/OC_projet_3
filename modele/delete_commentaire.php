<?php
if (isset($_POST['idCommentaire'])) {
 $id = $_POST['idCommentaire'];
 $sql = "DELETE FROM commentaires WHERE id = :id";
 $q = array('id' => $id);
 $req = $bdd -> prepare($sql);
 $req -> execute($q);
 header('Location:controleur/commentaires_back.php');
}
