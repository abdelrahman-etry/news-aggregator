<?php

namespace App\Console\Commands;

use App\Services\NYT;
use App\Services\NewsAPI;
use App\Services\TheGuardian;
use Illuminate\Console\Command;

class FetchNews extends Command{
    protected $signature    =   'news:fetch';
    protected $description  =   'Fetch latest news from APIs';

    public function __construct(){
        parent::__construct();
    }

    public function handle() {
        $services = [
            app(NYT::class),
            app(NewsAPI::class),
            app(TheGuardian::class)
        ];

        foreach ($services as $service) {
            $this->info("Fetching news from " . get_class($service));
            $service->fetchNews();
        }

        $this->info('News fetched successfully!');
    }
}
