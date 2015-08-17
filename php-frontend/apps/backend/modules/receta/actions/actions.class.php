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
      $this->estado = "";
      $estado = $request->getParameter("estado");
      $nombre = $request->getParameter("nombre");
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      if(!empty($pais)){
          $this->pais = $pais;
          $c->add(RecetaPeer::REC_PAIS,$pais);
      }
      if($estado != ""){
          $this->estado = $estado;
          $c->add(RecetaPeer::REC_ESTADO,$estado);
      }
      if($nombre != ""){
          $this->nombre = $nombre;
          $c->add(RecetaPeer::REC_NOMBRE_RECETA,"%$nombre%",Criteria::LIKE);
          $c->setIgnoreCase(true);
      }
      //$resC = RecetaPeer::doSelect($c);
      //$this->recetas = $resC;
      $pagina = $request->getParameter("p",1);
      $this->pagina = $pagina;
      $pager = new sfPropelPager('receta', 10);
      $pager->setCriteria($c);
      $pager->setPage($pagina);
      $pager->init();
      $this->recetas = $pager;
      $this->funciones = new funciones();
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
          $nombre_blogger = $request->getPostParameter("nombre_blogger");
          $email_blogger = $request->getPostParameter("email_blogger");
          $blog_blogger = $request->getPostParameter("blog_blogger");
          $blog_blogger_name = $request->getPostParameter("blog_blogger_name");
          
          $semi = 0;
          $final = 0;
          $ganador = 0;
          $post_semi = $request->getPostParameter("semi");
          $post_final = $request->getPostParameter("finalista");
          $post_ganador = $request->getPostParameter("ganador");
          
          if($post_semi=="on"){
              $semi = 1;
          }
          if($post_final == "on"){
              $final = 1;
          }
          if($post_ganador == "on"){
              $ganador = 1;
          }
          
          $receta->setRecEstado($estado);
          $receta->setRecVino($vinousado);
          $receta->setRecNombreReceta($nombrereceta);
          $receta->setRecIngredientes(($ingredientes));
          $receta->setRecInstrucciones(($instrucciones));
          $receta->setRecNombreBlogger($nombre_blogger);
          $receta->setRecEmailBlogger($email_blogger);
          $receta->setRecUrlBlogger($blog_blogger);
          $receta->setRecUrlnameBlogger($blog_blogger_name);
          $receta->setRecSemi($semi);
          $receta->setRecFinal($final);
          $receta->setRecGanador($ganador);
          
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
      $receta->setUpdatedAt(date("Y-m-d H:i:s"));
      $receta->save();
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
            $receta->setUpdatedAt(date("Y-m-d H:i:s"));
            $receta->save();
            
            $log->debug("Receta a cropear | receta".$receta->getRecNombreReceta()." | imagen=".$receta->getRecImagen());
          
            $targ_h = 460;
            $targ_w = 460;
            $jpeg_quality = 100;
            
            $src = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$receta->getRecImagen();
            $src_original = sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."original_".$receta->getRecImagen();
            
            $log->debug("SRC=$src | SRC_ORIGINAL=$src_original");
            
            chmod($src, "0777");
            
            $imagen = new SimpleImage();
            $imagen->load($src);
            $imagen->save($src_original);
            unset($imagen);
            //$log->debug('Imagen a cropear: '.$src);
            $img_r = imagecreatefromjpeg($src);
            $log->debug(print_r($img_r,true));
            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
            $log->debug(print_r($dst_r,true));
            
            $x = $request->getParameter("x");
            $y = $request->getParameter("y");
            $w = $request->getParameter("w");
            $h = $request->getParameter("h");
            
            $log->debug("VARS | x=$x | y=$y | w=$w | h=$h");

            if(imagecopyresized($dst_r,$img_r,0,0,$x,$y,
            $targ_w,$targ_h,$w,$h)===true){
                $log->debug("rezise OK");
            }else{
                $log->debug("rezise NOK");
            }
            
            $imagen_actual_contenido = file_get_contents($src_original);
            $log->debug("Largo imagen original | ".strlen($imagen_actual_contenido));

            //header('Content-type: image/jpeg');
            //Path
            if(unlink($src)===true){
                $log->debug("Archivo borrado | $src");
            }else{
                $log->debug("No se pudo borrar archivo | $src");
            }
            if(file_exists($src)){
                $log->debug("Archivo aun existe");
            }
            //Buffer y guardar archivo
            ob_start();
            imagejpeg($dst_r,null,$jpeg_quality);
            $i = ob_get_clean();
            $log->debug("Largo nueva imagen | ".strlen($i));
            $fp = fopen ($src,'w');
            if(fwrite ($fp, $i)===FALSE){
                $log->debug("Error al guardar imagen | $src" );                
            }else{
                $log->debug("Imagen nueva creada | $src");
            }
            fclose ($fp);         
            $log->debug("FOPEN OK");
            $this->redirect("receta/detalle/?id=".$receta->getRecId());
              
          } catch (Exception $ex) {
              $log->err($ex->getTraceAsString());
          }
      }
      
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->add(RecetaPeer::REC_ID,$id);
      $this->receta = RecetaPeer::doSelectOne($c);
  }
  public function executeTop(sfWebRequest $request)
  {
      $util = new funciones();
      
      $irlanda = array();
      
      $c = new Criteria();
      $c->add(RecetaPeer::REC_ELIMINADO,0);
      $c->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $c->add(RecetaPeer::REC_PAIS,2);
      $c->add(RecetaPeer::REC_ESTADO,1);
      $resC = RecetaPeer::doSelect($c);  
      
      foreach($resC as $r){
          $flag = "";
          if($r->getRecSemi()==1){ $flag .= "Semi ";}
          if($r->getRecFinal()==1){ $flag .= "- Finalista ";}
          if($r->getRecGanador()==1){ $flag .= "- Ganador ";}
          
          $irlanda[$r->getRecId()] = array(
              "id" => $r->getRecId(),
             "nombre" => $r->getRecNombreReceta(),
              "blogger" => $r->getRecNombreBlogger(),
              "count" => $util->countVotos($r->getRecId()),
              "flag" => $flag,
          );
      }
      
      usort($irlanda, function($a, $b) {
            return $a['count'] - $b['count'];
      });
      $this->irlanda = $irlanda;
      
      $suecia = array();
      
      $d = new Criteria();
      $d->add(RecetaPeer::REC_ELIMINADO,0);
      $d->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $d->add(RecetaPeer::REC_PAIS,3);
      $d->add(RecetaPeer::REC_ESTADO,1);
      $resD = RecetaPeer::doSelect($d);  
      
      foreach($resD as $r){
          $flag = "";
          switch(true){
              case ($r->getRecSemi()==1):
                    $flag = "Semi";
                  break;
              case ($r->getRecFinal()==1):
                    $flag = "Finalista";
                  break;
              case ($r->getRecGanador()==1):
                    $flag = "Ganador";
                  break;
              default:
                  
                  break;
          }
          $suecia[$r->getRecId()] = array(
              "id" => $r->getRecId(),
             "nombre" => $r->getRecNombreReceta(),
              "blogger" => $r->getRecNombreBlogger(),
              "count" => $util->countVotos($r->getRecId()),
              "flag" => $flag,
          );
      }   
      
      usort($suecia, function($a, $b) {
            return $a['count'] - $b['count'];
      });
      $this->suecia = $suecia;
      
      $finlandia = array();      
      
      $e = new Criteria();
      $e->add(RecetaPeer::REC_ELIMINADO,0);
      $e->addDescendingOrderByColumn(RecetaPeer::CREATED_AT);
      $e->add(RecetaPeer::REC_PAIS,4);
      $e->add(RecetaPeer::REC_ESTADO,1);
      $resE = RecetaPeer::doSelect($e);  
      
      foreach($resE as $r){
          $flag = "";
          switch(true){
              case ($r->getRecSemi()==1):
                    $flag = "Semi";
                  break;
              case ($r->getRecFinal()==1):
                    $flag = "Finalista";
                  break;
              case ($r->getRecGanador()==1):
                    $flag = "Ganador";
                  break;
              default:
                  
                  break;
          }
          $finlandia[$r->getRecId()] = array(
              "id" => $r->getRecId(),
             "nombre" => $r->getRecNombreReceta(),
              "blogger" => $r->getRecNombreBlogger(),
              "count" => $util->countVotos($r->getRecId()),
              "flag" => $flag,
          );
      }  
      
      usort($finlandia, function($a, $b) {
            return $a['count'] - $b['count'];
      });
      $this->finlandia = $finlandia;
  }
  public function executeSubirimagen(sfWebRequest $request)
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
      $error = false;
      $msg = "";

      if($request->isMethod("post")){
          $imagen = $_FILES["imagen"];
          if($imagen["error"] > 0 || $imagen["size"] > 3000000 || $imagen["size"] == 0){
            $error = true;
            $msg = "Ha ocurrido un error al subir la imagen, por favor revisar que el peso no exceda el límite de 3mb";
          }else{
            $path_upload = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR;
            $nombre_archivo = date("U").rand(111,999).".jpg";
            list($width, $height, $type, $attr) = getimagesize($_FILES["imagen"]["tmp_name"]);
            if($width<460 || $height<460){
              $error = true;
              $msg = "Las dimensiones mínimas de la imagen no corresponden con las solicitadas: 460x460 píxeles";
            }else{
              $s_imagen = new SimpleImage();
              $s_imagen->load($_FILES["imagen"]["tmp_name"]);
              $s_imagen->save($path_upload.$nombre_archivo);
              $receta->setRecImagen($nombre_archivo);
              $receta->save();
              $msg = "La imagen se ha subido con éxito";              
            }
          }
      }

      $this->error = $error;
      $this->msg = $msg;

      $this->receta = $receta;
      

  }
}
