<?php


namespace Source\Services;
use Source\Hero\MarvelCharacters;



class ApiServices 
{

    public  function listCharactersFavorites() 
    {
        $myHero = new MarvelCharacters;
    
        if (!empty($myHero->getSomeCharacters())) {
            http_response_code(200);
            return $myHero->getSomeCharacters();
        }
        
        http_response_code(400);
        return json_encode( array('ERRO' => 'Not found') );
    }

    public function stories(int $characterId) 
    {
        $getStories = new MarvelCharacters;

        if (!empty($getStories->getFilterOneStories($characterId))) {
            http_build_query(200);
            return $getStories->getFilterOneStories($characterId);
        }
        
        http_response_code(400);
        return json_encode( array('ERRO' => 'Not found') );
    }
}