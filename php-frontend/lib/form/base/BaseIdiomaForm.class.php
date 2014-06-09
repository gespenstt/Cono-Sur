<?php

/**
 * Idioma form base class.
 *
 * @method Idioma getObject() Returns the current form's model object
 *
 * @package    Cono Sur
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseIdiomaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idi_id'            => new sfWidgetFormInputHidden(),
      'idi_nombre'        => new sfWidgetFormInputText(),
      'idi_identificador' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idi_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdiId()), 'empty_value' => $this->getObject()->getIdiId(), 'required' => false)),
      'idi_nombre'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'idi_identificador' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('idioma[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Idioma';
  }


}
