<?php

/**
 * enterrecipe actions.
 *
 * @package    Cono Sur
 * @subpackage enterrecipe
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class enterrecipeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $c = new Criteria();
      $c->clearSelectColumns();
      $c->addSelectColumn(PaginaPeer::PAG_IDENTIFICADOR);
      $c->addSelectColumn(SeccionPeer::SEC_IDENTIFICADOR);
      $c->addSelectColumn(DiccionarioPeer::DIC_TEXTO);
      $c->addSelectColumn(ParametroPeer::PAR_IDENTIFICADOR);
      $c->addJoin(PaginaPeer::PAG_ID, SeccionPeer::PAG_ID);
      $c->addJoin(SeccionPeer::SEC_ID, ParametroPeer::SEC_ID);
      $c->addJoin(ParametroPeer::PAR_ID, DiccionarioPeer::PAR_ID);
      $c->add(DiccionarioPeer::IDI_ID,1);
      $c->add(PaginaPeer::PAG_ID,6);
      
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
      
  }
  public function executeGuardar(sfWebRequest $request)
  {
      if($request->isMethod("post")){
          $funciones = new funciones();
          $log = $funciones->setLog("executeGuardar");
          $log->debug(print_r($_POST,true));
          $log->debug(print_r($_FILES,true));
          $cookie = unserialize($_COOKIE["conosur"]);
          $log->debug(print_r($cookie,true));
          if($cookie["natural"]!="1"||empty($cookie["id"])&&!$funciones->esKeyIdioma($cookie["id"])){
              $log->debug("NOK");
              echo "NOK";
              exit;
          }
          $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
          $log->debug("Set idioma = $id_idioma");
          $path_upload = sfConfig::get("sf_upload_dir").DIRECTORY_SEPARATOR;
          
/*
 *     var nombre_receta = $("#nombre_receta");
    var ingredientes = $("#ingredientes");
    var intrucciones = $("#intrucciones");
    var vino_usado = $("#vino_usado");
    var nombre = $("#nombre");
    var link_blog = $("#link_blog");
    var email = $("#email");
    var acepta_pais = $("#acepta_pais");
    var acepta_tos  = $("#acepta_tos");
 */   
          $nombre_receta = $request->getPostParameter("nombre_receta");
          $ingredientes = $request->getPostParameter("ingredientes");
          $intrucciones = $request->getPostParameter("intrucciones");
          $vino_usado = $request->getPostParameter("vino_usado");
          $nombre = $request->getPostParameter("nombre");
          $link_blog = $request->getPostParameter("link_blog");
          $email = $request->getPostParameter("email");
          //$acepta_pais = $re
          $receta = new Receta();
          $receta->setRecNombreReceta($nombre_receta);
          $receta->setRecIngredientes($ingredientes);
          $receta->setRecInstrucciones($intrucciones);
          $receta->setRecVino($vino_usado);
          $receta->setRecNombreBlogger($nombre);
          $receta->setRecUrlBlogger($link_blog);
          $receta->setRecEmailBlogger($email);
          $receta->save();
          echo "Receta creada!";
      }
      return sfView::NONE;
  }
  
}
