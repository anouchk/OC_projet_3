<?php 
namespace controleur;
use modele\Entity\Commentaire;

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
			// Le modèle instancie l'entité Commentaire et le contrôleur récup§re en paramètre son auteur, le contenu du commentaire, l'id du billet concerné et initialise le signalement à zéro
			$commentaire = $commentaireManager->create_commentaire($_POST['pseudo'], $_POST['message'], $_POST['id2_billet'], 0);
			// Le modèle l'ajoute dans la base de données
			$commentaireManager->add_commentaire($commentaire);
		}
		$idBillet=$_GET['billet'];
		$billet = $billetManager->get_billet($_GET['billet']);
		$commentaires = $commentaireManager->get_commentaires(0, 30, $_GET['billet']);

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
			$commentaireManager =  $this->commentaireManager;
			// Le modèle retourne le commentaire signalé, dont l'id est passé en paramètre par le contrôleur
			$commentaire = $commentaireManager->get_commentaire($_POST['idCommentaireSignaled']);
			// Le modèle effectue le signal dans la base de données
			$commentaireManager->signal_commentaire($commentaire);
			$idBillet=$_POST['id2_billet'];
			$this->redirect('index.php?section=commentaires&billet='.$idBillet);
		}
	} 
}