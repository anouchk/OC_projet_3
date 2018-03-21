<?php

class DatabaseManager {

	public function sql_connexion() {
		// Connexion à la base de données
		try {
				$bdd = new PDO('mysql:host=localhost;dbname=OC_projet_3;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch(Exception $e) {
				die('Erreur : '.$e->getMessage());
		}
	}
}

		