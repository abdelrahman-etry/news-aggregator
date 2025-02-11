<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\News;
use GuzzleHttp\Client;

abstract class BaseNews{
    protected $client;
    protected $apiKey;
    protected $source;

    public function __construct(){
        $this->client   =   new Client();
    }

    abstract protected function buildUrl();

    public function fetchNews(){
        try{
            $url        =   $this->buildUrl();
            $response   =   $this->client->get($url);
            $articles   =   json_decode($response->getBody()->getContents(), true)['articles'];

            foreach($articles as $article){
                $this->storeArticle($article);
            }
        }catch(\Exception $e){
            \Log::error("Error fetching news from {$this->source}: " . $e->getMessage());
        }
    }

    protected function storeArticle($article){
        News::updateOrCreate(
            ['title' => $article['title']],
            [
                'description'   =>  $article['description'] ?? 'No description available',
                'url'           =>  $article['url'],
                'source'        =>  $this->source,
                'author'        =>  $article['author'] ?? 'Unknown',
                'published_at'  =>  Carbon::parse($article['publishedAt'])->toDateTimeString(),
            ]
        );
    }
}