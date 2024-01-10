<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 

class HttpClientController extends Controller
{
    //
    public function readpost()
    {
        // $response = Http::get('http://course-laravel.test/api/readpost');
        // dd($response->body());

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://course-laravel.test/api/readpost');
        // echo $res->getStatusCode();
        // echo "<pre>";
        // print_r(json_decode($res->getBody()->getContents()));

        return response()->json(json_decode($res->getBody()->getContents()),200);
        
    }
}
