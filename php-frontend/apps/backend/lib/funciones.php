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
    
}

