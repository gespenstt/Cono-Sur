<?php

/**
 * home actions.
 *
 * @package    Cono Sur
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $cookie = unserialize($_COOKIE["conosur"]);
      $funciones = new funciones();
      $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
      if($id_idioma>0&&$id_idioma<5){
          $id_idioma = $id_idioma;
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
      $c->add(PaginaPeer::PAG_ID,1);
      
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
      
  }
  public function executeLang(sfWebRequest $request)
  {
        $array_cookie = array(
            "lang"=>"en",
            "id"=>"f6d7a559d5cfa79f1daf7c3562253c61",
        );
        setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
        $this->redirect("home/index");
      
  }
  public function executeDebug(sfWebRequest $request)
  {
      $lang = $request->getParameter("lang");
      $this->msg = "";
      if(!empty($lang)){
            switch ($lang){
                //FI
                case "4":
                    $array_cookie = array(
                        "lang"=>"fi",
                        "id"=>"c5e62d69879248ba52c5839ae8216ae7",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $this->msg = "Cambiado a FI";
                    break;
                //GB UK
                case "1":
                    $array_cookie = array(
                        "lang"=>"gb",
                        "id"=>"5f5c41ce34cae1c4503d800b291f8bd4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $this->msg = "Cambiado a GB UK";
                    break;
                //IE
                case "2":
                    $array_cookie = array(
                        "lang"=>"ie",
                        "id"=>"ca5d0605b60bf30f6a41cecb4b873dc4",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $this->msg = "Cambiado a IE";
                    break;
                //SE
                case "3":
                    $array_cookie = array(
                        "lang"=>"se",
                        "id"=>"ea14eaf7e36e0a5a298c8e5e41f85cce",
                        "natural"=>true,
                    );
                    setcookie("conosur", serialize($array_cookie), time()+3600*24*90, "/");
                    $this->msg = "Cambiado a SE";
                    break;
            }
          
      }
      $reset = $request->getParameter("reset");
      if($reset=="ok"){
          setcookie("conosur", null, time()-3600*24*90, "/");
                    $this->msg = "Reset OK";
      }
      
      $this->setLayout("layout_debug");
  }
}
