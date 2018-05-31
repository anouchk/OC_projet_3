<?php
namespace modele\Service;
use modele\Entity\Commentaire;
use modele\Entity\Billet;

class CommentaireManager extends DatabaseManager {

	/**
	 * Instancie l'entité Commentaire et la retourne
	 */
	public function create_commentaire($auteur, $message, $id_billet, $signalement) {
	
	$commentaire = new Commentaire();
	$commentaire->setAuteur($auteur);
	$commentaire->setCommentaire($message);
	$commentaire->setIdBillet($id_billet);
	$commentaire->setSignalement($signalement);

	return $commentaire;
	}

	/**
	 * Ajoute un commentaire
	 */
	public function add_commentaire (Commentaire $commentaire) {

	    $bdd = $this->getBdd();

		// Effectuer ici la requête qui insère le message reçu avec $_POST dans la base de données 
		$requete = $bdd->prepare('INSERT INTO commentaires(id_billet,auteur,commentaire, date_commentaire, signalement) VALUES(:id_billet, :auteur, :commentaire, :date_commentaire, :signalement)'); 
		$date = date('Y-m-d H:i:s');
		$requete->execute(array(
			'id_billet'=>$commentaire->getIdBillet(),
			'auteur'=>$commentaire->getAuteur(),
			'commentaire'=>$commentaire->getCommentaire(),
			'date_commentaire'=>$date,
			'signalement'=>$commentaire->getSignalement()
		));
		return $commentaire ;
	}

	/*
	 * Récupère un commentaire
	 */
	public function get_commentaire($idCommentaire) {
	
	    $bdd = $this->getBdd();

	    // on récupère l'id du commentaire 
	    $id_Commentaire=$idCommentaire;
	    
	    // Récupération du commentaire 
	    $req = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id=?');
	    $req->execute(array($id_Commentaire));
	    $data = $req->fetch(\PDO::FETCH_ASSOC);
	    $commentaire = new Commentaire();
	    $commentaire->setId($data['id']);
	    $commentaire->setAuteur($data['auteur']);
	    $commentaire->setCommentaire($data['commentaire']);
	    $commentaire->setDateCommentaire($data['date_commentaire_fr']);
	    return $commentaire ;
 	}

 	/*
	 * Actualise un commentaire
	 */
 	public function update_commentaire (Commentaire $commentaire) {

	    $bdd = $this->getBdd();
 		
		$requete = $bdd->prepare('
			UPDATE commentaires
			SET 
			commentaire = :commentaire
			WHERE id= :id
		') ;
		$requete->execute(array(
            'commentaire'=>$commentaire->getCommentaire(),
            'id'=> $commentaire->getId()
        ));
	}

	/*
	 * Supprimme un commentaire
	 */
	public function delete_commentaire($idCommentaire) {
	
		$bdd = $this->getBdd();

		$sql = "DELETE FROM commentaires WHERE id = :id";
		$q = array('id' => $commentaire->getId());
		$req = $bdd -> prepare($sql);
		$req -> execute($q);
	}

	/*
	 * Signale un commentaire
	 */
	public function signal_commentaire(Commentaire $commentaire) {
		$bdd = $this->getBdd();

		$sql = "UPDATE commentaires SET signalement = 1 WHERE id = :id_commentaire"; 
		$req = $bdd -> prepare($sql);
		$req -> execute(array('id_commentaire' => $commentaire->getId()));
	}

	/*
	 * Supprime le signalement d'un commentaire
	 */
	public function unsignal_commentaire(Commentaire $commentaire) {
		$bdd = $this->getBdd();

		$sql = "UPDATE commentaires SET signalement = 0 WHERE id = :id_commentaire"; 
		$req = $bdd -> prepare($sql);
		$req -> execute(array('id_commentaire' => $commentaire->getId()));
	}

	/*
	 * Compteur de commentaires
	 */
	public function count_commentaires(Billet $billet) {
	
	    $bdd = $this->getBdd();
	   
	    $req = $bdd->prepare('SELECT count(*) FROM commentaires WHERE id_billet=?');
	    $req->execute(array($billet->getId()));
	    $nombre_commentaires = $req->fetch(\PDO::FETCH_NUM);
	    return $nombre_commentaires ;
	}

	/*
	 * Récupère une liste de commentaires ordonnés par date
	 */
	function get_commentaires($offset, $limit, $idBillet) {
   
	    $bdd = $this->getBdd();

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
		$PDO_statement = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, signalement, id_billet FROM commentaires WHERE id_billet=:id ORDER BY  date_commentaire DESC LIMIT :offset, :limit');
	    $PDO_statement->bindParam(':offset', $offset, \PDO::PARAM_INT);
	    $PDO_statement->bindParam(':limit', $limit, \PDO::PARAM_INT);
	    $PDO_statement->bindParam(':id', $idBillet, \PDO::PARAM_INT);
	    $PDO_statement->execute();
	    // $commentaires = $PDO_statement->fetchAll(\PDO::FETCH_ASSOC);

	    // Retournons un tableau d'instances de l'objet Commentaire
	    $data = $PDO_statement->fetchAll(\PDO::FETCH_ASSOC);
	    // var_dump($data);
	    $commentaires = [];
	    for ($i=0; $i < count($data); $i++) {
			$commentaire[$i] = new Commentaire();
		    $commentaire[$i]->setId($data[$i]['id']);
		    $commentaire[$i]->setIdBillet($data[$i]['id_billet']);
		    $commentaire[$i]->setAuteur($data[$i]['auteur']);
		    $commentaire[$i]->setCommentaire($data[$i]['commentaire']);
		    $commentaire[$i]->setDateCommentaire($data[$i]['date_commentaire_fr']);
		    $commentaire[$i]->setSignalement($data[$i]['signalement']);

			$commentaires[] = $commentaire[$i];
		}
		// variante
		// foreach ($data as $key => $commentaire) {

  //           $commentaire = new Commentaire();
  //           $commentaire->setId($data[$key]['id']);
  //           $commentaire->setIdBillet($data[$key]['id_billet']);
  //           $commentaire->setAuteur($data[$key]['auteur']);
  //           $commentaire->setCommentaire($data[$key]['commentaire']);
  //           $commentaire->setDateCommentaire($data[$key]['date_commentaire_fr']);
  //           $commentaire->setSignalement($data[$key]['signalement']);

  //           $commentaires[] = $commentaire;

  //       }
        // var_dump($commentaires);
	    return $commentaires;

	}

	 /*
	 * Récupère les commentaires pour les afficher dans le back-office ordonnés par signalement
	 */

	 function get_commentaires_back($offset, $limit, $idBillet) {
   
	    $bdd = $this->getBdd();

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
		$PDO_statement = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, signalement, id_billet FROM commentaires WHERE id_billet=:id ORDER BY  signalement DESC LIMIT :offset, :limit');
	    $PDO_statement->bindParam(':offset', $offset, \PDO::PARAM_INT);
	    $PDO_statement->bindParam(':limit', $limit, \PDO::PARAM_INT);
	    $PDO_statement->bindParam(':id', $idBillet, \PDO::PARAM_INT);
	    $PDO_statement->execute();

	    // Retournons un tableau d'instances de l'objet Commentaire
	    $data = $PDO_statement->fetchAll(\PDO::FETCH_ASSOC);
	    // var_dump($data);
	    $commentaires = [];
	    for ($i=0; $i < count($data); $i++) {
			$commentaire[$i] = new Commentaire();
		    $commentaire[$i]->setId($data[$i]['id']);
		    $commentaire[$i]->setIdBillet($data[$i]['id_billet']);
		    $commentaire[$i]->setAuteur($data[$i]['auteur']);
		    $commentaire[$i]->setCommentaire($data[$i]['commentaire']);
		    $commentaire[$i]->setDateCommentaire($data[$i]['date_commentaire_fr']);
		    $commentaire[$i]->setSignalement($data[$i]['signalement']);

			$commentaires[] = $commentaire[$i];
		}

	    return $commentaires;

	}
 	
}