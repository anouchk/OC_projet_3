<?php
namespace controleur;
use modele\Service\LoginManager;
use modele\Service\DatabaseManager;

class LoginControleur extends Controller {

    private $loginManager;

    public function __construct($loginManager) {
        $this->logintManager = $loginManager;
    }

    public function login_completion_formulaire()
    {
        if (isset($_SESSION) && $_SESSION['connected']=="oui") {
            header('Location: index.php?section=billets_back');
        } elseif (isset($_SESSION) && $_SESSION['connected']=="non") {
            include_once('vue/login.php');
        }    
    }

    public function login_traitement_formulaire($bdd)
    {
        // Etape 1 : recupérer dans la bdd la ligne qui correspond au pseudo
        $loginManager = $this->logintManager;
        $resultat = $loginManager->Recuperation_ligne_correspondant_au_pseudo();
        // etape 2 : comparer le pass du hash avec celui entré par le formulaire de connexion
        if (password_verify($_POST['pass'], $resultat['pass'])) {
            $_SESSION['connected'] = "oui";
            // si les identifiants sont les bons, on renvoie vers billets_back.php
            header('Location: index.php?section=billets_back');

        } else {
            // si l'id ou le pass n'est pas le bon, on renvoie vers la page de connexion avec un message d'erreur
            $_SESSION['connected'] = "non";
            header('Location: index.php?section=login&error=1');
        }
     }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
    }

}

