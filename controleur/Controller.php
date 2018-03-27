<?php

namespace controleur;

abstract class Controller {

	public function render($file, array $view_params)
	{
		extract($view_params);

		include_once $file;
	}

	public function redirect($url)
	{
		header('Location: '.$url);
	}
} 