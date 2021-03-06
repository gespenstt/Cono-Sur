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
      $this->redirect("semifinalists/index");
      $cookie = unserialize($_COOKIE["conosur"]);
      $funciones = new funciones();
      $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
      $array_ids_idioma = array(
          9,6,7,8,2,3
      );
      if(array_search($id_idioma, $array_ids_idioma)!==FALSE){
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
      $cre->add(RecetaPeer::REC_ESTADO,1);
      $cre->add(RecetaPeer::REC_PAIS,$id_idioma);
      $this->recetas = RecetaPeer::doSelect($cre);
  
  }
  public function executeAjax(sfWebRequest $request)
  {
      $this->redirect("semifinalists/index");
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
            $array_ids_idioma = array(
                9,6,7,8,2,3
            );
            //if($id_idioma>1&&$id_idioma<5){
            if(array_search($id_idioma, $array_ids_idioma)!==FALSE){
                $id_idioma = $id_idioma;
                $log->debug("Id Idioma = $id_idioma");
            }else{
                $log->err("El pais no puede votar | id_idioma=$id_idioma");
                //echo "NOK";
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "Oops, something did not work, please try again."
                );
                echo json_encode($array_salida);
                exit;
            }
            
            if(empty($email) || empty($nombre)){
                $log->err("Los datos de entrada son obligatorios");
                //echo "NOK";
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "All fields are required, please try again."
                );
                echo json_encode($array_salida);
                exit;                
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $log->err("Email invalido");
                //echo "NOK";
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "Please enter a valid email."
                );
                echo json_encode($array_salida);
                exit; 
                
            }
            
            /*$captcha = new recaptchalib();
            $privatekey = "6LdyyfgSAAAAAMOEGtahWl7v7SwLxM4PCik-VJ0N";
            //$privatekey = "6Le4R_cSAAAAABeiA2WbQeVDkgHVrTdV0LatoEgN";
            $resp = $captcha->recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]); */
            /*$recaptcha = new \ReCaptcha\ReCaptcha("6Le4R_cSAAAAABeiA2WbQeVDkgHVrTdV0LatoEgN");
            $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if(!$resp->isSuccess()){
                $log->err("Captcha no valido");
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "The CAPTCHA you entered is invalid. Please try again."
                );
                echo json_encode($array_salida);
                exit;
            }*/

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
				$usuario->setUsuEstado(1);
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
                    "msg" => "Sorry! You can only vote once!"
                );
                echo json_encode($array_salida);
                exit;
            }

            //Registrar voto
            $voto = new UsuarioReceta();
            $voto->setUsuId($usuario->getUsuId());
            $voto->setRecId($receta_id);
            $voto->save();
            
            $url_validar = "http://bloggercompetition.conosur.com/index.php/home/validar/usuid/".$usuario->getUsuId()."/key/".$usuario->getUsuClave()."/receta/$receta_id";
            
            //$message = "<h1>Valida tu cuenta</h1><br><br>Haz click <a href='".$url_validar."'>aqui</a>";
            $message = '<html>
<head>
</head>

<body style="margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif;">
<table width="450" border="0" cellpadding="0px" cellspacing="0px" style="border:1px solid #ccc;">
  <tr>
    <td><img src="http://bloggercompetition.conosur.com/img/letter-header.jpg" /></td>
  </tr>
  <tr>
    <td height="200px" style="text-align:center; padding:20px;">Please click on <a href="'.$url_validar.'">this link</a> to validate your vote for your favorite recipe in the Cono Sur Blogger Competition.</td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:10px;
    color:#000; padding:10px; background-color:#e5dd61;">© 2014 Cono Sur | <a href="www.conosur.com" style="color:#000; text-decoration:none;">www.conosur.com</a> | <a href="mailto:webmanager@conosurwinery.cl" style="color:#000; text-decoration:none;">contact: webmanager@conosurwinery.cl</a></td>
  </tr>
</table>
</body>
</html>
';
            //$message = "Please click on <a href='".$url_validar."'>this link</a> to validate your vote for your favorite recipe in the Cono Sur Blogger Competition.";

            //mail($to,$subject,$message,$headers);
            /*$mensaje = Swift_Message::newInstance()
              ->setFrom(array('no.reply@bloggercompetition.conosur.com' => 'Blogger Competition'))
              ->setTo($usuario->getUsuEmail())
              ->setSubject('Validate vote')
              ->setBody($message,'text/html');
              $this->getMailer()->send($mensaje);*/
// Always set content-type when sending HTML email
                /*$headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: Blogger Competition <no.reply@bloggercompetition.conosur.com>' . "\r\n";
                mail($usuario->getUsuEmail(),"Validate vote",$message,$headers);*/
              //$log->debug("Mail Enviado");           

            $log->debug("Voto guardado mail enviado");
                /*$array_salida = array(
                  "estado" => "ok",
                    "msg" => "Thanks! We have sent you an e-mail to validate your vote, click on the link in your mail and you'll be entered to win!"
                );*/ 
                $array_salida = array(
                  "estado" => "ok",
                    "msg" => "Congratulations! You have successfully voted!"
                ); 
				
                echo json_encode($array_salida);
                exit;
              
          } catch (Exception $ex) {

              $log->err($ex->getMessage());
                $array_salida = array(
                  "estado" => "nok",
                    "msg" => "Oops, something did not work, please try again."
                );
                echo json_encode($array_salida);
              exit;
              
          }
        
      }
      return sfView::NONE;      
  }
}
