<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class funciones{
    
    public function getLangText($langid,$paramid){
        $c = new Criteria();
        $c->add(DiccionarioPeer::PAR_ID,$paramid);
        $c->add(DiccionarioPeer::IDI_ID,$langid);
        $res = DiccionarioPeer::doSelectOne($c);
        if($res){
            return $res->getDicTexto();
        }else{
            return "";
        }
    }
    public function setLog($type='',$archivo='backend')
    {
        $logFechaNombre = $archivo."_".date("Ymd").".log";
        $logPath = sfConfig::get('sf_log_dir').'/'.$logFechaNombre;
        $log = new sfFileLogger(new sfEventDispatcher(), array('level' => sfFileLogger::DEBUG,'file' => $logPath,'type' => $type)); 
        return $log;
    }
    
    public function br2nl($string)
    {
        return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
    }
    
    public function countVotos($id){
        $c = new Criteria();
        $c->addJoin(UsuarioRecetaPeer::USU_ID, UsuarioPeer::USU_ID);
        $c->add(UsuarioRecetaPeer::REC_ID,$id);
        $c->addAnd(UsuarioPeer::USU_ESTADO,1);
        $res = UsuarioRecetaPeer::doCount($c);
        return $res;
    }
    
    public function getRecetaUsuarioInfo($idusuario){
        $c = new Criteria();
        $c->add(UsuarioRecetaPeer::USU_ID,$idusuario);
        $c->addDescendingOrderByColumn(UsuarioRecetaPeer::UPDATED_AT);
        $res = UsuarioRecetaPeer::doSelectOne($c);
        
        $out["nombre"] = "";
        $out["pais"] = "";
        
        if($res){
            $out["nombre"] = $res->getReceta()->getRecNombreReceta();
            $out["pais"] = $res->getReceta()->getRecPais();
        }
        
        return $out;
    }

    public function getRecetaPaisEstado($pais,$estado){
        $c = new Criteria();
        $c->add(RecetaPeer::REC_ELIMINADO,0);
        $c->add(RecetaPeer::REC_PAIS,$pais);
        $c->add(RecetaPeer::REC_ESTADO,$estado);
        $count = RecetaPeer::doCount($c);
        return $count;
    }
    
}

