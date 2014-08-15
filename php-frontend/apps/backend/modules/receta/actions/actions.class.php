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
      $this->pais = "";
      $pais = $request->getParameter("pais");
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      if(!empty($pais)){
          $this->pais = $pais;
          $c->add(RecetaPeer::REC_PAIS,$pais);
      }
      //$resC = RecetaPeer::doSelect($c);
      //$this->recetas = $resC;
      $pagina = $request->getParameter("p");
      $this->pagina = $pagina;
      $pager = new sfPropelPager('receta', 10);
      $pager->setCriteria($c);
      $pager->setPage($pagina);
      $pager->init();
      $this->recetas = $pager;
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
      $receta = RecetaPeer::doSelectOne($c);
      $this->receta = $receta;
      $src_original = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."original_".$receta->getRecImagen();
      $this->original = false;
      if(is_file($src_original)){
          $this->original = true;
      }
  }
  public function executeEditar(sfWebRequest $request)
  {
      $id = $request->getParameter("id");
      if(empty($id)){
          $this->redirect("receta/index");
      }
      $this->funciones = new funciones();
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->add(RecetaPeer::REC_ID,$id);
      $receta = RecetaPeer::doSelectOne($c);
      if($request->isMethod("post")){
          $nombrereceta = $request->getPostParameter("nombrereceta");
          $ingredientes = $request->getPostParameter("ingredientes");
          $instrucciones = $request->getPostParameter("instrucciones");
          $vinousado = $request->getPostParameter("vinousado");
          $estado = $request->getPostParameter("estado");
          
          $receta->setRecEstado($estado);
          $receta->setRecVino($vinousado);
          $receta->setRecNombreReceta($nombrereceta);
          $receta->setRecIngredientes(($ingredientes));
          $receta->setRecInstrucciones(($instrucciones));
          $receta->save();
      }
      $this->receta = $receta;
  }
  public function executeRestaurar(sfWebRequest $request)
  {
      $id = $request->getParameter("id");
      if(empty($id)){
          $this->redirect("receta/index");
      }
      $this->funciones = new funciones();
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->add(RecetaPeer::REC_ID,$id);
      $receta = RecetaPeer::doSelectOne($c);
      $src_original = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."original_".$receta->getRecImagen();
      $src = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$receta->getRecImagen();
      $src_2 = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$receta->getRecImagen();
      unlink($src);
        $imagen = new SimpleImage();
        $imagen->load($src_original);
        $imagen->save($src_2);
        unlink($src_original);
        $this->redirect("receta/detalle/?id=$id");      
  }
  public function executeCrop(sfWebRequest $request)
  {
      $id = $request->getParameter("id");
      if(empty($id)){
          $this->redirect("receta/index");
      }
      $funciones = new funciones();
      $log = $funciones->setLog("executeCrop", "backend");
      if($request->isMethod("post")){
          
          try{
          
            $c = new Criteria();
            $c->add(RecetaPeer::REC_ELIMINADO,0);
            $c->add(RecetaPeer::REC_ID,$id);
            $receta = RecetaPeer::doSelectOne($c);  
            
            $log->debug("Receta a cropear | receta".$receta->getRecNombreReceta()." | imagen=".$receta->getRecImagen());
          
            $targ_h = 460;
            $targ_w = 460;
            $jpeg_quality = 100;
            
            $src = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$receta->getRecImagen();
            $src_original = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."original_".$receta->getRecImagen();
            $src_final = $src;
            
            $log->debug("SRC=$src | SRC_ORIGINAL=$src_original");
            
            chmod($src, "0777");
            
            $imagen = new SimpleImage();
            $imagen->load($src);
            $imagen->save($src_original);
            //$log->debug('Imagen a cropear: '.$src);
            $img_r = imagecreatefromjpeg($src_original);
            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

            imagecopyresampled($dst_r,$img_r,0,0,$request->getParameter('x'),$request->getParameter('y'),
            $targ_w,$targ_h,$request->getParameter('w'),$request->getParameter('h'));

            //header('Content-type: image/jpeg');
            //Path
            unlink($src);
            //Buffer y guardar archivo
            ob_start();
            imagejpeg($dst_r,$src_final,$jpeg_quality);
            //$i = ob_get_clean();
            //$fp = fopen ($src,'w');
            //fwrite ($fp, $i);
            //fclose ($fp);         
            $log->debug("FOPEN OK");
            //$this->redirect("receta/detalle/?id=".$receta->getRecId());
              
          } catch (Exception $ex) {
              $log->err($ex->getTraceAsString());
          }
      }
      
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->add(RecetaPeer::REC_ID,$id);
      $this->receta = RecetaPeer::doSelectOne($c);
  }
}
