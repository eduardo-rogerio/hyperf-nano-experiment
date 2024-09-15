<?php

namespace Mixd\App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Hyperf\Guzzle\CoroutineHandler;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

class HomeController
{
    public function index(ResponseInterface $response)
    {
//        $data = [
//            'code' => 200,
//            'message' => 'Success!',
//            'data' => [
//                'key' => 'value'
//            ],
//        ];
//        return $response->json($data)
//            ->withStatus(200, 'Success');
        $stack = HandlerStack::create(new CoroutineHandler());
        $client = new Client(['handler' => $stack]);
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');
        return json_decode($response->getBody(), true);

    }
}