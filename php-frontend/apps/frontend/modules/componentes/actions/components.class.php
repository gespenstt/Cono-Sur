<?php

class componentesComponents extends sfComponents
{
  
  public function executeMenu()
  {
      
  }
  public function executeFooter()
  {
      
  }
  public function executeDetectar()
  {
      $this->respuesta = "false";
      $funciones = new funciones();
      $detect = $funciones->detectLang();
      if($detect!==FALSE){
          $this->respuesta = $detect;
      }
  }
    
}