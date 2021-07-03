<?php 

namespace Source\Hero;
use Source\Hero\Curl;
use Exception;

class ApiHero {
    public $data = array();
    
    private $query = array(
        // "name" => 'iron man', // ""
        "limit" => "20",
        'apikey' => APIKEY_PUBLIC,
        'ts' => TIMESTAMP,
        'hash' => MD5_HASH,
    );
    
    public function getListHero() 
    {
        try {

            $url  = 'https://gateway.marvel.com:443/v1/public/characters?' .http_build_query($this->query);
            $curl = new Curl;
            $this->data = $curl->initCurl($url);
           
        } catch(Exception $error) {
          throw new Error($error->getMessage());
        }
        return $this->data;
    }

}


