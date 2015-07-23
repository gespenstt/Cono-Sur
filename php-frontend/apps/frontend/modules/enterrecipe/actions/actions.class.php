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
      //$this->redirect("home/index");
      $cookie = unserialize($_COOKIE["conosur"]);
      $funciones = new funciones();
      $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
      $array_ids_idioma = array(
          9,6,7,8,2,3
      );
      if(array_search($id_idioma, $array_ids_idioma)!==FALSE){
          $id_idioma = $id_idioma;
      }else{
          $this->redirect("home/index");        
      }

      //Vinos
      $array_vinos = array();
      switch($id_idioma){
        case 2:
          //IE
            $array_vinos = array(
              "Single Vineyard Sauvignon Blanc",
              "Single Vineyard Chardonnay",
              "Single Vineyard Riesling",
              "Single Vineyard Pinot Noir",
              "Single Vineyard Merlot",
              "Single Vineyard Carmenere",
              "Single Vineyard Syrah",
              "Single Vineyard Cabernet Sauvignon"
            );
        break;

        case 3:
          //SE
            $array_vinos = array(
              "Organic Chardonnay",
              "Organic Cabernet/Carmenere"
            );
        break;

        case 6:
          //JP
            $array_vinos = array(
              "Reserva Especial Pinot Noir",
              "Reserva Especial Gewürztraminer"
            );
        break;

        case 7:
          //CL
            $array_vinos = array(
              "Reserva Especial Pinot Noir",
              "Reserva Especial Sauvignon Blanc"
            );
        break;

        case 8:
          //US
            $array_vinos = array(
              "Bicicleta",
              "Organic Cabernet Sauvignon/Carmenere",
              "Organic Chardonnay",
              "Organic Pinot Noir",
              "Organic Sauvignon Blanc",
              "Reserva Especial Cabernet Sauvignon",
              "Reserva Especial Carmenere",
              "Reserva Especial Chardonnay",
              "Reserva Especial Pinot Noir",
              "Reserva Especial Sauvignon Blanc"
            );
        break;

        case 9:
          //CA
            $array_vinos = array(
              "Bicicleta Cabernet Sauvignon",
              "Bicicleta Carmenere",
              "Bicicleta Syrah",
              "Bicicleta Gewürztraminer",
              "Bicicleta Merlot",
              "Bicicleta Pinot Grigio",
              "Bicicleta Pinot Noir",
              "Bicicleta Pinot Noir Rosé",
              "Bicicleta Riesling",
              "Bicicleta Sauvignon Blanc",
              "Bicicleta Viognier",
              "Organic Cabernet Sauvignon/Carmenere",
              "Organic Chardonnay",
              "Organic Pinot Noir",
              "Organic Sauvignon Blanc",
            );
        break;
      }
      $this->array_vinos = $array_vinos;

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
      
      $this->lang = $cookie["lang"];
      
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
      //$this->redirect("home/index");
      if($request->isMethod("post")){
          $funciones = new funciones();
          $log = $funciones->setLog("executeGuardar[".uniqid()."]");
          $log->debug("POST");
          $log->debug(json_encode($_POST,true));
          $log->debug("FILES");
          $log->debug(json_encode($_FILES,true));
          $cookie = unserialize($_COOKIE["conosur"]);
          $log->debug(print_r($cookie,true));
          if($cookie["natural"]!="1"||empty($cookie["id"])&&!$funciones->esKeyIdioma($cookie["id"])){
              $log->debug("NOK");
              echo "NOK";
              exit;
          }
          try{

            $array_paises["2"] = "Irlanda";
            $array_paises["3"] = "Suecia";
            $array_paises["9"] = "Canada";
            $array_paises["6"] = "Japon";
            $array_paises["7"] = "Chile";
            $array_paises["8"] = "USA";

            $id_idioma = $funciones->mercheKeyIdioma($cookie["id"]);
            $log->debug("Set idioma = $id_idioma");
            $path_upload = sfConfig::get("sf_upload_dir").DIRECTORY_SEPARATOR;
            $nombre_archivo = date("U").rand(111,999).".jpg";
            $log->debug("Imagen | origen=".$_FILES["foto"]["tmp_name"]." | destino=$path_upload$nombre_archivo");
            
            $nombre_receta = $request->getPostParameter("nombre_receta");
            $ingredientes_in = $request->getPostParameter("ingredientes");
            $ingredientes = str_replace(",", "<br>", $ingredientes_in);
            $intrucciones = $request->getPostParameter("intrucciones");
            $vino_usado = $request->getPostParameter("vino_usado");
            $nombre = $request->getPostParameter("nombre");
            $link_blog = $request->getPostParameter("link_blog");
            $name_blog = $request->getPostParameter("name_blog");
            $email = $request->getPostParameter("email");
            $ip = $funciones->get_client_ip();

            $log->debug("nombre_receta=[$nombre_receta] | ingredientes_in=[$ingredientes_in] | intrucciones=[$intrucciones] ".
                " | vino_usado=[$vino_usado] | nombre=[$nombre] | link_blog=[$link_blog] | email=[$email] | ".
                "pais=[".$array_paises[$id_idioma]."] | ip=[$ip] | imagen=[".json_encode($_FILES["foto"])."]");


            if(empty($nombre_receta) || empty($ingredientes_in) || empty($intrucciones) || empty($vino_usado)
              || empty($nombre) || empty($link_blog) || empty($name_blog) || empty($email) || !is_array($_FILES["foto"]) || ($_FILES["foto"]["error"] != "0")){
              $log->err("Faltan elementos");
              echo "NOK";
              exit;
            }

            //$s_imagen = new abeautifulsite\SimpleImage($_FILES["foto"]["tmp_name"]);
            //$s_imagen->resize(400, 400);
            //$s_imagen->save($path_upload.$nombre_archivo);
            $s_imagen = new SimpleImage();
            $s_imagen->load($_FILES["foto"]["tmp_name"]);
            //$s_imagen->resize(400, 400);
            $s_imagen->save($path_upload.$nombre_archivo);
            //$acepta_pais = $re
            $receta = new Receta();
            $receta->setRecNombreReceta($nombre_receta);
            $receta->setRecIngredientes($ingredientes);
            $receta->setRecInstrucciones($intrucciones);
            $receta->setRecVino($vino_usado);
            $receta->setRecNombreBlogger($nombre);
            $receta->setRecUrlBlogger($link_blog);
            $receta->setRecUrlnameBlogger($name_blog);
            $receta->setRecEmailBlogger($email);
            $receta->setRecPais($id_idioma);
            $receta->setRecImagen($nombre_archivo);
            $receta->save();

            $log->debug("Receta creada | id=".$recete->getRecId());


$to = "webmanager@conosurwinery.cl";
//$to = "rodrigoxv@gmail.com";

$subject = "Email ConoSur";


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
        <img width="200" src="http://bloggercompetition.conosur.com/uploads/'.$nombre_archivo.'" alt="Cono Sur Bloggers">
      </td>
      <td align="left" style="color:#333;font-family:arial,sans-serif;font-size:12px;line-height:16px; padding:10px;" valign="top" >
        <h3>
          <b>Recipe Country </b>"'.$array_paises[$id_idioma].'"
        </h3>
        <p>'.$nombre_receta.'</P>

<p><b>Ingredients:</b><br /><br />

'.$ingredientes.'</P>

<p><b>Instructions:</b><br /><br />

'.$intrucciones.'</p>

<p><b>Wine Used:</b><br /><br />

'.$vino_usado.'</p>

<p><b>Blogger:</b><br /><br />

Name: '.$nombre.'<br />

Email: '.$email.'<br />

Blog: '.$link_blog.'<br />
    
</p>
      </td>
    </tr>

  </table>
</body>
</html>';

// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= "From: <no-reply@conosur.com>" . "\r\n";

//mail($to,$subject,$message,$headers);

$mensaje = Swift_Message::newInstance()
              ->setFrom(array('blogger@bloggercompetition.conosur.com' => 'Blogger Competition'))
              ->setTo($to)
              ->setSubject($subject)
              ->setBody($message,'text/html');
              $this->getMailer()->send($mensaje);
			  
            echo "ok";
            $log->debug("Email enviado");
              
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
