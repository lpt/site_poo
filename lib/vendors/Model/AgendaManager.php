<?php
namespace Model;
 
use \OCFram\Manager;
use \Entity\Agenda;
 
abstract class AgendaManager extends Manager
{
  /**
   * Méthode permettant d'ajouter une news.
   * @param $news News La news à ajouter
   * @return void
   */
  abstract protected function add(Agenda $agenda);
 
  /**
   * Méthode permettant d'enregistrer une news.
   * @param $news News la news à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Agenda $agenda)
  {
    if ($agenda->isValid())
    {
      $agenda->isNew() ? $this->add($agenda) : $this->modify($agenda);
    }
    else
    {
      throw new \RuntimeException('La date doit être validée pour être enregistrée');
    }
  }
 
  /**
   * Méthode renvoyant le nombre de date total.
   * @return int
   */
  abstract public function count();
 
  /**
   * Méthode permettant de supprimer une date.
   * @param $id int L'identifiant de la date à supprimer
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Méthode retournant une liste d'une date demandée.
   * @param $debut int La première date à sélectionner
   * @param $limite int Le nombre de date à sélectionner
   * @return array La liste des news. Chaque entrée est une instance de Agenda.
   */
  abstract public function getList($debut = -1, $limite = -1);
 
  /**
   * Méthode retournant une date précise.
   * @param $id int L'identifiant de la date  à récupérer
   * @return Agenda La date demandée
   */
  abstract public function getUnique($id);
 
  /**
   * Méthode permettant de modifier une news.
   * @param $agenda agenda la date à modifier
   * @return void
   */
  abstract protected function modify(Agenda $agenda);
}
