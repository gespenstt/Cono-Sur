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
                return $out["country_code"];
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
        $w = new sfBrowser();
        $w->get($url_api);
        $json_w = $w->getResponse();
        $log->debug("Call api RESPONSE | data=$json_w");
            $ipdat = @json_decode($json_w);
            $log->debug("IPDAT: ".$ipdat);
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        $log->debug("Output | ".print_r($output,true));
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        //}
        return $output;
}
    
}