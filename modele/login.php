<?php
function Recuperation_ligne_correspondant_au_pseudo() {
	global $bdd;
	// Etape 1 : recupérer dans la bdd la ligne qui correspond au pseudo
	// Préparer la requête (:pseudo ça correspondra à $pseudo)
	$req = $bdd->prepare('SELECT id, pass, pseudo FROM auteur WHERE pseudo = :pseudo');
	// Initialisation de la variable récupérant le pseudo entré par l'utilisateur à la connexion
	$pseudo = $_POST['pseudo'];

	// Exécuter la requête : ça exécute et ça nous retourne le nombre de lignes affectées
	$req->execute(array('pseudo' => $pseudo));
	// Fetch permet de récupérer le résultat de la requête et de le renvoyer sous une certaine forme (tableau par exemple)
	$resultat = $req->fetch(PDO::FETCH_ASSOC);
	// var_dump($resultat); die;
	return $resultat;
}
