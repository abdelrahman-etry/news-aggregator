<?php 

namespace App\Services;

class NYT extends BaseNews{
    public function __construct(){
        parent::__construct();
        
        $this->apiKey   =   env('NYT_API_KEY');
        $this->source   =   'New York Times';
    }

    protected function buildUrl(){
        return  "https://api.nytimes.com/svc/topstories/v2/world.json?api-key={$this->apiKey}";
    }
}