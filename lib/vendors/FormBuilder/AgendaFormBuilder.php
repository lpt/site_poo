<?php
namespace FormBuilder;
 
use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;
 
class AgendaFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Nom',
        'name' => 'nom',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le nom spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier le nom de l\'evenement'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Ville',
        'name' => 'ville',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('La ville spécifié est trop longue (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier la ville de l\evenement'),
        ],
       ]))
			 ->add(new StringField([
        'label' => 'Adresse',
        'name' => 'adresse',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('L\'adresse spécifié est trop longue (100 caractères maximum)', 100),
     		],
       ]))
			 ->add(new StringField([
        'label' => 'Contact',
        'name' => 'contact',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le contact spécifié est trop long (100 caractères maximum)', 100),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Commentaire',
        'name' => 'commentaire',
        'rows' => 8,
        'cols' => 60,
        
       ]));
  }
}