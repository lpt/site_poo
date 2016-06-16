<?php
namespace App\Backend\Modules\Agenda;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Agenda;
use \Entity\Comment;
use \FormBuilder\AgendaFormBuilder;
use \OCFram\FormHandler;
 
class AgendaController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $agendaId = $request->getData('id');
 
    $this->managers->getManagerOf('Agenda')->delete($agendaId);
     
    $this->app->user()->setFlash('La date a bien été supprimée !');
 
    $this->app->httpResponse()->redirect('.');
  }
 

 
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion de l\'agenda');
 
    $manager = $this->managers->getManagerOf('Agenda');
 
    $this->page->addVar('listeAgenda', $manager->getList());
    $this->page->addVar('nombreAgenda', $manager->count());
  }
 
  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Ajout d\'une news');
  }
 
  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification d\'une date');
  }
 

 
  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $agenda = new Agenda([
				'nom' => $request->postData('nom'),
        'dateEvent' => $request->postData('dateEvent'),
        'ville' => $request->postData('ville'),
        'adresse' => $request->postData('adresse'),
				'contact' => $request->postData('contact'),
				'commentaire' => $request->postData('commentaire')
				
      ]);
			
      if ($request->getExists('id'))
      {
        $agenda->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de l'agenda est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $agenda = $this->managers->getManagerOf('Agenda')->getUnique($request->getData('id'));
      }
      else
      {
        $agenda = new Agenda;
      }
    }
 
    $formBuilder = new AgendaFormBuilder($agenda);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Agenda'), $request);
 
    if ($formHandler->process())
    {
      $this->app->user()->setFlash($agenda->isNew() ? 'La date a bien été ajoutée !' : 'La date a bien été modifiée !');
 
      $this->app->httpResponse()->redirect('/admin/agenda');
    }
 
    $this->page->addVar('form', $form->createView());
  }
}