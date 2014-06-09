<?php

/**
 * Pagina form base class.
 *
 * @method Pagina getObject() Returns the current form's model object
 *
 * @package    Cono Sur
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePaginaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pag_id'            => new sfWidgetFormInputHidden(),
      'pag_nombre'        => new sfWidgetFormInputText(),
      'pag_identificador' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'pag_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getPagId()), 'empty_value' => $this->getObject()->getPagId(), 'required' => false)),
      'pag_nombre'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pag_identificador' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pagina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pagina';
  }


}
