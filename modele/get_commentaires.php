<?php

function get_commentaires($offset, $limit, $idBillet) {
    // on récupère l'id du billet dont on veut afficher les commentaires
    if (isset($_GET['billet'])) {
        $idBillet=$_GET['billet'];
    } elseif (isset($_POST['idBillet'])) {
        $idBillet=$_POST['idBillet'];
    }

    // Récupération de la base de données
    global $bdd;

    // fourchette du nombre de messages à afficher
    $offset = (int) $offset;
    $limit = (int) $limit;

	// Récupération des commentaires
	$PDO_statement = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, signalement FROM commentaires WHERE id_billet=:id ORDER BY date_commentaire DESC LIMIT :offset, :limit');
    $PDO_statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    $PDO_statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    $PDO_statement->bindParam(':id', $idBillet, PDO::PARAM_INT);
    $PDO_statement->execute();
    $commentaires = $PDO_statement->fetchAll(PDO::FETCH_ASSOC);

    return $commentaires;
}


			