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
      $cookie = unserialize($_COOKIE["conosur"]);
      if(!is_array($cookie) && empty($cookie["lang"])){
        $funciones = new funciones();
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
                        "id"=>"4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //GB UK
                case (strpos($detect, "gb")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"gb",
                        "id"=>"1",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //IE
                case (strpos($detect, "ie")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"ie",
                        "id"=>"2",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                //SE
                case (strpos($detect, "se")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"se",
                        "id"=>"3",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $found=true;
                    break;
                case (strpos($detect, "cl")!==FALSE):
                    $array_cookie = array(
                        "lang"=>"gb",
                        "id"=>"1",
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