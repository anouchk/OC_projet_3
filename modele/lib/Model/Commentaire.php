<?php

class Commentaire

{

  private $id;

  private $idBillet;

  private $signal;

  private $dateCommentaire;

  private $contenu;

  private $pseudo;


  // Liste des getters

  public function getId()
  {
      return $this->id ;
  }

  public function getIdBillet()
  {
      return $this->idBillet ;
  }

  public function getSignal()
  {
      return $this->signal ;
  }

  public function getDateCommentaire()
  {
      return $this->dateCommentaire ;
  }

  public function getContenu()
  {
      return $this->contenu ;
  }

  public function getPseudo()
  {
      return $this->pseudo ;
  }

  // Liste des setters

  public function setSignal() {
    if ($commentaireSignal) {
      $this->signal = true ;
    } else {
      $this->signal = false ;
    }
    
}

?>