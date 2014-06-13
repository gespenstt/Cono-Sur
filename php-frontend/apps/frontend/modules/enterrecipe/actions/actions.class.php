<?php

/**
 * enterrecipe actions.
 *
 * @package    Cono Sur
 * @subpackage enterrecipe
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class enterrecipeActions extends sfActions
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
          $this->redirect("home/index");        
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
      $c->add(PaginaPeer::PAG_ID,6);
      
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
  public function executeGuardar(sfWebRequest $request)
  {
      if($request->isMethod("post")){
          $funciones = new funciones();
          $log = $funciones->setLog("executeGuardar");
          $log->debug(print_r($_POST,true));
          $log->debug(print_r($_FILES,true));
          $cookie = unserialize($_COOKIE["conosur"]);
          $log->debug(print_r($cookie,true));
          if($cookie["natural"]!="1"||empty($cookie["id"])&&!$funciones->esKeyIdioma($cookie["id"])){
              $log->debug("NOK");
              echo "NOK";
              exit;
          }
          try{
            $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
            $log->debug("Set idioma = $id_idioma");
            $path_upload = sfConfig::get("sf_upload_dir").DIRECTORY_SEPARATOR;
            $nombre_archivo = date("U").rand(111,999).".jpg";
            $log->debug("Imagen | origen=".$_FILES["foto"]["tmp_name"]." | destino=$path_upload$nombre_archivo");
            //$s_imagen = new abeautifulsite\SimpleImage($_FILES["foto"]["tmp_name"]);
            //$s_imagen->resize(400, 400);
            //$s_imagen->save($path_upload.$nombre_archivo);
            $s_imagen = new SimpleImage();
            $s_imagen->load($_FILES["foto"]["tmp_name"]);
            $s_imagen->resize(400, 400);
            $s_imagen->save($path_upload.$nombre_archivo);
            
            $nombre_receta = $request->getPostParameter("nombre_receta");
            $ingredientes = $request->getPostParameter("ingredientes");
            $intrucciones = $request->getPostParameter("intrucciones");
            $vino_usado = $request->getPostParameter("vino_usado");
            $nombre = $request->getPostParameter("nombre");
            $link_blog = $request->getPostParameter("link_blog");
            $email = $request->getPostParameter("email");
            //$acepta_pais = $re
            $receta = new Receta();
            $receta->setRecNombreReceta($nombre_receta);
            $receta->setRecIngredientes($ingredientes);
            $receta->setRecInstrucciones($intrucciones);
            $receta->setRecVino($vino_usado);
            $receta->setRecNombreBlogger($nombre);
            $receta->setRecUrlBlogger($link_blog);
            $receta->setRecEmailBlogger($email);
            $receta->setRecPais($id_idioma);
            $receta->setRecImagen($nombre_archivo);
            $receta->save();


$to = "invasor@gmail.com";
$subject = "Email ConoSur";

$array_paises["1"] = "UK";
$array_paises["2"] = "Irlanda";
$array_paises["3"] = "Suecia";
$array_paises["4"] = "Finlandia";


$message = '<html><head>
  <meta charset="utf-8">
</head>
<body>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center" style="color:#333;font-family:arial,sans-serif;font-size:12px;line-height:16px; padding-bottom:20px;" valign="top">
        <img src="http://bloggercompetition.conosur.com/img/logo-conosur-bloggers.png" alt="Cono Sur Bloggers">
      </td>
    </tr>

    <tr>
      <td align="left" style="color:#333;font-family:arial,sans-serif;font-size:12px;line-height:16px;" valign="top">
        <img src="recipe02-big.jpg" alt="Cono Sur Bloggers">
      </td>
      <td align="left" style="color:#333;font-family:arial,sans-serif;font-size:12px;line-height:16px; padding:10px;" valign="top" >
        <h3>
          Recipe Country '.$array_paises[$id_idioma].'
        </h3>
        <p>'.$nombre_receta.'</P>

<p>Ingredients:<br /><br />

'.$ingredientes.'</P>

<p>Instructions:<br /><br />

'.$intrucciones.'</p>
      </td>
    </tr>

  </table>
</body>
</html>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: <$email>" . "\r\n";

mail($to,$subject,$message,$headers);


            echo "ok";
              
          } catch (Exception $ex) {
              $log->err($ex->getMessage());
          }
/*
 *     var nombre_receta = $("#nombre_receta");
    var ingredientes = $("#ingredientes");
    var intrucciones = $("#intrucciones");
    var vino_usado = $("#vino_usado");
    var nombre = $("#nombre");
    var link_blog = $("#link_blog");
    var email = $("#email");
    var acepta_pais = $("#acepta_pais");
    var acepta_tos  = $("#acepta_tos");
 */   
      }
      return sfView::NONE;
  }
  
}
