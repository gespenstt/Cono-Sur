<?php

/**
 * componentes actions.
 *
 * @package    Cono Sur
 * @subpackage componentes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class componentesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      exit;
  }
  public function executeHeader(sfWebRequest $request)
  {
      $this->setLayout("layout_header");
  }
  public function executeFooter(sfWebRequest $request)
  {
      $this->setLayout(false);
  }
}
