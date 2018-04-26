<?php
namespace modele\Entity;
class Billet
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;
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
}