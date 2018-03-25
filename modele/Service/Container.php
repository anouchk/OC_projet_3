<?php
namespace Service;

class Container {

	$billetManager = new BilletManager();

	$commentaireManager =  new CommentaireManager();

	return [$billetManager, $commentaireManager];

}