<?php

namespace controleur;

// Notre super Controller pour systématiser les include et les redirections
abstract class Controller {

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

		include_once $file;
	}

	public function redirect($url)
	{
		header('Location: '.$url);
	}
} 