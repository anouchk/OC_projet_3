<?php 
namespace controleur;

class CommentairesControleur extends Controller {

	private $commentaireManager;
	private $billetManager;	

	public function __construct($billetManager, $commentaireManager) {
		$this->billetManager = $billetManager;
		$this->commentaireManager = $commentaireManager;
	}

	/**
     * Affiche le contenu total d'un billet et ses commentaires du plus récent au plus ancien, après avoir ajouté un commentaire s'il vient d'être soumis par un internaute
     */
	public function commentaires_front_affichage_commentaires() {
		$billetManager = $this->billetManager;
		$commentaireManager = $this->commentaireManager;
		if (!empty($_POST)) {
			$commentaireManager->add_commentaire();
		}
		$idBillet=$_GET['billet'];
		$billet = $billetManager->get_billet($idBillet);
		$commentaires = $commentaireManager->get_commentaires(0, 30, $idBillet);

		if (isset($_SESSION) && ($_SESSION['connected']=="oui")) {
			$connected = "oui";
	 	} elseif (isset($_SESSION) && ($_SESSION['connected']=="non")) {
	    	$connected = "non";
	    } 

		$view_params = [
    		'billet' => $billet,
    		'commentaires' => $commentaires,
    		'connected' => $connected,
    		'idBillet' => $idBillet
    	];
 
		
		// Ici, on doit surtout sécuriser l'affichage 
		foreach($commentaires as $cle => $commentaire) 
		{ 
		    $commentaire->setAuteur(htmlspecialchars($commentaire->getAuteur()));
		    $commentaire->setCommentaire(nl2br(htmlspecialchars($commentaire->getCommentaire()))); 
		} 
		$this->render('commentaires.php', $view_params);
	}

	/**
     * Montre qu'un commentaire a été signalé par un internaute
     */
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