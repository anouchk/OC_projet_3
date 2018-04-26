<?php
namespace modele\Entity;
class Commentaire
{
    private $id;
    private $id_billet;
    private $auteur;
    private $commentaire;
    private $date_commentaire;
    private $signalement;
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
    public function getIdBillet()
    {
        return $this->id_billet;
    }
    /**
     * @param mixed $id_billet
     */
    public function setIdBillet($id_billet)
    {
        $this->id_billet = $id_billet;
    }
    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }
    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
    /**
     * @return mixed
     */
    public function getDateCommentaire()
    {
        return $this->date_commentaire;
    }
    /**
     * @param mixed $date_commentaire
     */
    public function setDateCommentaire($date_commentaire)
    {
        $this->date_commentaire = $date_commentaire;
    }
    /**
     * @return mixed
     */
    public function getSignalement()
    {
        return $this->signalement;
    }
    /**
     * @param mixed $signalement
     */
    public function setSignalement($signalement)
    {
        $this->signalement = $signalement;
    }
}