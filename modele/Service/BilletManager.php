<?php
namespace modele\Service;
use modele\Entity\Billet;
 

class BilletManager extends DatabaseManager{

	/**
	 * Instancie un billet et le retourne
	 */
	public function create_billet($titre, $contenu) {

		$billet = new Billet();
		$billet->setTitre($titre);
		$billet->setContenu($contenu);
		return $billet;
	}

	/**
	 * Ajoute un billet à la base de données
	 */
	public function add_billet(Billet $billet) {

	    $bdd = $this->getBdd();
	    // $bdd = parent::getBdd(); ça marche aussi

		// Effectuer ici la requête qui insère le billet rédigé dans la base de données 
		$requete = $bdd->prepare('INSERT INTO billets(titre,contenu, date_creation) VALUES(:titre, :contenu, :date_creation)'); 
		$date = date('Y-m-d H:i:s');
		$requete->execute(array(
			'titre'=>$billet->getTitre(),
			'contenu'=>$billet->getContenu(),
			'date_creation'=>$date
		));
	}

	/**
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

        $req = $bdd->prepare('UPDATE billets
			SET 
			contenu = :contenu,
			titre = :titre
			WHERE id= :id
		') ;
        $req->execute(array(
           'id'=>$billet->getId(),
            'titre'=>$billet->getTitre(),
            'contenu'=> $billet->getContenu()
        ));
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
			$billet[$i] = new Billet($data);
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