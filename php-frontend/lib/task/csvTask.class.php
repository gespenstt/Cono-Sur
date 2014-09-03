<?php

class csvTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name','frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = '';
    $this->name             = 'csv';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [csv|INFO] task does things.
Call it with:

  [php symfony csv|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
	
/*	$file = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR."visitas.csv";
	
	$file_fix = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR."visitas_fix.csv";
    $data = file_get_contents($file);
    $csv = str_getcsv ($data,"\n");
    //print_r($csv); exit;
    //$data = file_get_contents("visitas.csv");
    //print_r(fgetcsv("visitas.csv"));
    //$data2 = explode("\n",$data);

    //$temp = new tempCurl();
    
    $lib = new funciones();

    foreach($csv as $d){
        //echo $d;
        $cc = explode(";",$d);
        $output = "";
        if(!is_array($cc)){
            continue;
        }
        foreach($cc as $z){
            $output .= $z.";";
        }
        $ip = $cc[0]; //echo $ip;
        $ipdat = $lib->ip_info($ip);
        //$output = $cc[0];
        //if (@strlen(trim($ipdat["geoplugin_countryCode"])) == 2) {
            $output .= $ipdat.PHP_EOL;
        //}
        echo $output;
        file_put_contents($file_fix, $output, FILE_APPEND | LOCK_EX);
    }
*/
                try{
                        
            $c = new Criteria();
            $c->add(UsuarioPeer::USU_ESTADO,0);
            $usuarios = UsuarioPeer::doSelect($c);
            
            foreach ($usuarios as $usuario){
                
                $d = new Criteria();
                $d->add(UsuarioRecetaPeer::USU_ID,$usuario->getUsuId());
                $receta = UsuarioRecetaPeer::doSelectOne($d);
                if(!$receta){
                    continue;
                }
                
                $receta_id = $receta->getRecId();
                
                $url_validar = "http://bloggercompetition.conosur.com/index.php/home/validar/usuid/".$usuario->getUsuId()."/key/".$usuario->getUsuClave()."/receta/$receta_id";

                //$message = "<h1>Valida tu cuenta</h1><br><br>Haz click <a href='".$url_validar."'>aqui</a>";
                $message = '<html>
                <head>
                </head>

                <body style="margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif;">
                <table width="450" border="0" cellpadding="0px" cellspacing="0px" style="border:1px solid #ccc;">
                  <tr>
                    <td><img src="http://bloggercompetition.conosur.com/img/letter-header.jpg" /></td>
                  </tr>
                  <tr>
                    <td height="200px" style="text-align:center; padding:20px;">Please click on <a href="'.$url_validar.'">this link</a> to validate your vote for your favorite recipe in the Cono Sur Blogger Competition.</td>
                  </tr>
                  <tr>
                    <td style="text-align:center; font-size:10px;
                    color:#000; padding:10px; background-color:#e5dd61;">© 2014 Cono Sur | <a href="www.conosur.com" style="color:#000; text-decoration:none;">www.conosur.com</a> | <a href="mailto:webmanager@conosurwinery.cl" style="color:#000; text-decoration:none;">contact: webmanager@conosurwinery.cl</a></td>
                  </tr>
                </table>
                </body>
                </html>
                ';
                //$message = "Please click on <a href='".$url_validar."'>this link</a> to validate your vote for your favorite recipe in the Cono Sur Blogger Competition.";
                echo "ENVIANDO A ".$usuario->getUsuEmail()." | RECID=$receta_id <br>";
                //mail($to,$subject,$message,$headers);
                $mensaje = Swift_Message::newInstance()
                  ->setFrom(array('no.reply@bloggercompetition.conosur.com' => 'Blogger Competition'))
                  ->setTo($usuario->getUsuEmail())
                  ->setSubject('Validate vote')
                  ->setBody($message,'text/html');
                  $this->getMailer()->send($mensaje);   
            }
          } catch (Exception $ex) {
              echo $ex->getMessage()."<br>";
          }
          
    // add your code here
  }
}
