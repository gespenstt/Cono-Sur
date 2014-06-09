<?php

/**
 * Diccionario form base class.
 *
 * @method Diccionario getObject() Returns the current form's model object
 *
 * @package    Cono Sur
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDiccionarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dic_id'     => new sfWidgetFormInputHidden(),
      'idi_id'     => new sfWidgetFormPropelChoice(array('model' => 'Idioma', 'add_empty' => false)),
      'par_id'     => new sfWidgetFormPropelChoice(array('model' => 'Parametro', 'add_empty' => false)),
      'dic_texto'  => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'dic_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getDicId()), 'empty_value' => $this->getObject()->getDicId(), 'required' => false)),
      'idi_id'     => new sfValidatorPropelChoice(array('model' => 'Idioma', 'column' => 'idi_id')),
      'par_id'     => new sfValidatorPropelChoice(array('model' => 'Parametro', 'column' => 'par_id')),
      'dic_texto'  => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('diccionario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Diccionario';
  }


}
