<?php

namespace modele\Service;

class Router {

	private $request_uri;
	private $match = [
		'#index.php#' => [
			'controllerCaller' => 'getBilletsController',
			'action' => 'billets_front_affichage_billets',
		],
		// '##' => [
		// 	'controllerCaller' => 'getBilletsController',
		// 	'action' => 'billets_front_affichage_billets',
		// ],
		'#index#' => [
			'controllerCaller' => 'getBilletsController',
			'action' => 'billets_front_affichage_billets',
		],
		'#commentaires&billet=([0-9]+)#' => [
			'controllerCaller' => 'getCommentairesController',
			'action' => 'commentaires_front_affichage_commentaires',
		],
		'#signalement_commentaire#' => [
			'controllerCaller' => 'getCommentairesController',
			'action' => 'commentaires_front_signalement_commentaire',
		],
		'#login#' => [
			'controllerCaller' => 'getLoginController',
			'action' => 'login_completion_formulaire',
		],
		'#login_traitement_formulaire#' => [
			'controllerCaller' => 'getLoginController',
			'action' => 'login_traitement_formulaire',
		],
		'#logout#' => [
			'controllerCaller' => 'getLoginController',
			'action' => 'login_traitement_formulaire',
		],
		'#billets_back#' => [
			'controllerCaller' => 'getBilletsBackController',
			'action' => 'billets_back_affichage_billets',
		],
		'#commentaires_back&billet=([0-9]+)#' => [
			'controllerCaller' => 'getCommentairesBackController',
			'action' => 'commentaires_back_affichage_commentaires',
		],
		'#suppression_commentaire#' => [
			'controllerCaller' => 'getCommentairesBackController',
			'action' => 'commentaires_back_suppression_commentaire',
		],
		'#modification_commentaire#' => [
			'controllerCaller' => 'getCommentaireBackController',
			'action' => 'affichage_commentaire_a_modifier',
		],
		'#enregistrer_modification_commentaire&billet=([0-9]+)#' => [
			'controllerCaller' => 'getCommentaireBackController',
			'action' => 'enregistrement_modification_commentaire',
		],
		
	];

	//ici request_uri ça va être toutes les string de type "index.php?section=billets_back" etc.
	public function __construct($request_uri) {

		$this->request_uri = substr($request_uri, strpos($request_uri, "=") + 1);
		var_dump($this->request_uri);
	}

	/**
	 * Find the controller and its action given the route
	 */
	// Le rôle de la fonction resolve, c'est de trouver le controleur et l'action par rapport à la route
	public function resolve()
	{
		foreach($this->match as $pattern => $controllerAction) {
			if (preg_match($pattern, $this->request_uri, $matches)) {
				$params = [];
				for ($i=1; $i <= count($matches); $i++) {
					if (isset ($matches[$i])) {
						$params[] = $matches[$i];
					}
				}

				return [
					'controllerCaller' => $this->match[$pattern]['controllerCaller'],
					'action' => $this->match[$pattern]['action'],
					'params'=>$params,
				];
			}
		}

	}
} 