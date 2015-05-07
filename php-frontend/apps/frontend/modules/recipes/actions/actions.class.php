<?php

/**
 * recipes actions.
 *
 * @package    Cono Sur
 * @subpackage recipes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class recipesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $cookie = unserialize($_COOKIE["conosur"]);
      $funciones = new funciones();
      $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
      $array_ids_idioma = array(
          9,6,7,8,2,3
      );
      if(array_search($id_idioma, $array_ids_idioma)!==FALSE){
          $id_idioma = $id_idioma;
      }else{
          $id_idioma = 5;          
      }
      $c = new Criteria();
      $c->clearSelectColumns();
      $c->addSelectColumn(PaginaPeer::PAG_IDENTIFICADOR);
      $c->addSelectColumn(SeccionPeer::SEC_IDENTIFICADOR);
      $c->addSelectColumn(DiccionarioPeer::DIC_TEXTO);
      $c->addSelectColumn(ParametroPeer::PAR_IDENTIFICADOR);
      $c->addJoin(PaginaPeer::PAG_ID, SeccionPeer::PAG_ID);
      $c->addJoin(SeccionPeer::SEC_ID, ParametroPeer::SEC_ID);
      $c->addJoin(ParametroPeer::PAR_ID, DiccionarioPeer::PAR_ID);
      $c->add(DiccionarioPeer::IDI_ID,$id_idioma);
      $c->add(PaginaPeer::PAG_ID,7);
      
      $resC = DiccionarioPeer::doSelectStmt($c);
      $array_out = array();
      if($resC){
          while($row = $resC->fetch()){
              $array_out[$row["SEC_IDENTIFICADOR"]][$row["PAR_IDENTIFICADOR"]]=  nl2br($row["DIC_TEXTO"]);
          }
      }else{
          echo "Error :(";
          exit;
      }
      
      $this->diccionario = $array_out; 
      $order = $request->getParameter("order");
      $from = $request->getParameter("from");
      $this->from = $from;
      
      $cre = new Criteria();
      $cre->add(RecetaPeer::REC_ELIMINADO,0);
      $cre->add(RecetaPeer::REC_ESTADO,1);
      switch($order){
          case "az":
              $cre->addAscendingOrderByColumn(RecetaPeer::REC_NOMBRE_RECETA);
              break;
          case "date":
              $cre->addAscendingOrderByColumn(RecetaPeer::CREATED_AT);
              break;
      }
      switch($from){
          case "se":
              $cre->add(RecetaPeer::REC_PAIS,3);
              break;
          case "ie":
              $cre->add(RecetaPeer::REC_PAIS,2);
              break;
          /*case "gb":
              $cre->add(RecetaPeer::REC_PAIS,1);
              break;*/
          case "fi":
              $cre->add(RecetaPeer::REC_PAIS,4);
              break;
      }
      $this->recetas = RecetaPeer::doSelect($cre);    
  
  }
  public function executeDetail(sfWebRequest $request)
  {
      $cookie = unserialize($_COOKIE["conosur"]);
      $funciones = new funciones();
      $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
      if($id_idioma>1&&$id_idioma<5){
          $id_idioma = $id_idioma;
      }else{
          $id_idioma = 5;          
      }
      $c = new Criteria();
      $c->clearSelectColumns();
      $c->addSelectColumn(PaginaPeer::PAG_IDENTIFICADOR);
      $c->addSelectColumn(SeccionPeer::SEC_IDENTIFICADOR);
      $c->addSelectColumn(DiccionarioPeer::DIC_TEXTO);
      $c->addSelectColumn(ParametroPeer::PAR_IDENTIFICADOR);
      $c->addJoin(PaginaPeer::PAG_ID, SeccionPeer::PAG_ID);
      $c->addJoin(SeccionPeer::SEC_ID, ParametroPeer::SEC_ID);
      $c->addJoin(ParametroPeer::PAR_ID, DiccionarioPeer::PAR_ID);
      $c->add(DiccionarioPeer::IDI_ID,$id_idioma);
      $c->add(PaginaPeer::PAG_ID,9);
      
      $resC = DiccionarioPeer::doSelectStmt($c);
      $array_out = array();
      if($resC){
          while($row = $resC->fetch()){
              $array_out[$row["SEC_IDENTIFICADOR"]][$row["PAR_IDENTIFICADOR"]]=  nl2br($row["DIC_TEXTO"]);
          }
      }else{
          echo "Error :(";
          exit;
      }
      
      $this->diccionario = $array_out; 
      
      $id_receta = $request->getParameter("id");
      
      $cre = new Criteria();
      $cre->add(RecetaPeer::REC_ID,$id_receta);
      $cre->add(RecetaPeer::REC_ELIMINADO,0);
      $cre->add(RecetaPeer::REC_ESTADO,1);
      $resC = RecetaPeer::doSelectOne($cre);
      if(!$resC){
          $this->redirect("home/index");
      }
      
      $this->receta = $resC;
      
      $this->modal = false;
      $modal = $request->getParameter("voto");
      if(!empty($modal)){
          switch(strtolower($modal)){
              case "ok":
                  $this->modal = true;
                  $this->msg = "Congratulations! You have successfully voted!";
                  break;
              case "nok":
                  $this->modal = true;
                  $this->msg = "Oops, something did not work, please try to vote again. If you continue to have problems, please write to webmanager@conosurwinery.cl.";
                  break;
          }
      }
      $this->ref = $_SERVER["HTTP_REFERER"] ? $_SERVER["HTTP_REFERER"] : $_SERVER["SCRIPT_NAME"]."/recipes/index";
      
  
  }
}
