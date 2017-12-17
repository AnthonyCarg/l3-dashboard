<?php

namespace AppBundle\Service;

class RandomImageGenerator
{
    private $keywords;
    private $width;
    private $height;
    
    public function __construct($keywords, $height, $width) {
        $this->keywords = $keywords;
        $this->width = $width;
        $this->height = $height;
    }
    
    public function getRandomImageURL(){
        //var_dump($this->keywords);
        //die();
        return "https://loremflickr.com/". $this->width ."/". $this->height ."/". $this->keywords;
    }
    
}

