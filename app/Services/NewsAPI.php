<?php 

namespace App\Services;

class NewsAPI extends BaseNews{
    public function __construct(){
        parent::__construct();
        
        $this->apiKey   =   env('NEWSAPI_KEY');
        $this->source   =   'NewsAPI';
    }

    protected function buildUrl(){
        return  "https://newsapi.org/v2/top-headlines?country=us&apiKey={$this->apiKey}";
    }
}
