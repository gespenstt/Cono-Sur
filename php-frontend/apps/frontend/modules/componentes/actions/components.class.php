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
      $cookie = $_COOKIE["conosur_lang"];
      
      $funciones = new funciones();
      $detect = $funciones->detectLang();
      if($detect!==FALSE){
          //$this->respuesta = $detect;
          $detect = strtolower($detect);
          switch (true){
              //FI
              case (strpos($detect, "fi")!==FALSE):
                  break;
              //GB UK
              case (strpos($detect, "gb")!==FALSE):
                  break;
              //IE
              case (strpos($detect, "ie")!==FALSE):
                  break;
              //SE
              case (strpos($detect, "se")!==FALSE):
                  break;
          }
      }
  }
    
}