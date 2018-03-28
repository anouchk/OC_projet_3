<?php
namespace modele\Service;

abstract class DatabaseManager {

	private $pdo;

	// connexion à la base de données
	public function __construct(\PDO $pdo) {
		$this->pdo = $pdo;
	}

	// getter
	public function getBdd() {
		return $this->pdo;
	}

}

		