<?php
namespace modele\Service;

class Container {

	private $billetManager;

	public function getBilletManager() {
		if ($this->billetManager === null) {
			$this->billetManager = new BilletManager();
		}
		return $this->billetManager;
	}
		
	$commentaireManager =  new CommentaireManager();

}