<?php

class componentesComponents extends sfComponents
{
  
  public function executeMenu()
  {
      
  }
  public function executeFooter()
  {
      
  }
  public function executeStuff()
  {
      
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
        echo "DETECT:::$detect";
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
                case (strpos($detect, "cl")!==FALSE):
                    //EN
                    //f6d7a559d5cfa79f1daf7c3562253c61 ID 5
                    $array_cookie = array(
                        "lang"=>"gb",
                        "id"=>"5f5c41ce34cae1c4503d800b291f8bd4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
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