<?php
namespace modele\Service;

class CommentaireManager {

	public function add_commentaire () {

    global $bdd;

	// Effectuer ici la requête qui insère le message reçu avec $_POST dans la base de données 
	$requete = $bdd->prepare('INSERT INTO commentaires(id_billet,auteur,commentaire, date_commentaire) VALUES(:id_billet, :auteur, :commentaire, :date_commentaire)'); 
	$date = date('Y-m-d H:i:s');
	$requete->bindParam(':id_billet', $_POST['id2_billet']);
	$requete->bindParam(':auteur', $_POST['pseudo']);
	$requete->bindParam(':commentaire', $_POST['message']);
	$requete->bindParam(':date_commentaire', $date);
	$requete->execute();
	}

	public function get_commentaire($idCommentaire) {
	
    global $bdd;

    // on récupère l'id du billet dont on veut afficher les commentaires
    $id_Commentaire=$idCommentaire;
    
    // Récupération du billet   
    $req = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id=?');
    $req->execute(array($id_Commentaire));
    $commentaire = $req->fetch(\PDO::FETCH_ASSOC);
    return $commentaire ;
 	}

 	public function update_commentaire () {

    global $bdd;

    //Effectuer ici la requête qui met à jour le commentaire avec $_POST dans la base de données 
	$requete = $bdd->prepare('
		UPDATE commentaires
		SET 
		commentaire = :commentaire
		WHERE id= :id
	') ;
	$requete->bindParam(':commentaire', $_POST['message']);
	$requete->bindParam(':id', $_POST['idCommentaireModified']);
	$requete->execute();
	}

	public function delete_commentaire($idCommentaire) {
	
	global $bdd;

	$sql = "DELETE FROM commentaires WHERE id = :id";
	$q = array('id' => $idCommentaire);
	$req = $bdd -> prepare($sql);
	$req -> execute($q);
	}

	public function signal_commentaire($id_commentaire) {
	global $bdd;

	$sql = "UPDATE commentaires SET signalement = 1 WHERE id = :id_commentaire"; 
	$req = $bdd -> prepare($sql);
	$req -> execute(array('id_commentaire' => $id_commentaire));
	}

	public function unsignal_commentaire($id_commentaire) {
		global $bdd;

		$sql = "UPDATE commentaires SET signalement = 0 WHERE id = :id_commentaire"; 
		$req = $bdd -> prepare($sql);
		$req -> execute(array('id_commentaire' => $id_commentaire));
	}

	public function count_commentaires($idBillet) {
	
    global $bdd;

    $id_Billet=$idBillet;
   
    $req = $bdd->prepare('SELECT count(*) FROM commentaires WHERE id_billet=?');
    $req->execute(array($id_Billet));
    $nombre_commentaires = $req->fetch(\PDO::FETCH_NUM);
    return $nombre_commentaires ;
	}

	function get_commentaires($offset, $limit, $idBillet) {
   
    global $bdd;

    // on récupère l'id du billet dont on veut afficher les commentaires
    if (isset($_GET['billet'])) {
        $idBillet=$_GET['billet'];
    } elseif (isset($_POST['idBillet'])) {
        $idBillet=$_POST['idBillet'];
    }

    // fourchette du nombre de messages à afficher
    $offset = (int) $offset;
    $limit = (int) $limit;

	// Récupération des commentaires
	$PDO_statement = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, signalement FROM commentaires WHERE id_billet=:id ORDER BY date_commentaire DESC LIMIT :offset, :limit');
    $PDO_statement->bindParam(':offset', $offset, \PDO::PARAM_INT);
    $PDO_statement->bindParam(':limit', $limit, \PDO::PARAM_INT);
    $PDO_statement->bindParam(':id', $idBillet, \PDO::PARAM_INT);
    $PDO_statement->execute();
    $commentaires = $PDO_statement->fetchAll(\PDO::FETCH_ASSOC);

    return $commentaires;
	}

}