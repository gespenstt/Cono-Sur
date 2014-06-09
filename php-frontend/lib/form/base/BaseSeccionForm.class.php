<?php

/**
 * Seccion form base class.
 *
 * @method Seccion getObject() Returns the current form's model object
 *
 * @package    Cono Sur
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSeccionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sec_id'            => new sfWidgetFormInputHidden(),
      'pag_id'            => new sfWidgetFormPropelChoice(array('model' => 'Pagina', 'add_empty' => false)),
      'sec_identificador' => new sfWidgetFormInputText(),
      'sec_nombre'        => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'sec_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getSecId()), 'empty_value' => $this->getObject()->getSecId(), 'required' => false)),
      'pag_id'            => new sfValidatorPropelChoice(array('model' => 'Pagina', 'column' => 'pag_id')),
      'sec_identificador' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'sec_nombre'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('seccion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Seccion';
  }


}
