<?php 

namespace Source\Hero;
use Source\Hero\Curl;
use Exception;

class MarvelCharacters {
    public $data = array();
    
    private $query = array(
        // "name" => 'ajak',
        "limit" => "80",
        'apikey' => APIKEY_PUBLIC,
        'ts' => TIMESTAMP,
        'hash' => MD5_HASH,
        // 'size' => 'portrait_incredible.jpg',
    );


    
    public function getSomeCharacters() 
    {
        $urlComics  = URL_CHARACTERS . http_build_query($this->query);


        try {            
            $curl = new Curl;
            $this->data = $curl->initCurl($urlComics);
           
        } catch(Exception $error) {
          throw new Error($error->getMessage());
        }
        return $this->data;
    }

    public function getFilterOneStories(int $id) 
    {
       
      
        // 12211/characters
        try {

            $urlStories = URL_STORIES . "{$id}/comics?". http_build_query($this->query);

            if (!empty($id)) {
                $curl = new Curl;
                $this->data = $curl->initCurl($urlStories);
            }
           

        } catch(Exception $error) {
          throw new Error($error->getMessage());
        }

        return $this->data;
    }

}

