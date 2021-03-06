<?php

class componentesComponents extends sfComponents
{
  
  public function executeMenu(sfWebRequest $request)
  {
      $cookie = unserialize($_COOKIE["conosur"]);
      $cookie_legal = $_COOKIE["conosur_legal"];
      $funciones = new funciones();
      $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
      $this->esconder = true;
      $array_ids_idioma = array(
          9,6,7,8,2,3
      );
      if(array_search($id_idioma, $array_ids_idioma)!==FALSE){
          $id_idioma = $id_idioma;
          $this->esconder = false;
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
      $c->add(PaginaPeer::PAG_ID,5);
      
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
      $this->legal = "false";
      
      $parametrosIn = ($request->getParameterHolder()->getAll());
      $activo = $parametrosIn['module'];
        
      if($cookie_legal=="accepted" || $activo == "recipes"){
          $this->legal = "true";
      }
      
      $this->diccionario = $array_out;
      
  }
  public function executeFooter()
  {
      
  }
  public function executeStuff()
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
	  
        //$this->recaptcha = new recaptchalib();	  
      
      $this->lang = $cookie["lang"];
      
            
      //Chef   
      $cc = new Criteria();
      $cc->clearSelectColumns();
      $cc->addSelectColumn(PaginaPeer::PAG_IDENTIFICADOR);
      $cc->addSelectColumn(SeccionPeer::SEC_IDENTIFICADOR);
      $cc->addSelectColumn(DiccionarioPeer::DIC_TEXTO);
      $cc->addSelectColumn(ParametroPeer::PAR_IDENTIFICADOR);
      $cc->addJoin(PaginaPeer::PAG_ID, SeccionPeer::PAG_ID);
      $cc->addJoin(SeccionPeer::SEC_ID, ParametroPeer::SEC_ID);
      $cc->addJoin(ParametroPeer::PAR_ID, DiccionarioPeer::PAR_ID);
      $cc->add(DiccionarioPeer::IDI_ID,$id_idioma);
      $cc->add(PaginaPeer::PAG_ID,10);
      
      $resCc = DiccionarioPeer::doSelectStmt($cc);
      
      //print_r(DiccionarioPeer::doSelectStmt($cc));
      
      $array_chef_out = array();
      if($resCc){
          while($rowc = $resCc->fetch()){
              $array_chef_out[$rowc["SEC_IDENTIFICADOR"]][$rowc["PAR_IDENTIFICADOR"]]=  nl2br($rowc["DIC_TEXTO"]);
          }
      }else{
          echo "Error :(";
          exit;
      }
      //print_r($array_chef_out);
      
      $this->diccionario_chef = $array_chef_out;
      
  }
  public function executeDetectar(sfWebRequest $request)
  {
      $this->respuesta = false;
      $funciones = new funciones();
      $log = $funciones->setLog("executeDetectar");
      $ip_user = $funciones->get_client_ip();
      $cookie_ip = $_COOKIE["conosur_ip"];
      if($cookie_ip != md5($ip_user)){
        setcookie("conosur", null, time()-3600*24*90, "/");
        setcookie("conosur_ip", md5($ip_user), time()+3600*24*90, "/");
        $this->getContext()->getActionStack()->getLastEntry()->getActionInstance()->redirect("home/index");
      }
      $cookie = unserialize($_COOKIE["conosur"]);
      $log->debug("Cookie : ".print_r($cookie,true));
      if(!is_array($cookie) || empty($cookie["lang"])){
        $detect = $funciones->detectLang();
        //echo "DETECT:::$detect";
        if($detect!==FALSE){
            //$this->respuesta = $detect;
            $detect = strtolower($detect);
            $found = false;
            switch (true){
                //FI
                /*case (strpos($detect, "fi")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"fi",
                        "id"=>"c5e62d69879248ba52c5839ae8216ae7",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;*/
                //GB UK
                /*case (strpos($detect, "gb")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"gb",
                        "id"=>"5f5c41ce34cae1c4503d800b291f8bd4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;*/
                //IE
                case (strpos($detect, "ie")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"ie",
                        "id"=>"ca5d0605b60bf30f6a41cecb4b873dc4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //SE
                case (strpos($detect, "se")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"se",
                        "id"=>"ea14eaf7e36e0a5a298c8e5e41f85cce",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                /*case (strpos($detect, "cl")!==FALSE):
                    //EN
                    //f6d7a559d5cfa79f1daf7c3562253c61 ID 5
                    $array_cookie = array(
                        "lang"=>"gb",
                        "id"=>"5f5c41ce34cae1c4503d800b291f8bd4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;*/
                //CA
                case (strpos($detect, "ca")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"ca",
                        "id"=>"5435c69ed3bcc5b2e4d580e393e373d3",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //JP
                case (strpos($detect, "jp")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"jp",
                        "id"=>"55add3d845bfcd87a9b0949b0da49c0a",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //CL
                case (strpos($detect, "cl")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"cl",
                        "id"=>"161747ec4dc9f55f1760195593742232",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //US
                case (strpos($detect, "us")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"us",
                        "id"=>"0b3b97fa66886c5688ee4ae80ec0c3c2",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
            }
            if($found&&$_GET["share"]!="social"){
                $this->getContext()->getActionStack()->getLastEntry()->getActionInstance()->redirect('home/index'); 
            }
        }
      }else{
          if($cookie["lang"]=="gl_en"){
            $this->respuesta = false;    
          }else{
            $this->respuesta = "OK";
          }
          
      }
  }
    
}