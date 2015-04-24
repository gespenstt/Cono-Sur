<?php

class componentesComponents extends sfComponents
{
  
  public function executeMenu()
  {
      $this->nombre = $this->getUser()->getAttribute("nombre");      
  }
    
}