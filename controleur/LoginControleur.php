<?php
namespace controleur;
use modele\Entity\Auteur;

class LoginControleur extends Controller {

    private $loginManager;
    private $error;

    public function __construct($loginManager) {
        $this->logintManager = $loginManager;
    }

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

    public function login_traitement_formulaire()
    {
        // Etape 1 : recupérer dans la bdd la ligne qui correspond au pseudo
        $loginManager = $this->logintManager;
        // On instancie l'entité Auteur
        $auteur = new Auteur();
        // Le contrôleur lance le setter récupérant le pseudo entré par l'utilisateur à la connexion
        $auteur->setPseudo($_POST['pseudo']);
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

    public function logout()
    {
        session_destroy();
        $this->redirect('index.php');
    }

}

