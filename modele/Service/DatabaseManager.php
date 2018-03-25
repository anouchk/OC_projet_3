<?php
namespace modele\Service;

abstract class DatabaseManager {

	private static $bdd;

	// connexion à la base de données
	public function __construct() {
		// Connexion à la base de données
		try {
			if (self::$bdd === null) {
				self::$bdd = new \PDO('mysql:host=localhost;dbname=OC_projet_3;charset=utf8', 'root', 'root', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
			}
		} catch(\Exception $e) {
				die('Erreur : '.$e->getMessage());
		}
	}

	// getter
	public function getBdd() {
		return self::$bdd;
	}

}

		