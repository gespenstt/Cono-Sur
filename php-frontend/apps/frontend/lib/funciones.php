<?php

class funciones{
    
    public function setLog($type='',$archivo='frontend')
    {
        $logFechaNombre = $archivo."_".date("Ymd").".log";
        $logPath = sfConfig::get('sf_log_dir').'/'.$logFechaNombre;
        $log = new sfFileLogger(new sfEventDispatcher(), array('level' => sfFileLogger::DEBUG,'file' => $logPath,'type' => $type)); 
        return $log;
    }
    
    public function detectLang(){
        
        $log = $this->setLog("funciones-detectLang");
        $log->debug("inicio detect");
        $metodo_ip = $this->detectIp();
        if(!$metodo_ip){
            
            $ua = $this->detectUa();
            if(!$ua){
                return "NOK";
            }else{
                return $ua;
            }
            
        }else{
            return $metodo_ip;
        }
        
    }
    
    private function detectIp(){
        
        $log = $this->setLog("funciones-detectIp");
        $ip = $this->get_client_ip();
        $log->debug("IP Encontrada | ip=$ip");
        $output = false;
        if($ip != "UNKNOWN" && !empty($ip)){            
            $out = $this->ip_info($ip);
            if(!is_null($out) || !empty($out)){
                $log->debug("COUNTRY CODE ENCONTRADO: ".$out["country_code"]);
                return $out;
            }else{
                $log->err("LOCATION NO RESUELTO POR INFO");
                return $output;
            }
        }  else {
            $log->err("IP NO RESUELTA");
            return $output;
        }
        
    }
    
    private function detectUa(){
        $ua_locale = "";
        $ua_locale = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        if($ua_locale==""){
            return false;
        }else{
            $ua_locale_explode = explode(",", $ua_locale);
            return $ua_locale[0];
        }
    }
    
    private function get_client_ip() {
        $ipaddress = '';
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if($_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if($_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if($_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }   
    
    private function ip_info($ip = NULL, $purpose = "location", $deep_detect = FALSE) {
        $log = $this->setLog("funciones-ip_info");
        $log->debug("datos de entrada | ip=$ip");
        $output = NULL;
        try{
            
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
            //echo "ENCONTRE IP: $ip<br>";
            $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
            $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
            $continents = array(
                "AF" => "Africa",
                "AN" => "Antarctica",
                "AS" => "Asia",
                "EU" => "Europe",
                "OC" => "Australia (Oceania)",
                "NA" => "North America",
                "SA" => "South America"
            );
            //if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $url_api = "http://www.geoplugin.net/json.gp?ip=" . $ip;
            $log->debug("Call api | url=$url_api");
            $w = new sfWebBrowser();
            $w->get($url_api);
            $json_w = $w->getResponseText();
            $log->debug("Call api RESPONSE | data=$json_w");
                $ipdat = json_decode($json_w,true);
                //$log->debug("IPDAT: ".print_r($ipdat,true));
                if (@strlen(trim($ipdat["geoplugin_countryCode"])) == 2) {
                    $output = $ipdat["geoplugin_countryCode"];
                }
            //}
            return $output;
            
        } catch (Exception $ex) {
            $log->err($ex->getMessage());
            return $output;
        }
    }
    
    public function esKeyIdioma($key){
        $key_array = array(
            "5f5c41ce34cae1c4503d800b291f8bd4",
            "ca5d0605b60bf30f6a41cecb4b873dc4",
            "ea14eaf7e36e0a5a298c8e5e41f85cce",
            "c5e62d69879248ba52c5839ae8216ae7",
            "f6d7a559d5cfa79f1daf7c3562253c61",
        );
        if(array_search($key, $key_array)){
            return true;
        }else{
            return false;
        }
    }
    
    public function mercheKeyIdioma($key){
        $key_array = array(
            "5f5c41ce34cae1c4503d800b291f8bd4",
            "ca5d0605b60bf30f6a41cecb4b873dc4",
            "ea14eaf7e36e0a5a298c8e5e41f85cce",
            "c5e62d69879248ba52c5839ae8216ae7",
            "f6d7a559d5cfa79f1daf7c3562253c61",
        );
        $key_replace = array(
            "1",
            "2",
            "3",
            "4",
            "5",
        );
        return str_replace($key_array, $key_replace, $key);
    }
    
}