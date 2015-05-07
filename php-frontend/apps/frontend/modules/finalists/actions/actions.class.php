<?php

/**
 * semifinalists actions.
 *
 * @package    Cono Sur
 * @subpackage semifinalists
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class finalistsActions extends sfActions
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
      
      
      //IRLANDA
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $c->add(RecetaPeer::REC_PAIS,2);
      $c->add(RecetaPeer::REC_ESTADO,1);
      //$c->add(RecetaPeer::REC_SEMI,1);
      $c->add(RecetaPeer::REC_FINAL,1);
      $resC = RecetaPeer::doSelect($c);  
      $this->irlanda = $resC;
      //SUECIA
      $d = new Criteria();
      $d->add(RecetaPeer::REC_ELIMINADO,0);
      $d->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $d->add(RecetaPeer::REC_PAIS,3);
      $d->add(RecetaPeer::REC_ESTADO,1);
      //$d->add(RecetaPeer::REC_SEMI,1);
      $d->add(RecetaPeer::REC_FINAL,1);
      $resD = RecetaPeer::doSelect($d);      
      $this->suecia = $resD;
      //FINLANDIA
      $e = new Criteria();
      $e->add(RecetaPeer::REC_ELIMINADO,0);
      $e->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $e->add(RecetaPeer::REC_PAIS,4);
      $e->add(RecetaPeer::REC_ESTADO,1);
      //$e->add(RecetaPeer::REC_SEMI,1);
      $e->add(RecetaPeer::REC_FINAL,1);
      $resE = RecetaPeer::doSelect($e);   
      $this->finlandia = $resE;
  }
}
