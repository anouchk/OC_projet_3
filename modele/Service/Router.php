<?php

namespace modele\Service;

class Router {

	private $request_uri;
	private $match = [
		'login' => [
			'controller' => 'LoginControleur',
			'action' => 'login_completion_formulaire',
		],
		'commentaires' => [
			'controller' => 'CommentairesControleur',
			'action' => 'commentaires_front_affichage_commentaires',
		],
		// 'login_traitement_formulaire' => [
		// 	'controller' => 'LoginControleur',
		// 	'action' => 'login_traitement_formulaire($bdd)',
		// ],
		
	];

	//ici request_uri ça va être toutes les string de type "index.php?section=billets_back" etc.
	public function __construct($request_uri) {

		$this->request_uri = substr($request_uri, strpos($request_uri, "=") + 1);
	}

	/**
	 * Find the controller and its action given the route
	 */
	// Le rôle de la fonction resolve, c'est de trouver le controleur et l'action par rapport à la route
	public function resolve()
	{

	}
} 