<?php
namespace controleur;

class CommentaireBackControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function __construct($billetManager, $commentaireManager) {
		$this->billetManager = $billetManager;
		$this->commentaireManager = $commentaireManager;
	}

	/**
     * Affiche le commentaire à modifier
     */
	public function affichage_commentaire_a_modifier() {
		if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
			if (!empty($_POST['idCommentaireModified'])) {
				$idCommentaire = $_POST['idCommentaireModified'];
				$commentaireManager = $this->commentaireManager ;
				$commentaire = $commentaireManager->get_commentaire($idCommentaire);
				// sécurisons l'affichage 
				$commentaire->setAuteur(htmlspecialchars($commentaire->getAuteur()));
		    	$commentaire->setCommentaire(nl2br(htmlspecialchars($commentaire->getCommentaire()))); 

			    $idBillet = $_POST['id2_billet'];
			    $billetManager = $this->billetManager;	
			    $billet = $billetManager->get_billet($idBillet);

			    $view_params = [
			    	'billet' => $billet,
			    	'commentaire' => $commentaire
			    ];
			    $this->render('commentaire_back.php', $view_params);
			}
		} else {
			$this->redirect('index.php?section=login');
		}
	}

	/**
     * Enregistre la modération du commentaire, retire son signalement puis renvoie vers la page de modération des commentaires
     */
	public function enregistrement_modification_commentaire() {
		if (!empty($_POST['idCommentaireModified'])) {	
			$commentaireManager = $this->commentaireManager ; 
			$commentaireManager->update_commentaire();
			$commentaireManager->unsignal_commentaire($_POST['idCommentaireModified']);
			$idBillet=$_POST['id2_billet'];
			$this->redirect('index.php?section=commentaires_back&billet='.$idBillet);
		}
	} 
}

