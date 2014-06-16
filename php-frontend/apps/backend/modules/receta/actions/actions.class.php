<?php

/**
 * receta actions.
 *
 * @package    Cono Sur
 * @subpackage receta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class recetaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $resC = RecetaPeer::doSelect($c);
      $this->recetas = $resC;
  }
  public function executeDetalle(sfWebRequest $request)
  {
      $id = $request->getParameter("id");
      if(empty($id)){
          $this->redirect("receta/index");
      }
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->add(RecetaPeer::REC_ID,$id);
      $this->receta = RecetaPeer::doSelectOne($c);
  }
}
