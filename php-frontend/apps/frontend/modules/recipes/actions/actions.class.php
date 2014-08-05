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
      if($id_idioma>0&&$id_idioma<5){
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
      
      $cre = new Criteria();
      $cre->add(RecetaPeer::REC_ELIMINADO,0);
      $this->recetas = RecetaPeer::doSelect($cre);    
  
  }
  public function executeDetail(sfWebRequest $request)
  {
      $cookie = unserialize($_COOKIE["conosur"]);
      $funciones = new funciones();
      $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
      if($id_idioma>0&&$id_idioma<5){
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
                  $this->msg = "Tu voto ha sido activado.";
                  break;
              case "nok":
                  $this->modal = true;
                  $this->msg = "Hubo un error comunicate con webmanager@conosurwinery.cl";
                  break;
          }
      }
  
  }
}
