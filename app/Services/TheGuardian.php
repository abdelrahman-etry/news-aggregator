<?php 

namespace App\Services;

class TheGuardian extends BaseNews{
    public function __construct(){
        parent::__construct();
        
        $this->apiKey   =   env('GUARDIAN_API_KEY');
        $this->source   =   'The Guardian';
    }

    protected function buildUrl(){
        return  "https://newsapi.org/v2/top-headlines?country=us&apiKey={$this->apiKey}";
    }
}