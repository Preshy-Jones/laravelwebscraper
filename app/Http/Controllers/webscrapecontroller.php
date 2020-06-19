<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Goutte\Client;
use GuzzleHttp\Client;
//use Symfony\Component\HttpClient\HttpClient;

class webscrapecontroller extends Controller
{
    public function scraper(Request $request){
        // $client = new Client();
        // $crawler = $client->request('GET', 'https://dishnaija.com');
        // $res = $crawler->getBody();
        // print_r($res);
        // $crawler->filter('html')->each(function ($node) {
        //     print_r($node->content()."\n");
        // });

        $url = $request->json()->all()['site'];

        $client = new Client();

        $response = $client->request(
            'GET',
            $url
        );


        $response_status_code = $response->getStatusCode();
        $response_body = $response->getBody()->getContents();

        

        if($response_status_code ===200)
        echo  ($response_body);
    }
}
