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
      if($id_idioma>0&&$id_idioma<5){
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
      $activo = $parametrosIn['module']; echo "::::$activo";
        
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
	  
	  $this->recaptcha = new recaptchalib();	  
      
      $this->lang = $cookie["lang"];
      
  }
  public function executeDetectar()
  {
      $this->respuesta = false;
      $funciones = new funciones();
      $log = $funciones->setLog("executeDetectar");
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
                case (strpos($detect, "fi")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"fi",
                        "id"=>"c5e62d69879248ba52c5839ae8216ae7",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //GB UK
                case (strpos($detect, "gb")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"gb",
                        "id"=>"5f5c41ce34cae1c4503d800b291f8bd4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
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
            }
            if($found){
                $this->getContext()->getActionStack()->getLastEntry()->getActionInstance()->redirect('home/index'); 
            }
        }
      }else{
          $this->respuesta = "OK";
      }
  }
    
}