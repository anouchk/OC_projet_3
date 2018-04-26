<?php

namespace modele\Service;

class Router {

	private $request_uri;
	private $match;

	//ici request_uri ça va être toutes les string de type "index.php?section=billets_back" etc.
	public function __construct($request_uri, $match) {

		$this->request_uri = substr($request_uri, strpos($request_uri, "=") + 1);
		var_dump($this->request_uri);
		$this->match = $match;
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