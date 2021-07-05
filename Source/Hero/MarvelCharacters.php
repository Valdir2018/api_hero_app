<?php 

namespace Source\Hero;
use Source\Hero\Curl;
use Exception;

class MarvelCharacters {
    public $data = array();
    
    private $query = array(
        // "name" => 'ajak',
        "limit" => "30",
        'apikey' => APIKEY_PUBLIC,
        'ts' => TIMESTAMP,
        'hash' => MD5_HASH,
    );


    
    public function getSomeCharacters() 
    {
        try {

            $url  = URL_CHARACTERS . http_build_query($this->query);
            
            $curl = new Curl;
            $this->data = $curl->initCurl($url);
           
        } catch(Exception $error) {
          throw new Error($error->getMessage());
        }
        return $this->data;
    }

    public function getFilterOneStories(int $id) 
    {
        try {

        } catch(Exception $error) {

        }

    }

}

