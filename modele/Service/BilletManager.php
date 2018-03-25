<?php
namespace modele\Service;

class BilletManager extends DatabaseManager{

	public function add_billet() {

	    $bdd = $this->getBdd();
	    // $bdd = parent::getBdd(); ça marche aussi

		// Effectuer ici la requête qui insère le billet rédigé avec $_POST dans la base de données 
		$requete = $bdd->prepare('INSERT INTO billets(titre,contenu, date_creation) VALUES(:titre, :contenu, :date_creation)'); 
		$date = date('Y-m-d H:i:s');
		$requete->bindParam(':titre', $_POST['titre_billet']);
		$requete->bindParam(':contenu', $_POST['contenu_billet']);
		$requete->bindParam(':date_creation', $date);
		$requete->execute();
	}

	public function get_billet($idBillet) {

	    $bdd = $this->getBdd();

	    $id_Billet=$idBillet;
	    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
	    $req->execute(array($id_Billet));
	    $billet = $req->fetch(\PDO::FETCH_ASSOC);
	    return $billet ;
	}

	public function update_billet () {

	    $bdd = $this->getBdd();

		$requete = $bdd->prepare('
			UPDATE billets
			SET 
			contenu = :contenu,
			titre = :titre
			WHERE id= :id
		') ;
		$requete->bindParam(':contenu', $_POST['contenu_billet']);
		$requete->bindParam(':titre', $_POST['titre_billet']);
		$requete->bindParam(':id', $_POST['idBilletModified']);
		$requete->execute();
	}

	public function delete_billet($id_billet) {

		$bdd = $this->getBdd();

		$sql = "DELETE FROM billets WHERE id = :id_billet";
		$req = $bdd -> prepare($sql);
		$req -> execute(array('id_billet' => $id_billet));
	}

	public function get_billets($offset, $limit) {
    
	    $bdd = $this->getBdd();
	    $offset = (int) $offset;
	    $limit = (int) $limit;
	       
	    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
	    $req->bindParam(':offset', $offset, \PDO::PARAM_INT);
	    $req->bindParam(':limit', $limit, \PDO::PARAM_INT);
	    $req->execute();
	    $billets = $req->fetchAll(\PDO::FETCH_ASSOC);

	    return $billets;

	}

}