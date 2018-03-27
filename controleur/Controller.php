<?php

namespace controleur;

abstract class Controller {

	public function render($file, array $view_params)
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