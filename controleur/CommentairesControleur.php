<?php 
namespace controleur;
use modele\Service\BilletManager;
use modele\Service\CommentaireManager;

class CommentairesControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function commentaires_front_affichage_commentaires() {
		if (!empty($_POST)) {
			add_commentaire();
		}
		$idBillet=$_GET['billet'];
		$billetManager = $this->billetManager;
		$commentaireManager =  $this->commentaireManager;

		$view_params = [
    		'billet' => $billetManager->get_billet($idBillet),
    		'commentaires' => $commentaireManager->get_commentaires(0, 30, $idBillet)
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
			$commentaireManager =  new CommentaireManager();
			$commentaireManager->signal_commentaire($idCommentaire);
			$idBillet=$_POST['id2_billet'];
			header('Location: index.php?section=commentaires&billet='.$idBillet);
		}
	} 
}