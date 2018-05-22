<?php
namespace modele\Service;
use modele\Entity\Auteur;

class LoginManager extends DatabaseManager {

	/**
	 * Retourne le mot de passe crypté correspondant au pseudo entré par l'utilisateur
	 */
	public function Recuperation_ligne_correspondant_au_pseudo(Auteur $auteur) {
		$bdd = $this->getBdd();
		// Etape 1 : recupérer dans la bdd la ligne qui correspond au pseudo
		// Préparer la requête (:pseudo ça correspondra à $pseudo)
		$req = $bdd->prepare('SELECT id, pass, pseudo FROM auteur WHERE pseudo = :pseudo');		
		$pseudo = $auteur->getPseudo();
		// Exécuter la requête : ça exécute et ça nous retourne le nombre de lignes affectées
		$req->execute(array('pseudo' => $pseudo));
		// Fetch permet de récupérer le résultat de la requête et de le renvoyer sous une certaine forme (tableau par exemple)
		$resultat = $req->fetch(\PDO::FETCH_ASSOC);
		// var_dump($resultat); die;
		return $resultat;
	}
}

