<?php
namespace modele\Service;

class Autoloader {

	public static function register()
	{
		spl_autoload_register([__CLASS__, 'load']);
	}

	public static function load($class_name)
	{
		$path = str_replace('\\', '/', $class_name);
		require_once $path . ".php";
	}
}
