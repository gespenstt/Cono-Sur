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
        $array_salida = array();
          
          try{

            $email = $request->getPostParameter("email");
            $nombre = $request->getPostParameter("name");
            $receta_id = $request->getPostParameter("receta");

            $log->debug("Datos de entrada | email=$email | recetaid=$receta_id | nombre=$nombre");

            $cookie = unserialize($_COOKIE["conosur"]);
            $funciones = new funciones();
            $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
            if($id_idioma>0&&$id_idioma<5){
                $id_idioma = $id_idioma;
                $log->debug("Id Idioma = $id_idioma");
            }else{
                $log->err("El pais no puede votar | id_idioma=$id_idioma");
                //echo "NOK";
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "Error al votar"
                );
                echo json_encode($array_salida);
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
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "Captcha inválido"
                );
                echo json_encode($array_salida);
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
                $usuario->setUsuNombre($nombre);
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
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "Ya has votado en otra receta"
                );
                echo json_encode($array_salida);
                exit;
            }

            //Registrar voto
            $voto = new UsuarioReceta();
            $voto->setUsuId($usuario->getUsuId());
            $voto->setRecId($receta_id);
            $voto->save();
            
            $url_validar = "http://conosur.ratamonkey.com/web/index.php/home/validar/usuid/".$usuario->getUsuId()."/key/".$usuario->getUsuClave();
            
            $message = "<h1>Valida tu cuenta</h1><br><br>Haz click <a href='".$url_validar."'>aqui</a>";

            //mail($to,$subject,$message,$headers);
            $mensaje = Swift_Message::newInstance()
              ->setFrom(array('info@ratamonkey.com' => 'Blogger Competition'))
              ->setTo($usuario->getUsuEmail())
              ->setSubject('Validación de cuenta')
              ->setBody($message,'text/html');
              $this->getMailer()->send($mensaje);
              $log->debug("Mail Enviado");           

            $log->debug("Voto guardado mail enviado");
                $array_salida = array(
                  "estado" => "ok",
                    "msg" => "Te hemos enviado un correo para validar tu voto"
                ); 
                echo json_encode($array_salida);
                exit;
              
          } catch (Exception $ex) {

              $log->err($ex->getMessage());
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "Error al votar"
                );
                echo json_encode($array_salida);
              exit;
              
          }
        
      }
      return sfView::NONE;      
  }
}
