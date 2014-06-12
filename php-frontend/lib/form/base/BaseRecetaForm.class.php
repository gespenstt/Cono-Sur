<?php

/**
 * Receta form base class.
 *
 * @method Receta getObject() Returns the current form's model object
 *
 * @package    Cono Sur
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRecetaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'rec_id'             => new sfWidgetFormInputHidden(),
      'rec_nombre_receta'  => new sfWidgetFormTextarea(),
      'rec_ingredientes'   => new sfWidgetFormTextarea(),
      'rec_instrucciones'  => new sfWidgetFormTextarea(),
      'rec_vino'           => new sfWidgetFormInputText(),
      'rec_nombre_blogger' => new sfWidgetFormInputText(),
      'rec_email_blogger'  => new sfWidgetFormInputText(),
      'rec_url_blogger'    => new sfWidgetFormInputText(),
      'rec_estado'         => new sfWidgetFormInputText(),
      'rec_eliminado'      => new sfWidgetFormInputText(),
      'rec_pais'           => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'rec_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getRecId()), 'empty_value' => $this->getObject()->getRecId(), 'required' => false)),
      'rec_nombre_receta'  => new sfValidatorString(array('required' => false)),
      'rec_ingredientes'   => new sfValidatorString(array('required' => false)),
      'rec_instrucciones'  => new sfValidatorString(array('required' => false)),
      'rec_vino'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'rec_nombre_blogger' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'rec_email_blogger'  => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'rec_url_blogger'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'rec_estado'         => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'rec_eliminado'      => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'rec_pais'           => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('receta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Receta';
  }


}
