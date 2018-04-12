<?php
namespace modele\Service;

use controleur\BilletsControleur;
use controleur\LoginControleur;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface {

	private $pdo;
	private $billetManager;
	private $commentaireManager;
	private $loginManager;
	private $configuration;
	private $services = [];
	private $billetsController;
	private $loginController;

	public function __construct(array $configuration) {
		$this->configuration = $configuration;

		$this->services = [
			'billetManager' => $this->getBilletManager(),
			'commentaireManager' => $this->getCommentaireManager(),
			'loginManager' => $this->getLoginManager(),
		];
	}
 
	public function getPDO()
	{
		if ($this->pdo === null) {
			extract($this->configuration);
			$this->pdo = new \PDO($db_dsn, $db_user, $db_pass);
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
		if ($this->has($id)) {
			return $this->services[$id];
		} else {
			return false;
		}
	}

	public function has($id) {
		return array_key_exists($id, $this->services);
	}

	public function getBilletsController()
	{
		if ($this->billetsController === null) {
			$this->billetsController = new BilletsControleur($this->getBilletManager());
		}
		return $this->billetsController;
	}

	public function getLoginController()
	{
		if ($this->loginController === null) {
			$this->loginController = new LoginControleur($this->getLoginManager());
		}
		return $this->loginController;
	}

}