<?php 
namespace controleur;

class CommentairesControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function __construct($billetManager, $commentaireManager) {
		$this->billetManager = $billetManager;
		$this->commentaireManager = $commentaireManager;
	}

	public function commentaires_front_affichage_commentaires() {
		if (!empty($_POST)) {
			add_commentaire();
		}
		$idBillet=$_GET['billet'];
		$billetManager = $this->billetManager;
		$commentaireManager =  $this->commentaireManager;

		$billet = $billetManager->get_billet($idBillet);
		$commentaires = $commentaireManager->get_commentaires(0, 30, $idBillet);

		$view_params = [
    		'billet' => $billet,
    		'commentaires' => $commentaires
    	];
 
		
		// Ici, on doit surtout sécuriser l'affichage 
		foreach($commentaires as $cle => $commentaire) 
		{ 
		    $commentaire[$cle]['auteur'] = htmlspecialchars($commentaire['auteur']); 
		    $commentaire[$cle]['commentaire'] = nl2br(htmlspecialchars($commentaire['commentaire'])); 
		} 
		$this->render('vue/commentaires.php', $view_params);
	}

	public function commentaires_front_signalement_commentaire() {
		if (!empty($_POST['idCommentaireSignaled'])) {
			$idCommentaire = $_POST['idCommentaireSignaled'];
			$commentaireManager =  $this->commentaireManager;
			$commentaireManager->signal_commentaire($idCommentaire);
			$idBillet=$_POST['id2_billet'];
			$this->redirect('index.php?section=commentaires&billet='.$idBillet);
		}
	} 
}