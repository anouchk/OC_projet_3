<?php
namespace modele\Service;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface {

	private $pdo;
	private $billetManager;
	private $commentaireManager;
	private $loginManager;
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
			$this->commentaireManager = new CommentaireManager($this->getPDO());
		}
		return $this->commentaireManager;
	}

	public function getLoginManager() {
		if ($this->loginManager === null) {
			$this->loginManager = new LoginManager($this->getPDO());
		}
		return $this->loginManager;
	}

	public function get($id) {
	}

	public function has($id) {
	}

}