<?php
namespace modele\Service;

class Container {

	private $pdo;
 
	public function getPDO()
	{
		if ($this->pdo === null) {
			$this->pdo = new \PDO('mysql:host=localhost;dbname=OC_projet_3;charset=utf8', 'root', 'root');
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}

		return $this->pdo;
	}

	private $billetManager;

	public function getBilletManager() {
		if ($this->billetManager === null) {
			$this->billetManager = new BilletManager($this->getPDO());
		}
		return $this->billetManager;
	}

}