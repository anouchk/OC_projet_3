<?php
namespace modele\Service;

class Container {

	private $pdo;
	private $billetManager;
	private $commentaireManager;
	private $configuration;

	public function __construct(array $configuration) {
		$this->configuration = $configuration;
	}
 
	public function getPDO()
	{
		if ($this->pdo === null) {
			$this->pdo = new \PDO('mysql:host=localhost;dbname=OC_projet_3;charset=utf8', 'root', 'root');
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}

		return $this->pdo;
	}

	public function getBilletManager() {
		if ($this->billetManager === null) {
			$this->billetManager = new BilletManager($this->getPDO());
		}
		return $this->billetManager;
	}

	public function getCommentaireManager() {
		if ($this->commentaireManager === null) {
			$this->commentaireManager = new CommentairetManager($this->getPDO());
		}
		return $this->commentairetManager;
	}

}