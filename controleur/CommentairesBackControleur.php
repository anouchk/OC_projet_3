<?php
namespace controleur;

class CommentairesBackControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function __construct($billetManager, $commentaireManager) {
		$this->billetManager = $billetManager;
		$this->commentaireManager = $commentaireManager;
	}

	/**
     * Affiche les commentaires associés au billet à modérer, en montrant ceux qui sont signalés en premier
     */
	public function commentaires_back_affichage_commentaires()
	{
		if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
			if (!empty($_GET['billet'])) {
				$idBillet = $_GET['billet'];
				$commentaireManager =  $this->commentaireManager;
			    $commentaires = $commentaireManager->get_commentaires_back(0, 30, $idBillet);
				// on sécurise l'affichage des commentaires
				foreach($commentaires as $cle => $commentaire) 
				{ 
				    $commentaire->setAuteur(htmlspecialchars($commentaire->getAuteur()));
		    		$commentaire->setCommentaire(nl2br(htmlspecialchars($commentaire->getCommentaire()))); 
				} 
				// lancer la requête de récupération des données du billet pour pouvoir afficher le titre du billet en haut de la liste des commentaires
				$billetManager = $this->billetManager;
				$billet = $billetManager->get_billet($idBillet);
				$view_params = [
	    			'billet' => $billet,
	    			'commentaires' => $commentaires,
	    			'idBillet' => $idBillet
	    		];

	    	 	$this->render('commentaires_back.php', $view_params); 
			} 
		} else {

			$this->redirect('index.php?section=login');
		}  
	}

	/**
     * Supprime le commentaire que le modérateur veut supprimer
     */	
	public function commentaires_back_suppression_commentaire()
	{	if (!empty($_POST['idCommentaire'])) {
			$idBillet = $_POST['idBillet'];
			$idCommentaire = $_POST['idCommentaire'];
			$commentaireManager =  $this->commentaireManager;
			$commentaireManager->delete_commentaire($idCommentaire);
			$this->redirect('index.php?section=commentaires_back&billet='.$idBillet);
		}    
	}

}
