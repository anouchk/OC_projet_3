<?php
class Billet

{

  private $id;

  private $titre;

  private $contenu;

  private $dateCreation;

  private $image;

  // Liste des getters

  public function getId()
  {
      return $this->id ;
  }

  public function getTitre()
  {
      return $this->titre ;
  }

  public function getDateCreation()
  {
      return $this->dateCreation ;
  }

  public function getContenu()
  {
      return $this->contenu ;
  }

  public function getImage()
  {
      return $this->image ;
  }

  // Liste des setters

    
}

?>