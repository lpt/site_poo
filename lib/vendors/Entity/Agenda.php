<?php
namespace Entity;
 
use \OCFram\Entity;
 
class Agenda extends Entity
{
  protected 
      $nom,
      $dateEvent,
			$ville,
			$adresse,
			$contact,
			$commentaire;
            
 
  const NOM_INVALIDE = 1;
  const DATEEVENT_INVALIDE = 2;
  const VILLE_INVALIDE = 3;
  const ADRESSE_INVALIDE = 4;
  const CONTACT_INVALIDE = 5;
  const COMMENTAIRE_INVALIDE =6;
 
  public function isValid()
  {
    return !(empty($this->nom) || empty($this->dateEvent) || empty($this->ville));
  }
 
 // SETTERS
 
  public function setNom($nom)
  {
     if (!is_string($nom) || empty($nom))
    {
      $this->erreurs[] = self::NOM_INVALIDE;
    }
 
    $this->nom = $nom;
  }
 
  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }
 
    $this->auteur = $auteur;
  }
 
  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }
 
    $this->contenu = $contenu;
  }
 
  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }
	
	//GETTERS
 
  public function nom()
  {
    return $this->nom;
  }
 
  public function dateEvent()
  {
    return $this->dateEvent;
  }
  
  public function ville()
  {
    return $this->ville;
  }
 
  public function adresse()
  {
    return $this->adresse;
  }
 
  public function contact()
  {
    return $this->contact;
  }
  
  public function commentaire()
  {
    return $this->commentaire;
  }
}
