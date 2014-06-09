<?php

/**
 * Parametro form base class.
 *
 * @method Parametro getObject() Returns the current form's model object
 *
 * @package    Cono Sur
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseParametroForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'par_id'            => new sfWidgetFormInputHidden(),
      'sec_id'            => new sfWidgetFormPropelChoice(array('model' => 'Seccion', 'add_empty' => false)),
      'par_identificador' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'par_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getParId()), 'empty_value' => $this->getObject()->getParId(), 'required' => false)),
      'sec_id'            => new sfValidatorPropelChoice(array('model' => 'Seccion', 'column' => 'sec_id')),
      'par_identificador' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parametro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametro';
  }


}
