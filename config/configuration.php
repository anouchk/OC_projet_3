<?php

/*
 * SETTINGS!
 */
$configuration = [
	// PDO credentials
	// 'db_dsn'  => 'mysql:host=localhost;dbname=OC_projet_3',
	// 'db_user' => 'root',
	// 'db_pass' => 'root',

	'database' => [
		'db_dsn'  => 'mysql:host=mysql-projet3ana.alwaysdata.net;dbname=projet3ana_bdd',
		'db_user' => '158666',
		'db_pass' => 'projet3',
	],
	'extract_max_length' => 150,
]; 

/*
 * TABLEAU DES ROUTES
 */
$match = [
		'#^projet_3/$#' => [
			'controllerCaller' => 'getBilletsController',
			'action' => 'billets_front_affichage_billets',
		],
		'#^$#' => [
			'controllerCaller' => 'getBilletsController',
			'action' => 'billets_front_affichage_billets',
		],
		'#index.php$#' => [
			'controllerCaller' => 'getBilletsController',
			'action' => 'billets_front_affichage_billets',
		],
		'#^index$#' => [
			'controllerCaller' => 'getBilletsController',
			'action' => 'billets_front_affichage_billets',
		],
		'#^commentaires&billet=([0-9]+)$#' => [
			'controllerCaller' => 'getCommentairesController',
			'action' => 'commentaires_front_affichage_commentaires',
		],
		'#^signalement_commentaire&billet=([0-9]+)$#' => [
			'controllerCaller' => 'getCommentairesController',
			'action' => 'commentaires_front_signalement_commentaire',
		],
		'#^login$#' => [
			'controllerCaller' => 'getLoginController',
			'action' => 'login_completion_formulaire',
		],
		'#^login_traitement_formulaire$#' => [
			'controllerCaller' => 'getLoginController',
			'action' => 'login_traitement_formulaire',
		],
		'#^login&error=1$#' => [
			'controllerCaller' => 'getLoginController',
			'action' => 'login_completion_formulaire',
		],
		'#^logout$#' => [
			'controllerCaller' => 'getLoginController',
			'action' => 'logout',
		],
		'#^billets_back$#' => [
			'controllerCaller' => 'getBilletsBackController',
			'action' => 'billets_back_affichage_billets',
		],
		'#^commentaires_back&billet=([0-9]+)$#' => [
			'controllerCaller' => 'getCommentairesBackController',
			'action' => 'commentaires_back_affichage_commentaires',
		],
		'#^suppression_commentaire$#' => [
			'controllerCaller' => 'getCommentairesBackController',
			'action' => 'commentaires_back_suppression_commentaire',
		],
		'#^modification_commentaire$#' => [
			'controllerCaller' => 'getCommentaireBackController',
			'action' => 'affichage_commentaire_a_modifier',
		],
		'#^enregistrer_modification_commentaire&billet=([0-9]+)$#' => [
			'controllerCaller' => 'getCommentaireBackController',
			'action' => 'enregistrement_modification_commentaire',
		],
		'#^modification_billet$#' => [
			'controllerCaller' => 'getBilletBackController',
			'action' => 'affichage_billet_a_modifier',
		],
		'#^enregistrer_modification_billet$#' => [
			'controllerCaller' => 'getBilletBackController',
			'action' => 'enregistrement_modification_billet',
		],
		'#^creation_billet$#' => [
			'controllerCaller' => 'getBilletBackController',
			'action' => 'affichage_billet_a_creer',
		],
		'#^enregistrer_nouveau_billet$#' => [
			'controllerCaller' => 'getBilletBackController',
			'action' => 'enregistrement_nouveau_billet',
		],
		'#^suppression_billet$#' => [
			'controllerCaller' => 'getBilletBackController',
			'action' => 'suppression_billet',
		],
	];