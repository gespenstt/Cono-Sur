<?php

/**
 * diccionario actions.
 *
 * @package    Cono Sur
 * @subpackage diccionario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class diccionarioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->paginas = PaginaPeer::doSelect(new Criteria());
      $this->setLayout("layout");
  }
  public function executeSeleccionaridioma(sfWebRequest $request)
  {
      $this->pagid = $request->getParameter("pag_id");
      $this->idiomas = IdiomaPeer::doSelect(new Criteria());
      $this->setLayout("layout");
  }
  public function executeEditar(sfWebRequest $request)
  {
      $idioma = $request->getParameter("idioma");
      $pag_id = $request->getParameter("pag_id");
      if(empty($idioma) && empty($pag_id)){
        $this->redirect("diccionario/index");              
      }

      //$this->idioma = $idioma;
      //$this->pag_id = $pag_id;
      $this->funciones = new funciones();

      $c = new Criteria();
      $c->add(SeccionPeer::PAG_ID,$pag_id);
      $this->secciones = SeccionPeer::doSelect($c);

      $this->pagina = PaginaPeer::retrieveByPK($pag_id);
      $this->idioma = IdiomaPeer::retrieveByPK($idioma);
          
  }
  public function executeGuardar(sfWebRequest $request)
  {
      if($request->isMethod("post")){
          
          $pag_id = $request->getPostParameter("pag_id");
          $idioma = $request->getPostParameter("idioma");
          
          //echo $pag_id." ".$idioma; print_r($_POST); exit;
          
          $cs = new Criteria();
          $cs->add(SeccionPeer::PAG_ID,$pag_id);
          $resCs = SeccionPeer::doSelect($cs);
          
          foreach ($resCs as $secc){
              foreach($secc->getParametros() as $par){
                $id = $par->getParId();
                $texto = $request->getParameter($id);
                $cd = new Criteria();
                $cd->add(DiccionarioPeer::IDI_ID,$idioma);
                $cd->add(DiccionarioPeer::PAR_ID,$id);
                $diccionario = DiccionarioPeer::doSelectOne($cd);
                if(!$diccionario){
                    $diccionario = new Diccionario();
                    $diccionario->setIdiId($idioma);
                    $diccionario->setParId($id);
                }
                $diccionario->setDicTexto($texto);
                $diccionario->setUpdatedAt(new DateTime());
                $diccionario->save();
              }
          }
          
          $pagina = PaginaPeer::retrieveByPK($pag_id);
          $pagina->save();
          
          $this->redirect("diccionario/editar/?pag_id=$pag_id&idioma=$idioma");
          
      }  else {
          $this->redirect("diccionario/index");
      }
  }
}
