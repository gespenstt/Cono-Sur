<?php

/**
 * votantes actions.
 *
 * @package    Cono Sur
 * @subpackage votantes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class votantesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->pais = "";
      $pais = $request->getParameter("pais");
      $this->estado = "";
      $estado = $request->getParameter("estado");
      $c = new Criteria();
      if(!empty($pais)){
          $this->pais = $pais;
          $c->addJoin(UsuarioPeer::USU_ID, UsuarioRecetaPeer::USU_ID);
          $c->addJoin(UsuarioRecetaPeer::REC_ID, RecetaPeer::REC_ID);
          $c->add(RecetaPeer::REC_PAIS,$pais);
      }
      if($estado != ""){
          $this->estado = $estado;
          $c->add(UsuarioPeer::USU_ESTADO,$estado);
      }
      $c->addAscendingOrderByColumn(UsuarioPeer::USU_NOMBRE);
      //$resC = UsuarioPeer::doSelectOne($c); $resC->getUsuNombre()
      //$this->recetas = $resC;
      $pagina = $request->getParameter("p",1);
      $this->pagina = $pagina;
      $pager = new sfPropelPager('usuario', 10);
      $pager->setCriteria($c);
      $pager->setPage($pagina);
      $pager->init();
      $this->votantes = $pager;
      $this->funciones = new funciones();
  }
}
