<?php

/**
 * login actions.
 *
 * @package    Trivia-Backend
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $funciones = new funciones();
      $log = $funciones->setLog("login|index");
      $msgout = null;
      
      if($request->isMethod("post")){
          $usuario = $request->getPostParameter("usuario");
          $pass = $request->getPostParameter("pass");
          
          $log->debug("POST datos de entrada | usuario=$usuario | pass=$pass");
          
          if(!empty($usuario) && !empty($pass)){
              
              //Buscar usuario
              $c = new Criteria();
              $c->add(AdminPeer::ADM_USER,$usuario);
              $c->add(AdminPeer::ADM_ESTADO,1);
              $c->setIgnoreCase(true);
              $resC = AdminPeer::doSelectOne($c);
              
              if($resC){
                  $log->debug("usuario encontrado");
                  $pass_db = $resC->getAdmPass();
                  $nombre = $resC->getAdmUser();
                  if($pass_db == md5($pass)){
                      //OK
                      $log->debug("pass ok");
                      $this->getUser()->setAuthenticated(true);
                      $this->getUser()->setAttribute('nombre', $nombre);
                      $this->redirect("trivia/index");
                  }else{
                      $msgout = "Contraseña inválida";
                      $log->warning($msgout);
                  }
              }else{
                $msgout = "Usuario inválido";  
                $log->warning($msgout);                
              }
              
          }else{
                $msgout = "Debes ingresar un usuario y una contraseña para entrar al sistema";  
                $log->warning($msgout); 
          }
          
      }
      $this->msgout = $msgout;
      $this->setLayout("layout_login");
  }
}
