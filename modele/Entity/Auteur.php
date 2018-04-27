<?php
namespace modele\Entity;
class Auteur
{
    private $id;
    private $pseudo;
    private $pass;
    private $date_inscription;
    
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
    public function getPseudo()
    {
        return $this->pseudo;
    }
    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }
    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->date_inscription;
    }
    /**
     * @param mixed $date_inscription
     */
    public function setDateInscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }
}