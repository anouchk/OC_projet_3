<?php
namespace controleur;

class CommentaireBackControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function __construct($billetManager, $commentaireManager) {
		$this->billetManager = $billetManager;
		$this->commentaireManager = $commentaireManager;
	}

	public function affichage_commentaire_a_modifier() {
		if (!empty($_POST['idCommentaireModified'])) {
			$idCommentaire = $_POST['idCommentaireModified'];
			$commentaireManager = $this->commentaireManager ;
			$commentaire = $commentaireManager->get_commentaire($idCommentaire);
			// sécurisons l'affichage 
			$commentaire['auteur'] = htmlspecialchars($commentaire['auteur']); 
		    $commentaire['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 

		    $idBillet = $_POST['id2_billet'];
		    $billetManager = $this->billetManager;	
		    $billet = $billetManager->get_billet($idBillet);

		    $view_params = [
		    	'billet' => $billet,
		    	'commentaire' => $commentaire
		    ];
		    $this->render('vue/commentaire_back.php', $view_params);
		}
	}

	public function enregistrement_modification_commentaire() {
		if (!empty($_POST['idCommentaireModified'])) {	
			$this->commentaireManager = $commentaireManager;
			$commentaireManager->update_commentaire();
			$commentaireManager->unsignal_commentaire($_POST['idCommentaireModified']);
			$idBillet=$_POST['id2_billet'];
			$this->redirect('index.php?section=commentaires_back&billet='.$idBillet);
		}
	} 
}

