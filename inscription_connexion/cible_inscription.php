<?php 

// Connexion à la base de données
try {
		$bdd = new PDO('mysql:host=localhost;dbname=OC_projet_3;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
}


// Vérification de la validité des informations

// Hachage du mot de passe

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// définition des variables de récup
$pseudo = $_POST['pseudo'];


// Insertion

$req = $bdd->prepare('INSERT INTO auteur(pseudo, pass, date_inscription) VALUES(:pseudo, :pass, CURDATE())');

$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
));
