<?php
namespace modele\Service;
use modele\Entity\Billet;

class BilletManager extends DatabaseManager{

	/*
	 * Ajoute un billet
	 */
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

	/*
	 * Récupère un billet
	 */
	public function get_billet($idBillet) {

	    $bdd = $this->getBdd();

	    $id_Billet=$idBillet;
	    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
	    $req->execute(array($id_Billet));
	    $data = $req->fetch(\PDO::FETCH_ASSOC);

	    $billet = new Billet();
	    $billet->setId($data['id']);
	    $billet->setTitre($data['titre']);
	    $billet->setContenu($data['contenu']);
	    $billet->setDateCreation($data['date_creation_fr']);
	    return $billet ;
	}

	/**
	 * Actualise un billet
	 */
	public function update_billet (Billet $billet) {

	    $bdd = $this->getBdd();

		$requete = $bdd->prepare('
			UPDATE billets
			SET 
			contenu = :contenu,
			titre = :titre
			WHERE id= :id
		') ;
		$requete->bindParam(':contenu', $billet->getContenu());
		$requete->bindParam(':titre', $billet->getTitre());
		$requete->bindParam(':id', $billet->getId());
		$requete->execute();
	}

	/*
	 * Supprime un billet
	 */
	public function delete_billet(Billet $billet) {

		$bdd = $this->getBdd();

		$sql = "DELETE FROM billets WHERE id = :id_billet";
		$req = $bdd -> prepare($sql);
		$req -> execute(array('id_billet' => $billet->getId()));
	}

	/*
	 * Récupère une liste de billets
	 */
	public function get_billets($offset, $limit) {
    
	    $bdd = $this->getBdd();
	    $offset = (int) $offset;
	    $limit = (int) $limit;
	       
	    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
	    $req->bindParam(':offset', $offset, \PDO::PARAM_INT);
	    $req->bindParam(':limit', $limit, \PDO::PARAM_INT);
	    $req->execute();
	    // $billets = $req->fetchAll(\PDO::FETCH_ASSOC);

	    // Retournons un tableau d'instances de l'objet Billet
	    $data = $req->fetchAll(\PDO::FETCH_ASSOC);

	    $billets = [];
	    for ($i=0; $i < count($data); $i++) {
			$billet[$i] = new Billet();
		    $billet[$i]->setId($data[$i]['id']);
		    $billet[$i]->setContenu($data[$i]['contenu']);
		    $billet[$i]->setTitre($data[$i]['titre']);
		    $billet[$i]->setDateCreation($data[$i]['date_creation_fr']);

			$billets[] = $billet[$i];
		}

		// variante
		// foreach ($data as $key => $billet) {
  //           $billet = new Billet();
  //           $billet->setId($data[$key]['id']);
  //           $billet->setContenu($data[$key]['contenu']);
  //           $billet->setTitre($data[$key]['titre']);
  //           $billet->setDateCreation($data[$key]['date_creation_fr']);
  //           $billets[] = $billet;

  //       }

	    return $billets;

	}

}