<?php

namespace controleur;

// Notre super Controller pour systématiser les include et les redirections
abstract class Controller {

	public function render($file, array $view_params = null)
	{
		extract($view_params);
		// dans la vue il faudra faire des echo

		include_once $file;
	}

	public function redirect($url)
	{
		header('Location: '.$url);
	}
} 