<?php


namespace tests;
use PHPUnit\Framewsork\TestCase;
use Source\Hero\Curl;

class MarvelTest extends TestCase {

    public function testGetSomeCharacters() 
    {
        $curl = new Curl;
        $this->assertTrue($curl->initCurl(''));
    }

    public function testListCharactersFavorites() 
    {
        
    }

}