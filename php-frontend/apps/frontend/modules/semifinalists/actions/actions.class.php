<?php

/**
 * semifinalists actions.
 *
 * @package    Cono Sur
 * @subpackage semifinalists
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class semifinalistsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->redirect("finalists/index");
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

      $array_paises = array();
      
      
      //IRLANDA
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $c->add(RecetaPeer::REC_PAIS,2);
      $c->add(RecetaPeer::REC_ESTADO,1);
      $c->add(RecetaPeer::REC_SEMI,1);
      $array_paises["ireland"] = RecetaPeer::doSelect($c);  
      //SUECIA
      $d = new Criteria();
      $d->add(RecetaPeer::REC_ELIMINADO,0);
      $d->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $d->add(RecetaPeer::REC_PAIS,3);
      $d->add(RecetaPeer::REC_ESTADO,1);
      $d->add(RecetaPeer::REC_SEMI,1);
      $array_paises["sweden"] = RecetaPeer::doSelect($d);     
      //Canada
      $e = new Criteria();
      $e->add(RecetaPeer::REC_ELIMINADO,0);
      $e->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $e->add(RecetaPeer::REC_PAIS,9);
      $e->add(RecetaPeer::REC_ESTADO,1);
      $e->add(RecetaPeer::REC_SEMI,1);
      $array_paises["canada"] = RecetaPeer::doSelect($e);   
      //JAPON
      $f = new Criteria();
      $f->add(RecetaPeer::REC_ELIMINADO,0);
      $f->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $f->add(RecetaPeer::REC_PAIS,6);
      $f->add(RecetaPeer::REC_ESTADO,1);
      $f->add(RecetaPeer::REC_SEMI,1);
      $array_paises["japan"] = RecetaPeer::doSelect($f);  
      //CHILE
      $g = new Criteria();
      $g->add(RecetaPeer::REC_ELIMINADO,0);
      $g->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $g->add(RecetaPeer::REC_PAIS,7);
      $g->add(RecetaPeer::REC_ESTADO,1);
      $g->add(RecetaPeer::REC_SEMI,1);
      $array_paises["chile"] = RecetaPeer::doSelect($g);  
      //USA
      $h = new Criteria();
      $h->add(RecetaPeer::REC_ELIMINADO,0);
      $h->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $h->add(RecetaPeer::REC_PAIS,8);
      $h->add(RecetaPeer::REC_ESTADO,1);
      $h->add(RecetaPeer::REC_SEMI,1);
      $array_paises["usa"] = RecetaPeer::doSelect($h);   



      $this->array_paises = $array_paises;
  }
}
