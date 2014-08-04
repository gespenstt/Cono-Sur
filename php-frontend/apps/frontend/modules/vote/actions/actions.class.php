<?php

/**
 * vote actions.
 *
 * @package    Cono Sur
 * @subpackage vote
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class voteActions extends sfActions
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
          $this->redirect("home/index");        
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
      $c->add(PaginaPeer::PAG_ID,8);
      
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
      $cre->add(RecetaPeer::REC_PAIS,$id_idioma);
      $this->recetas = RecetaPeer::doSelect($cre);
  
  }
  public function executeAjax(sfWebRequest $request)
  {
      if($request->isMethod("post")){
          
        $funciones = new funciones();
        $log = $funciones->setLog("executeAjax");
          
          try{

            $email = $request->getPostParameter("email");
            $receta_id = $request->getPostParameter("receta");

            $log->debug("Datos de entrada | email=$email | recetaid=$receta_id");

            $cookie = unserialize($_COOKIE["conosur"]);
            $funciones = new funciones();
            $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
            if($id_idioma>0&&$id_idioma<5){
                $id_idioma = $id_idioma;
                $log->debug("Id Idioma = $id_idioma");
            }else{
                $log->err("El pais no puede votar | id_idioma=$id_idioma");
                echo "NOK";
                exit;
            }
            $captcha = new recaptchalib();
            $privatekey = "6Le4R_cSAAAAABeiA2WbQeVDkgHVrTdV0LatoEgN";
            $resp = $captcha->recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]); 
            if(!$resp->is_valid){
                $log->err("Captcha no valido");
                echo "NOK";
                exit;
            }

            //BUSCAR USUARIO
            $cus = new Criteria();
            $cus->add(UsuarioPeer::USU_EMAIL,$email);
            $cus->setIgnoreCase(true);
            $usuario = UsuarioPeer::doSelectOne($cus);

            if(!$usuario){
                $log->debug("Usuario no encontrado se procede a crear");
                $usuario = new Usuario();
                $usuario->setUsuEmail(strtolower($email));
                $usuario->setUsuClave(md5(date("U").rand(11,99)));
                $usuario->save();
                $log->debug("Usuario creado | usuid=".$usuario->getUsuId());

            }else{
                $log->debug("Usuario encontrado | usuid=".$usuario->getUsuId());
            }

            //Buscar que no tenga votos
            $cv = new Criteria();
            $cv->add(UsuarioRecetaPeer::USU_ID,$usuario->getUsuId());
            $resCv = UsuarioRecetaPeer::doSelectOne($cv);

            if($resCv){
                $log->err("Usuario ya registra voto");
                echo "NOK";
                exit;
            }

            //Registrar voto
            $voto = new UsuarioReceta();
            $voto->setUsuId($usuario->getUsuId());
            $voto->setRecId($receta_id);
            $voto->save();
            
            $url_validar = "http://conosur.ratamonkey.com/web/index.php/home/validar/usuid/".$usuario->getUsuId()."/key/".$usuario->getUsuClave();
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= "From: <receta@bloggercompetition.conosur.com>" . "\r\n";
            
            $message = "<h1>Valida tu cuenta</h1><br><br>Haz click <a href='".$url_validar."'>aqui</a>";

            mail($to,$subject,$message,$headers);

            $log->debug("Voto guardado mail enviado");
            echo "OK";            
            
              
          } catch (Exception $ex) {

              $log->err($ex->getMessage());
              echo "NOK";
              exit;
              
          }
        
      }
      return sfView::NONE;      
  }
}
