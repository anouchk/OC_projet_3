<?php
namespace modele\Entity;
class Billet
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;
    private $nbCommentaires;

    // un constructeur pour passer à la classe Billet ses attributs en paramètre
    public function __construct(array $data) {

       $this->setId($data['id']);
       $this->setTitre($data['titre']);
       $this->setContenu($data['contenu']);
       $this->setDateCreation($data['date_creation_fr']);
    }

    /**
     * Ne retourne qu'un extrait du contenu de longueur $length (pour le chapeau de chaque billet en page d'accueil)
     */
    public function getExtract($length)
    {
       if (strlen($this->getContenu()) >= $length) {
           return substr($this->getContenu(), 0, $length) . ' [...]';
       }

       return $this->getContenu();
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getNbCommentaires()
    {
        return $this->nbCommentaires;
    }

    /**
     * @param mixed $date_creation
     */
    public function setNbCommentaires($nbCommentaires)
    {
        $this->nbCommentaires = $nbCommentaires;
    }
}