<?php


/**
 * Skeleton subclass for representing a row from the 'pagina' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 06/05/14 23:09:04
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Pagina extends BasePagina {
    
  public function __toString()
  {
    return $this->getPagNombre();
  }

} // Pagina
