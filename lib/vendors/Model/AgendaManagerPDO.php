<?php
namespace Model;
 
use \Entity\Agenda;
 
class AgendaManagerPDO extends AgendaManager
{
  protected function add(Agenda $agenda)
  {
    $requete = $this->dao->prepare('INSERT INTO news SET nom = :nom, dateEvent = :dateEvent, ville = :ville, adresse = :adresse, contact = :contact, commentaire = :commentaire');
 
    $requete->bindValue(':nom', $agenda->nom());
    $requete->bindValue(':dateEvent', $agenda->dateEvent());
    $requete->bindValue(':ville', $agenda->ville());
		$requete->bindValue(':adresse', $agenda->adresse());
		$requete->bindValue(':contact', $agenda->contact());
		$requete->bindValue(':commentaire', $agenda->commentaire());
 
    $requete->execute();
  }
 
  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM agenda')->fetchColumn();
  }
 
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM news WHERE id = '.(int) $id);
  }
 
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, nom, dateEvent, ville, adresse, contact, commentaire FROM agenda ORDER BY id DESC';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Agenda');
 
    $listeAgenda = $requete->fetchAll();
 
    
 
    $requete->closeCursor();
 
    return $listeAgenda;
  }
 
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, nom, dateEvent, ville, adresse, contact, commentaire FROM news WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
 
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Agenda');
 
    if ($agenda = $requete->fetch())
    {
      //$agenda->setDateAjout(new \DateTime($agenda->dateAjout()));
      //$agenda->setDateModif(new \DateTime($agenda->dateModif()));
 
      return $agenda;
    }
 
    return null;
  }
 
  protected function modify(Agenda $agenda)
  {
    $requete = $this->dao->prepare('UPDATE agenda SET nom = :nom, dateEvent = :dateEvent, ville = :ville, adresse = :adresse, contact = :contact, commentaire = :commentaire WHERE id = :id');
 
    $requete->bindValue(':nom', $agenda->nom());
    $requete->bindValue(':dateEvent', $agenda->dateEvent());
    $requete->bindValue(':ville', $agenda->ville());
		$requete->bindValue(':adresse', $agenda->adresse());
		$requete->bindValue(':contact', $agenda->contact());
		$requete->bindValue(':commentaire', $agenda->commentaire());
    $requete->bindValue(':id', $agenda->id(), \PDO::PARAM_INT);
 
    $requete->execute();
  }
}
