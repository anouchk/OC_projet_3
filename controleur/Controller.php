<?php

namespace controleur;

// Notre super Controller pour systématiser les include et les redirections vers la vue, et régler la longueur du chapeau
abstract class Controller {

	protected $config;

	/**
	 * Systématise le include 
	 */
	public function render($file, array $view_params = null)
	{
		extract($view_params);
		// dans la vue il faudra faire des echo

		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../vue');
		$twig = new \Twig_Environment($loader, array(
			'debug' => true,
		));
		$twig->addExtension(new \Twig_Extension_Debug());

		echo $twig->render($file, $view_params);

	}

	/**
	 * Systémastise le header location
	 */
	public function redirect($url)
	{
		header('Location: '.$url);
	}

	/**
	 * Une config pour tous les contrôleurs, pour pouvoir afinner la longueur de l'extrait du billet affiché en page d'accueil
	 */
	public function setConfig(array $config)
	{
		$this->config = $config;
	}
} 