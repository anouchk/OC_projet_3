<?php
namespace controleur;
use modele\Entity\Auteur;

class LoginControleur extends Controller {

    private $loginManager;
    private $error;

    public function __construct($loginManager) {
        $this->logintManager = $loginManager;
    }

    /**
     * Affiche le formulaire de connexion si l'usager n'est pas déjà logué, sinon redirige directement vers le back, et affiche une erreur si les identifiants ne sons pas les bons
     */
    public function login_completion_formulaire()
    {
        if (isset($_SESSION) && $_SESSION['connected']=="oui") {
            $this->redirect('index.php?section=billets_back');
        } elseif (isset($_SESSION) && $_SESSION['connected']=="non") {
            $error = isset($_GET['error']);
            $view_params = [
                'error' => $error
            ];
            $this->render('login.php', $view_params);
        }    
    }

    /**
     * Vérifie que les identifiants sont les bons et renvoie vers le back si c'est le cas, sinon vers le formulaire de login avec un message d'erreur
     */
    public function login_traitement_formulaire()
    {
        // Etape 1 : recupérer dans la bdd la ligne qui correspond au pseudo
        $loginManager = $this->logintManager;
        // Le modèle instancie l'entité Auteur et le contrôleur récup§re en paramètre le pseudo entré par l'utilisateur à la connexion
        $auteur = $loginManager->create_auteur($_POST['pseudo']);
        // On demande au modèle d'effectuer la requête récupérant le mot de passe crypté correspondant au pseudo entré par l'utilisateur
        $resultat = $loginManager->Recuperation_ligne_correspondant_au_pseudo($auteur);
        // etape 2 : comparer le mot de passe crypté de la base de données avec celui entré par l'utilisateur dans le formulaire de connexion
        if (password_verify($_POST['pass'], $resultat['pass'])) {
            $_SESSION['connected'] = "oui";
            // si les identifiants sont les bons, on renvoie vers billets_back.php
            $this->redirect('index.php?section=billets_back');


        } else {
            // si l'id ou le pass n'est pas le bon, on renvoie vers la page de connexion avec un message d'erreur
            $_SESSION['connected'] = "non";
            $this->redirect('index.php?section=login&error=1');
        }
     }

    /**
     * Deconnecte l'usager
     */ 
    public function logout()
    {
        session_destroy();
        $this->redirect('index.php');
    }

}

