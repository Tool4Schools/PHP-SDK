<?php

namespace Tools4Schools\SDK\Clients;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Guzzle implements HttpClientInterface
{

    public function __construct(ClientInterface $client = null)
    {
        $this->client = new Client();
    }


    public function get(RequestInterface $request): ResponseInterface
    {
        return $this->client()->sendRequest($request);
    }

    public function post(RequestInterface $request): ResponseInterface
    {
        // TODO: Implement post() method.
    }

    public function put(RequestInterface $request): ResponseInterface
    {
        // TODO: Implement put() method.
    }

    public function delete(RequestInterface $request): ResponseInterface
    {
        // TODO: Implement delete() method.
    }
}