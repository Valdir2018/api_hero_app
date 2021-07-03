<?php 

namespace Source\Hero;
header('Content-Type: application/json');


class Curl {

    private $result;
    
    public function __construct() {}

    public final function initCurl(string $url) 
    {
        if (!empty($url)) {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_exec($curl);
        
            $this->result = json_decode(curl_exec($curl), true);
            echo json_encode($this->result);
            curl_close($curl);
        }
    }
}